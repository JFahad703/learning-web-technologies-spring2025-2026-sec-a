<?php
session_start();
if(!isset($_SESSION['admin'])) { echo json_encode([]); exit; }
require_once '../model/Employer.php';
$keyword = $_POST['keyword'] ?? '';
$model = new Employer();
echo json_encode($model->searchEmployers($keyword));
?>