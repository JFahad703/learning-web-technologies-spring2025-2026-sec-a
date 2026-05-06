<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: ../controller/LoginController.php"); exit; }
require_once '../model/Employer.php';

if(isset($_POST['register'])) {
    $model = new Employer();
    if($_POST['employer_name']=="" || $_POST['company_name']=="" || $_POST['contact_no']=="" || $_POST['username']=="" || $_POST['password']=="") {
        $error = "All fields are required!";
    } else {
        $data = ['employer_name'=>$_POST['employer_name'], 'company_name'=>$_POST['company_name'], 
                 'contact_no'=>$_POST['contact_no'], 'username'=>$_POST['username'], 'password'=>$_POST['password']];
        if($model->addEmployer($data)) { header("Location: ../view/dashboard.php"); exit; }
        else { $error = "Username already exists!"; }
    }
}
require_once '../view/add_employer.php';
?>