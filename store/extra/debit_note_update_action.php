<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'update':
     
  $post_id = $_POST['post_id'];
  $refrence = mysqli_real_escape_string($db, $_POST['refrence']);
  $debit_note_number = mysqli_real_escape_string($db, $_POST['debit_note_number']);
  $debit_note_date = mysqli_real_escape_string($db, $_POST['debit_note_date']);
  $sub_mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
  $sub_mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $invoice_number = mysqli_real_escape_string($db, $_POST['invoice_number']);
  $invoice_date = mysqli_real_escape_string($db, $_POST['invoice_date']);
  $total_debit_amount = mysqli_real_escape_string($db, $_POST['total_debit_amount']);
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



  $result_one = $db->query("UPDATE `debit_note` SET `company_id`='$company_id',`mill_code`='$mill_code',`mill_name`='$mill_name',`sub_mill_code`='$sub_mill_code',`sub_mill_name`='$sub_mill_name',`broker_code`='$broker_code',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`debit_note_number`='$debit_note_number',`debit_note_date`='$debit_note_date',`refrence`='$refrence',`invoice_number`='$invoice_number',`doc_encl`='$doc_encl',`transporter`='$transporter',`lr_no`='$lr_no',`lr_date`='$lr_date',`total_debit_amount`='$all_total_amount',`remark`='$remark',`date`='$post_date_time' WHERE `id`='$post_id'");

$result_two = $db->query("UPDATE `debit_note_payment_details` SET `total_first`='$total_first',`insurance`='$insurance',`total_insurance`='$total_insurance',`cashdiscount`='$cashdiscount',`total_cashdiscount`='$total_cashd',`cgst`='$cgst',`total_cgst`='$total_cgst',`sgst`='$sgst',`total_sgst`='$total_sgst',`igst`='$igst',`total_igst`='$total_igst',`misc_name`='$miscs_name',`misc_value`='$total_miscs',`round_off`='$round_off',`units`='$units',`all_total_amount`='$all_total_amount',`status`='enable' WHERE `debit_note_id`='$post_id'");





    //photo upload ends
 if ($result_one) {

    $post_id = $_POST['post_id'];
    $invoice_id = mysqli_real_escape_string($db, $_POST['invoice_number']); 
    $sort_no = $_POST['sort_no'];
    $hsn_code = $_POST['hsn_code'];
    $unit_messure = $_POST['unit_messure'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $total_amount_first = $_POST['total_amount_first'];
    $sort_post_id = $_POST['sort_post_id'];

    for($i=0; $i<count($_POST["sort_no"]); $i++)
    {
        $result1 = $db->query("UPDATE `debit_note_sort_data` SET `debit_note_id`='$post_id',`invoice_id`='$invoice_id',`sort_id`='$sort_no[$i]',`hsn_code`='$hsn_code[$i]',`units`='$unit_messure[$i]',`quantity`='$quantity_invoice[$i]',`rate`='$rate_invoice[$i]',`total_one`='$total_amount_first[$i]' WHERE `id`='$sort_post_id[$i]'");


    }

     if ($result1) {
      $_SESSION['msg'] = md5('5');
      echo "<script>alert('update success');window.location='debit_note_list.php';</script>";
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Updatetion failed');window.location='debit_note_list.php';</script>";
    }
 

 }else{
     $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Failed Debit Note Insert');window.location='debit_note_list.php';</script>";
 }


  }else{
  
 
 $result_without_goods = $db->query("UPDATE `debit_note` SET `company_id`='$company_id',`mill_code`='$mill_code',`mill_name`='$mill_name',`sub_mill_code`='$sub_mill_code',`sub_mill_name`='$sub_mill_name',`broker_code`='$broker_code',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`debit_note_number`='$debit_note_number',`debit_note_date`='$debit_note_date',`refrence`='$refrence',`invoice_number`='$invoice_number',`doc_encl`='$doc_encl',`transporter`='$transporter',`lr_no`='$lr_no',`lr_date`='$lr_date',`total_debit_amount`='$total_debit_amount',`remark`='$remark',`date`='$post_date_time' WHERE `id`='$post_id'");



   if ($result_without_goods) {
      $_SESSION['msg'] = md5('5');
      echo "<script>alert('Update success');window.location='debit_note_list.php';</script>";
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Update failed');window.location='debit_note_list.php';</script>";
    }

  }
 
  
    
   break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
