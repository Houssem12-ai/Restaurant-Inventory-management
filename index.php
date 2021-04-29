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
                            <input required type="text" id="income-source" name="income-source" class="form-control">
                            <input type="hidden" id="income_id" name="income_id">
                        </div>

                        <div class="form-group">
                            <label for="income-amount">Amount</label>
                            <input required type="number" name="income-amount" id="income-amount" class="form-control">
                            <input type="hidden" name="currency" id="currency" value="$">

                        </div><!-- the displya non property add it later -->
                        <button type="submit" class="btn btn-success" id="submitbtn">submit income</button>
                    </form>
                    <button type="submit" style="display : none" class="btn btn-primary" id="updateBtn">Update</button>

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
            method: "POST",
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
            url: "fetch_data.php",
            method: "POST",
            data: {
                displayData: displayData
            },
            success: function(data) {
                $("#results").html(data);
            }
        })
    }
    displayData();

    $(document).on("click", ".editBtn", function() {
        var editBtnId = $(this).attr("id");
        $.ajax({
            url: "edit_income.php",
            method: "POST",
            DataType: "json",
            data: {
                editBtnId: editBtnId
            },
            success: function(data) {
                var json = JSON.parse(data);
                //console.log(json.id);
                $("#income_id").val(json.id);
                $("#income-source").val(json.income_name);
                $("#income-amount").val(json.income_amount);
                $("#updateBtn").show();
                $("#submitbtn").css("display", "none");
            }
        })
    })
    $(function() {
        $("#updateBtn").click(function() {
            var income_id = $("#income_id").val();
            var income_name = $("#income-source").val();
            var income_amount = $("#income-amount").val();
            if (income_name == "" || income_amount == "") {
                alert("those fields shouldn't be empty");
                return false;
            }
            $.ajax({
                url: "post_edit_income.php",
                method: "POST",
                data: {
                    income_id: income_id,
                    income_name: income_name,
                    income_amount: income_amount
                },
                success: function() {
                    displayData();
                    $("#updateBtn").css("display", "none");
                    $("#submitbtn").show();
                }
            })
        })
    });
</script>

<?php include('./includes/footer.php') ?>