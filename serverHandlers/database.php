<?php
class DBConnection {
    private $conn;

    function __construct() {
        $config = require("config.php");

        $this->conn = new mysqli($config["host"], $config["username"], $config["password"], $config["database"], $config["port"]);
        if ($this->conn->connect_error) {
            die("DBConn: " . $this->conn->connect_error);
        }
    }

    function __destruct() {
        @$this->conn->close();
    }

    function query($sql) {
        return $this->conn->query($sql);
    }

    function prepare($sqlprep) {
        $result = $this->conn->prepare($sqlprep);
        if(!$result)
            die("DBPrep: " . $this->conn->error);
        return $result;
    }

    function getInsertID() {
        return $this->conn->insert_id;
    }

    function getError() {
        $error = $this->conn->error;
        $connerror = $this->conn->connect_error;

        if($error){
            return $error;
        }
        else{
            return $connerror;
        }
    }

    function getAffectedRows() {
        return $this->conn->affected_rows;
    }
}
?>
































