<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {

  case 'delete':
   $post_id = $_GET['post'];
   $db->query("DELETE FROM `contact_us` WHERE  id = '$post_id'");
   
$_SESSION['msg'] = md5('7');
header("location:contact_list.php");

  break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}

?>