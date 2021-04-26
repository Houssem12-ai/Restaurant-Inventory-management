<?php

class both
{
    private $db;
    public function __construct($sql)
    {
        $this->db = $sql;
    }

    public function get_all($sub)
    {
        $sql = "SELECT * FROM " . $sub . "_tbl";
        $result = $this->db->query($sql);
        $res = $result->fetch_row();
        return $res;
    }
}
