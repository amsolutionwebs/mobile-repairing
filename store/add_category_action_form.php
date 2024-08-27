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
  $category_name = mysqli_real_escape_string($db, $_POST['category_name']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM category WHERE category_name='$category_name'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:category_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $final_query = $db->query("INSERT INTO `category`(`store_id`, `user_id`, `category_name`, `status`, `date`) VALUES ('$store_id','$user_id','$category_name','$status','$post_date_time')");
  

  if ($final_query) {
  	echo "success";
  	//photo upload ends
	
    $_SESSION['msg'] = md5('5');
    
  }else{
  	echo "failed";

  	$_SESSION['msg'] = md5('failed');
    
  }
    

  }
 

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}