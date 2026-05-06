<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: ../controller/LoginController.php"); exit; }
require_once '../model/Employer.php';
$id = $_GET['id'] ?? null;
$model = new Employer();
$model->deleteEmployer($id);
header("Location: ../view/dashboard.php");
exit;
?>