<?php

require_once 'config/config.php';
$action = $_POST['submit'];
if ($action === 'submit') {

$otp = $_POST['otp'];
$user_id = $_POST['user_id'];
$delete_id = $_POST['delete_id'];
$delete_type = $_POST['delete_type'];

$results = $db->query("SELECT * FROM `supar_admin` WHERE id='$user_id' AND otp='$otp'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {
		header("Location:admin_action.php?post=$delete_id&action=delete");
}else{
$_SESSION['msg'] = md5('wrong_otp');
 echo "<script>window.location='admin_list.php';</script>"; 
}

}else{
 echo "<script>window.location='admin_list.php';</script>"; 
}


?>