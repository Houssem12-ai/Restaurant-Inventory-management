<html>

</html>

<?php
require("inc/db.php");

if ($_POST) {
    $barcode = trim($_POST["barcode"]);
    $name = trim($_POST["name"]);
    $price = trim($_POST["price"]);
    $qty = trim($_POST["qty"]);
    $image = trim($_POST["img"]);
    $description = trim($_POST["description"]);
    $crud->insert($barcode, $name, $price, $qty, $image, $description);
} else {
    header("Location: create.php?status=fail_create");
    exit();
}
?>