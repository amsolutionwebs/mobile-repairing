<?php
include 'config/config.php';

$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];
$store_id = $_SESSION['store_id'];
$user_id = $_SESSION['user_id'];


// for leads managment - 1
$data_module1 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='1' AND status='enable' ");
$value_view = $data_module1->fetch_object();
$add_leads = $value_view->add;
$view_leads = $value_view->view;
$edit_leads = $value_view->edit;
$delete_leads = $value_view->delete_module;

// for vendor - 2
$data_module2 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='2' AND status='enable' ");
$value_vendor1 = $data_module2->fetch_object();
$add_vendor = $value_vendor1->add;
$view_vendor = $value_vendor1->view;
$edit_vendor = $value_vendor1->edit;
$delete_vendor = $value_vendor1->delete_module;

// for vendor - 3
$data_inventory = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='3' AND status='enable' ");
$value_inventory = $data_inventory->fetch_object();
$add_inventory = $value_inventory->add;
$view_inventory = $value_inventory->view;
$edit_inventory = $value_inventory->edit;
$delete_inventory = $value_inventory->delete_module;

// for vendor - 4
$data_customer = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='4' AND status='enable' ");
$value_customer = $data_customer->fetch_object();
$add_customer = $value_customer->add;
$view_customer = $value_customer->view;
$edit_customer = $value_customer->edit;
$delete_customer = $value_customer->delete_module;

// for order managment - 5
$data_order = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='5' AND status='enable' ");
$value_order = $data_order->fetch_object();
$add_order = $value_order->add;
$view_order = $value_order->view;
$edit_order = $value_order->edit;
$delete_order = $value_order->delete_module;


// for return managment - 6
$data_module3 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='6' AND status='enable' ");
$value_return = $data_module3->fetch_object();
$add_return = $value_return->add;
$view_return = $value_return->view;
$edit_return = $value_return->edit;
$delete_return = $value_return->delete_module;


// for Task managment - 8
$data_task = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='8' AND status='enable' ");
$value_task = $data_task->fetch_object();
$add_task = $value_task->add;
$view_task = $value_task->view;
$edit_task = $value_task->edit;
$delete_task = $value_task->delete_module;

// for purchase_old managment - 9
$data_module4 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='9' AND status='enable' ");
$value_purchase_old = $data_module4->fetch_object();
$add_purchase_old = $value_purchase_old->add;
$view_purchase_old = $value_purchase_old->view;
$edit_purchase_old = $value_purchase_old->edit;
$delete_purchase_old = $value_purchase_old->delete_module;


// for sales managment - 10
$data_salesd = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='10' AND status='enable' ");
$value_sales = $data_salesd->fetch_object();
$add_sales = $value_sales->add;
$view_sales = $value_sales->view;
$edit_sales = $value_sales->edit;
$delete_sales = $value_sales->delete_module;

// for sales managment - 11
$data_transation = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='11' AND status='enable' ");
$value_transation = $data_transation->fetch_object();
$add_transation = $value_transation->add;
$view_transation = $value_transation->view;
$edit_transation = $value_transation->edit;
$delete_transation = $value_transation->delete_module;

// for repair managment - 12
$data_repair = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='12' AND status='enable' ");
$value_repair = $data_repair->fetch_object();
$add_repair = $value_repair->add;
$view_repair = $value_repair->view;
$edit_repair = $value_repair->edit;
$delete_repair = $value_repair->delete_module;

// for purchase repair managment - 13
$data_por_repair = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND  module_id='13' AND status='enable' ");
$value_por_repair = $data_por_repair->fetch_object();
$add_por_repair = $value_por_repair->add;
$view_por_repair = $value_por_repair->view;
$edit_por_repair = $value_por_repair->edit;
$delete_por_repair = $value_por_repair->delete_module;

?>