<?php
include './db.php';
if (isset($_POST['income_id'])) {
    $income_id = $_POST['income_id'];
    $income_name = $_POST['income_name'];
    $income_amount = $_POST['income_amount'];
    $conn->update_inc("income", $income_id, $income_name, $income_amount);
}
