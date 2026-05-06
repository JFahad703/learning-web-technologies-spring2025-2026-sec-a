<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: ../controller/LoginController.php"); exit; }
require_once '../model/Employer.php';

$id = $_GET['id'] ?? null;
$model = new Employer();
$employer = $model->getEmployerById($id);

if(isset($_POST['update'])) {
    if($_POST['employer_name']=="" || $_POST['company_name']=="" || $_POST['contact_no']=="" || $_POST['username']=="") {
        $error = "All fields except password are required!";
    } else {
        $data = ['id'=>$id, 'employer_name'=>$_POST['employer_name'], 'company_name'=>$_POST['company_name'], 
                 'contact_no'=>$_POST['contact_no'], 'username'=>$_POST['username'], 'password'=>$_POST['password']];
        if($model->updateEmployer($data)) { header("Location: ../view/dashboard.php"); exit; }
        else { $error = "Update failed!"; }
    }
}
require_once '../view/update_employer.php';
?>