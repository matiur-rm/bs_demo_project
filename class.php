<?php

require 'config.php';

class db_class extends db_connect {

    public function __construct() {
        $this->connect();
    }

    public function create($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql) or die($this->conn->error);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
    }

}

?>