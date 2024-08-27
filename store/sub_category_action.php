<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $category_id = $_POST['category_id'];
  $sub_category_name = $_POST['sub_category_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

    for($i=0; $i<count($_POST["category_id"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `sub_category`(`store_id`, `user_id`, `category_id`, `sub_category_name`, `status`, `date`) VALUES ('$store_id','$user_id','$category_id[$i]','$sub_category_name[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:sub_category_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:sub_category_list.php");
  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $category_id = $_POST['category_id'];
  $sub_category_name = $_POST['sub_category_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
  
          for($k=0; $k<count($_POST["category_id"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `sub_category` SET `store_id`='$store_id',`user_id`='$user_id',`category_id`='$category_id[$k]',`sub_category_name`='$sub_category_name[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE `id`='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:sub_category_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:sub_category_list.php");
  }
  

	 

  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM sub_category WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:sub_category_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}