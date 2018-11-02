<?php
class student
{
public $id;
public $insurance_number;
public $surname;
public $name;
public $year_of_birth;
public $city_of_birth;
public $university;
private $sort_column = 'insurance_number';
private $sort_method = 'ASC';
public $count = 15;
private $page = 1;

private function connection()
{
    $link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    $link->set_charset("utf8");

    return $link;
}

public function get_record_count()
{
    $connection = $this->connection();
    $query = "SELECT COUNT(*)
                FROM student_list
                WHERE `insurance_number` LIKE '%$this->insurance_number%'
                AND `surname` LIKE '%$this->surname%'
                AND `year_of_birth` LIKE '%$this->year_of_birth%'
                AND `city_of_birth` LIKE '%$this->city_of_birth%'";
    $result = $connection->query($query)->fetch_array();
    $connection->close();
    return $result[0];
}

public function get_page_count()
{
    $count = $this->get_record_count();
    return (int)(($count - 1) / $this->count) + 1;
}

public function set_attributes($attr)
{
    $this->id = $attr['id'];
    $this->insurance_number = $attr['insurance_number'];
    $this->surname = $attr['surname'];
    $this->name = $attr['name'];
    $this->year_of_birth = $attr['year_of_birth'];
    $this->city_of_birth = $attr['city_of_birth'];
    $this->university = $attr['university'];
}

public function set_sort_method($sort)
{
    if($sort) {
        $s = explode('-', $sort);
        $this->sort_column = trim($s[0]);
        $this->sort_method = trim(strtoupper($s[1]));
    }
}

public function get_sort_method()
{

    return $this->sort_column."-".strtolower($this->sort_method);
}

public function set_page($page)
{
    if($page) $this->page = $page;
}

public function get_page()
{
    return $this->page;
}

private function get_start()
{
    $total = $this->get_page_count();

    if($this->page > $total) $this->page = $total;
    $start = $this->page * $this->count - $this->count;
    return $start;
}

public function get_records()
{
    $connection = $this->connection();
    $start = $this->get_start();
    $query = "SELECT * FROM student_list
                WHERE `insurance_number` LIKE '%$this->insurance_number%'
                AND `surname` LIKE '%$this->surname%'
                AND `year_of_birth` LIKE '%$this->year_of_birth%'
                AND `city_of_birth` LIKE '%$this->city_of_birth%'
                ORDER BY $this->sort_column $this->sort_method
                LIMIT $start, $this->count";

    if($result = $connection->query($query)){
        $rows = array();
        $i = 0;
        while($row = $result->fetch_assoc()){
            $rows[$i] = $row;
            $i++;
        }
        $connection->close();
        $result->close();

        return $rows;
    }
    else $connection->close(); return false;
}

public function validate_insurance_number()
{
    if($this->insurance_number)
    {
        if(ctype_digit($this->insurance_number)) return true;
        else return '{"field":"insurance_number","error":"Number insurance can only be numbers"}';
    }
    else return '{"field":"insurance_number","error":"Enter insurance number please!"}';
}

public function validate_surname()
{
    if($this->surname) return true;
    else return '{"field":"surname","error":"Enter surname please!"}';
}

public function validate_name()
{
    if($this->name) return true;
    else return '{"field":"name","error":"Enter surname please!"}';
}

public function validate_year_of_birth()
{
    if($this->year_of_birth)
    {
        if(ctype_digit($this->year_of_birth) && strlen($this->year_of_birth) == 4) return true;
        else return '{"field":"year_of_birth","error":"The year of birth can only be a four-digit number"}';
    }
    else return '{"field":"year_of_birth","error":"Enter year of birth please!"}';
}

public function validate_city_of_birth()
{
    if($this->city_of_birth) return true;
    else return '{"field":"city_of_birth","error":"Enter city of birth please!"}';
}

public function validate_university()
{
    if($this->university) return true;
    else return '{"field":"university","error":"Enter university please!"}';
}

public function validation()
{
    $result = true;
    if($this->validate_insurance_number() != true)
        $result = false;
    if($this->validate_surname() != true)
        $result = false;
    if($this->validate_name() != true)
        $result = false;
    if($this->validate_year_of_birth() != true)
        $result = false;
    if($this->validate_city_of_birth() != true)
        $result = false;
    if($this->validate_university() != true)
        $result = false;

    return $result;
}

public function save()
{
    $connection = $this->connection();
    if($this->id)
    {
        $query = "UPDATE student_list SET
                  `insurance_number` = '{$this->insurance_number}',
                  `surname` = '{$this->surname}',
                  `name` = '{$this->name}',
                  `year_of_birth` = '{$this->year_of_birth}',
                  `city_of_birth` = '{$this->city_of_birth}',
                  `university` = '{$this->university}'
                  WHERE id = '{$this->id}'";
    }
    else
    {
        $query = "INSERT INTO student_list
                  (`insurance_number`, `surname`, `name`, `year_of_birth`, `city_of_birth`, `university`)
                  VALUES ('{$this->insurance_number}',
                          '{$this->surname}',
                          '{$this->name}',
                          '{$this->year_of_birth}',
                          '{$this->city_of_birth}',
                          '{$this->university}')";
    }

    if(!$connection->query($query)) echo $connection->error.'<br\>'.$query;
    $connection->close();
}

public function delete()
{
    $connection = $this->connection();
    $query = "DELETE FROM student_list WHERE id = '{$this->id}'";
    $connection->query($query);
    $connection->close();
}

public function load_attr($id)
{
    $connection = $this->connection();
    $query = "SELECT * FROM student_list
                WHERE id = {$id}";

    if($result = $connection->query($query)){
        $row = $result->fetch_assoc();

        $this->set_attributes($row);
    }
    $connection->close();
}
}