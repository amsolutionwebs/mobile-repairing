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
   $master_mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
    $master_mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
     $mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
      $mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  $sort_no = mysqli_real_escape_string($db, $_POST['sort_no']);
  $sort_description = mysqli_real_escape_string($db, $_POST['sort_description']);
  $products_type = mysqli_real_escape_string($db, $_POST['products_type']);
  $width_per_inch = mysqli_real_escape_string($db, $_POST['width_per_inch']);
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM sort WHERE `company_id`='$company_id' AND sort_no='$sort_no'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
    echo "no";
  }else{


 $query_sort = $db->query("INSERT INTO `sort`(`company_id`,`master_mill_code`, `master_mill_name`, `mill_code`, `mill_name`, `sort_no`, `sort_description`, `products_type`,`width_per_inch`,`remark`, `status`, `date`) VALUES ('$company_id','$master_mill_code','$master_mill_name','$mill_code','$mill_name','$sort_no','$sort_description','$products_type','$width_per_inch','$remark','$status','$post_date_time')");
  
	
    if ($query_sort) {
      $_SESSION['msg'] = md5('5');
      echo "yes";
   }else{
      echo "no";
   }
   

  }
 
   
    
	
  
    //photo upload end	

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:add_indent.php?msg=" . md5('11') . "");
}
