  <?php
  include 'config/config.php';

  
  $repair_id = mysqli_real_escape_string($db, $_POST['repair_id']);
  $total_2 = mysqli_real_escape_string($db, $_POST['total_2']);
  $service_charge = mysqli_real_escape_string($db, $_POST['service_charge']);
  $service_charge_tax = mysqli_real_escape_string($db, $_POST['service_charge_tax']);
  $total_service_charge = mysqli_real_escape_string($db, $_POST['total_service_charge']);
  $miscs_name = mysqli_real_escape_string($db, $_POST['miscs_name']);
  $total_miscs = mysqli_real_escape_string($db, $_POST['total_miscs']);
  $round_off = mysqli_real_escape_string($db, $_POST['round_off']);
  $all_quantity = mysqli_real_escape_string($db, $_POST['all_quantity']);
  $total3 = mysqli_real_escape_string($db, $_POST['total3']);


 $query_update = $db->query("UPDATE `repair_managment` SET `total_2`='$total_2',`service_charge`='$service_charge',`service_charge_tax`='$service_charge_tax',`total_service_charge`='$total_service_charge',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`round_off`='$round_off',`total_quntity`='$all_quantity',`total_amount`='$total3',`date`='$total3' WHERE id='$repair_id'");

if ($query_update) {
	
    if(!empty($_POST["product_id"])){

        $repair_id = $repair_id;  

    $product_id = $_POST['product_id'];
    $variation_id = $_POST['variation_id'];
    $sub_variation_id = $_POST['sub_variation_id'];
    $quantity_invoice = $_POST['quantity_invoice'];
    $rate_invoice = $_POST['rate_invoice'];
    $discount_invoice = $_POST['discount_invoice'];
    $gst_invoice = $_POST['gst_invoice'];
    $total_amount_first = $_POST['total_amount_first'];

    for($i=0; $i<count($_POST["product_id"]); $i++)
    {
        $result2 = $db->query("INSERT INTO `repair_product_details`(`repair_id`, `product_id`, `variation_id`, `sub_variation_id`, `quantity`, `rate`, `discount`, `gst`, `amount`) VALUES ('$repair_id','$product_id[$i]','$variation_id[$i]','$sub_variation_id[$i]','$quantity_invoice[$i]','$rate_invoice[$i]','$discount_invoice[$i]','$gst_invoice[$i]','$total_amount_first[$i]')");
    }

    if ($result2) {
        $_SESSION['msg'] = md5('5');
        echo "<script>window.location='repair_management_list.php';</script>";
    
    }else{
        $_SESSION['msg'] = md5('failed');
    echo "<script>window.location='repair_management_list.php';</script>";
    }
    }else{ $_SESSION['msg'] = md5('5');
    echo "<script>window.location='repair_management_list.php';</script>";}
    

}else{


$_SESSION['msg'] = md5('failed');
   echo "<script>window.location='repair_management_list.php';</script>";

} ?>
