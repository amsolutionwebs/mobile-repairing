<?php
require_once 'config/config.php';

$user_type = $_POST['usertype'];
// login for supar admin

if ($user_type==='suparadmin') {


$email_id = $_POST['email'];
$password = $_POST['password'];


function generateOTP() {
    return rand(100000, 999999);
}
$otp = generateOTP();

$results = $db->query("SELECT * FROM `supar_admin` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND status='enable'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

$value = $results->fetch_object();
$Phno = $value->mobile_number;
$first_name = $value->first_name;
$last_name = $value->last_name;
$full_name = $first_name;

include_once 'send_sms_function.php';

$otp_msg = $db->query("UPDATE `supar_admin` SET `otp`='$otp' WHERE email_id='$email_id' AND password='$password' AND usertype='suparadmin' AND status='enable'");

if ($otp_msg) {
	$_SESSION['msg'] = md5('success_otp');
	echo "yes";
}else{
	$_SESSION['msg'] = md5('failed_otp');
    echo "no";
}

}
else {

$db->close();
$_SESSION['msg'] = md5('wrong_data');
header("Location:index.php");
exit;
}

// end supar admin login

}else if($user_type==='admin'){
	$user_type = $_POST['usertype'];
    $email_id = $_POST['email'];
	$admin_password = $_POST['password'];

function generateOTP() {
    return rand(100000, 999999);
}
$otp = generateOTP();

	$results = $db->query("SELECT * FROM `admin` WHERE email_id='$email_id' AND password='$admin_password' AND usertype='$user_type' AND status='enable'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

$value = $results->fetch_object();
$Phno = $value->mobile_number;
$first_name = $value->first_name;
$last_name = $value->last_name;
$full_name = $first_name;
include_once 'send_sms_function.php';

$otp_msg = $db->query("UPDATE `admin` SET `otp`='$otp' WHERE email_id='$email_id' AND password='$admin_password' AND usertype='admin' AND status='enable'");
if ($otp_msg) {
	$_SESSION['msg'] = md5('success_otp');
	
	echo "yes";
}else{
	   $_SESSION['msg'] = md5('failed_otp');
     
}

}
else {

$db->close();
$_SESSION['msg'] = md5('wrong_data');
header("Location:index.php");
exit;
}

}




?>