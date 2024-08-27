<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':

$country = $_POST['country'];    
$name = $_POST['name'];


 $query = $db->query("SELECT * FROM states WHERE name='$name'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:add_state.php?msg=" . md5('p_error') . "");
  }else{
 
 $db->query("INSERT INTO `states`(`name`, `country_id`) VALUES ('$name','$country')");
  
 
	 
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:state_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
 $country = $_POST['country'];
  $name = mysqli_real_escape_string($db, $_POST['name']);

     $db->query("UPDATE `states` SET `name`='$name', `country_id`='$country'  WHERE id = '$post_id'");
	 
  $_SESSION['msg'] = md5('6');
    header("location:state_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
   $db->query("DELETE FROM states WHERE  id = '$post_id'");
  
 $_SESSION['msg'] = md5('7');
header("location:state_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
