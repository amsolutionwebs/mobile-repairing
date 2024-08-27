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
  $variation_name = $_POST['variation_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

   for($i=0; $i<count($_POST["variation_name"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `variation`(`store_id`, `user_id`, `variation_name`, `status`, `date`) VALUES ('$store_id','$user_id','$variation_name[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:variation_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:variation_list.php");
  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  
   $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $variation_name = $_POST['variation_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
    
    for($k=0; $k<count($_POST["variation_name"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `variation` SET `store_id`='$store_id',`user_id`='$user_id',`variation_name`='$variation_name[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE `id`='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:variation_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:variation_list.php");
  }	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM variation WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:variation_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}