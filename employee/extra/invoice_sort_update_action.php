 <?php

include 'config/config.php';

if(isset($_POST['submit'])){
  $invoice_id = mysqli_real_escape_string($db, $_POST['invoice_id']);  
  $indent_id = mysqli_real_escape_string($db, $_POST['indent_id']);
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
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
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $units = mysqli_real_escape_string($db, $_POST['units']);
  $all_total_amount = mysqli_real_escape_string($db, $_POST['total3']);

 $result = $db->query("UPDATE `invoice` SET `total_first`='$total_first',`insurance`='$insurance',`total_insurance`='$total_insurance',`cashdiscount`='$cashdiscount',`total_cashdiscount`='$total_cashd',`cgst`='$cgst',`total_cgst`='$total_cgst',`sgst`='$sgst',`total_sgst`='$total_sgst',`igst`='$igst',`total_igst`='$total_igst',`round_off`='$round_off',`units`='$units',`all_total_amount`='$all_total_amount' WHERE `company_id`='$company_id' AND id='$invoice_id'");

   if ($result) {

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
   }else{
    $_SESSION['msg'] = md5('11');
       echo "<script>alert('failed');window.location='invoice_list.php';</script>";
   }


}


?>