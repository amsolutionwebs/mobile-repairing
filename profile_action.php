<?php
include 'config/config.php';
$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];

        if($usertype=='suparadmin'){ 



          if(isset($_POST['update_profile'])){
  

  $user_id = mysqli_real_escape_string($db,$_POST['user_id']); 
  $employee_id = mysqli_real_escape_string($db,$_POST['employee_id']);
  $first_name = mysqli_real_escape_string($db,$_POST['first_name']); 
  $last_name = mysqli_real_escape_string($db,$_POST['last_name']);
  $email_id = mysqli_real_escape_string($db,$_POST['email_id']);
  $phone = mysqli_real_escape_string($db,$_POST['phone']); 
  $alternate_phone = mysqli_real_escape_string($db,$_POST['alternate_phone']);
  $whatsapp_number = mysqli_real_escape_string($db,$_POST['whatsapp_number']);
  $age = mysqli_real_escape_string($db,$_POST['age']); 
  $address = mysqli_real_escape_string($db,$_POST['address']);
    

   $query = $db->query("UPDATE `supar_admin` SET `first_name`='$first_name',`last_name`='$last_name',`email_id`='$email_id',`mobile_number`='$phone',`alternate_mobile_number`='$alternate_phone',`whatsapp_number`='$whatsapp_number',`age`='$age',`address`='$address' WHERE id='$user_id'");

     $photo = $_FILES['profile_image'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["profile_image"]["size"] > 0) {
      $photo = $_FILES['profile_image']['name'];
      $random_digit = rand(0000, 9999) . time();
      $new_profile_image = $random_digit . $photo;

      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG","webp");
      $temp = explode(".", $_FILES["profile_image"]["name"]);
      $extension = end($temp);
      if ((($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg") ||
      ($_FILES["profile_image"]["type"] == "image/webp") ||($_FILES["profile_image"]["type"] == "image/jpg") || ($_FILES["profile_image"]["type"] == "image/JPEG") || ($_FILES["profile_image"]["type"] == "image/JPG") || ($_FILES["profile_image"]["type"] == "image/pjpeg") || ($_FILES["profile_image"]["type"] == "image/x-png") || ($_FILES["profile_image"]["type"] == "image/png") || ($_FILES["profile_image"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["profile_image"]["error"] > 0) {
          echo "Return Code: " . $_FILES["profile_image"]["error"] . "<br>";
        } else {
          // $p_temp = resizeImage($_FILES['profile_image']['tmp_name'], 400, 400, $photo);
          $p_temp = $_FILES['profile_image']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_profile_image);
          $imgfile = "upload/profile_images/" . $new_photo;
          // imagejpeg($p_temp, $imgfile);
           move_uploaded_file($p_temp,$imgfile) ;
      
            $data = $db->query("SELECT profile_picture FROM supar_admin WHERE id = '$user_id'");
        $value3 = $data->fetch_object();
    if(empty($value3->profile_picture)){
    $db->query("UPDATE `supar_admin` SET profile_picture= '$new_photo' WHERE id='$user_id'");  
    }else{
      unlink('upload/profile_images/'.$value3->profile_picture); // remove files 
        $db->query("UPDATE `supar_admin` SET profile_picture= '$new_photo' WHERE id='$user_id'");
    }
    
          
        }
      }
    }


  if($query){
    $_SESSION['msg'] = md5('6');
    header("Location: dashboard.php");
  }else{
    $_SESSION['msg'] = md5('p_error');
    header("location:dashboard.php");

  }







  }




         }elseif ($usertype=='admin') { 


          if(isset($_POST['update_profile'])){
  

  $user_id = mysqli_real_escape_string($db,$_POST['user_id']); 
  $first_name = mysqli_real_escape_string($db,$_POST['first_name']); 
  $last_name = mysqli_real_escape_string($db,$_POST['last_name']);
  $email_id = mysqli_real_escape_string($db,$_POST['email_id']);
  $phone = mysqli_real_escape_string($db,$_POST['phone']); 
  $alternate_phone = mysqli_real_escape_string($db,$_POST['alternate_phone']);
  $whatsapp_number = mysqli_real_escape_string($db,$_POST['whatsapp_number']);
  $age = mysqli_real_escape_string($db,$_POST['age']); 
  $address = mysqli_real_escape_string($db,$_POST['address']);
    

   $query = $db->query("UPDATE `admin` SET `first_name`='$first_name',`last_name`='$last_name',`email_id`='$email_id',`mobile_number`='$phone',`alternate_mobile_number`='$alternate_phone',`whatsapp_number`='$whatsapp_number',`age`='$age',`address`='$address' WHERE id='$user_id'");

     $photo = $_FILES['profile_image'] ['name'];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["profile_image"]["size"] > 0) {
      $photo = $_FILES['profile_image']['name'];
      $random_digit = rand(0000, 9999) . time();
      $new_profile_image = $random_digit . $photo;

      $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG","webp");
      $temp = explode(".", $_FILES["profile_image"]["name"]);
      $extension = end($temp);
      if ((($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg") ||
      ($_FILES["profile_image"]["type"] == "image/webp") ||($_FILES["profile_image"]["type"] == "image/jpg") || ($_FILES["profile_image"]["type"] == "image/JPEG") || ($_FILES["profile_image"]["type"] == "image/JPG") || ($_FILES["profile_image"]["type"] == "image/pjpeg") || ($_FILES["profile_image"]["type"] == "image/x-png") || ($_FILES["profile_image"]["type"] == "image/png") || ($_FILES["profile_image"]["type"] == "image/PNG")) && in_array($extension, $allowedExts)) {
        if ($_FILES["profile_image"]["error"] > 0) {
          echo "Return Code: " . $_FILES["profile_image"]["error"] . "<br>";
        } else {
          // $p_temp = resizeImage($_FILES['profile_image']['tmp_name'], 400, 400, $photo);
          
          $p_temp = $_FILES['profile_image']['tmp_name'];
          $new_photo = str_replace(" ", "_", $new_profile_image);
          $imgfile = "upload/profile_images/" . $new_photo;
          // imagejpeg($p_temp, $imgfile);
           move_uploaded_file($p_temp,$imgfile) ;
      
            $data = $db->query("SELECT profile_picture FROM admin WHERE id = '$user_id'");
        $value3 = $data->fetch_object();
    if(empty($value3->profile_picture)){
    $db->query("UPDATE `admin` SET profile_picture= '$new_photo' WHERE id='$user_id'");  
    }else{
      unlink('upload/profile_images/'.$value3->profile_picture); // remove files 
        $db->query("UPDATE `admin` SET profile_picture= '$new_photo' WHERE id='$user_id'");
    }
    
          
        }
      }
    }


  if($query){
    $_SESSION['msg'] = md5('6');
    header("Location: dashboard.php");
  }else{
    $_SESSION['msg'] = md5('p_error');
    header("location:dashboard.php");

  }







  }



        }?>

