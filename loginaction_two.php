<?php
require_once 'config/config.php';
$action = $_POST['submit'];
if ($action === 'Login') {
$user_type = $_POST['usertype'];
$email_id = $_POST['email'];
$password = $_POST['password'];
$otp = $_POST['otp'];

// login for supar admin

if ($user_type==='suparadmin') {


$results = $db->query("SELECT * FROM `supar_admin` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND otp='$otp' AND status='enable'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

$value = $db->query("SELECT * FROM `supar_admin` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND status='enable'");
while ($row = $value->fetch_object()) {
$main_sessin_id = session_id();
$_SESSION['main_sessin_id'] = $main_sessin_id;
$_SESSION['user_id'] = $row->id;
$_SESSION['employee_id'] = $row->employee_id;
$_SESSION['email_id'] = $row->email_id;
$_SESSION['first_name'] = $row->first_name;
$_SESSION['usertype'] = $row->usertype;
$_SESSION['status'] = $row->status;
$db->close();
$_SESSION['msg'] = md5('login');
header("Location:dashboard.php");
exit;


}

}
else {

$db->close();
$_SESSION['msg'] = md5('wrong_otp');
header("Location:index.php");
exit;
}

// end supar admin login

}else if($user_type==='admin'){

$user_type = $_POST['usertype'];
$email_id = $_POST['email'];
$password = $_POST['password'];
$otp = $_POST['otp'];



	$results = $db->query("SELECT * FROM `admin` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND otp='$otp' AND status='enable'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

$value = $db->query("SELECT * FROM `admin` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND status='enable'");
while ($row = $value->fetch_object()) {
$main_sessin_id = session_id();
$_SESSION['main_sessin_id_admin'] = $main_sessin_id;
$_SESSION['user_id_admin'] = $row->id;
$_SESSION['employee_id_admin'] = $row->employee_id;
$_SESSION['email_id_admin'] = $row->email_id;
$_SESSION['first_name_admin'] = $row->first_name;
$_SESSION['last_name_admin'] = $row->first_name;
$_SESSION['usertype_admin'] = $row->usertype;
$_SESSION['status_admin'] = $row->status;
$db->close();
$_SESSION['msg'] = md5('login');
header("Location:dashboard.php");
exit;


}

}
else {

$db->close();
$_SESSION['msg'] = md5('wrong_otp');
header("Location:index.php");
exit;
}
}


}

?>