<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  $store_name = mysqli_real_escape_string($db, $_POST['store_name']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  
     $data = $db->query("SELECT branch_id FROM store ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->branch_id;
if(empty($recipt_name))
{
  $branch_id = $pincode."-01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $branch_id = $pincode.'-0'.$exe_value;
}

  $address = mysqli_real_escape_string($db, $_POST['address']);
  $financial_year = mysqli_real_escape_string($db, $_POST['financial_year']);

  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $gst = mysqli_real_escape_string($db, $_POST['gst']);
  $status = mysqli_real_escape_string($db, $_POST['status']);	
  $post_date_time = date("Y-m-d H:i:s");


 $query = $db->query("SELECT * FROM store WHERE store_name='$store_name'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:store_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `store`(`store_name`, `country`, `state`, `city`, `pincode`, `address`, `financial_year`, `mobile_number`, `email_id`, `gst`, `branch_id`, `status`, `date`) VALUES ('$store_name','$country','$state','$city','$pincode','$address','$financial_year','$mobile_number','$email_id','$gst','$branch_id','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:store_list.php");

  }
 
   
    
	break;
  case'update':




 $post_id = $_POST['post_id'];

  $store_name = mysqli_real_escape_string($db, $_POST['store_name']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $financial_year = mysqli_real_escape_string($db, $_POST['financial_year']);

  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $gst = mysqli_real_escape_string($db, $_POST['gst']);
  $status = mysqli_real_escape_string($db, $_POST['status']);	
  $post_date_time = date("Y-m-d H:i:s");
  
     $db->query("UPDATE `store` SET `store_name`='$store_name',`country`='$country',`state`='$state',`city`='$city',`pincode`='$pincode',`address`='$address',`financial_year`='$financial_year',`mobile_number`='$mobile_number',`email_id`='$email_id',`gst`='$gst',`status`='$status',`date`='$post_date_time' WHERE id = '$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:store_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM store WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:store_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
