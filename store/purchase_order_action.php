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
  $total_price_two = mysqli_real_escape_string($db, $_POST['total_price_two']);
  $final_price = mysqli_real_escape_string($db, $_POST['final_price']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("Y-m-d H:i:s");

  
  
    $query = $db->query("SELECT * FROM purchase_order WHERE purchase_order_number='$purchase_order_number'");
  if($query->num_rows > 0){
      $_SESSION['msg'] = md5('p_error');
      header("location:purhase_managment_list.php");
  }else{
      
       $result_one = $db->query("INSERT INTO `purchase_order`(`store_id`, `user_id`, `vendor_id`, `purchase_order_number`, `purchase_order_date`, `total_first`, `misc_name`, `misc_value`, `round_off`, `total_price_two`, `final_price`, `status`, `date`) VALUES ('$store_id','$user_id','$vendor_id','$purchase_order_number','$purchase_order_date','$total_first','$miscs_name','$misc_value','$round_off','$total_price_two','$final_price','$status','$post_date_time')");
       
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
      echo "<script>alert('success');window.location='purhase_managment_list.php';</script>";
        
    }else{
       
         $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('success');window.location='purhase_managment_list.php';</script>";
    }
    
    
  
       }else{
          
            $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('success');window.location='purhase_managment_list.php';</script>";
       }
       
      
  }
  
  
  

 
    
  break;
  case'update':

  $post_id = $_POST['post_id'];
  $default_mill_code = mysqli_real_escape_string($db, $_POST['default_mill_code']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $sub_mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
  $sub_mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $indent_no = mysqli_real_escape_string($db, $_POST['indent_no']);
  $invoice_number = mysqli_real_escape_string($db, $_POST['invoice_number']);
  $invoice_date = mysqli_real_escape_string($db, $_POST['invoice_date']);
  $document_through = mysqli_real_escape_string($db, $_POST['document_through']);
  $doc_encl = mysqli_real_escape_string($db, $_POST['doc_encl']);
  $transporter = mysqli_real_escape_string($db, $_POST['transporter']);
  $lr_no = mysqli_real_escape_string($db, $_POST['lr_no']);
  $lr_date = mysqli_real_escape_string($db, $_POST['lr_date']);
  $currency = mysqli_real_escape_string($db, $_POST['currency']);
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $post_date_time = date("Y-m-d H:i:s");

  
  $db->query("UPDATE `invoice` SET `company_id`='$company_id',`default_mill_code`='$default_mill_code',`mill_code`='$mill_code',`mill_name`='$mill_name',`sub_mill_code`='$sub_mill_code',`sub_mill_name`='$sub_mill_name',`broker_code`='$broker_code',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`indent_no`='$indent_no',`invoice_number`='$invoice_number',`invoice_date`='$invoice_date',`document_through`='$document_through',`doc_encl`='$doc_encl',`transporter`='$transporter',`lr_no`='$lr_no',`lr_date`='$lr_date',`currency`='$currency',`date`='$post_date_time' WHERE id='$post_id'");

     $_SESSION['msg'] = md5('6');
    header("location:invoice_list.php");
 
    //photo upload end  

   break;
  case 'delete':
   $post_id = $_GET['post'];
   
$post_id = $_GET['post'];
 
	 
        $query_insert_sort_quantity = $db->query("SELECT sort_id,quantity FROM invoice_sort_date WHERE invoice_id='$post_id' ORDER BY id");
        while($value_quantity_indent = $query_insert_sort_quantity->fetch_object()){
        
        $insertold_qty = $value_quantity_indent->quantity;       
        $insert_sort_id = $value_quantity_indent->sort_id;

        $query_old_indent = $db->query("SELECT paid_quantity FROM indent_plus WHERE id='$insert_sort_id'");
        $value_indent = $query_old_indent->fetch_object();
        $paidqty = $value_indent->paid_quantity; 

        $final_value = $paidqty-$insertold_qty;

      $db->query("UPDATE `indent_plus` SET `paid_quantity`='$final_value' WHERE id='$insert_sort_id'");
            
        }
       
            $db->query("DELETE FROM invoice_sort_date WHERE invoice_id='$post_id'");
              $db->query("DELETE FROM invoice WHERE id='$post_id'");
             $db->query("DELETE FROM `ledger` WHERE doc_id='$post_id'");
        
            $_SESSION['msg'] = md5('7');
header("location:invoice_list.php");


    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
