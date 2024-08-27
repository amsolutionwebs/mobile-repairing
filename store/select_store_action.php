<?php

include 'config/config.php';
if(isset($_GET['submit'])){
$action = $_GET['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
     
   
$store_id = mysqli_real_escape_string($db, $_GET['store_id']);
$query = $db->query("SELECT * FROM store WHERE id='$store_id'");
if($query->num_rows > 0){
$company_value = $query->fetch_object();
$_SESSION['store_id'] = $company_value->id;
 $_SESSION['msg'] = md5('login');
    header("location:dashboard.php");
}

break;
default:
 $_SESSION['msg'] = md5('11');
    header("location:index.php?msg=" . md5('11') . "");
}
