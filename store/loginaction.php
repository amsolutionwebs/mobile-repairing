<?php
require_once 'config/config.php';
$action = $_POST['submit'];
if ($action === 'Login') {
$user_type = 'employee';
$email_id = $_POST['email'];
$password = $_POST['password'];

function generateOTP() {
    return rand(100000, 999999);
}


 $otp = generateOTP();


if ($user_type==='employee') {

$results = $db->query("SELECT * FROM `employee` WHERE email_id='$email_id' AND password='$password' AND usertype='$user_type' AND status='enable'");
$num_rows = $results->num_rows;
if ($num_rows > 0) {

$value = $results->fetch_object();
$Phno = $value->mobile_number;
$first_name = $value->first_name;
$last_name = $value->last_name;

$full_name = $first_name." ".$last_name;

 // include_once 'send_sms_function.php';

$otp_msg = $db->query("UPDATE `employee` SET `otp`='123456' WHERE email_id='$email_id' AND password='$password' AND usertype='employee' AND status='enable'");
if ($otp_msg) {
	$_SESSION['msg'] = md5('success_otp');
	$_SESSION['usertype'] = $user_type; 
	$_SESSION['email'] = $email_id;
	$_SESSION['password'] = $password;

	 echo "<script>alert('An otp send has been sent your phone number');window.location='confirm_otp.php';</script>";
	
	 exit();
	 
	
	
}else{
	   $_SESSION['msg'] = md5('failed_otp');
      echo "<script>alert('Otp Send Failed');window.location='index.php';</script>";
}

}
else {

$db->close();
$_SESSION['msg'] = md5('wrong_data');
header("Location:index.php");
exit;
}

// end supar admin login

}else {
	echo "<script>alert('Sorry! You are not valid Users');
	window.location='index.php';</script>";
}


}

?>