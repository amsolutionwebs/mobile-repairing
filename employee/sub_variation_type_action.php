<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $variation_id = $_POST['variation_id'];
  $sub_variation_name = $_POST['sub_variation_name'];
  $sub_variation_type = $_POST['sub_variation_type'];
  $status = $_POST['status'];
  

    for($i=0; $i<count($_POST["variation_id"]); $i++)
  {
      
      $check_query = $db->query("SELECT * FROM `sub_variation_type` WHERE `store_id`='$store_id' AND `variation`='$variation_id[$i]' AND `sub_variation`='$sub_variation_name[$i]' AND `sub_variation_type`='$sub_variation_type[$i]'");
    if ($check_query->num_rows > 0) {
        $_SESSION['msg'] = md5('p_error');
    header("location:sub_variation_list.php");
    }else{
        
   $query2 = $db->query("INSERT INTO `sub_variation_type`(`store_id`, `user_id`, `variation`, `sub_variation`, `sub_variation_type`, `status`) VALUES ('$store_id','$user_id','$variation_id[$i]','$sub_variation_name[$i]','$sub_variation_type[$i]','$status[$i]')");
    }
    
    
    
   

   
  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:sub_variation_type_list.php");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:sub_variation_type_list.php");
  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $variation_id = $_POST['variation_id'];
  $sub_variation_name = $_POST['sub_variation_name'];
  $sub_variation_type = $_POST['sub_variation_type'];
  $status = $_POST['status'];

  
          for($k=0; $k<count($_POST["variation_id"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `sub_variation_type` SET `store_id`='$store_id',`user_id`='$user_id',`variation`='$variation_id[$k]',`sub_variation`='$sub_variation_name[$k]',`sub_variation_type`='$sub_variation_type[$k]',`status`='$status[$k]' WHERE id='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:sub_variation_type_list.php");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:sub_variation_type_list.php");
  }
  

	 

  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM sub_variation_type WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:sub_variation_type_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}