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
  $master_mill_code = mysqli_real_escape_string($db, $_POST['master_mill_code']);
  $master_mill_name = mysqli_real_escape_string($db, $_POST['master_mill_name']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
   $bank_name = mysqli_real_escape_string($db, $_POST['bank_name']);
    $ifsc_code = mysqli_real_escape_string($db, $_POST['ifsc_code']);
  $bank_account_number = mysqli_real_escape_string($db, $_POST['bank_account_number']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $credit_days = mysqli_real_escape_string($db, $_POST['credit_days']);
  $rate_of_interest = mysqli_real_escape_string($db, $_POST['rate_of_interest']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);

  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM submill WHERE `mill_code`='$mill_code'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:sub_mill_list.php");
  }else{
 
 $db->query("INSERT INTO `submill`(`company_id`,`master_mill_code`, `master_mill_name`, `mill_code`, `mill_name`, `main_address`, `alternate_address`, `city`, `state`, `pincode`, `phone_off`, `phone_res`, `email`, `bank_name`, `ifsc_code`, `bank_account_number`, `opening_blance`, `commission`, `credit_days`, `rate_of_interest`, `gst_number`, `status`, `date`) VALUES ('$company_id','$master_mill_code','$master_mill_name','$mill_code','$mill_name','$main_address','$alternate_address','$city','$state','$pincode','$phone_off','$phone_res','$email','$bank_name','$ifsc_code','$bank_account_number','$opening_blance','$commission','$credit_days','$rate_of_interest','$gst_number','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:sub_mill_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
$company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $master_mill_code = mysqli_real_escape_string($db, $_POST['master_mill_code']);
  $master_mill_name = mysqli_real_escape_string($db, $_POST['master_mill_name']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
   $bank_name = mysqli_real_escape_string($db, $_POST['bank_name']);
    $ifsc_code = mysqli_real_escape_string($db, $_POST['ifsc_code']);
  $bank_account_number = mysqli_real_escape_string($db, $_POST['bank_account_number']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $credit_days = mysqli_real_escape_string($db, $_POST['credit_days']);
  $rate_of_interest = mysqli_real_escape_string($db, $_POST['rate_of_interest']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);

  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

   
    
     $db->query("UPDATE `submill` SET `company_id`='$company_id',`master_mill_code`='$master_mill_code',`master_mill_name`='$master_mill_name',`mill_code`='$mill_code',`mill_name`='$mill_name',`main_address`='$main_address',`alternate_address`='$alternate_address',`city`='$city',`state`='$state',`pincode`='$pincode',`phone_off`='$phone_off',`phone_res`='$phone_res',`email`='$email',`bank_name`='$bank_name',`ifsc_code`='$ifsc_code',`bank_account_number`='$bank_account_number',`opening_blance`='$opening_blance',`commission`='$commission',`credit_days`='$credit_days',`rate_of_interest`='$rate_of_interest',`gst_number`='$gst_number',`status`='$status',`date`='$post_date_time' WHERE id='$post_id'");
	 
    
  $_SESSION['msg'] = md5('6');
    header("location:sub_mill_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
 
	   $db->query("DELETE FROM submill WHERE  id='$post_id'");
   
  
 $_SESSION['msg'] = md5('7');
header("location:sub_mill_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
