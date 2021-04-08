<?php
require("inc/db.php");
$id = $_GET['id'] ? intval($_GET["id"]) : 0; // when is this condition required ?

try {
    $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT); // this parameter ?
    $stmt->execute(); //revising sql injection
} catch (Exception $e) {
    echo "Error" . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("location : index.php"); //??????
    exit();
}

$product = $stmt->fetch();

?>


<?php include("inc/header.php") ?>

<div class="container">
    <a href="index.php" class="btn btn-light">
        << Go Back</a> <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-database"></i> Show Product</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>BARCODE</th>
                                <td><?= $product['barcode'] ?></td>
                                <th>Name</th>
                                <td><?= $product['name'] ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>$<?= number_format($product['price'], 2) ?></td><!-- why the dollar sign outthere -->
                                <th>Qte</th>
                                <td><?= $product['qty'] ?></td>
                            </tr>

                            <tr>
                                <th>Descriptoin</th>
                                <td colspan="3"><?= $product['description'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>

</div>

<br>
</div>

<!-- End Show a product -->

<?php include("inc/footer.php") ?>