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
  $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
  $imei = mysqli_real_escape_string($db, $_POST['imei']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['customer_remark']);  	
  $problem_diagnosis = mysqli_real_escape_string($db, $_POST['problem_diagnosis']);
  $est_repair_time = mysqli_real_escape_string($db, $_POST['est_repair_time']);
  $risk = mysqli_real_escape_string($db, $_POST['risk']); 	
  $repair_mode = mysqli_real_escape_string($db, $_POST['repair_mode']);
  $engineer_id = mysqli_real_escape_string($db, $_POST['engineer_id']);
  $engineer_code = mysqli_real_escape_string($db, $_POST['engineer_id']);
  $salesman = mysqli_real_escape_string($db, $_POST['salesman']);
  $warranty_in_days = mysqli_real_escape_string($db, $_POST['warranty_in_days']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $total_2 = mysqli_real_escape_string($db, $_POST['total_2']);
  $service_charge = mysqli_real_escape_string($db, $_POST['service_charge']);
  $service_charge_tax = mysqli_real_escape_string($db, $_POST['service_charge_tax']);
  $total_service_charge = mysqli_real_escape_string($db, $_POST['total_service_charge']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $total_cashd = '0';
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $all_quantity = mysqli_real_escape_string($db, $_POST['all_quantity']);
  $total3 = mysqli_real_escape_string($db, $_POST['total3']);

  $total_service_tax = mysqli_real_escape_string($db, $_POST['total_service_tax']);
  $total_service_tax_amount = mysqli_real_escape_string($db, $_POST['total_service_tax_amount']);
  $total_product_purchase_amount = mysqli_real_escape_string($db, $_POST['total_product_purchase_amount']);

  $post_date_time = date("d-m-Y H:i:s");
  $repair_date = date("Y-m-d");

   $data_customer = $db->query("SELECT opening_dues FROM customer_managment WHERE id='$customer_id'");
   $value_customer = $data_customer->fetch_object();
   $pre_dues = $value_customer->opening_dues;


 $query = $db->query("INSERT INTO `repair_managment`(`store_id`, `user_id`, `customer_id`, `imei`, `password`, `customer_remark`, `problem_diagnosis`, `est_repair_time`, `risk`, `repair_mode`, `engineer_id`, `engineer_code`, `salesman`, `warranty_in_days`, `status`, `total_2`, `service_charge`, `service_charge_tax`, `total_service_charge`, `miscs_name`, `total_miscs`, `total_cd`, `round_off`, `total_quntity`, `total_amount`, `total_service_tax`, `total_service_tax_amount`, `total_product_purchase_amount`, `task`, `repair_date`, `date`) VALUES ('$store_id','$user_id','$customer_id','$imei','$password','$customer_remark','$problem_diagnosis','$est_repair_time','$risk','$repair_mode','$engineer_id','$engineer_code','$salesman','$warranty_in_days','$status','$total_2','$service_charge','$service_charge_tax','$total_service_charge','$miscs_name','$total_miscs','$total_cashd','$round_off','$all_quantity','$total3','$total_service_tax','$total_service_tax_amount','$total_product_purchase_amount','pending','$repair_date','$post_date_time')");
  
    //photo upload ends

 


 $work_id = $db->insert_id;


 if ($query) {

    if(!empty($_POST["product_id"])){

        $work_id = $work_id;  

    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $sub_variation_id = $_POST['sub_variation_id'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $discount_invoice = $_POST['discount_invoice'];
     $gst_invoice = $_POST['gst_invoice'];
    $total_amount_first = $_POST['total_amount_first'];
    $total_gst_amount_first = $_POST['total_gst_amount_first'];
    $total_purchase_amount_first = $_POST['total_purchase_amount_first'];

    for($i=0; $i<count($_POST["product_id"]); $i++)
    {
        $result2 = $db->query("INSERT INTO `repair_product_details`(`repair_id`, `product_id`, `variation_id`, `sub_variation_id`, `quantity`, `rate`, `discount`, `gst`, `total_gst_amount_first`, `total_purchase_amount_first`, `amount`) VALUES ('$work_id','$product_id[$i]','$variation_id[$i]','$sub_variation_id[$i]','$quantity_invoice[$i]','$rate_invoice[$i]','$discount_invoice[$i]','$gst_invoice[$i]','$total_gst_amount_first','$total_purchase_amount_first ','$total_amount_first[$i]')");
    }

    }
    
 }


   
   if($query || $result2){

  

      $next_dues = $cost+$pre_dues;

       $db->query("UPDATE `customer_managment` SET `opening_dues`='$next_dues' WHERE id='$customer_id'");

      $db->query("INSERT INTO `eng_task`(`store_id`, `user_id`, `customer_id`, `work_id`, `work_name`, `given_id`, `taker_id`, `task_asigned`, `work_status`, `date`) VALUES ('$store_id','$user_id','$customer_id','$work_id','Repair','$salesman','$engineer_code','salesman','Pending','$post_date_time')");

     
     $data = $db->query("SELECT order_number FROM order_managment WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->order_number;
if(empty($recipt_name))
{
  $freciept_name = "ORD-0001";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = "ORD-".'000'.$exe_value;
}


      $db->query("INSERT INTO `order_managment`(`store_id`, `user_id`, `customer_id`, `repair_type`, `order_number`, `order_id`, `order_date`, `warranty_in_days`, `order_status`, `order_payment_status`, `order_amount`, `status`, `date`) VALUES ('$store_id','$user_id','$customer_id','repair','$freciept_name','$work_id','$post_date_time','$warranty_in_days','pending','Unpaid','$total3','enable','$post_date_time')");



      $query_ledger = $db->query("SELECT blance_amount FROM `customer_ledger` WHERE `store_id`='$store_id' AND `employee_id`='$user_id' AND `customer_id`='$customer_id' ORDER BY id DESC LIMIT 1");
       $value_ledger_balance_amount = $query_ledger->fetch_object();
       $old_blance_amount = $value_ledger_balance_amount->blance_amount;
       $new_old_blance = $old_blance_amount+$total3;



      $db->query("INSERT INTO `customer_ledger`(`store_id`, `employee_id`, `customer_id`, `doc_id`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`, `db_cr`, `status`) VALUES ('$store_id','$user_id','$customer_id','$work_id','$work_id','$post_date_time','Repair','0','$total3','$new_old_blance','db','enable')");



      $_SESSION['msg'] = md5('5');
    header("location:repair_management_list.php");
   }else{
      $_SESSION['msg'] = md5('5');
    header("location:repair_management_list.php");
   }
 
   
    
	break;
  case'update':




  $repair_id = $_POST['repair_id'];

   
  $store_id = mysqli_real_escape_string($db, $_POST['store_id']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);

   $customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);

  $imei = mysqli_real_escape_string($db, $_POST['imei']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $customer_remark = mysqli_real_escape_string($db, $_POST['customer_remark']);     
  $problem_diagnosis = mysqli_real_escape_string($db, $_POST['problem_diagnosis']);
  $est_repair_time = mysqli_real_escape_string($db, $_POST['est_repair_time']);
  $risk = mysqli_real_escape_string($db, $_POST['risk']);   
  $repair_mode = mysqli_real_escape_string($db, $_POST['repair_mode']);
  $engineer_id = mysqli_real_escape_string($db, $_POST['engineer_id']);
  $engineer_code = mysqli_real_escape_string($db, $_POST['engineer_id']);
  $salesman = mysqli_real_escape_string($db, $_POST['salesman']);
  $warranty_in_days = mysqli_real_escape_string($db, $_POST['warranty_in_days']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $total_2 = mysqli_real_escape_string($db, $_POST['total_2']);
  $service_charge = mysqli_real_escape_string($db, $_POST['service_charge']);
  $service_charge_tax = mysqli_real_escape_string($db, $_POST['service_charge_tax']);
  $total_service_charge = mysqli_real_escape_string($db, $_POST['total_service_charge']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $total_cashd = '0';
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $all_quantity = mysqli_real_escape_string($db, $_POST['all_quantity']);
  $total3 = mysqli_real_escape_string($db, $_POST['total3']);
  $post_date_time = date("d-m-Y H:i:s");
    $repair_date = date("Y-m-d");
  
     $result1 = $db->query("UPDATE `repair_managment` SET `store_id`='$store_id',`user_id`='$user_id',`customer_id`='$customer_id',`imei`='$imei',`password`='$password',`customer_remark`='$customer_remark',`problem_diagnosis`='$problem_diagnosis',`est_repair_time`='$est_repair_time',`risk`='$risk',`repair_mode`='$repair_mode',`engineer_id`='$engineer_id',`engineer_code`='$engineer_code',`salesman`='$salesman',`warranty_in_days`='$warranty_in_days',`status`='$status',`total_2`='$total_2',`service_charge`='$service_charge',`service_charge_tax`='$service_charge_tax',`total_service_charge`='$total_service_charge',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`total_cd`='$total_cashd',`round_off`='$round_off',`total_quntity`='$all_quantity',`total_amount`='$total3',`repair_date`='$repair_date',`date`='$post_date_time' WHERE id='$repair_id'");


     $query_get_data = $db->query("SELECT * FROM order_managment WHERE store_id='$store_id' AND order_id='$repair_id'");
  if($query_get_data->num_rows > 0){
     
  }else{

    $data = $db->query("SELECT order_number FROM order_managment WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->order_number;
if(empty($recipt_name))
{
  $freciept_name = "ORD-0001";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = "ORD-".'000'.$exe_value;
}


    $db->query("INSERT INTO `order_managment`(`store_id`, `user_id`, `customer_id`, `repair_type`, `order_number`, `order_id`, `order_date`, `warranty_in_days`, `order_status`, `order_payment_status`, `order_amount`, `status`, `date`) VALUES ('$store_id','$user_id','$customer_id','repair','$freciept_name','$repair_id','$post_date_time','$warranty_in_days','pending','Unpaid','$total3','enable','$post_date_time')");
  } 


  $query_get_data2 = $db->query("SELECT * FROM eng_task WHERE store_id='$store_id' AND work_id='$repair_id'");
  if($query_get_data2->num_rows > 0){
     
  }else{

    $db->query("INSERT INTO `eng_task`(`store_id`, `user_id`, `customer_id`, `work_id`, `work_name`, `given_id`, `taker_id`, `task_asigned`, `work_status`, `date`) VALUES ('$store_id','$user_id','$customer_id','$repair_id','Repair','$salesman','$engineer_code','salesman','Pending','$post_date_time')");
  }


  
    if(!empty($_POST["product_id"])){
    
    $repair_id = $repair_id;
    $post_id_update = $_POST['post_id_update'];
    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $sub_variation_id = $_POST['sub_variation_id'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $discount_invoice = $_POST['discount_invoice'];
    $gst_invoice = $_POST['gst_invoice'];
    $total_amount_first = $_POST['total_amount_first'];

    for($p=0; $p<count($_POST["product_id"]); $p++)
    {
        $result3 = $db->query("UPDATE `repair_product_details` SET `repair_id`='$repair_id',`product_id`='$product_id[$p]',`variation_id`='$variation_id[$p]',`sub_variation_id`='$sub_variation_id[$p]',`quantity`='$quantity_invoice[$p]',`rate`='$rate_invoice[$p]',`discount`='$discount_invoice[$p]',`gst`='$gst_invoice[$p]',`amount`='$total_amount_first[$p]' WHERE id='$post_id_update[$p]'");
    }
  }


  if($result1 || $result3){


      $_SESSION['msg'] = md5('6');
    header("location:repair_management_list.php");
  }

  
  
    //photo upload end	

   break;
  case 'delete':
   $post_id = $_GET['post'];
  
	   $db->query("DELETE FROM repair_managment WHERE  id = '$post_id'");
       $db->query("DELETE FROM repair_product_details WHERE  repair_id = '$post_id'");
   
 $_SESSION['msg'] = md5('7');
header("location:repair_management_list.php");

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
