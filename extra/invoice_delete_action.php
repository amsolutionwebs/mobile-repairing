<?php
include 'config/config.php';
if(isset($_POST['submit'])){
$action = $_POST['submit'];
}if(isset($_GET['action'])){
$action = $_GET['action'];
}
switch ($action) {
  case 'delete':
   $post_id = $_GET['post'];
 
	 
        $query_insert_sort_quantity = $db->query("SELECT * FROM invoice_sort_date WHERE invoice_id='$post_id' ORDER BY id ASC");
        while($value_quantity_indent = $query_insert_sort_quantity->fetch_object()){
        
        $insertold_qty = $value_quantity_indent->quantity;       
        $insert_indent_id = $value_quantity_indent->indent_id;
        $insert_sort_id = $value_quantity_indent->sort_id;

        $query_old_indent = $db->query("SELECT * FROM indent_plus WHERE id='$insert_sort_id'");
        $value_indent = $query_old_indent->fetch_object();
        $paidqty = $value_indent->paid_quantity; 

        $final_value = $paidqty-$insertold_qty;

        $res = $db->query("UPDATE `indent_plus` SET `paid_quantity`='$final_value' WHERE id='$insert_sort_id'");
            
        }
       
        if($res){
            $db->query("DELETE FROM invoice_sort_date WHERE invoice_id='$post_id'");
              $db->query("DELETE FROM invoice WHERE id='$post_id'");
      
        
            $_SESSION['msg'] = md5('7');
header("location:invoice_list.php");
        }else{
            $_SESSION['msg'] = md5('11');
header("location:invoice_list.php");
        }

  
 

    break;
  default:
 $_SESSION['msg'] = md5('11');
    header("location:dashboard.php?msg=" . md5('11') . "");
}

?>