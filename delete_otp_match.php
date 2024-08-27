<?php
require_once 'config/config.php';
$action = $_POST['submit'];
if ($action === 'submit') {

$otp = $_POST['otp'];
$user_id = $_POST['user_id'];
$delete_id = $_POST['delete_id'];
$delete_type = $_POST['delete_type'];

$results = $db->query("SELECT * FROM `admin` WHERE id='$user_id' AND otp='$otp'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

	if($delete_type=='store_delete'){
		header("Location:store_action.php?post=$delete_id&action=delete");
	}

	// delete user type
	if($delete_type=='user_type_delete'){
		header("Location:user_type_action.php?post=$delete_id&action=delete");
	}

	// delete employee
	if($delete_type=='employee_delete'){
		header("Location:employee_action.php?post=$delete_id&action=delete");
	}

	

}else{
$_SESSION['msg'] = md5('wrong_otp');
 echo "<script>window.location='dashboard.php';</script>"; 
}

}else{
 echo "<script>window.location='dashboard.php';</script>"; 
}


?>