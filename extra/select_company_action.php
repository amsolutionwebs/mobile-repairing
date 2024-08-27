<?php

include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
     
   
$company_id = mysqli_real_escape_string($db, $_POST['company_id']);
$query = $db->query("SELECT * FROM company WHERE id='$company_id'");
if($query->num_rows > 0){
$company_value = $query->fetch_object();
$_SESSION['company_id'] = $company_value->id;
 $_SESSION['msg'] = md5('login');
    header("location:dashboard.php");
}

break;
default:
 $_SESSION['msg'] = md5('11');
    header("location:index.php?msg=" . md5('11') . "");
}
