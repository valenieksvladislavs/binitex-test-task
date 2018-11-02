<?php
class controller
{
private function render_partial($path, $param = array())
{
    extract($param);
    ob_start();

    if(!include('templates/'.$path))
        exit("Template Not Found");

    return ob_get_clean();
}

private function render($path, $param = array())
{
    ob_start();
    $content = $this->render_partial($path, $param);
    include('templates/index.php');
    return ob_get_clean();
}

public function index()
{
    $content = $this->table();
    return $this->render('student-list.php', array('content' => $content));
}

public function table()
{
    $student = new student();
    $student->set_attributes($_GET);
    $student->set_sort_method($_GET['sort']);
    $student->set_page($_GET['page']);
    $rcount = $student->get_record_count();
    $pcount = $student->get_page_count();
    $rows = $student->get_records();
    $current_page = $student->get_page();
    $pagination = $this->pagination($pcount, $current_page);
    $sort = $this->getSort($student->get_sort_method());
    return $this->render_partial('table.php', array('rows' => $rows, 'rcount' => $rcount, 'pagination' => $pagination, 'sort' => $sort));
}

private function pagination($count, $current_page)
{
    $content = "";
    if($current_page > 1)
        $content .= "<a href='?page=".($current_page - 1)."' bind-action='page' page='".($current_page - 1)."'><</a>";
    for($i = 1; $i <= $count; $i++)
    {
        if($i == $current_page)
            $content .= $i;
        else
            $content .= "<a href='?page=".$i."' bind-action='page' page='".$i."'>".$i."</a>";
    }
    if($current_page < $count)
        $content .= "<a href='?page=".($current_page + 1)."' bind-action='page' page='".($current_page + 1)."'>></a>";
    return $content;
}

private function getSort($sort){
    $fields = array('insurance_number','surname', 'name', 'year_of_birth', 'city_of_birth', 'university');
    $i = 0;
    foreach($fields as $item)
    {
        $fields[$i] = $sort == $item.'-asc' ? $item.'-desc' : $item.'-asc';
        $i++;
    }

    return $fields;
}

public function validate_field()
{
    $field = $_GET['field'];
    $student = new student();
    $student->$field = $_GET['data'];
    $method = 'validate_'.$field;
    return $student->$method();
}

public function add()
{
    if($_POST)
    {
        $student = new student;
        $student->set_attributes($_POST);
        if($student->validation()) $student->save();
        header("Location: http://".$_SERVER['HTTP_HOST']);
        die();
    }
    $content = $this->render_partial('form.php');
    return $this->render_partial('add.php', array('content' => $content));
}

public function edit()
{
    $student = new student;
    if($_POST)
    {
        $student->set_attributes($_POST);
        if($student->validation()) $student->save();
        header("Location: http://".$_SERVER['HTTP_HOST']);
        die();
    }
    $id = $_GET['id'];
    $student->load_attr($id);
    $content = $this->render_partial('form.php', array('student' => $student));
    return $this->render_partial('edit.php', array('content' => $content, 'id' => $id));
}

public function delete()
{
    if($_POST['yes'])
    {
        $student = new student;
        $student->id = $_POST['id'];
        $student->delete();
        header("Location: http://".$_SERVER['HTTP_HOST']);
        die();
    }
    if($_GET['id'])
        return $this->render_partial('delete.php', array('id' => $_GET['id']));
}
}