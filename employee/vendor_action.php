<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  $data = $db->query("SELECT vendor_id FROM vendor_managment ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->vendor_id;
if(empty($recipt_name))
{
  $vendor_id = "VENDOR-00001";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $vendor_id = "VENDOR".'-0000'.$exe_value;
}



  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  
  $vendor_name = mysqli_real_escape_string($db, $_POST['vendor_name']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);	
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");


 $query = $db->query("SELECT * FROM vendor_managment WHERE vendor_id='$vendor_id'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:vendor_management_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `vendor_managment`(`store_id`, `user_id`, `vendor_id`, `vendor_name`, `mobile_number`, `whatsapp_number`, `email_id`, `country`, `state`, `city`, `address`, `pincode`, `remark`, `opening_blance`, `status`, `date`) VALUES ('$store_id','$user_id','$vendor_id','$vendor_name','$mobile_number','$whatsapp_number','$email_id','$country','$state','$city','$address','$pincode','$remark','$opening_blance','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:vendor_management_list.php");

  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  
  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  
  $vendor_name = mysqli_real_escape_string($db, $_POST['vendor_name']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);	
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");
  
     $db->query("UPDATE `vendor_managment` SET `store_id`='$store_id',`user_id`='$user_id',`vendor_name`='$vendor_name',`mobile_number`='$mobile_number',`whatsapp_number`='$whatsapp_number',`email_id`='$email_id',`country`='$country',`state`='$state',`city`='$city',`address`='$address',`pincode`='$pincode',`remark`='$remark',`opening_blance`='$opening_blance',`status`='$status',`date`='$post_date_time' WHERE `id`='$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:vendor_management_list.php");
  
    //photo upload end	
   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM vendor_managment WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:vendor_management_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
