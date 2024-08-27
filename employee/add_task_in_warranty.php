 <?php
include 'config/config.php';


$post_id = $_GET['post_id'];
$post_date_time = date("Y-m-d H:i:s");

$query_order= $db->query("SELECT * FROM order_managment WHERE id='$post_id' ORDER BY id DESC");
$value_order = $query_order->fetch_object();
$repair_type = $value_order->repair_type;
$store_id = $value_order->store_id;
$user_id = $value_order->user_id;
$customer_id = $value_order->customer_id;
$order_id = $value_order->order_id;

if ($repair_type=='repair') {
	
$query_repair = $db->query("SELECT * FROM repair_managment WHERE id='$order_id' ORDER BY id DESC");
$value_repair = $query_repair->fetch_object();
$salesman = $value_repair->salesman;
$engineer_code = $value_repair->engineer_code;


$query_insert = $db->query("INSERT INTO `eng_task`(`store_id`, `user_id`, `customer_id`, `warranty`, `work_id`, `work_name`, `given_id`, `taker_id`, `task_asigned`, `work_status`, `date`) VALUES ('$store_id','$user_id','$customer_id','in_warranty_repair','$order_id','Repair','$salesman','$engineer_code','salesman','Pending','$post_date_time')");


if ($query_insert) {
	$_SESSION['msg'] = md5('8');
    header("location:order_management_list.php");
}else{
	$_SESSION['msg'] = md5('failed');
    header("location:order_management_list.php");
}

}

// for por repair
 
?>