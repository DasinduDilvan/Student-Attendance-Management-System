<html>
<body>

<h2>Department</h2>

<form method="post">
    <input type="text"
           name="department"
           list="deptList"
           placeholder="Type or select department"
           required>

    <datalist id="deptList">
        <?php foreach ($departments as $dep): ?>
            <option value="<?= $dep['dep_name']; ?>">
        <?php endforeach; ?>
    </datalist>

    <button type="submit" name="save_department">
        Save Department
    </button>
</form>

</body>
</html>
