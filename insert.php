<?php
include('db.php');

if (isset($_POST['income-source'])) {
    $income_source = $_POST['income-source'];
    $income_amount =  $_POST['income-amount'];
    $currency =  $_POST['currency'];

    if (!preg_match("/^[0-9]*$/", $income_amount)) {
        //this is in case u wanna make a specefic message from the db u can make it that way
        echo "<p class='text-danger'>Only digit are allowed please</p>";
        exit();
    }
    $conn->insert_inc($income_source, $income_amount, $currency);

    $somme = $conn->get_inc();
    echo $somme;
} else {
    echo "there was an error";
}
