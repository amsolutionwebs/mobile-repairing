<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  if(!empty($_POST["store_id"])){
        $employee_id = $_POST['employee_id'];
  $store_id = $_POST['store_id'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

    for($i=0; $i<count($_POST["store_id"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `employee_store`(`employee_id`, `store_id`, `status`, `date`) VALUES ('$employee_id','$store_id[$i]','$status[$i]','$post_date_time')");
    

  }
  }
  
  
  if(!empty($_POST["store_id_update"])){
      $post_id_update = $_POST['post_id_update'];
        $employee_id = $_POST['employee_id'];
  $store_id_update = $_POST['store_id_update'];
  $status_update = $_POST['status_update'];
  $post_date_time = date("Y-m-d H:i:s");

    for($k=0; $k<count($_POST["store_id_update"]); $k++)
  {
   
   $query3 = $db->query("UPDATE `employee_store` SET `employee_id`='$employee_id',`store_id`='$store_id_update[$k]',`status`='$status_update[$k]',`date`='$post_date_time' WHERE id='$post_id_update[$k]'");
    

  }
  }
  
 
  
  
  if ($query2 || $query3) {
     $_SESSION['msg'] = md5('5');
    header("location:employee_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:employee_list.php");
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
  
     $db->query("DELETE FROM employee_store WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:employee_store_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}