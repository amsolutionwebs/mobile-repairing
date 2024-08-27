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
  $product_id = $_POST['product_id'];
  $variation_id = $_POST['variation_id'];
  $sub_variation_id = $_POST['sub_variation_id'];
  $quantity = $_POST['quantity'];
  $purchase_price = $_POST['purchase_price'];
  $price = $_POST['price'];
  $discunted_price = $_POST['discunted_price'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");

   for($i=0; $i<count($_POST["variation_id"]); $i++)
  {
   
    
   $query2 = $db->query("INSERT INTO `product_variation`(`store_id`, `user_id`, `product_id`, `variation_id`, `sub_variation_id`, `qty`, `stock_quantity`, `purchase_price`, `price`, `discounted_price`, `status`, `date`) VALUES ('$store_id','$user_id','$product_id','$variation_id[$i]','$sub_variation_id[$i]','$quantity[$i]','$quantity[$i]','$purchase_price[$i]','$price[$i]','$discunted_price[$i]','$status[$i]','$post_date_time')");
    

  }
  if ($query2) {
     $_SESSION['msg'] = md5('5');
    header("location:single_product_variation.php?post=$product_id");
  }else{
   $_SESSION['msg'] = md5('p_error');
    header("location:product_list.php");
  }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $product_id = $_POST['product_id'];
  $variation_id = $_POST['variation_id'];
  $sub_variation_id = $_POST['sub_variation_id'];
  $quantity = $_POST['quantity'];
  $purchase_price = $_POST['purchase_price'];
  $price = $_POST['price'];
  $discunted_price = $_POST['discunted_price'];
  $status = $_POST['status'];
  $post_date_time = date("Y-m-d H:i:s");
    
    for($k=0; $k<count($_POST["variation_id"]); $k++)
  {
   
   $query_update = $db->query("UPDATE `product_variation` SET `store_id`='$store_id',`user_id`='$user_id',`product_id`='$product_id',`variation_id`='$variation_id[$k]',`sub_variation_id`='$sub_variation_id[$k]',`qty`='$quantity[$k]',`purchase_price`='$purchase_price[$k]',`price`='$price[$k]',`discounted_price`='$discunted_price[$k]',`status`='$status[$k]',`date`='$post_date_time' WHERE id='$post_id'");
    

  }
  
  if($query_update){
      $_SESSION['msg'] = md5('6');
    header("location:single_product_variation.php?post=$product_id");
  }else{
      $_SESSION['msg'] = md5('p_error');
    header("location:single_product_variation.php?post=$product_id");
  }	

   break;
  case 'delete':
   $post_id = $_GET['post'];
   $product_id = $_GET['product_id'];
  
	   $db->query("DELETE FROM product_variation WHERE  id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:single_product_variation.php?post=$product_id");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}