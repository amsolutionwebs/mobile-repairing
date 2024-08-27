<?php
include 'config/config.php';
if(isset($_POST['update_social'])){
  
  $user_id = mysqli_real_escape_string($db,$_POST['user_id']); 
  $phone = mysqli_real_escape_string($db,$_POST['phone']);
  $email = mysqli_real_escape_string($db,$_POST['email']); 
  $whatsapp_number = mysqli_real_escape_string($db,$_POST['whatsapp_number']);
  $google_map = mysqli_real_escape_string($db,$_POST['google_map']); 
  $facebook = mysqli_real_escape_string($db,$_POST['facebook']);
  $youtube = mysqli_real_escape_string($db,$_POST['youtube']);
  $instagram = mysqli_real_escape_string($db,$_POST['instagram']); 
  $twitter = mysqli_real_escape_string($db,$_POST['twitter']);
  $linkdin = mysqli_real_escape_string($db,$_POST['linkdin']); 
  $status = "enable";
  $post_date_time = date("Y-m-d H:i:s");

   $query = $db->query("UPDATE `social_links` SET `user_id`='$user_id',`phone`='$phone',`email`='$email',`whatspp`='$whatsapp_number',`google_map`='$google_map',`facebook`='$facebook',`youtube`='$youtube',`instagram`='$instagram',`twitter`='$twitter',`linkdin`='$linkdin',`status`='$status',`date`='$post_date_time' WHERE id='1'");
  if($query){
	  $_SESSION['msg'] = md5('5');
	  header("Location: dashboard.php");
  }else{
    $_SESSION['msg'] = md5('p_error');
    header("location:dashboard.php");

  }

  }



?>