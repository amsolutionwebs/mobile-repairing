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
 
	   $db->query("DELETE FROM indent WHERE id='$post_id'");
      $db->query("DELETE FROM indent_plus WHERE indent_id='$post_id'");

   
  
 $_SESSION['msg'] = md5('7');
header("location:indent_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}

?>