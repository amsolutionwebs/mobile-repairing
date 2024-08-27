<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':

  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['employee_id']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $purchase_number = mysqli_real_escape_string($db, $_POST['purchase_number']);
  $purchase_date = mysqli_real_escape_string($db, $_POST['purchase_date']);
  $purchase_amount = mysqli_real_escape_string($db, $_POST['purchase_amount']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);
  $cat_id = mysqli_real_escape_string($db, $_POST['cat_id']);
  $sub_cat_id = mysqli_real_escape_string($db, $_POST['sub_cat_id']);
  $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
  $model_number_id = mysqli_real_escape_string($db, $_POST['model_number_id']);
  $products_title = mysqli_real_escape_string($db, $_POST['products_title']);
  $products_sku = mysqli_real_escape_string($db, $_POST['products_sku']);
  $problem_diagnosis = mysqli_real_escape_string($db, $_POST['problem_diagnosis']);
  $problem_diagnosis_dscription = mysqli_real_escape_string($db, $_POST['problem_diagnosis_dscription']);
  $customer_address = mysqli_real_escape_string($db, $_POST['address']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['remark']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

 $query = $db->query("SELECT * FROM purchase_managment WHERE store_id='$store_id' AND purchase_number='$purchase_number'");
  if($query->num_rows > 0){
    $_SESSION['msg'] = md5('p_error');
    header("location:purchase_managment_list.php?msg=" . md5('p_error') . "");
  }else{
 
 $db->query("INSERT INTO `purchase_managment`(`store_id`, `user_id`, `purchase_number`, `purchase_date`, `device_type`, `customer_id`, `purchase_amount`, `cat_id`, `sub_cat_id`, `brand_id`, `model_number_id`, `products_title`, `products_sku`, `problem_diagnosis`, `problem_diagnosis_dscription`, `customer_remark`, `customer_address`, `date`, `status`) VALUES ('$store_id','$user_id','$purchase_number','$purchase_date','$device_type','$customer_id','$purchase_amount','$cat_id','$sub_cat_id','$brand_id','$model_number_id','$products_title','$products_sku','$problem_diagnosis','$problem_diagnosis_dscription','$customer_remark','$customer_address','$post_date_time','$status')");
  
    //photo upload ends
 $insert_id = $db->insert_id;

 if ($problem_diagnosis=='yes') {
    
   $db->query("INSERT INTO `por_repair_managment`(`store_id`, `user_id`, `customer_id`, `por_id`, `date`) VALUES ('$store_id','$user_id','$customer_id','$insert_id','$post_date_time')");
 
 }

 if($problem_diagnosis=='no'){
  $db->query("INSERT INTO `products`(`categories_id`, `sub_categories_id`, `brand_id`, `model_number_id`, `seo_url`, `products_title`, `product_quantity`, `stock_available`, `post_date_time`) VALUES ('$cat_id','$sub_cat_id','$brand_id','$model_number_id','$seo_url','$products_title','1','1','$post_date_time')");
 }
  
    $_SESSION['msg'] = md5('5');
    header("location:purchase_managment_list.php");

  }
 
   
    
  break;
  case'update':




  $post_id = $_POST['post_id'];

 $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['employee_id']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $purchase_number = mysqli_real_escape_string($db, $_POST['purchase_number']);
  $purchase_date = mysqli_real_escape_string($db, $_POST['purchase_date']);
  $purchase_amount = mysqli_real_escape_string($db, $_POST['purchase_amount']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);
  $cat_id = mysqli_real_escape_string($db, $_POST['cat_id']);
  $sub_cat_id = mysqli_real_escape_string($db, $_POST['sub_cat_id']);
  $brand_id = mysqli_real_escape_string($db, $_POST['brand_id']);
  $model_number_id = mysqli_real_escape_string($db, $_POST['model_number_id']);
  $products_title = mysqli_real_escape_string($db, $_POST['products_title']);
  $products_sku = mysqli_real_escape_string($db, $_POST['products_sku']);
  $problem_diagnosis = mysqli_real_escape_string($db, $_POST['problem_diagnosis']);
  $problem_diagnosis_dscription = mysqli_real_escape_string($db, $_POST['problem_diagnosis_dscription']);
  $customer_address = mysqli_real_escape_string($db, $_POST['address']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['remark']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");
  
   $db->query("UPDATE `purchase_managment` SET `store_id`='$store_id',`user_id`='$user_id',`purchase_number`='$purchase_number',`purchase_date`='$purchase_date',`device_type`='$device_type',`customer_id`='$customer_id',`purchase_amount`='$purchase_amount',`cat_id`='$cat_id',`sub_cat_id`='$sub_cat_id',`brand_id`='$brand_id',`model_number_id`='$model_number_id',`products_title`='$products_title',`products_sku`='$products_sku',`problem_diagnosis`='$problem_diagnosis',`problem_diagnosis_dscription`='$problem_diagnosis_dscription',`customer_remark`='$customer_remark',`customer_address`='$customer_address',`date`='$post_date_time',`status`='$status' WHERE `id`='$post_id'");



  if ($problem_diagnosis=='yes') {
    
   $db->query("INSERT INTO `por_repair_managment`(`store_id`, `user_id`, `customer_id`, `por_id`, `date`) VALUES ('$store_id','$user_id','$customer_id','$insert_id','$post_date_time')");
 
 }

 if($problem_diagnosis=='no'){
  $db->query("INSERT INTO `products`(`categories_id`, `sub_categories_id`, `brand_id`, `model_number_id`, `seo_url`, `products_title`, `product_quantity`, `stock_available`, `post_date_time`) VALUES ('$cat_id','$sub_cat_id','$brand_id','$model_number_id','$seo_url','$products_title','1','1','$post_date_time')");
 }
  

  $_SESSION['msg'] = md5('6');
    header("location:purchase_managment_list.php");
  
    //photo upload end  

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
     $db->query("DELETE FROM purchase_managment WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:purchase_managment_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
