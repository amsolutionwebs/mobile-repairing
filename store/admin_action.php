<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  $employee_id = 'Emp-'.time();
  

  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $status = mysqli_real_escape_string($db, $_POST['status']);	
   $address = mysqli_real_escape_string($db, $_POST['address']);	
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM admin WHERE employee_id='$employee_id'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:admin_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `admin`(`employee_id`, `first_name`, `last_name`, `email_id`, `mobile_number`, `whatsapp_number`, `password`, `age`, `address`, `status`, `date`) VALUES ('$employee_id','$first_name','$last_name','$email_id','$mobile_number','$whatsapp_number','$password','$age','$address','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:admin_list.php");

  }
 
   
    
	break;
  case'update':




 $post_id = $_POST['post_id'];

  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
   $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  $age = mysqli_real_escape_string($db, $_POST['age']);

  $status = mysqli_real_escape_string($db, $_POST['status']); 
  $address = mysqli_real_escape_string($db, $_POST['address']);    
  $post_date_time = date("Y-m-d H:i:s");
  
     $db->query("UPDATE `admin` SET `first_name`='$first_name',`last_name`='$last_name',`email_id`='$email_id',`mobile_number`='$mobile_number',`whatsapp_number`='$whatsapp_number',`password`='$password',`age`='$age',`address`='$address',`status`='$status',`date`='$post_date_time' WHERE id = '$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:admin_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM admin WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:admin_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
