<?php
include './db.php';

if (isset($_POST['deleteBtnId'])) {
    $deleteBtnId = preg_replace("#[^0-9]#", "", $_POST['deleteBtnId']);

    $conn->delete_inc($deleteBtnId);

    $somme = $conn->get_inc("income");
    $conn->set_inc("income", $somme);


    $Xsomme = $conn2->get_exp("expense");
    $conn2->set_exp("expense", $Xsomme);

    $inc = $conn->get_total_income();
    $exp = $conn->get_total_expense();
    $conn->set_income_balance($inc - $exp);
}
