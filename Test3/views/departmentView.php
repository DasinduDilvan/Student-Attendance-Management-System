<h2>Select or Add Department</h2>
<form method="post">
    <input type="text" name="department" list="deptList" placeholder="Type or select department" required>
    <datalist id="deptList">
        <?php foreach($departments as $dept): ?>
            <option value="<?= htmlspecialchars($dept['dep_name']) ?>">
        <?php endforeach; ?>
    </datalist>
    <button type="submit" name="save">Save</button>
</form>
