<?php

class expense // i was giving the same name to both classes 
{ //the error disapear when the object is instantiated
    private $db;
    public function __construct($sql)
    {
        $this->db = $sql;
    }
    //$id, id, 
    public function insert_exp($name, $amount, $currency, $kind)
    {
        try {
            $sql = "INSERT INTO " . $kind . "_tbl(" . $kind . "_name," . "currency, " . $kind . "_amount)
        VALUES(:name,:currency,:amount)";
            $stmt = $this->db->prepare($sql);
            //$stmt->bindParam(":id", $id);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":currency", $currency);

            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }



    public function get_exp($kind)
    {
        try {
            $sql = "SELECT SUM(" . $kind . "_amount) AS totall_amount FROM " . $kind . "_tbl";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['totall_amount'];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }



    public function set_exp($kind, $amount)
    {
        try {
            $sql = "UPDATE " . $kind . "_tbl SET total_" . $kind . " = :amount";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":amount", $amount);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
}
