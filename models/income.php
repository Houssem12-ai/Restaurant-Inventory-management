<?php

class income
{ //the error disapear when the object is instantiated
    private $db;
    public function __construct($sql)
    {
        $this->db = $sql;
    }

    public function insert_inc($name, $amount, $currency, $kind)
    {
        try {
            $sql = "INSERT INTO " .  $kind . "_tbl ( " . $kind . "_name, " .  $kind . "_amount, currency) 
            VALUES(:name,:amount,:currency)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":currency", $currency);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }


    public function get_inc($kind)
    {
        try {
            $sql = "SELECT SUM(" . $kind . "_amount) AS total_amount FROM " .  $kind . "_tbl";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['total_amount'];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }

    public function set_inc($kind, $amount)
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


    public function get_total_expense()
    {
        $sql = "SELECT total_expense FROM expense_tbl";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(); //here give u all the values ? or just one if they are similar
        return $result['total_expense'];
    }
    public function get_total_income()
    {
        $sql = "SELECT total_income FROM income_tbl";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(); //here give u all the values ? or just one if they are similar
        return $result['total_income'];
    }

    public function set_income_balance($res)
    {
        $sql = "UPDATE  income_tbl SET income_balance = :income_balance";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':income_balance', $res);
        $stmt->execute();
    }

    public function get_spec_income($val)
    {
        $sql = "SELECT * FROM income_tbl WHERE id = '$val'";
        /*  
        return $result; */
        /* $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = */
        $result = $this->db->query($sql);
        return $result;
    }


    public function update_inc($income_id, $income_name, $income_amount)
    {
        try { // avoid using a generic variable and nest it within ' '
            $sql = "UPDATE income_tbl SET income_name = :income_name, income_amount = :income_amount WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $income_id);
            $stmt->bindParam(":income_name", $income_name);
            $stmt->bindParam(":income_amount", $income_amount);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
    public function delete_inc($id)
    {
        try {
            $sql = "DELETE FROM income_tbl WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
}
