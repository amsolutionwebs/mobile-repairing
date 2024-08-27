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
  $purchase_order_number = mysqli_real_escape_string($db, $_POST['purchase_order_number']);
  $purchase_order_date = mysqli_real_escape_string($db, $_POST['purchase_order_date']);
  $vendor_id = mysqli_real_escape_string($db, $_POST['vendor_id']);
  $total_first = mysqli_real_escape_string($db, $_POST['total_first']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $misc_value = mysqli_real_escape_string($db, $_POST['misc_value']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $final_price = mysqli_real_escape_string($db, $_POST['final_price']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

  
  
    $query = $db->query("SELECT * FROM purchase_order WHERE purchase_order_number='$purchase_order_number'");
  if($query->num_rows > 0){
      $_SESSION['msg'] = md5('p_error');
      header("location:vendor_purchase_managment_list.php");
  }else{
      
       $result_one = $db->query("INSERT INTO `purchase_order`(`store_id`, `user_id`, `vendor_id`, `purchase_order_number`, `purchase_order_date`, `total_first`, `misc_name`, `misc_value`, `round_off`, `final_price`, `status`, `date`) VALUES ('$store_id','$user_id','$vendor_id','$purchase_order_number','$purchase_order_date','$total_first','$miscs_name','$misc_value','$round_off','$final_price','$status','$post_date_time')");
       
       $purchase_order_id = $db->insert_id;
       
       if($result_one){
  
  $store_id = $_POST['store_id'];
  $vendor_id = $_POST['vendor_id'];
  $product_id = $_POST['product_id'];
  $product_desc = $_POST['product_desc'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = $_POST['total'];
  
   for($i=0; $i<count($_POST["product_id"]); $i++)
    {
        $result_purchase_details = $db->query("INSERT INTO `purchase_order_details`(`store_id`, `vendor_id`, `purchase_order_id`, `product_id`, `product_desc`, `quantity`, `price`, `total`) VALUES ('$store_id','$vendor_id','$purchase_order_id','$product_id[$i]','$product_desc[$i]','$quantity[$i]','$price[$i]','$total[$i]')");
    
    }
    
    if($result_purchase_details){
        
      
         $_SESSION['msg'] = md5('5');
      echo "<script>alert('success');window.location='vendor_purchase_managment_list.php';</script>";
        
    }else{
       
         $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('success');window.location='vendor_purchase_managment_list.php';</script>";
    }
    
    
  
       }else{
          
            $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('success');window.location='vendor_purchase_managment_list.php';</script>";
       }
       
      
  }
  
  
  

 
    
  break;
  case'update':

  $post_id = $_POST['post_id'];
  $store_id = $_POST['store_id'];
  $user_id = $_POST['user_id'];
  $purchase_order_number = mysqli_real_escape_string($db, $_POST['purchase_order_number']);
  $purchase_order_date = mysqli_real_escape_string($db, $_POST['purchase_order_date']);
  $vendor_id = mysqli_real_escape_string($db, $_POST['vendor_id']);
  $total_first = mysqli_real_escape_string($db, $_POST['total_first']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $misc_value = mysqli_real_escape_string($db, $_POST['misc_value']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $final_price = mysqli_real_escape_string($db, $_POST['final_price']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

  
  $result1 = $db->query("UPDATE `purchase_order` SET `store_id`='$store_id',`user_id`='$user_id',`vendor_id`='$vendor_id',`purchase_order_number`='$purchase_order_number',`purchase_order_date`='$purchase_order_date',`total_first`='$total_first',`misc_name`='$miscs_name',`misc_value`='$misc_value',`round_off`='$round_off',`total_price_two`='0',`final_price`='$final_price',`status`='$status',`date`='$post_date_time' WHERE id='$post_id'");

     if(!empty($_POST["product_id"])){
    
    $post_id = $_POST['post_id'];
    $post_id_update = $_POST['post_id_update'];
    $product_id = $_POST['product_id'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
  
    
    for($p=0; $p<count($_POST["product_id"]); $p++)
    {
        $result2 = $db->query("UPDATE `purchase_order_details` SET `purchase_order_id`='$post_id',`product_id`='$product_id[$p]',`product_desc`='$product_desc[$p]',`quantity`='$quantity[$p]',`price`='$price[$p]',`total`='$total[$p]' WHERE id='$post_id_update[$p]'");
    }
  }


  if($result1 || $result2){


      $_SESSION['msg'] = md5('6');
    header("location:vendor_purchase_managment_list.php");
  }

 
    //photo upload end  

   break;
  case 'delete':
   $post_id = $_GET['post'];
   
   $db->query("DELETE FROM purchase_order WHERE id='$post_id'");
   $db->query("DELETE FROM purchase_order_details WHERE purchase_order_id='$post_id'");
    
   $_SESSION['msg'] = md5('7');
header("location:vendor_purchase_managment_list.php");


    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
