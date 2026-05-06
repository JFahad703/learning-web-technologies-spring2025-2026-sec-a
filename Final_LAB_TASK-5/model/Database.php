<?php
class Database {
    private $conn;
    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "job_portal";
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}
?>