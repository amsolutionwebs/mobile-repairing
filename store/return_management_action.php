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
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $sales_id = mysqli_real_escape_string($db, $_POST['sales_id']);
  $return_number = mysqli_real_escape_string($db, $_POST['return_number']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $sales_number = mysqli_real_escape_string($db, $_POST['sales_number']);
  $sales_date = mysqli_real_escape_string($db, $_POST['sales_date']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);

  $imei_number = mysqli_real_escape_string($db, $_POST['imei_number']);  	
  $product_password = mysqli_real_escape_string($db, $_POST['product_password']);


  $payment_mode = mysqli_real_escape_string($db, $_POST['payment_mode']);
  $salesman = mysqli_real_escape_string($db, $_POST['salesman']);
  $warranty_in_days = mysqli_real_escape_string($db, $_POST['warranty_in_days']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['customer_remark']);
  $customer_address = mysqli_real_escape_string($db, $_POST['customer_address']);

  $total_2 = mysqli_real_escape_string($db, $_POST['total_2']);
  $service_charge = mysqli_real_escape_string($db, $_POST['service_charge']);
  $service_charge_tax = mysqli_real_escape_string($db, $_POST['service_charge_tax']);
  $total_service_charge = mysqli_real_escape_string($db, $_POST['total_service_charge']);
  $total_cashd = '0';
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $all_quantity = mysqli_real_escape_string($db, $_POST['all_quantity']);
  $total3 = mysqli_real_escape_string($db, $_POST['total3']);
  $post_date_time = date("d-m-Y H:i:s");

 $query = $db->query("INSERT INTO `return_managment`(`store_id`, `user_id`, `return_number`, `sales_id`, `customer_id`, `sales_number`, `sales_date`, `device_type`, `payment_mode`, `salesman`, `warranty_in_days`, `customer_remark`, `customer_address`, `status`, `total_2`, `service_charge`, `service_charge_tax`, `total_service_charge`, `miscs_name`, `total_miscs`, `total_cd`, `round_off`, `all_quantity`, `total_amount`, `date`) VALUES ('$store_id','$user_id','$sales_id','$return_number','$customer_id','$sales_number','$sales_date','$device_type','$payment_mode','$salesman','$warranty_in_days','$customer_remark','$customer_address','$status','$total_2','$service_charge','$service_charge_tax','$total_service_charge','$miscs_name','$total_miscs','$total_cashd','$round_off','$all_quantity','$total3','$post_date_time')");
  




    //photo upload ends
 $work_id = $db->insert_id;

  if ($query) {
    $work_id = $work_id;  

    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $sub_variation_id = $_POST['sub_variation_id'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $discount_invoice = $_POST['discount_invoice'];
    $gst_invoice = $_POST['gst_invoice'];
    $total_amount_first = $_POST['total_amount_first'];

    for($i=0; $i<count($_POST["product_id"]); $i++)
    {
        $result2 = $db->query("INSERT INTO `return_product_details`(`return_id`, `product_id`, `variation_id`, `sub_variation_id`, `qunatity`, `rate`, `discount`, `gst`, `amount`) VALUES ('$work_id','$product_id[$i]','$variation_id[$i]','$sub_variation_id[$i]','$quantity_invoice[$i]','$rate_invoice[$i]','$discount_invoice[$i]','$gst_invoice[$i]','$total_amount_first[$i]')");
    }
 }





   
   if($result2){

      $_SESSION['msg'] = md5('5');
    header("location:return_management_list.php");
   }
 
   
    
	break;
  case'update':




  $post_id = $_POST['post_id'];

  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $sales_number = mysqli_real_escape_string($db, $_POST['sales_number']);
  $sales_date = mysqli_real_escape_string($db, $_POST['sales_date']);
  $device_type = mysqli_real_escape_string($db, $_POST['device_type']);  	
  $payment_mode = mysqli_real_escape_string($db, $_POST['payment_mode']);
  $salesman = mysqli_real_escape_string($db, $_POST['salesman']);
  $warranty_in_days = mysqli_real_escape_string($db, $_POST['warranty_in_days']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['customer_remark']);
  $customer_address = mysqli_real_escape_string($db, $_POST['customer_address']);

  $total_2 = mysqli_real_escape_string($db, $_POST['total_2']);
  $cashd = mysqli_real_escape_string($db, $_POST['cashd']);
  $total_cashd = mysqli_real_escape_string($db, $_POST['total_cashd']);
  $gst = mysqli_real_escape_string($db, $_POST['gst']);
  $total_gst = mysqli_real_escape_string($db, $_POST['total_gst']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $all_quantity = mysqli_real_escape_string($db, $_POST['all_quantity']);
  $total3 = mysqli_real_escape_string($db, $_POST['total3']);
  $post_date_time = date("d-m-Y H:i:s");
  
     $db->query("UPDATE `por_repair_managment` SET `store_id`='$store_id',`user_id`='$user_id',`customer_id`='$customer_id',`imei`='$imei',`password`='$password',`customer_remark`='$customer_remark',`problem_diagnosis`='$problem_diagnosis',`est_repair_time`='$est_repair_time',`risk`='$risk',`cost`='$cost',`repair_mode`='$repair_mode',`engineer_code`='$engineer_code',`salesman`='$salesman',`warranty_in_days`='$warranty_in_days',`status`='$status',`total_2`='$total_2',`cash_discount`='$cashd',`total_cashdiscount`='$total_cashd',`gst`='$gst',`total_gst`='$total_gst',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`round_off`='$round_off',`total_quntity`='$all_quantity',`total_amount`='$total3',`date`='$post_date_time' WHERE id='$post_id'");
 

  $_SESSION['msg'] = md5('6');
    header("location:return_management_list.php");
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM return_managment WHERE  id = '$post_id'");
       $db->query("DELETE FROM return_product_details WHERE  repair_id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:return_management_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
