 <?php

include 'config/config.php';

if(isset($_POST['submit'])){
 
 $post_id = mysqli_real_escape_string($db, $_POST['post_id']);
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


 $result_two = $db->query("UPDATE `credit_note_payment_details` SET `total_first`='$total_first',`insurance`='$insurance',`total_insurance`='$total_insurance',`cashdiscount`='$cashdiscount',`total_cashdiscount`='$total_cashd',`cgst`='$cgst',`total_cgst`='$total_cgst',`sgst`='$sgst',`total_sgst`='$total_sgst',`igst`='$igst',`total_igst`='$total_igst',`misc_name`='$miscs_name',`misc_value`='$total_miscs',`round_off`='$round_off',`units`='$units',`all_total_amount`='$all_total_amount',`status`='enable' WHERE `credit_note_id`='$post_id'");

   if ($result_two) {

   
    $value_id = $_POST['value'];
    
   $result1 = $db->query("DELETE FROM `credit_note_sort_data` WHERE id='$value_id'");

     if ($result1) {
      $_SESSION['msg'] = md5('6');
     echo "yes";
    }else{
    	echo "no";
        $_SESSION['msg'] = md5('p_error');
      
    }
   }else{
   echo "no";
       
   }


}


?>