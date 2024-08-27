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
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $category_name = $_POST['category_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

   for($i=0; $i<count($_POST["category_name"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `category`(`store_id`, `user_id`, `category_name`, `status`, `date`) VALUES ('$store_id','$user_id','$category_name[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:category_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:category_list.php");
  }


   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  
  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $category_name = $_POST['category_name'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

            for($k=0; $k<count($_POST["category_name"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `category` SET `store_id`='$store_id',`user_id`='$user_id',`category_name`='$category_name[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE `id`='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:category_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:category_list.php");
  }

    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM category WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:category_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}