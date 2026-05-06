<?php
session_start();
require_once '../model/Employer.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == "") {
        $error = "All fields are required!";
    } else {
        $model = new Employer();
        $admin = $model->adminLogin($username, $password);
        if($admin) {
            $_SESSION['admin'] = $username;
            header("Location: ../view/dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    }
}
require_once '../view/login.php';
?>