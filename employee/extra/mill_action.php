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
  $code_one = mysqli_real_escape_string($db, $_POST['code_one']);
  $name_one = mysqli_real_escape_string($db, $_POST['name_one']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $bank_name = mysqli_real_escape_string($db, $_POST['bank_name']);
  $ifsc_code = mysqli_real_escape_string($db, $_POST['ifsc_code']);
  $bank_account_number = mysqli_real_escape_string($db, $_POST['bank_account_number']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $credit_days = mysqli_real_escape_string($db, $_POST['credit_days']);
  $rate_of_interest = mysqli_real_escape_string($db, $_POST['rate_of_interest']);
  $gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM mill WHERE company_id='$company_login_id' AND mill_code='$code_one'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:mill_list.php");
  }else{

 $db->query("INSERT INTO `mill`(`company_id`,`mill_code`, `mill_name`, `main_address`, `alternate_address`, `city`, `state`, `pincode`, `phone_off`, `phone_res`, `email`, `bank_name`, `ifsc_code`, `bank_account_number`, `opening_blance`, `commission`, `credit_days`, `rate_of_interest`,`gst_number`,`status`, `date`) VALUES ('$company_id','$code_one','$name_one','$main_address','$alternate_address','$city','$state','$pincode','$phone_off','$phone_res','$email','$bank_name','$ifsc_code','$bank_account_number','$opening_blance','$commission','$credit_days','$rate_of_interest','$gst_number','$status','$post_date_time')");
  
    //photo upload ends
	  $lid = $db->insert_id;
    $photo = $_FILES['intro_images'] ['name'];
    include_once 'bannercrop.php';
    //phpto upload
    if ($_FILES["intro_images"]["size"] > 0) {
      $photo = $_FILES['intro_images']['name'];
      //$random_digit = rand(0000, 9999) . time();
      //$new_post_image = $random_digit . $photo;
      $new_post_image = $photo;
      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG");
      $temp = explode(".", $_FILES["intro_images"]["name"]);
      $extension = end($temp);
      if ((($_FILES["intro_images"]["type"] == "image/gif") || ($_FILES["intro_images"]["type"] == "image/jpeg") || ($_FILES["intro_images"]["type"] == "image/jpg") || ($_FILES["intro_images"]["type"] == "image/JPEG") || ($_FILES["intro_images"]["type"] == "image/JPG") || ($_FILES["intro_images"]["type"] == "image/pjpeg") || ($_FILES["intro_images"]["type"] == "image/x-png") || ($_FILES["intro_images"]["type"] == "image/png") || ($_FILES["intro_images"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["intro_images"]["error"] > 0) {
          echo "Return Code: " . $_FILES["intro_images"]["error"] . "<br>";
        } else {
          
          $p_temp = $_FILES['intro_images']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_post_image);
          $imgfile = "upload/intro-screen/" . $new_photo;
          move_uploaded_file($p_temp,$imgfile) ;
          
          $rei_img = ROOTINTRO.$new_photo;

          $db->query("UPDATE intro_screen SET intro_images = '$rei_img' WHERE id='$lid'");
        }
      }
    }

    // for adhar card
    $_SESSION['msg'] = md5('5');
    header("location:mill_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['post_id'];
 $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $code_one = mysqli_real_escape_string($db, $_POST['code_one']);
  $name_one = mysqli_real_escape_string($db, $_POST['name_one']);
  $main_address = mysqli_real_escape_string($db, $_POST['main_address']);
  $alternate_address = mysqli_real_escape_string($db, $_POST['alternate_address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $phone_off = mysqli_real_escape_string($db, $_POST['phone_off']);
  $phone_res = mysqli_real_escape_string($db, $_POST['phone_res']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $bank_name = mysqli_real_escape_string($db, $_POST['bank_name']);
  $ifsc_code = mysqli_real_escape_string($db, $_POST['ifsc_code']);
  $bank_account_number = mysqli_real_escape_string($db, $_POST['bank_account_number']);
  $opening_blance = mysqli_real_escape_string($db, $_POST['opening_blance']);
  $commission = mysqli_real_escape_string($db, $_POST['commission']);
  $credit_days = mysqli_real_escape_string($db, $_POST['credit_days']);
  $rate_of_interest = mysqli_real_escape_string($db, $_POST['rate_of_interest']);
$gst_number = mysqli_real_escape_string($db, $_POST['gst_number']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

     $db->query("UPDATE `mill` SET `company_id`='$company_id',`mill_code`='$code_one',`mill_name`='$name_one',`main_address`='$main_address',`alternate_address`='$alternate_address',`city`='$city',`state`='$state',`pincode`='$pincode',`phone_off`='$phone_off',`phone_res`='$phone_res',`email`='$email',`bank_name`='$bank_name',`ifsc_code`='$ifsc_code',`bank_account_number`='$bank_account_number',`opening_blance`='$opening_blance',`commission`='$commission',`credit_days`='$credit_days',`rate_of_interest`='$rate_of_interest',`gst_number`='$gst_number',`status`='$status',`date`='$post_date_time' WHERE id = '$post_id'");
	 

  $_SESSION['msg'] = md5('6');
    header("location:mill_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
 
	   $db->query("DELETE FROM mill WHERE  id = '$post_id'");
   
  
 $_SESSION['msg'] = md5('7');
header("location:mill_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
