<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>

<?php
require("inc/db.php");
$id = $_GET['id'] ? intval($_GET["id"]) : 0; // when is this condition required ?


$product = $crud->getproduct($id);



?>


<?php include("inc/header.php") ?>

<!-- Start Hero Image -->

<div class="container">
    <a href="index.php" class="btn btn-light mb-3"> Go Back</a>
    <?php if (isset($_GET["status"]) && $_GET["status"] == "updated") : ?> <div class="alert alert-success" role="alert">
            updated successufully
        </div>
    <?php endif ?>

    <?php if (isset($_GET["status"]) && $_GET["status"] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            Failed updation
        </div>
    <?php endif ?>

    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-edit"></i> Edit Product</strong>
        </div>
        <div class="card-body">
            <form action="update.php" method="post">
                <div class="form-row">
                    <input type="hidden" name="id" id="id" value="<?= $product["id"] ?>">
                    <div class="form-group col-md-6">
                        <label for="barcode" class="col-form-label">Barcode</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $product['barcode'] ?>" value="<?= $product['barcode '] ?>" placeholder="Barcode" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="price" class="col-form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" placeholder="Price" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="qty" class="col-form-label">Qty</label>
                        <input type="number" class="form-control" name="qty" id="qty" value="<?= $product['qty'] ?>" placeholder="Qty" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="img" class="col-form-label">Image</label>
                        <input type="text" class="form-control" name="img" id="img" value="<?= $product['image'] ?>" placeholder="Image URL">
                    </div>
                </div>
                <div class="form-group">
                    <label for="note" class="col-form-label">Description</label>
                    <textarea name="description" id="" rows="5" class="form-control" placeholder="Description"><?= $product['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container -->

<?php include("inc/footer.php") ?>