<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {

  case'update':
  $post_id = $_GET['post_id'];


  if ($_GET['status']=='Pending') {
  	$status = 'Complete';
  }

  if ($_GET['status']=='Complete') {
  	$status = 'Pending';
  }
  
 $data_get = $db->query("SELECT * FROM eng_task WHERE id='$post_id'");
$value = $data_get->fetch_object();
if ($value->warranty=='in_warranty_repair') {
  $db->query("UPDATE `eng_task` SET `work_status`='$status' WHERE id='$post_id'");
  $_SESSION['msg'] = md5('6');
  header("location:task_managment_list.php");
}else{

  if ($value->work_name=='Repair') {
  $repair_id = $_GET['work_id'];
  $db->query("UPDATE `repair_managment` SET `task`='$status' WHERE id='$repair_id'");
  $db->query("UPDATE `eng_task` SET `work_status`='$status' WHERE id='$post_id'");
   $_SESSION['msg'] = md5('6');
  header("location:task_managment_list.php");
}

if ($value->work_name=='Por_Repair') {
  $por_repair_id = $_GET['work_id'];
  $db->query("UPDATE `eng_task` SET `work_status`='$status' WHERE id='$post_id'");
 $db->query("UPDATE `eng_task` SET `work_status`='$status' WHERE id='$post_id'");
  $_SESSION['msg'] = md5('6');
  header("location:task_managment_list.php");
}


}





  
    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}