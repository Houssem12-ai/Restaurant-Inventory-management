<?php
include './db.php';

if (isset($_POST['displayData'])) {
    $income = $conn3->get_all("income");
    $expense = $conn3->get_all("expense");
    $inc = $income->fetch(PDO::FETCH_ASSOC);
    $exp = $expense->fetch(PDO::FETCH_ASSOC);
    //echo $exp['total_expense'];
    //foreach ($income as $inc) :     <?php endforeach 
} ?>
<div class="well-div text-center">
    <ul>
        <li>Total income $ <?php echo $inc['total_income']; ?></li>
        <li> Total expenses $<?php echo $exp['total_expense']; ?></li>
        <li> Income balance $<?php echo $inc['income_balance']; ?></li>
    </ul>
</div>
<h4 class="text-center">Income Resources</h4>
<hr>

<?php foreach ($income as $key) : ?>
    <div class="all_incomes">
        <ul>
            <li><?php echo $key['income_name'] ?><span class="float-right"><?php echo $key['currency'] ?><?php echo $key['income_amount'] ?><button class="btn btn-primary btn-xs editBtn" type="button" id="<?php echo $key['id'] ?>">Edit</button><button class="btn btn-danger btn-xs editBtn" id="<?php echo $key['id'] ?>">&times;</button></span>
            </li>
        </ul>
    </div>

<?php endforeach ?>

<h4 class=" text-center">Expenses</h4>
<hr>


<?php foreach ($expense as $key) : ?>
    <div class="expenses-div">
        <ul>
            <li><?php echo $key['expense_name'] ?><span class="float-right"><?php echo $key['currency'] ?><?php echo $key['expense_amount'] ?>
                </span>
            </li>
        </ul>
    </div>
<?php endforeach ?>

<style>
    .well-div ul {
        list-style: none;
        display: inline-flex;
        justify-content: center;
    }

    .well-div ul li {
        box-shadow: 0 0 5px;
        margin-left: 10px;
        padding: 6px;
        border-radius: 3px;
    }

    .all_incomes ul {
        list-style: none;
        border: 1px dashed;
    }

    .expenses-div {
        background-color: tomato;
        padding: 5px;
        color: #fff;
    }

    .float-right {
        float: right;
    }
</style>