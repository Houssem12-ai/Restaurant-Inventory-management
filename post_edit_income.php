<?php
include './db.php';
if (isset($_POST['income_id'])) {
    $income_id = preg_replace("#[^0-9]#", "", $_POST['income_id']);
    $income_name = $_POST['income_name'];
    $income_amount = $_POST['income_amount'];
    $conn->update_inc($income_id, $income_name, $income_amount);
    //echo $income_amount;
    //echo $income_name;
}
