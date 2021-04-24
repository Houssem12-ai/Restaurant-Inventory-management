<?php include('./includes/header.php') ?>


<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">expense income monitor</h1>
            <hr>
            <div class="col-md-12">
                <div id="results">

                </div>
            </div>

            <div class="col-md-6">
                <div class="income-div">
                    <h3 class="text-center">Income Form</h3>

                    <form method="POST" id="incomeForm">
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
                <div class="expense-div">
                    <h3 class="text-center">Expenses Form</h3>

                    <form id="expensesForm" method="post">
                        <div class="form-group">
                            <label for="expense-source">Expenses Source</label>
                            <input required type="text" name="expense-source" id="expense-source" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input required type="number" name="expense-amount" id="expense-amount" class="form-control">
                            <input type="hidden" name="currency" id="currency" value="$">
                        </div>

                        <button type="submit" class="btn btn-danger" id="submitbtn">total Expense</button>
                    </form>
                </div><!-- backgrcol to this div why then colored the hole container  -->
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $("#incomeForm").submit(function(event) {
            event.preventDefault()
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $("#results").html(response);
                    $("#incomeForm")[0].reset(); //this is working
                }
            })
        })
    })
</script>

<?php include('./includes/footer.php') ?>