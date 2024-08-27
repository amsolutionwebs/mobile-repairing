<?php
//session_start();
require_once 'config/config.php';
if(isset($_REQUEST['submit'])){
$action = $_REQUEST['submit'];
}
if (md5($action) === md5('logout')) {

unset($_SESSION['ebc']);
unset($_SESSION['e_id']);
unset($_SESSION['employee_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['mobile_number']);
unset($_SESSION['email_id']);
unset($_SESSION['logintype']);
unset($_SESSION['status']);
unset($_SESSION['company_id']);
unset($_SESSION['status']);
unset($_SESSION);
session_destroy();
$_SESSION['msg'] = md5('1');
header("Location:index.php?msg=" . md5('logout') . "");
exit;
}


?>