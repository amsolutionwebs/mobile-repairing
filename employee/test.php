<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   
  
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $jobs_title = mysqli_real_escape_string($db, $_POST['job_name']);
  $cat_id = mysqli_real_escape_string($db, $_POST['cat_id']);
  $number_of_vacancies = mysqli_real_escape_string($db, $_POST['number_of_vacancies']);
  $job_type = mysqli_real_escape_string($db, $_POST['job_type']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $locality = mysqli_real_escape_string($db, $_POST['locality']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
  $experience = mysqli_real_escape_string($db, $_POST['experience']);   
  $salary = mysqli_real_escape_string($db, $_POST['salary']);
  $skills = mysqli_real_escape_string($db, $_POST['skills']);
  $dedline = mysqli_real_escape_string($db, $_POST['dedline']);
  $contact_number_for_candidate = mysqli_real_escape_string($db, $_POST['contact_number_for_candidate']);
  $whatsapp_number_for_candidates = mysqli_real_escape_string($db, $_POST['whatsapp_number_for_candidates']);
  $interview_type = mysqli_real_escape_string($db, $_POST['interview_type']);
  $interview_address = mysqli_real_escape_string($db, $_POST['interview_address']);
  $job_description = mysqli_real_escape_string($db, $_POST['job_description']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM jobs WHERE jobs_title='$jobs_title'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:jobs_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `jobs`(`company_name`, `jobs_title`, `cat_id`, `number_of_vacancies`, `job_type`, `state`, `locality`, `gender`, `qualification`, `experience`, `salary`, `skills`, `dedline`, `contact_number_for_candidate`, `whatsapp_number_for_candidates`, `interview_type`, `interview_address`, `job_description`, `status`, `date`) VALUES ('$company_name','$jobs_title','$cat_id','$number_of_vacancies','$job_type','$state','$locality','$gender','$qualification','$experience','$salary','$skills','$dedline','$contact_number_for_candidate','$whatsapp_number_for_candidates','$interview_type','$interview_address','$job_description','$status','$post_date_time')");
  
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:jobs_list.php");

  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];
  
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $jobs_title = mysqli_real_escape_string($db, $_POST['job_name']);
  $cat_id = mysqli_real_escape_string($db, $_POST['cat_id']);
  $number_of_vacancies = mysqli_real_escape_string($db, $_POST['number_of_vacancies']);
  $job_type = mysqli_real_escape_string($db, $_POST['job_type']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $locality = mysqli_real_escape_string($db, $_POST['locality']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
  $experience = mysqli_real_escape_string($db, $_POST['experience']);   
  $salary = mysqli_real_escape_string($db, $_POST['salary']);
  $skills = mysqli_real_escape_string($db, $_POST['skills']);
  $dedline = mysqli_real_escape_string($db, $_POST['dedline']);
  $contact_number_for_candidate = mysqli_real_escape_string($db, $_POST['contact_number_for_candidate']);
  $whatsapp_number_for_candidates = mysqli_real_escape_string($db, $_POST['whatsapp_number_for_candidates']);
  $interview_type = mysqli_real_escape_string($db, $_POST['interview_type']);
  $interview_address = mysqli_real_escape_string($db, $_POST['interview_address']);
  $job_description = mysqli_real_escape_string($db, $_POST['job_description']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");
  
     $db->query("UPDATE `jobs` SET `company_name`='$company_name',`jobs_title`='$jobs_title',`cat_id`='$cat_id',`number_of_vacancies`='$number_of_vacancies',`job_type`='$job_type',`state`='$state',`locality`='$locality',`gender`='$gender',`qualification`='$qualification',`experience`='$experience',`salary`='$salary',`skills`='$skills',`dedline`='$dedline',`contact_number_for_candidate`='$contact_number_for_candidate',`whatsapp_number_for_candidates`='$whatsapp_number_for_candidates',`interview_type`='$interview_type',`interview_address`='$interview_address',`job_description`='$job_description',`status`='$status',`date`='$post_date_time' WHERE id='$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:jobs_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM jobs WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:jobs_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
