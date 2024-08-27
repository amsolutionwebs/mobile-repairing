<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
case 'publish':
     
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

  $all_total_amount = mysqli_real_escape_string($db, $_POST['total3']);

  $query = $db->query("SELECT * FROM invoice WHERE company_id='$company_id' AND  default_mill_code='$default_mill_code' AND invoice_number='$invoice_number'");
  if($query->num_rows > 0){
      $_SESSION['msg'] = md5('p_error');
      header("location:invoice_list.php");
  }else{
 
  $query_invoice_by_miil = $db->query("SELECT * FROM `invoice` WHERE `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_old_inv = $query_invoice_by_miil->fetch_object();
 if(empty($value_old_inv)){
     $query_ledger_final=$db->query("INSERT INTO `ledger`(`company_id`, `default_mill_code`,`dealer_code`,`doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`,`db_cr`,`status`) VALUES ('$company_id','$default_mill_code','$dealer_code','$invoice_number','$invoice_date','invoice','$all_total_amount','0.00','$all_total_amount','Db','enable')");
       $ledger_id = $db->insert_id;
 }else{
     $query_legder_find = $db->query("SELECT * FROM `ledger` WHERE  `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
     
     $value_old_ledger_bb = $query_legder_find->fetch_object();
     $ledger_old = $value_old_ledger_bb->blance_amount;
     $secont_f = $ledger_old+$all_total_amount;

     
     $query_ledger_final=$db->query("INSERT INTO `ledger`(`company_id`, `default_mill_code`,`dealer_code`,`doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`,`db_cr`,`status`) VALUES ('$company_id','$default_mill_code','$dealer_code','$invoice_number','$invoice_date','invoice','$all_total_amount','0.00','$secont_f','Db','enable')");
     
       $ledger_id = $db->insert_id;
 }
 
 
 $result_one = $db->query("INSERT INTO `invoice`(`company_id`, `default_mill_code`, `mill_code`, `mill_name`, `sub_mill_code`, `sub_mill_name`, `broker_code`, `dealer_code`, `dealer_name`, `indent_no`, `invoice_number`, `invoice_date`, `document_through`, `doc_encl`, `transporter`, `lr_no`, `lr_date`, `currency`, `status`, `date`) VALUES ('$company_id','$default_mill_code','$mill_code','$mill_name','$sub_mill_code','$sub_mill_name','$broker_code','$dealer_code','$dealer_name','$indent_no','$invoice_number','$invoice_date','$document_through','$doc_encl','$transporter','$lr_no','$lr_date','$currency','unpaid','$post_date_time')");


  $invoice_id = $db->insert_id;
    
    $db->query("UPDATE `ledger` SET `doc_id`='$invoice_id',`invoice_number`='$invoice_id' WHERE id='$ledger_id'");

 
    //photo upload ends
 if ($result_one) {
  $indent_id = mysqli_real_escape_string($db, $_POST['indent_no']);
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

 $result_two = $db->query("UPDATE `invoice` SET `total_first`='$total_first',`insurance`='$insurance',`total_insurance`='$total_insurance',`cashdiscount`='$cashdiscount',`total_cashdiscount`='$total_cashd',`cgst`='$cgst',`total_cgst`='$total_cgst',`sgst`='$sgst',`total_sgst`='$total_sgst',`igst`='$igst',`total_igst`='$total_igst',`misc_name`='$miscs_name',`misc_value`='$total_miscs',`round_off`='$round_off',`units`='$units',`all_total_amount`='$all_total_amount', `payment_amount`='$all_total_amount' WHERE `company_id`='$company_id' AND id='$invoice_id'");



 if ($result_two) {
      $invoice_id = $invoice_id;  
    $indent_id = mysqli_real_escape_string($db, $_POST['indent_no']);
    $sort_no = $_POST['sort_no'];
    $hsn_code = $_POST['hsn_code'];
    $unit_messure = $_POST['unit_messure'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $total_amount_first = $_POST['total_amount_first'];

    for($i=0; $i<count($_POST["sort_no"]); $i++)
    {
        $result1 = $db->query("INSERT INTO `invoice_sort_date`(`invoice_id`, `indent_id`, `sort_id`, `hsn_code`, `units`, `quantity`, `rate`, `total_one`) VALUES ('$invoice_id','$indent_id','$sort_no[$i]','$hsn_code[$i]','$unit_messure[$i]','$quantity_invoice[$i]','$rate_invoice[$i]','$total_amount_first[$i]')");

        $query_indent = $db->query("SELECT paid_quantity FROM `indent_plus` WHERE id='$sort_no[$i]'");
 $value_indent = $query_indent->fetch_object();
 $old_indent_quantity = $value_indent->paid_quantity;
 $new_indent_quanity = $old_indent_quantity+$quantity_invoice[$i];

     $db->query("UPDATE `indent_plus` SET `paid_quantity`=' $new_indent_quanity' WHERE id='$sort_no[$i]'");
    
    }

     if ($result1) {
        

    $_SESSION['msg'] = md5('5');
      echo "<script>alert('success');window.location='invoice_list.php';</script>";    

    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='invoice_list.php';</script>";
    }
 }else{
     $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Failed Invoice Updated');window.location='invoice_list.php';</script>";
 }

 }else{
     $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('Failed Invoice Insert');window.location='invoice_list.php';</script>";
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
