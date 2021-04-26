<?php
include './db.php';

if (isset($_POST['displayData'])) {
    $income = $conn3->get_all("income");
    $expense = $conn3->get_all("expense");



    //foreach ($income as $inc) :     <?php endforeach 
?>
<?php } ?>


<div class="well-div text-center">
    <ul>
    </ul>
</div>


<style>
    .well-div {
        border: 1px solid #000;
        padding: 10px;
    }

    .well-div ul {
        list-style: none;
        display: inline-flex;
        justify-content: center;
    }

    .well-div ul li {
        box-shadow: 0 0 5px;
        margin-left: 10px;
        padding: 6px;
    }
</style>