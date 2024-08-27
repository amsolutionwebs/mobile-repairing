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
  $employee_id = mysqli_real_escape_string($db, $_POST['employee_id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $mobile_number = mysqli_real_escape_string($db, $_POST['mobile_number']);
  $whatsapp_number = mysqli_real_escape_string($db, $_POST['whatsapp_number']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $type_of_customer = mysqli_real_escape_string($db, $_POST['type_of_customer']);
  $opening_dues = mysqli_real_escape_string($db, $_POST['opening_dues']);
  $credit_threshold = mysqli_real_escape_string($db, $_POST['credit_threshold']);  	
  $referal_id = mysqli_real_escape_string($db, $_POST['referal_id']);
  $coming_referal_id = mysqli_real_escape_string($db, $_POST['coming_referal_id']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $post_date_time = date("d-m-Y");

 $query = $db->query("SELECT * FROM customer_managment WHERE name='$name' AND mobile_number='$mobile_number'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  header("location:customer_management_list.php?msg=" . md5('p_error') . "");
  }else{
 

 $query1 = $db->query("INSERT INTO `customer_managment`(`store_id`, `employee_id`, `name`, `mobile_number`, `whatsapp_number`, `email_id`, `type_of_customer`, `opening_dues`, `credit_threshold`, `referal_id`, `coming_referal_id`, `status`, `date`) VALUES ('$store_id','$employee_id','$name','$mobile_number','$whatsapp_number','$email_id','$type_of_customer','$opening_dues','$credit_threshold','$referal_id','$coming_referal_id','$status','$post_date_time')");
  
    //photo upload ends

 if ($query1) {
 	$customer_id = $db->insert_id;

 	 $query_ledger = $db->query("SELECT blance_amount FROM `customer_ledger` WHERE `store_id`='$store_id' AND `employee_id`='$employee_id' AND `customer_id`='$customer_id' ORDER BY id DESC LIMIT 1");
       $value_ledger_balance_amount = $query_ledger->fetch_object();
       $old_blance_amount = $value_ledger_balance_amount->blance_amount;
       $new_old_blance = $old_blance_amount+$opening_dues;

 $query_ledger_final = $db->query("INSERT INTO `customer_ledger`(`store_id`, `employee_id`, `customer_id`, `doc_id`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`, `db_cr`, `status`) VALUES ('$store_id','$employee_id','$customer_id','$customer_id','$customer_id','$post_date_time','opening_dues','0','$new_old_blance','$new_old_blance','db','enable')");

if ($query_ledger_final) {
	$_SESSION['msg'] = md5('5');
	echo "success";
}else{
	$_SESSION['msg'] = md5('p_error');
	echo "failed";
}
 }else{
 	$_SESSION['msg'] = md5('p_error');
 	echo "failed";
 }

 

 
	
    
   
  }
 
   
    
	

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
