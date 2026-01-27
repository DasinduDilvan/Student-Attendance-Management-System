<h2>Select or Add Batch (Department: <?= htmlspecialchars($_SESSION['department']) ?>)</h2>
<form method="post">
    <input type="text" name="batch" list="batchList" placeholder="Type or select batch" required>
    <datalist id="batchList">
        <?php foreach($batches as $b): ?>
            <option value="<?= htmlspecialchars($b['batch_name']) ?>">
        <?php endforeach; ?>
    </datalist>
    <button type="submit" name="save">Save</button>
</form>
