<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['employee_id']);
  $leads_no = mysqli_real_escape_string($db, $_POST['leads_no']);
  $leads_date = mysqli_real_escape_string($db, $_POST['leads_date']);
  $leads_type = mysqli_real_escape_string($db, $_POST['leads_type']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $imei_number = mysqli_real_escape_string($db, $_POST['imei_number']);
  $product_password = mysqli_real_escape_string($db, $_POST['product_password']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  
  $remark1 = mysqli_real_escape_string($db, $_POST['remark1']);
  $remark2 = mysqli_real_escape_string($db, $_POST['remark2']);
  $followup_date = mysqli_real_escape_string($db, $_POST['followup_date']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM leads_managment WHERE store_id='$store_id' AND leads_no='$leads_no'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:leads_management_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `leads_managment`(`store_id`, `employee_id`, `customer_id`, `leads_no`, `leads_date`, `leads_type`, `device_type`, `imei_number`, `product_password`, `address`, `remark1`, `remark2`, `followup_date`, `status`, `date`) VALUES ('$store_id','$user_id','$customer_id','$leads_no','$leads_date','$leads_type','$device_type','$imei_number','$product_password','$address','$remark1','$remark2','$followup_date','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:leads_management_list.php");

  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['employee_id']);
  $leads_type = mysqli_real_escape_string($db, $_POST['leads_type']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $imei_number = mysqli_real_escape_string($db, $_POST['imei_number']);
  $product_password = mysqli_real_escape_string($db, $_POST['product_password']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
 
  $remark1 = mysqli_real_escape_string($db, $_POST['remark1']);
  $remark2 = mysqli_real_escape_string($db, $_POST['remark2']);
  $followup_date = mysqli_real_escape_string($db, $_POST['followup_date']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("d-m-Y H:i:s");
  
   $update_query = $db->query("UPDATE `leads_managment` SET `customer_id`='$customer_id',`leads_type`='$leads_type',`device_type`='$device_type',`imei_number`='$imei_number',`product_password`='$product_password',`address`='$address',`remark1`='$remark1',`remark2`='$remark2',`followup_date`='$followup_date',`status`='$status',`date`='$post_date_time' WHERE `id`='$post_id'");
	
 if ($update_query) {
      
      if ($status==='Converted' && $leads_type==='Repair') {
       
         $db->query("INSERT INTO `repair_managment`(`store_id`, `user_id`, `customer_id`, `imei`, `password`,  `date`) VALUES ('$store_id','$user_id','$customer_id','$imei_number','$product_password','$post_date_time')");

         $db->query("INSERT INTO `eng_task`(`store_id`, `user_id`, `work_name`, `given_id`, `taker_id`, `work_status`, `date`) VALUES ('$store_id','$user_id','Repair','$user_id','1','Pending','$post_date_time')");

      }
      
      
       if ($status==='Converted' && $leads_type==='Purchase') {
       
         $db->query("INSERT INTO `purchase_managment`(`store_id`, `user_id`, `device_type`, `imei_number`, `product_password`, `customer_id`, `customer_remark`, `customer_address`, `date`, `status`) VALUES ('$store_id','$user_id','$device_type','$imei_number','$product_password','$customer_id','$remark1','$address','$post_date_time','enable')");

      }
      
      
       if ($status==='Converted' && $leads_type==='Sell') {
       
         $db->query("INSERT INTO `sales_managment`(`store_id`, `user_id`, `customer_id`,`device_type`, `imei_number`, `product_password`, `customer_remark`, `customer_address`, `status`, `date`) VALUES ('$store_id','$user_id','$customer_id','$device_type','$imei_number','$product_password','$remark1','$address','enable','$post_date_time')");

      }



 }else{
   $_SESSION['msg'] = md5('failed');
    header("location:leads_management_list.php");
 }

  $_SESSION['msg'] = md5('6');
    header("location:leads_management_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM leads_managment WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:leads_management_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
