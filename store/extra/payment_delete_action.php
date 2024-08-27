<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
 case'delete':


    $post_id = $_GET['post'];
    $data_payment = $db->query("SELECT * FROM payment WHERE id='$post_id'");
    $value_payment = $data_payment->fetch_object();
    $total_payment = $value_payment->total_payment_two;

    $data1 = $db->query("SELECT * FROM payment_invoice_details WHERE payment_id='$post_id'");
                    while ($value = $data1->fetch_object()) {
                       
    $data_invoice = $db->query("SELECT * FROM invoice WHERE id='$value->invoice_number'");
    $value_invoice = $data_invoice->fetch_object();
    $oldpayamount = $value_invoice->payment_amount;
    
    
     $data_debit3 = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$post_id' AND `invoice_number`='$value->invoice_number'");
    $value_debit3 = $data_debit3->fetch_object();
    $pp_total_debit_note_amount = $value_debit3->total_debit_note_amount;
    
    $data_credit3 = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$post_id' AND `invoice_number`='$value->invoice_number'");
    $value_credit3 = $data_credit3->fetch_object();
    $pp_total_credit_note_amount = $value_credit3->total_credit_note_amount;
    

    $return_amount = $oldpayamount+$value->payment_amount+$pp_total_debit_note_amount-$pp_total_credit_note_amount;
    
    $db->query("UPDATE `invoice` SET `payment_amount`='$return_amount',`status`='unpaid' WHERE `id`='$value->invoice_number'");
     
}


$data_debit2 = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$post_id'");
while ( $value_debit2 = $data_debit2->fetch_object()) {
    $db->query("UPDATE `debit_note` SET `status`='unpaid' WHERE id='$value_debit2->debit_note_number'");
 }

$data_credit_note2 = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$post_id'");
while ( $value_credit_note2 = $data_credit_note2->fetch_object()) {
    $db->query("UPDATE `credit_note` SET `status`='unpaid' WHERE id='$value_credit_note2->credit_note_number'");
 }

 $db->query("DELETE FROM payment WHERE id='$post_id'");
      $db->query("DELETE FROM payment_details WHERE payment_id='$post_id'");
      $db->query("DELETE FROM payment_invoice_details WHERE payment_id='$post_id'");
      $db->query("DELETE FROM payment_debit_details WHERE payment_id='$post_id'");
      $db->query("DELETE FROM payment_credit_details WHERE payment_id='$post_id'");
      $db->query("DELETE FROM `ledger` WHERE doc_id='$post_id'");  
  
$_SESSION['msg'] = md5('7');
header("location:payment_list.php");


    

break;
default:
$_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
