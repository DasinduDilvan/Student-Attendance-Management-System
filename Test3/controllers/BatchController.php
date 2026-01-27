<?php

require_once __DIR__ . '/../models/BatchModel.php';
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['department'])) {
    header("Location: index.php?page=department");
    exit;
}

$batches = [];

$batches = getBatches($conn);

if (isset($_POST['save'])) {
    $batch = trim($_POST['batch']);
    if ($batch !== '') {
        addBatchIfNotExists($conn, $batch);
        $_SESSION['batch'] = $batch;
    }
    header("Location: index.php?page=level");
    exit;
}

require_once __DIR__ . '/../views/batchView.php';
