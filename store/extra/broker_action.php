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
  $code_one = mysqli_real_escape_string($db, $_POST['code_one']);
  $name_one = mysqli_real_escape_string($db, $_POST['name_one']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']); 
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $contact_person = mysqli_real_escape_string($db, $_POST['contact_person']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $borker_type = mysqli_real_escape_string($db, $_POST['borker_type']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM broker WHERE `company_id`='$company_id' AND `name_one`='$name_one'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:broker_list.php");
  }else{
 
 $db->query("INSERT INTO `broker`(`company_id`,`code_one`, `name_one`, `main_address`, `city`, `state`, `pincode`, `country`, `contact_person`, `phone_off`, `phone_res`, `email`, `broker_type`, `commission`, `gst_number`, `status`, `date`) VALUES ('$company_id','$code_one','$name_one','$main_address','$city','$state','$pincode','$country','$contact_person','$phone_off','$phone_res','$email','$borker_type','$commission','$gst_number','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:broker_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
$company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $code_one = mysqli_real_escape_string($db, $_POST['code_one']);
  $name_one = mysqli_real_escape_string($db, $_POST['name_one']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']); 
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $contact_person = mysqli_real_escape_string($db, $_POST['contact_person']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $borker_type = mysqli_real_escape_string($db, $_POST['borker_type']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $status = mysqli_real_escape_string($db, $_POST['status']);     
  $post_date_time = date("Y-m-d H:i:s");

     $db->query("UPDATE `broker` SET `company_id`='$company_id',`code_one`='$code_one',`name_one`='$name_one',`main_address`='$main_address',`city`='$city',`state`='$state',`pincode`='$pincode',`country`='$country',`contact_person`='$contact_person',`phone_off`='$phone_off',`phone_res`='$phone_res',`email`='$email',`broker_type`='$borker_type',`commission`='$commission',`gst_number`='$gst_number',`status`='$status',`date`='$post_date_time' WHERE id = '$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:broker_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
 
	   $db->query("DELETE FROM broker WHERE  id = '$post_id'");
   
  
 $_SESSION['msg'] = md5('7');
header("location:broker_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
