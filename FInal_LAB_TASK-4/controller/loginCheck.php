<?php
session_start();
require_once('../model/userModel.php');

if(isset($_POST['login'])){

    if(isset($_SESSION['user'])){

        if($_SESSION['user']['username'] == $_POST['username'] &&
           $_SESSION['user']['password'] == $_POST['password']){

            $_SESSION['status'] = true;

            if(isset($_POST['remember'])){
                setcookie("user", $_POST['username'], time()+3600);
            }

            header("Location: ../view/dashboard.php");
            exit();
        } else {
            echo "Invalid credentials!";
        }

    } else {
        echo "No registered user found!";
    }
}
?>