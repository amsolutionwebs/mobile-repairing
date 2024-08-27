<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {

  case'update':
  $post_id = $_GET['post_id'];
  $post_date_time = date("Y-m-d H:i:s");



  $data_order = $db->query("SELECT order_id FROM order_managment WHERE id='$post_id'");
  $value_order = $data_order->fetch_object();
  
  

  $data_repair = $db->query("SELECT * FROM repair_managment WHERE id='$value_order->order_id'");
  $value_repair = $data_repair->fetch_object();
  $store_id = $value_repair->store_id;
  $user_id = $value_repair->user_id;
  $customer_id = $value_repair->customer_id;
  $cost = $value_repair->total_amount;

  $data_cs = $db->query("SELECT opening_dues FROM customer_managment WHERE id='$customer_id'");
  $value_cs = $data_cs->fetch_object();
  $opening_dues = $value_cs->opening_dues;

  $new_opening_dues = $opening_dues-$cost;

   $query_ledger = $db->query("SELECT blance_amount FROM `customer_ledger` WHERE `store_id`='$value_order->store_id' AND `employee_id`='$value_order->user_id' AND `customer_id`='$customer_id' ORDER BY id DESC LIMIT 1");
       $value_ledger_balance_amount = $query_ledger->fetch_object();
       $old_blance_amount = $value_ledger_balance_amount->blance_amount;
       $new_old_blance = $old_blance_amount-$cost;

 $db->query("INSERT INTO `customer_ledger`(`store_id`, `employee_id`, `customer_id`, `doc_id`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`, `db_cr`, `status`) VALUES ('$store_id','$user_id','$customer_id','$post_id','$post_id','$post_date_time','Repair','$cost','0','$new_old_blance','db','enable')");

  $db->query("INSERT INTO `customer_ledger`(`store_id`, `employee_id`, `customer_id`, `doc_id`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`, `db_cr`, `status`) VALUES ('$store_id','$user_id','$customer_id','$post_id','$post_id','$post_date_time','Repair','$cost','0','$new_old_blance','db','enable')");

 $db->query("UPDATE `order_managment` SET `order_payment_status`='Paid',`payment_date`='$post_date_time' WHERE id='$post_id'");
 $db->query("UPDATE `customer_managment` SET `opening_dues`='$new_opening_dues' WHERE id='$customer_id'"); 

  $_SESSION['msg'] = md5('6');
    header("location:order_management_list.php");
  
  
  
    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}