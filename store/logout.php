<?php
//session_start();
require_once 'config/config.php';
if(isset($_REQUEST['submit'])){
$action = $_REQUEST['submit'];
}
if (md5($action) === md5('logout')) {

unset($_SESSION['main_sessin_id']);
unset($_SESSION['user_id']);
unset($_SESSION['employee_id']);
unset($_SESSION['email_id']);
unset($_SESSION['first_name']);
unset($_SESSION['usertype']);
unset($_SESSION['status']);
unset($_SESSION['store_id']);
unset($_SESSION);

$_SESSION['msg'] = md5('1');
header("Location:index.php?msg=" . md5('logout') . "");
exit;
}


?>