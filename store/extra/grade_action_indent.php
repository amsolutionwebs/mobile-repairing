<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
     
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $grade = mysqli_real_escape_string($db, $_POST['grade']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM grade WHERE grade='$grade'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	 echo "no";
  }else{
 
 
 $query_grade =$db->query("INSERT INTO `grade`(`company_id`, `grade`, `description`,`date`) VALUES ('$company_id','$grade','$description','$post_date_time')");
  
    //photo upload ends
	if ($query_grade) {
      $_SESSION['msg'] = md5('5');
      echo "yes";
   }else{
      echo "no";
   }
    


  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
   $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $grade = mysqli_real_escape_string($db, $_POST['grade']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $post_date_time = date("Y-m-d H:i:s");

     $db->query("UPDATE `grade` SET `company_id`='$company_id',`grade`='$grade',`description`='$description',`date`='$post_date_time' WHERE id='$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:grade_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
 
	   $db->query("DELETE FROM grade WHERE  id='$post_id'");
   
  
 $_SESSION['msg'] = md5('7');
header("location:grade_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
