<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':

$product_id = mysqli_real_escape_string($db,$_POST['product_id']); 
$variation_id = mysqli_real_escape_string($db,$_POST['variation_id']);
$status = mysqli_real_escape_string($db, $_POST['status']);		

$files = $_FILES["products_image"];

for ($i = 0; $i < count($files['name']); $i++) {

	$db->query("INSERT INTO `variation_product_images`(`product_id`,`variation_id`,`status`) VALUES ('$product_id','$variation_id','$status')");

 $lid = $db->insert_id;
    
    $photo = $_FILES['products_image'] ['name'][$i];
    include_once 'photocrop.php';
    //phpto upload
    if ($_FILES["products_image"]["size"][$i] > 0) {
      $photo = $_FILES['products_image']['name'][$i];
      $random_digit = rand(0000, 9999) . time();
      $new_products_image = $random_digit ."-". $photo;
	 
     
      
        if ($_FILES["products_image"]["error"][$i] > 0) {
          echo "Return Code: " . $_FILES["products_image"]["error"][$i] . "<br>";
        } else {
          //$p_temp = resizeImage($_FILES['products_image']['tmp_name'], 1300, 1300, $photo);
		  $p_temp = $_FILES['products_image']['tmp_name'][$i];
          $new_photo = str_replace(" ", "_", $new_products_image);
          $imgfile = "upload/post-images/" . $new_photo;
          //imagejpeg($p_temp, $imgfile);
		  move_uploaded_file($p_temp,$imgfile);

          $db->query("UPDATE variation_product_images SET product_images = '$new_photo' WHERE id='$lid'");
        }
      
    }

}

 


    
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:variation_product_images_list.php?product_id=$product_id&variation_id=$variation_id&action=view");

    
	break;
  case'update':

$post_id = mysqli_real_escape_string($db,$_POST['post_id']);
$product_id = mysqli_real_escape_string($db,$_POST['product_id']); 
$variation_id = mysqli_real_escape_string($db,$_POST['variation_id']);
$status = mysqli_real_escape_string($db, $_POST['status']);	

$files = $_FILES["products_image"];
for ($k = 0; $k < count($files['name']); $k++) {

$db->query("UPDATE `variation_product_images` SET `status`='$status' WHERE id='$post_id'");
	 
 $photo1 = $_FILES['products_image']['name'][$k];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image"]["size"][$k] > 0) {
    $photo1 = $_FILES['products_image']['name'][$k];
    $random_digit = rand(0000, 9999) . time();
    $new_products_image = $random_digit."-".$photo1;
	
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image"]["name"][$k]);
    $extension = end($temp);
    
      if ($_FILES["products_image"]["error"][$k] > 0) {
        echo "Return Code: " . $_FILES["products_image"]["error"][$k] . "<br>";
      } else {
		  $new_photo = str_replace(" ", "_", $new_products_image);
       // $p_temp = resizeImage($_FILES['products_image']['tmp_name'], 1300, 1300, $photo);
		$p_temp = $_FILES['products_image']['tmp_name'][$k];
        $imgfile = "upload/post-images/" . $new_photo;
       // imagejpeg($p_temp, $imgfile);
		move_uploaded_file($p_temp,$imgfile);
		
		$data = $db->query("SELECT product_images FROM variation_product_images WHERE id = '$post_id'");
        $value = $data->fetch_object();
		if(empty($value->product_images)){
			$db->query("UPDATE variation_product_images SET product_images = '$new_photo' WHERE id = '$post_id'");	
		}else{
			unlink('upload/post-images/'.$value->product_images); // remove files	
        $db->query("UPDATE variation_product_images SET product_images = '$new_photo' WHERE id = '$post_id'");
		}
		
			
      }
    
  }
}


   

  
  $_SESSION['msg'] = md5('6');
    header("location:variation_product_images_list.php?product_id=$product_id&variation_id=$variation_id&action=view");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
   $product_id = $_GET['product_id'];
   $variation_id = $_GET['variation_id'];
   $data = $db->query("SELECT product_images FROM variation_product_images WHERE  id='$post_id'");
   $value = $data->fetch_object();
   $file = $value->product_images;
   
   if(empty($file)){
	   $db->query("DELETE FROM variation_product_images WHERE  id = '$post_id'");
   }
   if(!empty($file)){
	 unlink("upload/post-images/".$file);
     
	   $db->query("DELETE FROM variation_product_images WHERE  id = '$post_id'");
   }
  
 $_SESSION['msg'] = md5('7');
header("location:variation_product_images_list.php?product_id=$product_id&variation_id=$variation_id&action=view");




    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
