<?php
function getBatches($conn) {
    $result = mysqli_query($conn, "SELECT * FROM batch ORDER BY batch_name");
    $batches = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $batches[] = $row;
    }
    return $batches;
}

function addBatchIfNotExists($conn, $name) {
    $name = mysqli_real_escape_string($conn, $name);
    $check = mysqli_query($conn, "SELECT * FROM batch WHERE batch_name='$name'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO batch(batch_name, status) VALUES('$name', 'ACTIVE')");
    }
}
