<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
     
 
  $refrence = mysqli_real_escape_string($db, $_POST['refrence']);
  $credit_note_number = mysqli_real_escape_string($db, $_POST['credit_note_number']);
  $credit_note_date = mysqli_real_escape_string($db, $_POST['debit_note_date']);
  
  $default_mill_code = mysqli_real_escape_string($db, $_POST['default_mill_code']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $sub_mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
  $sub_mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  
  
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $invoice_number = mysqli_real_escape_string($db, $_POST['invoice_number']);
  
  $total_credit_note_amount = mysqli_real_escape_string($db, $_POST['total_credit_note_amount']);
  $doc_encl = mysqli_real_escape_string($db, $_POST['doc_encl']);
  $transporter = mysqli_real_escape_string($db, $_POST['transporter']);
  $lr_no = mysqli_real_escape_string($db, $_POST['lr_no']);
  $lr_date = mysqli_real_escape_string($db, $_POST['lr_date']);
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $post_date_time = date("Y-m-d H:i:s");

  if($refrence==='Goods_Return'){
  	


  $total_first = mysqli_real_escape_string($db, $_POST['total_2']);  
  $insurance = mysqli_real_escape_string($db, $_POST['insurance']);
  $total_insurance = mysqli_real_escape_string($db, $_POST['total_insurance']);
  $cashdiscount = mysqli_real_escape_string($db, $_POST['cashd']);
  $total_cashd = mysqli_real_escape_string($db, $_POST['total_cashd']);
  $cgst = mysqli_real_escape_string($db, $_POST['cgst']);
  $total_cgst = mysqli_real_escape_string($db, $_POST['total_cgst']);
  $sgst = mysqli_real_escape_string($db, $_POST['sgst']);
  $total_sgst = mysqli_real_escape_string($db, $_POST['total_sgst']);
  $igst = mysqli_real_escape_string($db, $_POST['igst']);  
  $total_igst = mysqli_real_escape_string($db, $_POST['total_igst']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $units = mysqli_real_escape_string($db, $_POST['units']);
  $all_total_amount = mysqli_real_escape_string($db, $_POST['total3']);



   $query_wo = $db->query("SELECT * FROM credit_note WHERE credit_note_number='$credit_note_number' AND company_id='$company_id'");
  if($query_wo->num_rows > 0){
      $_SESSION['msg'] = md5('p_error');
      header("location:credit_note_list.php");
  }else{


  $result_one = $db->query("INSERT INTO `credit_note`(`company_id`, `default_mill_code`, `mill_code`, `mill_name`, `sub_mill_code`, `sub_mill_name`, `broker_code`, `dealer_code`, `dealer_name`, `credit_note_number`, `credit_note_date`, `refrence`, `invoice_number`, `doc_encl`, `transporter`, `lr_no`, `lr_date`, `total_credit_note_amount`, `remark`, `status`, `date`) VALUES ('$company_id','$default_mill_code','$mill_code','$mill_name','$sub_mill_code','$sub_mill_name','$broker_code','$dealer_code','$dealer_name','$credit_note_number','$credit_note_date','$refrence','$invoice_number','$doc_encl','$transporter','$lr_no','$lr_date','$all_total_amount','$remark','unpaid','$post_date_time')");


     $credit_note_id = $db->insert_id;


     $result_two = $db->query("INSERT INTO `credit_note_payment_details`(`credit_note_id`, `total_first`, `insurance`, `total_insurance`, `cashdiscount`, `total_cashdiscount`, `cgst`, `total_cgst`, `sgst`, `total_sgst`, `igst`, `total_igst`, `misc_name`, `misc_value`, `round_off`, `units`, `all_total_amount`, `status`) VALUES ('$credit_note_id','$total_first','$insurance','$total_insurance','$cashdiscount','$total_cashd','$cgst','$total_cgst','$sgst','$total_sgst','$igst','$total_igst','$miscs_name','$total_miscs','$round_off','$units','$all_total_amount','enable')");



    //photo upload ends
 if ($result_one) {


    $invoice_id = mysqli_real_escape_string($db, $_POST['invoice_number']); 
    $sort_no = $_POST['sort_no'];
    $hsn_code = $_POST['hsn_code'];
    $unit_messure = $_POST['unit_messure'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $total_amount_first = $_POST['total_amount_first'];

    for($i=0; $i<count($_POST["sort_no"]); $i++)
    {
        $result1 = $db->query("INSERT INTO `credit_note_sort_data`(`credit_note_id`, `invoice_id`, `sort_id`, `hsn_code`, `units`, `quantity`, `rate`, `total_one`) VALUES ('$credit_note_id','$invoice_id','$sort_no[$i]','$hsn_code[$i]','$unit_messure[$i]','$quantity_invoice[$i]','$rate_invoice[$i]','$total_amount_first[$i]')");


    }

     if ($result1) {
         
         $query_invoice_by_miil = $db->query("SELECT * FROM `invoice` WHERE `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_old_inv = $query_invoice_by_miil->fetch_object();
 

     $query_ledger = $db->query("SELECT blance_amount FROM `ledger` WHERE `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_ledger_balance_amount = $query_ledger->fetch_object();
 $old_blance_amount = $value_ledger_balance_amount->blance_amount;
 $new_old_blance = $old_blance_amount+$all_total_amount;
 

   $query_ledger_final=$db->query("INSERT INTO `ledger`(`company_id`, `default_mill_code`,`dealer_code`,`doc_id`,`invoice_number`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`, `db_cr`, `status`) VALUES ('$company_id','$default_mill_code','$dealer_code','$credit_note_id','$invoice_number','$credit_note_number','$credit_note_date','credit_note','$all_total_amount','0.00','$new_old_blance','Db','enable')");

   if($query_ledger_final){
    $_SESSION['msg'] = md5('6');
      echo "<script>alert('success');window.location='credit_note_list.php';</script>";
   }

      
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='credit_note_list.php';</script>";
    }
 

 }else{
     $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Failed Debit Note Insert');window.location='credit_note_list.php';</script>";
 }




  }













  }else{
  	 $query_wo = $db->query("SELECT * FROM credit_note WHERE credit_note_number='$credit_note_number' AND company_id='$company_id'");
  if($query_wo->num_rows > 0){
      $_SESSION['msg'] = md5('p_error');
      header("location:credit_note_list.php");
  }else{
 
 $result_without_goods = $db->query("INSERT INTO `credit_note`(`company_id`, `default_mill_code`, `mill_code`, `mill_name`, `sub_mill_code`, `sub_mill_name`, `broker_code`, `dealer_code`, `dealer_name`, `credit_note_number`, `credit_note_date`, `refrence`, `invoice_number`, `doc_encl`, `transporter`, `lr_no`, `lr_date`, `total_credit_note_amount`, `remark`, `status`, `date`) VALUES ('$company_id','$default_mill_code','$mill_code','$mill_name','$sub_mill_code','$sub_mill_name','$broker_code','$dealer_code','$dealer_name','$credit_note_number','$credit_note_date','$refrence','$invoice_number','$doc_encl','$transporter','$lr_no','$lr_date','$total_credit_note_amount','$remark','unpaid','$post_date_time')");

 $debit_note_id2 = $db->insert_id;

   if ($result_without_goods) {

 
      $query_invoice_by_miil = $db->query("SELECT * FROM `invoice` WHERE `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_old_inv = $query_invoice_by_miil->fetch_object();
 

     $query_ledger = $db->query("SELECT blance_amount FROM `ledger` WHERE `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_ledger_balance_amount = $query_ledger->fetch_object();
 $old_blance_amount = $value_ledger_balance_amount->blance_amount;
 $new_old_blance = $old_blance_amount+$total_credit_note_amount;
 
 
 

   $query_ledger_final=$db->query("INSERT INTO `ledger`(`company_id`, `default_mill_code`,`dealer_code`,`doc_id`,`invoice_number`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`,`db_cr`,`status`) VALUES ('$company_id','$default_mill_code','$dealer_code','$debit_note_id2','$invoice_number','$credit_note_number','$credit_note_date','credit_note','$total_credit_note_amount','0.00','$new_old_blance','Db','enable')");

  if($query_ledger_final){
      $_SESSION['msg'] = md5('6');
     echo "<script>alert('Success');window.location='credit_note_list.php';</script>";
  }

      
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='credit_note_list.php';</script>";
    }
}
  }
 
  
    
  
   break;
  case 'delete':
   $post_id = $_GET['post'];
 
      

       $query_wo = $db->query("SELECT refrence FROM credit_note WHERE id='$post_id'");
       $data_debit = $query_wo->fetch_object();
       $refrence =  $data_debit->refrence;

       if($refrence==='Goods_Return'){
       	$db->query("DELETE FROM credit_note WHERE id='$post_id'");
       	$db->query("DELETE FROM credit_note_sort_data WHERE credit_note_id='$post_id'");
        $db->query("DELETE FROM credit_note_payment_details WHERE credit_note_id='$post_id'");
        $db->query("DELETE FROM `ledger` WHERE doc_id='$post_id'");
       
       	 $_SESSION['msg'] = md5('7');
        header("location:credit_note_list.php");
       }else{
       	$db->query("DELETE FROM credit_note WHERE id='$post_id'");
        $db->query("DELETE FROM `ledger` WHERE doc_id='$post_id'");
       	 $_SESSION['msg'] = md5('7');
         header("location:credit_note_list.php");
       }
    


    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
