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
 


 $db->query("INSERT INTO `products`(`categories_id`, `sub_categories_id`, `brand_id`, `model_number_id`, `seo_url`, `products_title`, `product_content`, `add_information`, `products_desc`, `star`, `seo_title`, `meta_description`, `meta_keywords`, `product_quantity`, `stock_available`, `sort_order`, `status`, `post_date_time`) VALUES ('$categories_id','$sub_categories_id','$brand_id','$model_number_id','$genrated_url','$products_title','na','$add_information','$products_desc','5','$seo_title','$meta_description','$meta_keywords','$product_quantity','$product_quantity','$sort_order','$status','$post_date_time')");

 
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
  

  
  $products_qty = mysqli_real_escape_string($db,$_POST['products_qty']);
  $meta_description = mysqli_real_escape_string($db, $_POST['meta_description']);
  $meta_keywords = mysqli_real_escape_string($db, $_POST['meta_keywords']);
  $sort_order = mysqli_real_escape_string($db, $_POST['sort_order']);
  $status = mysqli_real_escape_string($db, $_POST['status']);   
  $post_modified = date("Y-m-d H:i:s");

     $db->query("UPDATE `products` SET `categories_id`='$categories_id',`sub_categories_id`='$sub_categories_id',`brand_id`='$brand_id',`model_number_id`='$model_number_id',`products_title`='$products_title',`product_content`='na',`add_information`='$add_information',`products_desc`='$products_desc',`seo_title`='$seo_title',`meta_description`='$meta_description',`meta_keywords`='$meta_keywords',`product_quantity`='$products_qty',`sort_order`='$sort_order',`status`='$status',`post_modified`='$post_modified' WHERE id = '$post_id'");
	 
 
  
  $_SESSION['msg'] = md5('6');
    header("location:product_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
   $db->query("DELETE FROM products WHERE  id = '$post_id'");
  
 $_SESSION['msg'] = md5('7');
header("location:product_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
