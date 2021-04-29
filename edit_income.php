<?php
include './db.php';

if (isset($_POST['editBtnId'])) {
    $editBtnId = preg_replace("#[^0-9]#", "", $_POST['editBtnId']);
    $result = $conn->get_spec_income($editBtnId);

    foreach ($result as $row) {
        echo json_encode($row);
    }
}
