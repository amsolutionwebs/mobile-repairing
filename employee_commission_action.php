<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  $employee_id = $_POST['employee_id'];
  $commision = $_POST['commision'];

$query = $db->query("SELECT * FROM employee_commission WHERE employee_id='$employee_id'");
  if($query->num_rows > 0){
      
          $query23 = $db->query("UPDATE `employee_commission` SET `commission`='$commision' WHERE employee_id='$employee_id'");
    
  
  if ($query23) {
     $_SESSION['msg'] = md5('6');
    header("location:employee_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:employee_list.php");
  }
  
  }else{
      $query2 = $db->query("INSERT INTO `employee_commission`(`employee_id`, `commission`) VALUES ('$employee_id','$commision')");
    
  
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:employee_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:employee_list.php");
  }
  
  
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
  
     $db->query("DELETE FROM employee_commission WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:employee_commission_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}