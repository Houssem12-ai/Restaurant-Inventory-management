<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php
include("inc/header.php");
require("inc/db.php");

try {
    $sql = "SELECT * FROM products";
    $result = $pdo->query($sql); // this the first method of doing it
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
}
?>
<div class="container">
    <!-- Table Product -->
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Products</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">Table Products</h5>
                    <a href="create.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($result->rowCount() > 0) : ?>
                        <?php foreach ($result as $product) : ?>
                            <tr>
                                <td><?= $product["barcode"] ?></td>
                                <td><?= $product["name"] ?></td>
                                <td><?= number_format($product["price"], 2) ?></td>
                                <td><?= $product["qty"] ?></td>
                                <td><?= $product["barcode"] ?></td>
                                <td>
                                    <a href="show.php?id=<?= $product["id"] ?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                                    <a href="edit.php?id=<?= $product["id"] ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Table Product -->
    <br>
</div><!-- /.container -->

<?php include("inc/footer.php") ?>
<!-- 
   // <php var_dump($result) ?>
    <-- print_r =>humain readable -->
<!-- what si var_dump  -->