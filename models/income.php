<?php

class income
{ //the error disapear when the object is instantiated
    private $db;
    public function __construct($sql)
    {
        $this->db = $sql;
    }

    public function insert_inc($income_name, $income_amount, $currency)
    {
        try {
            $sql = 'INSERT INTO income_tbl(income_name, income_amount, currency)
        VALUES(:income_name,:income_amount,:currency)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":income_name", $income_name);
            $stmt->bindParam(":income_amount", $income_amount);
            $stmt->bindParam(":currency", $currency);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }

    public function get_inc()
    {
        try {
            $sql = "SELECT SUM(income_name) AS total_amount FROM income_tbl";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['total_amount'];
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
        }
    }
}
