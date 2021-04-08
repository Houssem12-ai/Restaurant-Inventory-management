<html>
<?php

class crud
{
    private $db;
    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getproduct($id)
    {
        try {
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT); // this parameter ?
            $stmt->execute(); //revising sql injection
            if (!$stmt->rowCount()) {
                header('Location: index.php');
                exit();
            };

            $result = $stmt->fetch();
            return $result;
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
    public function insert($barcode, $name, $price, $qty, $image, $description)
    {
        try {
            $sql = 'INSERT INTO products(barcode,name,price,qty,image,description)
        VALUES(:barcode,:name,:price,:qty,:image,:description)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":barcode", $barcode);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":description", $description);
            $stmt->execute();

            if ($stmt->rowCount()) {
                header("Location: create.php?status=created");
                exit();
            }
            header("Location: create.php?status=fail_create");
            exit();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
    public function extract($id)
    {
        try {
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT); // this parameter ?
            $stmt->execute(); //revising sql injection
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }

        if (!$stmt->rowCount()) {
            header("location : index.php"); //redirection
            exit();
        }
        return $result = $stmt->fetch();
    }
}
?>