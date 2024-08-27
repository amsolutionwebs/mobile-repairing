<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
   

$data = $db->query("SELECT employee_id FROM employee ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->employee_id;
if(empty($recipt_name))
{
  $employee_id = "EMP0000"."-01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $employee_id = "EMP0000".'-0'.$exe_value;
}
  
  $date_of_joining = mysqli_real_escape_string($db, $_POST['date_of_joining']);
  $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
  $adhar_number = mysqli_real_escape_string($db, $_POST['adhar_number']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $alternate_mobile_number = mysqli_real_escape_string($db, $_POST['alternate_mobile_number']);
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $address = mysqli_real_escape_string($db, $_POST['address']);	
  $status = mysqli_real_escape_string($db, $_POST['status']);	
   
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM employee WHERE employee_id='$employee_id'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:employee_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $db->query("INSERT INTO `employee`(`employee_id`, `date_of_joining`, `usertype`, `first_name`, `last_name`, `date_of_birth`, `adhar_number`, `email_id`, `mobile_number`, `alternate_mobile_number`, `whatsapp_number`, `country`, `state`, `city`, `pincode`, `password`, `age`, `address`, `status`,`date`) VALUES ('$employee_id','$date_of_joining','$usertype','$first_name','$last_name','$date_of_birth','$adhar_number','$email_id','$mobile_number','$alternate_mobile_number','$whatsapp_number','$country','$state','$city','$pincode','$mobile_number','$age','$address','$status','$post_date_time')");
  
    //photo upload ends
   $lid = $db->insert_id;
    $photo = $_FILES['profile_picture'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["profile_picture"]["size"] > 0) {
      $photo = $_FILES['profile_picture']['name'];
      $random_digit = rand(000000, 999999) . time();
      $new_post_image = $random_digit . $photo;
   
      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
      $temp = explode(".", $_FILES["profile_picture"]["name"]);
      $extension = end($temp);
      if ((($_FILES["profile_picture"]["type"] == "image/gif") || ($_FILES["profile_picture"]["type"] == "image/jpeg") || ($_FILES["profile_picture"]["type"] == "image/jpg") || ($_FILES["profile_picture"]["type"] == "image/JPEG") || ($_FILES["profile_picture"]["type"] == "image/JPG") || ($_FILES["profile_picture"]["type"] == "image/pjpeg") || ($_FILES["profile_picture"]["type"] == "image/x-png") || ($_FILES["profile_picture"]["type"] == "image/png") || ($_FILES["profile_picture"]["type"] == "image/webp") || ($_FILES["profile_picture"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["profile_picture"]["error"] > 0) {
          echo "Return Code: " . $_FILES["profile_picture"]["error"] . "<br>";
        } else {
          
          $p_temp = $_FILES['profile_picture']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_post_image);
          $imgfile = "employee/upload/profile_images/" . $new_photo;
          move_uploaded_file($p_temp,$imgfile) ;
          
          

          $db->query("UPDATE employee SET `profile_picture` = '$new_photo' WHERE id='$lid'");
        }
      }
    }
		
		// adhar card

	
    $photo = $_FILES['adhar_card'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["adhar_card"]["size"] > 0) {
      $photo = $_FILES['adhar_card']['name'];
      $random_digit = rand(000000, 999999) . time();
      $new_post_image = $random_digit . $photo;
   
      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
      $temp = explode(".", $_FILES["adhar_card"]["name"]);
      $extension = end($temp);
      if ((($_FILES["adhar_card"]["type"] == "image/gif") || ($_FILES["adhar_card"]["type"] == "image/jpeg") || ($_FILES["adhar_card"]["type"] == "image/jpg") || ($_FILES["adhar_card"]["type"] == "image/JPEG") || ($_FILES["adhar_card"]["type"] == "image/JPG") || ($_FILES["adhar_card"]["type"] == "image/pjpeg") || ($_FILES["adhar_card"]["type"] == "image/x-png") || ($_FILES["adhar_card"]["type"] == "image/png") || ($_FILES["adhar_card"]["type"] == "image/webp") || ($_FILES["adhar_card"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["adhar_card"]["error"] > 0) {
          echo "Return Code: " . $_FILES["adhar_card"]["error"] . "<br>";
        } else {
          
          $p_temp = $_FILES['adhar_card']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_post_image);
          $imgfile = "employee/upload/adhar_card/" . $new_photo;
          move_uploaded_file($p_temp,$imgfile) ;
          
          

          $db->query("UPDATE employee SET `adhar_card` = '$new_photo' WHERE id='$lid'");
        }
      }
    }

    $_SESSION['msg'] = md5('5');
    header("location:employee_list.php");

  }
 
   
    
	break;
  case'update':




 $post_id = $_POST['post_id'];
 
  $date_of_joining = mysqli_real_escape_string($db, $_POST['date_of_joining']);
  $usertype = mysqli_real_escape_string($db, $_POST['usertype']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
  $adhar_number = mysqli_real_escape_string($db, $_POST['adhar_number']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $alternate_mobile_number = mysqli_real_escape_string($db, $_POST['alternate_mobile_number']);
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $address = mysqli_real_escape_string($db, $_POST['address']);	
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");
  
     $db->query("UPDATE `employee` SET `date_of_joining`='$date_of_joining',`usertype`='$usertype',`first_name`='$first_name',`last_name`='$last_name',`date_of_birth`='$date_of_birth',`adhar_number`='$adhar_number',`email_id`='$email_id',`mobile_number`='$mobile_number',`alternate_mobile_number`='$alternate_mobile_number',`whatsapp_number`='$whatsapp_number',`country`='$country',`state`='$state',`city`='$city',`pincode`='$pincode',`password`='$mobile_number',`age`='$age',`address`='$address', `status`='$status',`date`='$post_date_time' WHERE id = '$post_id'");
	 

	 $photo = $_FILES['profile_picture'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["profile_picture"]["size"] > 0) {
      $photo = $_FILES['profile_picture']['name'];
      $random_digit = rand(000000, 999999) . time();
      $new_post_image = $random_digit . $photo;
   
      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
      $temp = explode(".", $_FILES["profile_picture"]["name"]);
      $extension = end($temp);
      if ((($_FILES["profile_picture"]["type"] == "image/gif") || ($_FILES["profile_picture"]["type"] == "image/jpeg") || ($_FILES["profile_picture"]["type"] == "image/jpg") || ($_FILES["profile_picture"]["type"] == "image/JPEG") || ($_FILES["profile_picture"]["type"] == "image/JPG") || ($_FILES["profile_picture"]["type"] == "image/pjpeg") || ($_FILES["profile_picture"]["type"] == "image/x-png") || ($_FILES["profile_picture"]["type"] == "image/png") || ($_FILES["profile_picture"]["type"] == "image/webp") || ($_FILES["profile_picture"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["profile_picture"]["error"] > 0) {
          echo "Return Code: " . $_FILES["profile_picture"]["error"] . "<br>";
        } else {
          
          $p_temp = $_FILES['profile_picture']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_post_image);
          $imgfile = "employee/upload/profile_images/" . $new_photo;
          move_uploaded_file($p_temp,$imgfile) ;
          
          $data = $db->query("SELECT profile_picture FROM employee WHERE id = '$post_id'");
        $value3 = $data->fetch_object();
		if(empty($value3->profile_picture)){
			$db->query("UPDATE employee SET profile_picture = '$new_photo' WHERE id = '$post_id'");	
		}else{
			unlink('employee/upload/profile_images/'.$value3->profile_picture); // remove files	
        $db->query("UPDATE employee SET profile_picture = '$new_photo' WHERE id = '$post_id'");
		}

          
        }
      }
    }
		
		// adhar card

	
    $photo = $_FILES['adhar_card'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["adhar_card"]["size"] > 0) {
      $photo = $_FILES['adhar_card']['name'];
      $random_digit = rand(000000, 999999) . time();
      $new_post_image = $random_digit . $photo;
   
      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
      $temp = explode(".", $_FILES["adhar_card"]["name"]);
      $extension = end($temp);
      if ((($_FILES["adhar_card"]["type"] == "image/gif") || ($_FILES["adhar_card"]["type"] == "image/jpeg") || ($_FILES["adhar_card"]["type"] == "image/jpg") || ($_FILES["adhar_card"]["type"] == "image/JPEG") || ($_FILES["adhar_card"]["type"] == "image/JPG") || ($_FILES["adhar_card"]["type"] == "image/pjpeg") || ($_FILES["adhar_card"]["type"] == "image/x-png") || ($_FILES["adhar_card"]["type"] == "image/png") || ($_FILES["adhar_card"]["type"] == "image/webp") || ($_FILES["adhar_card"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["adhar_card"]["error"] > 0) {
          echo "Return Code: " . $_FILES["adhar_card"]["error"] . "<br>";
        } else {
          
          $p_temp = $_FILES['adhar_card']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_post_image);
          $imgfile = "employee/upload/adhar_card/" . $new_photo;
          move_uploaded_file($p_temp,$imgfile) ;
          

           $data1 = $db->query("SELECT adhar_card FROM employee WHERE id = '$post_id'");
        $value31 = $data1->fetch_object();
		if(empty($value31->adhar_card)){
			$db->query("UPDATE employee SET adhar_card = '$new_photo' WHERE id = '$post_id'");	
		}else{
			unlink('employee/upload/adhar_card/'.$value31->adhar_card); // remove files	
        $db->query("UPDATE employee SET adhar_card = '$new_photo' WHERE id = '$post_id'");
		}
        }
      }
    }

  $_SESSION['msg'] = md5('6');
    header("location:employee_list.php");
  
    //photo upload end	

   break;
  case 'delete':

  	$post_id = $_GET['post'];
    $data = $db->query("SELECT profile_picture, adhar_card FROM employee WHERE  id = '$post_id'");
   $value = $data->fetch_object();
   $file = $value->profile_picture;
   $file1 = $value->adhar_card;
   
   if(empty($file || $file1)){
	   
	   $db->query("DELETE FROM employee_user_type WHERE employee_id = '$post_id'");
	   $db->query("DELETE FROM employee_commission WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM user_module WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM employee_store WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM employee WHERE  id = '$post_id'");
   }
   if(!empty($file || $file1)){
   	unlink("employee/upload/profile_images/".$file);
	   unlink("employee/upload/profile_images/".$file1);//remove file 
	   $db->query("DELETE FROM employee_user_type WHERE employee_id = '$post_id'");
	   $db->query("DELETE FROM employee_commission WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM user_module WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM employee_store WHERE  employee_id = '$post_id'");
	   $db->query("DELETE FROM employee WHERE  id = '$post_id'");
   }

   
 $_SESSION['msg'] = md5('7');
header("location:employee_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
