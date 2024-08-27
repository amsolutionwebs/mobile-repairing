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
  $brand_id = $_POST['brand_id'];
  $model_number = $_POST['model_number'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
    
    for($i=0; $i<count($_POST["brand_id"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `model_number`(`store_id`, `user_id`, `brand_id`, `model_number`, `status`, `date`) VALUES ('$store_id','$user_id','$brand_id[$i]','$model_number[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:model_no_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:model_no_list.php");
  }
  
	break;
  case'update':




  $post_id = $_POST['post_id'];

  
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $brand_id = $_POST['brand_id'];
  $model_number = $_POST['model_number'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
  
     for($k=0; $k<count($_POST["brand_id"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `model_number` SET `store_id`='$store_id',`user_id`='$user_id',`brand_id`='$brand_id[$k]',`model_number`='$model_number[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE `id`='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:model_no_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:model_no_list.php");
  }
  

    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM model_number WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:model_no_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}