<?php include('./includes/header.php') ?>


<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Expenses income monitor</h1>
            <hr>
            <div class="col-md-12">
                <div id="results">

                </div>
            </div>

            <div class="col-md-6">
                <div class="income-div">
                    <h3 class="text-center">Income Form</h3>

                    <form id="incomeForm" method="POST">
                        <div class="form-group">
                            <label for="income-source">Income source</label>
                            <input required type="text" name="income-source" id="income-source" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="income-amount">Amount</label>
                            <input required type="number" name="income-amount" id="income-amount" class="form-control">
                            <input type="hidden" name="currency" id="currency" value="$">
                        </div>
                        <button type="submit" class="btn btn-success" id="submitbtn">submit income</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="Expenses-div">
                    <h3 class="text-center">Expenses Form</h3>

                    <form id="ExpensesForm" method="POST">
                        <div class="form-group">
                            <label for="expenses-source">expenses Source</label>
                            <input required type="text" name="expenses-source" id="expenses-source" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="expenses-amount">Amount</label>
                            <input required type="number" name="expenses-amount" id="expenses-amount" class="form-control">
                            <input type="hidden" name="currency" id="currency" value="$">
                        </div>

                        <button type="submit" class="btn btn-danger" id="submitbtn">total expenses</button>
                    </form>
                </div><!-- backgrcol to this div why then colored the hole container  -->
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $("#incomeForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $("#results").html(response);
                    $("#incomeForm")[0].reset(); //this is working
                    incomeBalance();
                }
            })
        })

        $("#ExpensesForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $(this).serialize(), //???
                success: function(response) {
                    $("#results").html(response);
                    $("#ExpensesForm")[0].reset(); //this is working now
                    incomeBalance();
                }
            })
        })
    })

    function incomeBalance() {
        var income_balance = "income_balance";
        $.ajax({
            url: "income_balance_update.php",
            method: "post",
            data: {
                income_balance: income_balance
            },
            success: function() {
                //alert("balance updated hey");
                displayData();
            }
        })
    }

    function displayData() {
        var displayData = "displayData";
        $.ajax({
            url: "fetch-data.php",
            method: "post",
            data: {
                displayData: displayData
            },
            success: function() {
                $("results").html(data);

            }
        })
    }
    displayData();
</script>

<?php include('./includes/footer.php') ?>