<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  
  if(!empty($_POST["module_id"])){
  $employee_id = $_POST['employee_id'];
  $module_id = $_POST['module_id'];
  $add = $_POST['add'];
  $view = $_POST['view'];
  $edit = $_POST['edit'];
  $delete = $_POST['delete'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

    for($i=0; $i<count($_POST["module_id"]); $i++)
  {
   
   $query2 = $db->query("INSERT INTO `user_module`(`employee_id`, `module_id`, `add`, `view`, `edit`, `delete_module`, `status`, `date`) VALUES ('$employee_id','$module_id[$i]','$add[$i]','$view[$i]','$edit[$i]','$delete[$i]','$status[$i]','$post_date_time')");
    
  }
  }
  
    if(!empty($_POST["module_id_update"])){
 $post_id_update = $_POST['post_id_update'];
  
  $module_id_update = $_POST['module_id_update'];
  $add_update = $_POST['add_update'];
  $view_update = $_POST['view_update'];
  $edit_update = $_POST['edit_update'];
  $delete_update = $_POST['delete_update'];
  $status_update = $_POST['status_update'];
  $post_date_time = date("Y-m-d H:i:s");

    for($n=0; $n<count($_POST["module_id_update"]); $n++)
  {
   
 
   $query3 = $db->query("UPDATE `user_module` SET `module_id`='$module_id_update[$n]',`add`='$add_update[$n]',`view`='$view_update[$n]',`edit`='$edit_update[$n]',`delete_module`='$delete_update[$n]',`status`='$status_update[$n]',`date`='$post_date_time' WHERE id='$post_id_update[$n]'");
    
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
  
     $db->query("DELETE FROM user_module WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:user_module_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}