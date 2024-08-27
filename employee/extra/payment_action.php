<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
 case'publish':

  $payment_ref = mysqli_real_escape_string($db, $_POST['payment_ref']);
  $payment_date = mysqli_real_escape_string($db, $_POST['payment_date']);
  $default_mill_code = mysqli_real_escape_string($db, $_POST['default_mill_code']);
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $sub_mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
  $sub_mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $broker_code = mysqli_real_escape_string($db, $_POST['broker_code']);
  $total_payment_one = mysqli_real_escape_string($db, $_POST['total_payment_one']);
  $total_payment_two = mysqli_real_escape_string($db, $_POST['total_payment_two']);
  $remark_payment_details = mysqli_real_escape_string($db, $_POST['remark_payment_details']);
  $final_invoice_value = mysqli_real_escape_string($db, $_POST['final_invoice_value']);
  $final_debit_value = mysqli_real_escape_string($db, $_POST['final_debit_value']);
  $final_credit_note_value = mysqli_real_escape_string($db, $_POST['final_credit_note_value']);
  $total_payment_three = mysqli_real_escape_string($db, $_POST['total_payment_three']);
  $total_invoice_two = mysqli_real_escape_string($db, $_POST['total_invoice_two']);
  $total_debit_note_two = mysqli_real_escape_string($db, $_POST['total_debit_note_two']);
  $total_credit_note_two = mysqli_real_escape_string($db, $_POST['total_credit_note_two']);
  $total_blance_amount = mysqli_real_escape_string($db, $_POST['total_blance_amount']);
  $misc_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_misc_amount = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $total_payment_four = mysqli_real_escape_string($db, $_POST['total_payment_four']);
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $date = date("d-m-Y H:i:s");

  
   $result_one =  $db->query("INSERT INTO `payment`(`company_id`, `payment_ref`, `payment_date`, `default_mill_code`, `mill_code`, `mill_name`, `sub_mill_code`, `sub_mill_name`, `dealer_code`, `dealer_name`, `broker_code`, `total_payment_one`, `total_payment_two`, `remark_payment_details`, `final_invoice_value`, `final_debit_value`, `final_credit_note_value`, `total_payment_three`, `total_invoice_two`, `total_debit_note_two`, `total_credit_note_two`, `total_blance_amount`, `misc_name`, `total_misc_amount`, `round_off`, `total_payment_four`, `date`) VALUES ('$company_id','$payment_ref','$payment_date','$default_mill_code','$mill_code','$mill_name','$sub_mill_code','$sub_mill_name','$dealer_code','$dealer_name','$broker_code','$total_payment_one','$total_payment_two','$remark_payment_details','$final_invoice_value','$final_debit_value','$final_credit_note_value','$total_payment_three','$total_invoice_two','$total_debit_note_two','$total_credit_note_two','$total_blance_amount','$misc_name','$total_misc_amount','$round_off','$total_payment_four','$date')");


   $lid = $db->insert_id;

   if ($result_one) {
       
     if (isset($_POST['invoice_number_debit_note'])) {
       
   
    $invoice_number_debit_note = $_POST['invoice_number_debit_note'];
    $debit_note_number = $_POST['debit_note_number'];
    $debit_note_date = $_POST['debit_note_date'];
    $debit_note_value = $_POST['debit_note_value'];

    for($l=0; $l<count($_POST["invoice_number_debit_note"]); $l++)
    {
        $result3 = $db->query("INSERT INTO `payment_debit_details`(`payment_id`, `invoice_number`, `debit_note_number`, `debit_note_date`, `total_debit_note_amount`) VALUES ('$lid','$invoice_number_debit_note[$l]','$debit_note_number[$l]','$debit_note_date[$l]','$debit_note_value[$l]')");

        $db->query("UPDATE `debit_note` SET `status`='paid' WHERE id='$debit_note_number[$l]'");

      $old_in_query2 = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number_debit_note[$l]'");
        $old_payment_amount2 = $old_in_query2->fetch_object();
        $old_pay_amount2 = $old_payment_amount2->payment_amount;       
        $pay_due2 = $old_pay_amount2-$debit_note_value[$l];
        
      $res = $db->query("UPDATE `invoice` SET `payment_amount`='$pay_due2' WHERE `id`='$invoice_number_debit_note[$l]'");
    
    if($res){
        $new_in_query2 = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number_debit_note[$l]'");
        $new_payment_value2 = $new_in_query2->fetch_object();
        $new_pay_amt2 = $new_payment_value2->payment_amount;       

        if($new_pay_amt2=="0.00"){
            $db->query("UPDATE `invoice` SET `status`='paid' WHERE `id`='$invoice_number_debit_note[$l]'");
        }
       }

    }

   

    }
    
    
      if (isset($_POST['invoice_number_credit_note'])) {
       
    
    $invoice_number_credit_note = $_POST['invoice_number_credit_note'];
    $credit_note_number = $_POST['credit_note_number'];
    $credit_note_date = $_POST['credit_note_date'];
    $total_credit_note_amount = $_POST['total_credit_note_amount'];
    

    for($m=0; $m<count($_POST["invoice_number_credit_note"]); $m++)
    {
        $result4 = $db->query("INSERT INTO `payment_credit_details`(`payment_id`, `invoice_number`, `credit_note_number`, `credit_note_date`, `total_credit_note_amount`) VALUES ('$lid','$invoice_number_credit_note[$m]','$credit_note_number[$m]','$credit_note_date[$m]','$total_credit_note_amount[$m]')");

        $db->query("UPDATE `credit_note` SET `status`='paid' WHERE id='$credit_note_number[$m]'");

        $old_in_query3 = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number_credit_note[$m]'");
        $old_payment_amount3 = $old_in_query3->fetch_object();
        $old_pay_amount3 = $old_payment_amount3->payment_amount;       
        $pay_due3 = $old_pay_amount3+$total_credit_note_amount[$m];
        
        $res3 = $db->query("UPDATE `invoice` SET `payment_amount`='$pay_due3' WHERE `id`='$invoice_number_credit_note[$m]'");

       if($res3){
        $new_in_query3 = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number_credit_note[$m]'");
        $new_payment_value2 = $new_in_query3->fetch_object();
        $new_pay_amt3 = $new_payment_value3->payment_amount;       

        if($new_pay_amt3=="0.00"){
            $db->query("UPDATE `invoice` SET `status`='paid' WHERE `id`='$invoice_number_credit_note[$m]'");
        }
       }

    }

    

   }
   
    $payment_type = $_POST['payment_type'];
    $check_number = $_POST['check_number'];
    $pay_date = $_POST['pay_date'];
    $bank_name = $_POST['bank_name'];
    $total_amount_first = $_POST['total_amount_first'];
    for($i=0; $i<count($_POST["payment_type"]); $i++)
    {
        $result1 = $db->query("INSERT INTO `payment_details`(`payment_id`, `payment_type`, `check_number`, `pay_date`, `bank_name`, `total_amount_first`) VALUES ('$lid','$payment_type[$i]','$check_number[$i]','$pay_date[$i]','$bank_name[$i]','$total_amount_first[$i]')");

    }

     if ($result1) {
    $payment_mode = $_POST['payment_mode'];
    $invoice_number = $_POST['invoice_number'];
    $invoice_date = $_POST['invoice_date'];
    $invoice_value = $_POST['invoice_value'];
    $balance_value = $_POST['balance_value'];
    $payment_amount_value = $_POST['payment_amount_value'];
    for($k=0; $k<count($_POST["payment_mode"]); $k++)
    {
        $result2 = $db->query("INSERT INTO `payment_invoice_details`(`payment_id`, `payment_mode`, `invoice_number`, `invoice_date`, `total_amount`, `balance_amount`, `payment_amount`) VALUES ('$lid','$payment_mode[$k]','$invoice_number[$k]','$invoice_date[$k]','$invoice_value[$k]','$balance_value[$k]','$payment_amount_value[$k]')");

        $old_in_query = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number[$k]'");
        $old_payment_amount = $old_in_query->fetch_object();
        $old_pay_amount = $old_payment_amount->payment_amount;       
        $pay_due = $old_pay_amount-$payment_amount_value[$k];
        
        $res = $db->query("UPDATE `invoice` SET `payment_amount`='$pay_due' WHERE `id`='$invoice_number[$k]'");



       if($res){
        $new_in_query = $db->query("SELECT * FROM `invoice` WHERE `id`='$invoice_number[$k]'");
        $new_payment_value = $new_in_query->fetch_object();
        $new_pay_amt = $new_payment_value->payment_amount;       

        if($new_pay_amt=="0.00"){
            $db->query("UPDATE `invoice` SET `status`='paid' WHERE `id`='$invoice_number[$k]'");
        }
       }
        


    }

    if($result2){

    
 
     $query_ledger = $db->query("SELECT blance_amount FROM `ledger` WHERE `company_id`='$company_id' AND `default_mill_code`='$default_mill_code' AND `dealer_code`='$dealer_code' ORDER BY id DESC LIMIT 1");
 $value_ledger_balance_amount = $query_ledger->fetch_object();
 $old_blance_amount = $value_ledger_balance_amount->blance_amount;
 $new_old_blance = $old_blance_amount-$total_payment_three;

$db->query("INSERT INTO `ledger`(`company_id`, `default_mill_code`,`dealer_code`,`doc_id`,`invoice_number`, `doc_number`, `doc_date`, `type`, `debit_amount`, `credit_amount`, `blance_amount`,`db_cr`,`status`) VALUES ('$company_id','$default_mill_code','$dealer_code','$lid','$invoice_number','$payment_ref','$payment_date','pay','0.00','$total_payment_three','$new_old_blance','Db','enable')");

    $_SESSION['msg'] = md5('6');
     echo "<script>alert('success');window.location='payment_list.php';</script>";


    }else{
         $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='payment_list.php';</script>";
    }

      
    }else{
        $_SESSION['msg'] = md5('p_error');
      echo "<script>alert('failed');window.location='payment_list.php';</script>";
    }
   }


    

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}
?>
