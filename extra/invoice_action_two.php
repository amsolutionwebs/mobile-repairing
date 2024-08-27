<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
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
  
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $post_date_time = date("Y-m-d H:i:s");

  
   $result_one =  $db->query("UPDATE `invoice` SET `company_id`='$company_id',`default_mill_code`='$default_mill_code',`mill_code`='$mill_code',`mill_name`='$mill_name',`sub_mill_code`='$sub_mill_code',`sub_mill_name`='$sub_mill_name',`broker_code`='$broker_code',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`indent_no`='$indent_no',`invoice_number`='$invoice_number',`invoice_date`='$invoice_date',`document_through`='$document_through',`doc_encl`='$doc_encl',`transporter`='$transporter',`lr_no`='$lr_no',`lr_date`='$lr_date',`currency`='$currency',`date`='$post_date_time',`total_first`='$total_first',`insurance`='$insurance',`total_insurance`='$total_insurance',`cashdiscount`='$cashdiscount',`total_cashdiscount`='$total_cashd',`cgst`='$cgst',`total_cgst`='$total_cgst',`sgst`='$sgst',`total_sgst`='$total_sgst',`igst`='$igst',`total_igst`='$total_igst',`misc_name`='$miscs_name',`misc_value`='$total_miscs',`round_off`='$round_off',`units`='$units',`all_total_amount`='$all_total_amount', `payment_amount`='$all_total_amount' WHERE id='$post_id'");

   if ($result_one) {
   	$invoice_id = mysqli_real_escape_string($db, $_POST['invoice_id']);  
    $indent_id = mysqli_real_escape_string($db, $_POST['indent_id']);
    $sort_no = $_POST['sort_no'];
    $hsn_code = $_POST['hsn_code'];
    $unit_messure = $_POST['unit_messure'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $total_amount_first = $_POST['total_amount_first'];
    $sort_post_id = $_POST['sort_post_id'];

    for($i=0; $i<count($_POST["sort_no"]); $i++)
    {
        $result1 = $db->query("UPDATE `invoice_sort_date` SET `invoice_id`='$invoice_id',`indent_id`='$indent_id',`sort_id`='$sort_no[$i]',`hsn_code`='$hsn_code[$i]',`units`='$unit_messure[$i]',`quantity`='$quantity_invoice[$i]',`rate`='$rate_invoice[$i]',`total_one`='$total_amount_first[$i]' WHERE id='$sort_post_id[$i]'");

    }

     if ($result1) {
      $_SESSION['msg'] = md5('6');
     echo "<script>alert('success');window.location='invoice_list.php';</script>";
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='invoice_list.php';</script>";
    }
   }


    

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
