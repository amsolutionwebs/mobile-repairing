<?php
include 'config/config.php';
// delete user type

if(isset($_POST['delete_repair'])){
    $repair_id = $_POST['repair_id'];
    $product_details_id = $_POST['product_details_id'];
    $total_2 = $_POST['total_2'];
    $service_charge = $_POST['service_charge'];
    $service_charge_tax = $_POST['service_charge_tax'];
    $total_service_charge = $_POST['total_service_charge'];
    $miscs_name = $_POST['miscs_name'];
    $total_miscs = $_POST['total_miscs'];
    $round_off = $_POST['round_off'];
    $all_quantity = $_POST['all_quantity'];
    $total3 = $_POST['total3'];

    $query_update =  $db->query("UPDATE `repair_managment` SET `total_2`='$total_2',`service_charge`='$service_charge',`service_charge_tax`='$service_charge_tax',`total_service_charge`='$total_service_charge',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`round_off`='$round_off',`total_quntity`='$all_quantity',`total_amount`='$total3' WHERE id='$repair_id'");

    if ($query_update) {
      $query_delete =  $db->query("DELETE FROM repair_product_details WHERE id='$product_details_id'");

      if ($query_delete) {
         $_SESSION['msg'] = md5('7');
      echo "success";
      }else{
        $_SESSION['msg'] = md5('p_error');
      echo "failed";
      }

    }else{
      $_SESSION['msg'] = md5('p_error');
      echo "failed";
    }
  
  
}

// for por delete action

if(isset($_POST['delete_por_repair'])){
    $por_repair_id = $_POST['por_repair_id'];
    $product_details_id = $_POST['product_details_id'];
    $total_2 = $_POST['total_2'];
    $service_charge = $_POST['service_charge'];
    $service_charge_tax = $_POST['service_charge_tax'];
    $total_service_charge = $_POST['total_service_charge'];
    $miscs_name = $_POST['miscs_name'];
    $total_miscs = $_POST['total_miscs'];
    $round_off = $_POST['round_off'];
    $all_quantity = $_POST['all_quantity'];
    $total3 = $_POST['total3'];

    $query_update =  $db->query("UPDATE `por_repair_managment` SET `total_2`='$total_2',`service_charge`='$service_charge',`service_charge_tax`='$service_charge_tax',`total_service_charge`='$total_service_charge',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`total_cd`='$total_cashd',`round_off`='$round_off',`total_quntity`='$all_quantity',`total_amount`='$total3',`date`='$post_date_time' WHERE id='$por_repair_id'");

    if ($query_update) {
      $query_delete =  $db->query("DELETE FROM por_repair_product_details WHERE id='$product_details_id'");

      if ($query_delete) {
         $_SESSION['msg'] = md5('7');
      echo "success";
      }else{
        $_SESSION['msg'] = md5('p_error');
      echo "failed";
      }

    }else{
      $_SESSION['msg'] = md5('p_error');
      echo "failed";
    }
  
  
}

// for sales managment

if(isset($_POST['delete_sales_product'])){
    $sales_id = $_POST['sales_id'];
    $product_details_id = $_POST['product_details_id'];
    $total_2 = $_POST['total_2'];
    $service_charge = $_POST['service_charge'];
    $service_charge_tax = $_POST['service_charge_tax'];
    $total_service_charge = $_POST['total_service_charge'];
    $miscs_name = $_POST['miscs_name'];
    $total_miscs = $_POST['total_miscs'];
    $round_off = $_POST['round_off'];
    $all_quantity = $_POST['all_quantity'];
    $total3 = $_POST['total3'];

    $query_update =  $db->query("UPDATE `sales_managment` SET `total_2`='$total_2',`service_charge`='$service_charge',`service_charge_tax`='$service_charge_tax',`total_service_charge`='$total_service_charge',`miscs_name`='$miscs_name',`total_miscs`='$total_miscs',`total_cd`='$total_cashd',`round_off`='$round_off',`all_quantity`='$all_quantity',`total_amount`='$total3' WHERE id='$sales_id'");

    if ($query_update) {
      $query_delete =  $db->query("DELETE FROM sales_product_details WHERE id='$product_details_id'");

      if ($query_delete) {
         $_SESSION['msg'] = md5('7');
      echo "success";
      }else{
        $_SESSION['msg'] = md5('p_error');
      echo "failed";
      }

    }else{
      $_SESSION['msg'] = md5('p_error');
      echo "failed";
    }
  
  
}
?>