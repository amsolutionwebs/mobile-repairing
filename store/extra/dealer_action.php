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
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $broker_name = mysqli_real_escape_string($db, $_POST['broker_name']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $contact_person = mysqli_real_escape_string($db, $_POST['contact_person']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $dealer_class = mysqli_real_escape_string($db, $_POST['dealer_class']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM dealer WHERE dealer_name='$dealer_name' AND `company_id`='$company_id'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:dealer_list.php");
  }else{
 
 $db->query("INSERT INTO `dealer`(`company_id`,`broker_code`, `broker_name`, `dealer_code`, `dealer_name`, `main_address`, `alternate_address`, `city`, `state`, `pincode`, `country`, `contact_person`, `phone_off`, `phone_res`, `email`, `commission`, `gst_number`, `dealer_class`, `status`, `date`) VALUES ('$company_id','$broker_code','$broker_name','$dealer_code','$dealer_name','$main_address','$alternate_address','$city','$state','$pincode','$country','$contact_person','$phone_off','$phone_res','$email','$commission','$gst_number','$dealer_class','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:dealer_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $broker_name = mysqli_real_escape_string($db, $_POST['broker_name']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $contact_person = mysqli_real_escape_string($db, $_POST['contact_person']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $dealer_class = mysqli_real_escape_string($db, $_POST['dealer_class']);
  $post_status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

     $db->query("UPDATE `dealer` SET `company_id`='$company_id',`broker_code`='$broker_code',`broker_name`='$broker_name',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`main_address`='$main_address',`alternate_address`='$alternate_address',`city`='$city',`state`='$state',`pincode`='$pincode',`country`='$country',`contact_person`='$contact_person',`phone_off`='$phone_off',`phone_res`='$phone_res',`email`='$email',`commission`='$commission',`gst_number`='$gst_number',`dealer_class`='$dealer_class',`status`='$post_status',`date`='$post_date_time' WHERE id='$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:dealer_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
 
	   $db->query("DELETE FROM dealer WHERE  id = '$post_id'");
   
  
 $_SESSION['msg'] = md5('7');
header("location:dealer_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
