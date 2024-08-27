<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':

$categories_id = mysqli_real_escape_string($db,$_POST['cat_id']); 
$sub_categories_id = mysqli_real_escape_string($db,$_POST['sub_cat_id']); 
$brand_id = mysqli_real_escape_string($db,$_POST['brand_id']); 
$model_number_id = mysqli_real_escape_string($db,$_POST['model_number_id']);     
$products_title = $_POST['products_title'];

$seo_title = $products_title;
//
$seo_title = mysqli_real_escape_string($db,$_POST['seo_title']);
  // Only allow letters, numbers, and dashes
$products_title_seo_url = preg_replace('/([^a-zA-Z0-9\-]+)/', '-', strtolower($seo_title));
	// Replace multiple dashes with one dash
$products_title_seo_url = preg_replace('/-+/', '-', $products_title_seo_url);
	if(substr($products_title_seo_url, -1)==='-'){ // Remove - from end
  $products_title_seo_url = substr($products_title_seo_url, 0, -1);
 }
 if(substr($products_title_seo_url, 0, 1)==='-'){ // Remove - from start
  $products_title_seo_url = substr($products_title_seo_url, 1);
 }


 function generateRandomPassword($length = 35) {
    $characters = 'abcdefghijklmnopqrstuvwxyz'.time();
    $password = '';
  
    $maxIndex = strlen($characters) - 1;
  
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $maxIndex);
        $password .= $characters[$randomIndex];
    }
  
    return $password;
}

// Usage:
$genrated_url = generateRandomPassword(35);





  
  $add_information = 'na';
  $products_desc = $_POST['products_desc'];
  
  $price = 'na';
  $d_price = 'na';

  $price_in_dollar = 'na';
  $d_price_dollar = 'na';

  $whole_sale_price = 'na';
  $d_whole_sale_price = 'na';
  
  $product_quantity = mysqli_real_escape_string($db,$_POST['products_qty']);
  $meta_description = mysqli_real_escape_string($db, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($db, $_POST['meta_keywords']);
  $sort_order = mysqli_real_escape_string($db, $_POST['sort_order']);
  $status = mysqli_real_escape_string($db, $_POST['status']);		
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM products WHERE products_title='$products_title'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:product_list.php");
  }else{
 


 $db->query("INSERT INTO `products`(`categories_id`, `sub_categories_id`, `brand_id`, `model_number_id`, `seo_url`, `products_title`, `product_content`, `add_information`, `products_desc`, `discount_price`, `price`, `discounted_price_dollar`, `price_in_dollar`, `wholesale_price`, `d_wholesale_price`, `star`, `seo_title`, `meta_description`, `meta_keywords`, `product_quantity`, `stock_available`, `sort_order`, `status`, `post_date_time`) VALUES ('$categories_id','$sub_categories_id','$brand_id','$model_number_id','$genrated_url','$products_title','na','$add_information','$products_desc','$d_price','$price','$d_price_dollar','$price_in_dollar','$whole_sale_price','$d_whole_sale_price','5','$seo_title','$meta_description','$meta_keywords','$product_quantity','$product_quantity','$sort_order','$status','$post_date_time')");

 
    //photo upload ends
	
    $_SESSION['msg'] = md5('5');
    header("location:product_list.php");

  }
 
   
    
	break;
  case'update':

 $post_id = $_POST['products_id'];

$categories_id = mysqli_real_escape_string($db,$_POST['cat_id']); 
$sub_categories_id = mysqli_real_escape_string($db,$_POST['sub_cat_id']); 
$brand_id = mysqli_real_escape_string($db,$_POST['brand_id']); 
$model_number_id = mysqli_real_escape_string($db,$_POST['model_number_id']); 

 $products_title = $_POST['products_title'];
$seo_title = $products_title;
  // Only allow letters, numbers, and dashes
$products_title_seo_url = preg_replace('/([^a-zA-Z0-9\-]+)/', '-', strtolower($seo_title));
  // Replace multiple dashes with one dash
$products_title_seo_url = preg_replace('/-+/', '-', $products_title_seo_url);
  if(substr($products_title_seo_url, -1)==='-'){ // Remove - from end
  $products_title_seo_url = substr($products_title_seo_url, 0, -1);
 }
 if(substr($products_title_seo_url, 0, 1)==='-'){ // Remove - from start
  $products_title_seo_url = substr($products_title_seo_url, 1);
 }

 
  $add_information = 'na';
  $products_desc =$_POST['products_desc'];
  
  $price = 'na';
  $d_price = 'na';

  $price_in_dollar = 'na';
  $d_price_dollar = 'na';

  $whole_sale_price = 'na';
  $d_whole_sale_price = 'na';
  
  $products_qty = mysqli_real_escape_string($db,$_POST['products_qty']);
  $meta_description = mysqli_real_escape_string($db, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($db, $_POST['meta_keywords']);
  $sort_order = mysqli_real_escape_string($db, $_POST['sort_order']);
  $status = mysqli_real_escape_string($db, $_POST['status']);   
  $post_modified = date("Y-m-d H:i:s");

     $db->query("UPDATE `products` SET `categories_id`='$categories_id',`sub_categories_id`='$sub_categories_id',`brand_id`='$brand_id',`model_number_id`='$model_number_id',`products_title`='$products_title',`product_content`='na',`add_information`='$add_information',`products_desc`='$products_desc',`discount_price`='$d_price',`price`='$price',`discounted_price_dollar`='$d_price_dollar',`price_in_dollar`='$price_in_dollar',`seo_title`='$seo_title',`meta_description`='$meta_description',`meta_keywords`='$meta_keywords',`product_quantity`='$products_qty',`sort_order`='$sort_order',`status`='$status',`post_modified`='$post_modified' WHERE id = '$post_id'");
	 
 $photo1 = $_FILES['products_image']['name'];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image"]["size"] > 0) {
    $photo1 = $_FILES['products_image']['name'];
    $random_digit = rand(0000, 9999) . time();
    $new_products_image = $random_digit."-".$photo1;
	
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image"]["name"]);
    $extension = end($temp);
    
      if ($_FILES["products_image"]["error"] > 0) {
        echo "Return Code: " . $_FILES["products_image"]["error"] . "<br>";
      } else {
		  $new_photo = str_replace(" ", "_", $new_products_image);
       // $p_temp = resizeImage($_FILES['products_image']['tmp_name'], 1300, 1300, $photo);
		$p_temp = $_FILES['products_image']['tmp_name'];
        $imgfile = "upload/post-images/" . $new_photo;
       // imagejpeg($p_temp, $imgfile);
		move_uploaded_file($p_temp,$imgfile);
		
		$data = $db->query("SELECT products_image FROM products WHERE id = '$post_id'");
        $value = $data->fetch_object();
		if(empty($value->products_image)){
			$db->query("UPDATE products SET products_image = '$new_photo' WHERE id = '$post_id'");	
		}else{
			unlink('upload/post-images/'.$value->products_image); // remove files	
        $db->query("UPDATE products SET products_image = '$new_photo' WHERE id = '$post_id'");
		}
		
			
      }
    
  }

   $photo2 = $_FILES['products_image_two']['name'];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image_two"]["size"] > 0) {
    $photo2 = $_FILES['products_image_two']['name'];
    $random_digit = rand(0000, 9999) . time();
    $new_products_image_two = $random_digit ."-". $photo2;
  
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image_two"]["name"]);
    $extension = end($temp);
   
      if ($_FILES["products_image_two"]["error"] > 0) {
        echo "Return Code: " . $_FILES["products_image_two"]["error"] . "<br>";
      } else {
      $new_photo_two = str_replace(" ", "_", $new_products_image_two);
       // $p_temp = resizeImage($_FILES['products_image_two']['tmp_name'], 1300, 1300, $photo);
    $p_temp = $_FILES['products_image_two']['tmp_name'];
        $imgfile = "upload/post-images/" . $new_photo_two;
       // imagejpeg($p_temp, $imgfile);
    move_uploaded_file($p_temp,$imgfile);
    
    $data = $db->query("SELECT product_images_two FROM products WHERE id = '$post_id'");
        $value = $data->fetch_object();
    if(empty($value->product_images_two)){
      $db->query("UPDATE products SET product_images_two = '$new_photo_two' WHERE id = '$post_id'");  
    }else{
      unlink('upload/post-images/'.$value->products_image_two); // remove files 
        $db->query("UPDATE products SET product_images_two = '$new_photo_two' WHERE id = '$post_id'");
    }
    
      
      }
   
  }

   $photo3 = $_FILES['products_image_three']['name'];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image_three"]["size"] > 0) {
    $photo3 = $_FILES['products_image_three']['name'];
    $random_digit = rand(0000, 9999) . time();
    $new_products_image_three = $random_digit ."-". $photo3;
 
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image_three"]["name"]);
    $extension = end($temp);
    
      if ($_FILES["products_image_three"]["error"] > 0) {
        echo "Return Code: " . $_FILES["products_image_three"]["error"] . "<br>";
      } else {
      $new_photo_three = str_replace(" ", "_", $new_products_image_three);
       // $p_temp = resizeImage($_FILES['products_image_three']['tmp_name'], 1300, 1300, $photo);
    $p_temp = $_FILES['products_image_three']['tmp_name'];
        $imgfile = "upload/post-images/" . $new_photo_three;
       // imagejpeg($p_temp, $imgfile);
    move_uploaded_file($p_temp,$imgfile);
    
    $data = $db->query("SELECT product_images_three FROM products WHERE id = '$post_id'");
        $value = $data->fetch_object();
    if(empty($value->product_images_three)){
      $db->query("UPDATE products SET product_images_three = '$new_photo_three' WHERE id = '$post_id'");  
    }else{
      unlink('upload/post-images/'.$value->product_images_three); // remove files 
        $db->query("UPDATE products SET product_images_three = '$new_photo_three' WHERE id = '$post_id'");
    }
    
      
      }
    
  }

   $photo4 = $_FILES['products_image_four']['name'];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image_four"]["size"] > 0) {
    $photo4 = $_FILES['products_image_four']['name'];
    $random_digit = rand(0000, 9999) . time();
   $new_products_image_four = $random_digit ."-". $photo4;
 
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image_four"]["name"]);
    $extension = end($temp);
    
      if ($_FILES["products_image_four"]["error"] > 0) {
        echo "Return Code: " . $_FILES["products_image_four"]["error"] . "<br>";
      } else {
      $new_photo_four = str_replace(" ", "_", $new_products_image_four);
       // $p_temp = resizeImage($_FILES['products_image_four']['tmp_name'], 1300, 1300, $photo);
    $p_temp = $_FILES['products_image_four']['tmp_name'];
        $imgfile = "upload/post-images/" . $new_photo_four;
       // imagejpeg($p_temp, $imgfile);
    move_uploaded_file($p_temp,$imgfile);
    
    $data = $db->query("SELECT products_images_four FROM products WHERE id = '$post_id'");
        $value = $data->fetch_object();
    if(empty($value->products_images_four)){
      $db->query("UPDATE products SET products_images_four = '$new_photo_four' WHERE id = '$post_id'");  
    }else{
      unlink('upload/post-images/'.$value->products_images_four); // remove files 
        $db->query("UPDATE products SET products_images_four = '$new_photo_four' WHERE id = '$post_id'");
    }
    
      
      }
    
  }


    $photo5 = $_FILES['products_image_five']['name'];
  include_once 'photocrop.php';
 //phpto upload
  if ($_FILES["products_image_five"]["size"] > 0) {
    $photo5 = $_FILES['products_image_five']['name'];
    $random_digit = rand(0000, 9999) . time();
   $new_products_image_four = $random_digit ."-". $photo5;
 
    $allowedExts = array("gif", "jpeg", "jpg", "JPEG", "JPG", "png", "PNG", "webp");
    $temp = explode(".", $_FILES["products_image_five"]["name"]);
    $extension = end($temp);
    
      if ($_FILES["products_image_five"]["error"] > 0) {
        echo "Return Code: " . $_FILES["products_image_five"]["error"] . "<br>";
      } else {
      $new_photo_five = str_replace(" ", "_", $new_products_image_four);
       // $p_temp = resizeImage($_FILES['products_image_five']['tmp_name'], 1300, 1300, $photo);
    $p_temp = $_FILES['products_image_five']['tmp_name'];
        $imgfile = "upload/post-images/" . $new_photo_five;
       // imagejpeg($p_temp, $imgfile);
    move_uploaded_file($p_temp,$imgfile);
    
    $data = $db->query("SELECT product_images_five FROM products WHERE id='$post_id'");
        $value = $data->fetch_object();
    if(empty($value->product_images_five)){
      $db->query("UPDATE products SET product_images_five = '$new_photo_five' WHERE id = '$post_id'");  
    }else{
      unlink('upload/post-images/'.$value->product_images_five); // remove files 
        $db->query("UPDATE products SET product_images_five = '$new_photo_five' WHERE id = '$post_id'");
    }
    
      
      }
    
  }
  
  $_SESSION['msg'] = md5('6');
    header("location:product_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
   $data = $db->query("SELECT products_image,product_images_two,product_images_three,products_images_four FROM products WHERE  id = '$post_id'");
   $value = $data->fetch_object();
   $file = $value->products_image;
   $file2 = $value->product_images_two;
   $file3 = $value->product_images_three;
   $file4 = $value->products_images_four;
   $file5 = $value->product_images_five;
   if(empty($file || $file2 || $file3 || $file4 || $file5)){
	   $db->query("DELETE FROM products WHERE  id = '$post_id'");
   }
   if(!empty($file || $file2 || $file3 || $file4 || $file5)){
	 unlink("upload/post-images/".$file);
     unlink("upload/post-images/".$file2);
     unlink("upload/post-images/".$file3);
     unlink("upload/post-images/".$file4);
     unlink("upload/post-images/".$file5);
	   $db->query("DELETE FROM products WHERE  id = '$post_id'");
   }
  
 $_SESSION['msg'] = md5('7');
header("location:product_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
