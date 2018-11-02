<a href="#" class="btn btn-primary" bind-action="open-create" action-link="?action=add">Add</a>
<div class="table-box">
    <table class="table student-list">
        <thead>
        <tr>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[0]?>">Insurance Number</a>
            </td>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[1]?>">Surname</a>
            </td>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[2]?>">Name</a>
            </td>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[3]?>">Year of birth</a>
            </td>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[4]?>">City of birth</a>
            </td>
            <td>
                <a href="#" bind-action="sort" sort="<?=$sort[5]?>">University</a>
            </td>
            <td>
                Edit/Delete
            </td>
        </tr>

        </thead>
        <tbody>
            <?php if($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td>
                            <?=$row['insurance_number']?>
                        </td>
                        <td>
                            <?=$row['surname']?>
                        </td>
                        <td>
                            <?=$row['name']?>
                        </td>
                        <td>
                            <?=$row['year_of_birth']?>
                        </td>
                        <td>
                            <?=$row['city_of_birth']?>
                        </td>
                        <td>
                            <?=$row['university']?>
                        </td>
                        <td>
                            <a href="?action=edit&id=<?=$row['id']?>" bind-action="open-edit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="?action=delete&id=<?=$row['id']?>" bind-action="delete" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<br>
<div class="pagination-box">
    <?=$pagination?>
</div>
<br>
<div class="total-box">
    Total records: - <?=$rcount?>
</div>