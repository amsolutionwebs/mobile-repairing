<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$id = mysqli_real_escape_string($db, $_POST['id']);

$query = $db->query("UPDATE `leads_managment` SET `status`='$value' WHERE id='$id'");
  if($query){

$query_leads= $db->query("SELECT * FROM leads_managment WHERE id='$id'");
$value_leads = $query_leads->fetch_object();
$store_id = $value_leads->store_id;
$user_id = $value_leads->employee_id;
$customer_id = $value_leads->customer_id;
$leads_type = $value_leads->leads_type;
$device_type = $value_leads->device_type;
$imei_number = $value_leads->imei_number;
$product_password = $value_leads->product_password;
$status = $value_leads->status;

if ($status==='Converted' && $leads_type==='Repair') {
       
  $query_insert = $db->query("INSERT INTO `repair_managment`(`store_id`, `user_id`, `customer_id`, `imei`, `password`,  `date`) VALUES ('$store_id','$user_id','$customer_id','$imei_number','$product_password','$post_date_time')");

         $db->query("INSERT INTO `eng_task`(`store_id`, `user_id`, `work_name`, `given_id`, `taker_id`, `work_status`, `date`) VALUES ('$store_id','$user_id','Repair','$user_id','1','Pending','$post_date_time')");
}
      
if ($status==='Converted' && $leads_type==='Purchase') {
       
    $query_insert =  $db->query("INSERT INTO `purchase_managment`(`store_id`, `user_id`, `device_type`, `imei_number`, `product_password`, `customer_id`, `customer_remark`, `customer_address`, `date`, `status`) VALUES ('$store_id','$user_id','$device_type','$imei_number','$product_password','$customer_id','$remark1','$address','$post_date_time','enable')");
}
      
if ($status==='Converted' && $leads_type==='Sell') {
       
    $query_insert = $db->query("INSERT INTO `sales_managment`(`store_id`, `user_id`, `customer_id`,`device_type`, `imei_number`, `product_password`, `customer_remark`, `customer_address`, `status`, `date`) VALUES ('$store_id','$user_id','$customer_id','$device_type','$imei_number','$product_password','$remark1','$address','enable','$post_date_time')");
}


if ($query_insert) {
  $_SESSION['msg'] = md5('6');
    echo "success";
}else{
  $_SESSION['msg'] = md5('failed');
    echo "failed";
}
	  
  }else{
    $_SESSION['msg'] = md5('failed');
  	echo "failed";
  }


?>