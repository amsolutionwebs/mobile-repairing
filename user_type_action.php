<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  
  $user_type = $_POST['user_type'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

    for($i=0; $i<count($_POST["user_type"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `user_type`(`user_type`, `status`, `date`) VALUES ('$user_type[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:user_type_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:user_type_list.php");
  }
 
   
    
  break;
  case'update':




  $post_id = $_POST['post_id'];
  $user_type = $_POST['user_type'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
  
          for($k=0; $k<count($_POST["user_type"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `user_type` SET `user_type`='$user_type[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE `id`='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:user_type_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:user_type_list.php");
  }
  

   

  
    //photo upload end  

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
     $db->query("DELETE FROM user_type WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:user_type_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}