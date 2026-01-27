
<?php

require_once __DIR__ . '/../app/controller/departmentControlller.php' ;
require_once __DIR__ . '/../app/view/departmentView.php';
require_once __DIR__ . '/../config/database.php';

?>

<html>
<body>
    
    <form method="post" action="index.php">
    <input type="hidden" name="add" value="department">
    <button type="submit" name="add">Add</button>
</form>
<hr>
<h2>Departments</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action 1 </th>
        <th>Action 2 </th>
      
    </tr>

    <?php if (!empty($departments)) : ?>
        <?php foreach ($departments as $dep) : ?>
            <tr>
                <td><?= $dep['dep_id'] ?></td>
                <td><?= $dep['dep_name'] ?></td>
                <td><?= $dep['status'] ?></td>
                <td><a href="index.php?page=department&action=delete&id=<?= $dep['dep_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
                <td><a href="index.php?page=department&action=reactive&id=<?= $dep['dep_id'] ?>" onclick="return confirm('Are you sure?')">REACTIVE</a></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="5">No departments found</td>
        </tr>
    <?php endif; ?>

</table>

</body>
</html>



