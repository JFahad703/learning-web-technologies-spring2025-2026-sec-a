<?php
require_once 'Database.php';
class Employer {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function adminLogin($username, $password) {
        $username = mysqli_real_escape_string($this->conn, $username);
        $sql = "SELECT * FROM admins WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])) return $row;
        }
        return false;
    }

    public function getAllEmployers() {
        return mysqli_query($this->conn, "SELECT * FROM employers");
    }

    public function addEmployer($data) {
        $employer_name = mysqli_real_escape_string($this->conn, $data['employer_name']);
        $company_name  = mysqli_real_escape_string($this->conn, $data['company_name']);
        $contact_no    = mysqli_real_escape_string($this->conn, $data['contact_no']);
        $username      = mysqli_real_escape_string($this->conn, $data['username']);
        $password      = password_hash($data['password'], PASSWORD_DEFAULT);

        $check = "SELECT * FROM employers WHERE username='$username'";
        if(mysqli_num_rows(mysqli_query($this->conn, $check)) > 0) return false;

        $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) 
                VALUES ('$employer_name', '$company_name', '$contact_no', '$username', '$password')";
        return mysqli_query($this->conn, $sql);
    }

    public function getEmployerById($id) {
        $sql = "SELECT * FROM employers WHERE id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function updateEmployer($data) {
        $id = $data['id'];
        $employer_name = mysqli_real_escape_string($this->conn, $data['employer_name']);
        $company_name  = mysqli_real_escape_string($this->conn, $data['company_name']);
        $contact_no    = mysqli_real_escape_string($this->conn, $data['contact_no']);
        $username      = mysqli_real_escape_string($this->conn, $data['username']);

        $check = "SELECT * FROM employers WHERE username='$username' AND id != $id";
        if(mysqli_num_rows(mysqli_query($this->conn, $check)) > 0) return false;

        if($data['password'] != "") {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE employers SET employer_name='$employer_name', company_name='$company_name', 
                    contact_no='$contact_no', username='$username', password='$password' WHERE id=$id";
        } else {
            $sql = "UPDATE employers SET employer_name='$employer_name', company_name='$company_name', 
                    contact_no='$contact_no', username='$username' WHERE id=$id";
        }
        return mysqli_query($this->conn, $sql);
    }

    public function deleteEmployer($id) {
        return mysqli_query($this->conn, "DELETE FROM employers WHERE id=$id");
    }

    public function searchEmployers($keyword) {
        $keyword = mysqli_real_escape_string($this->conn, $keyword);
        $sql = "SELECT * FROM employers WHERE employer_name LIKE '%$keyword%' 
                OR company_name LIKE '%$keyword%' OR username LIKE '%$keyword%'";
        $result = mysqli_query($this->conn, $sql);
        $employers = [];
        while($row = mysqli_fetch_assoc($result)) $employers[] = $row;
        return $employers;
    }
}
?>