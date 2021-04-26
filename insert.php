
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
    //$kind = "income";

    $conn->insert_inc($income_source, $income_amount, $currency, "income");

    $somme = $conn->get_inc("income");
    $conn->set_inc("income", $somme);
    //echo $kind;
    // echo $kind;

} else {
    echo "there was an error";
}

//EXPENSES 

if (isset($_POST['expenses-source'])) {

    $expenses_source = $_POST['expenses-source'];
    $expenses_amount =  $_POST['expenses-amount'];
    $currency =  $_POST['currency'];

    if (!preg_match("/^[0-9]*$/", $expenses_amount)) {
        //this is in case u wanna make a specefic message from the db u can make it that way
        echo "<p class='text-danger'>Only digit are allowed please</p>";
        exit();
    }
    $conn2->insert_exp($expenses_source, $expenses_amount, $currency, 'expense');

    // why declaring this variable doesn't work ?? $kind2 = "expense";

    $Xsomme = $conn2->get_exp("expense");
    //  echo $Xsomme;
    $conn2->set_exp("expense", $Xsomme);
    //*/

    //echo "salem2";
} else {
    echo "there was an error";
}
?>