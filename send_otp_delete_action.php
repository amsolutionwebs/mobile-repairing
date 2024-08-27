<?php
include 'config/config.php';
include_once 'a_all_data.php';

$a_idchk = $_SESSION['user_id_admin'];

function generateOTP() {
    return rand(100000, 999999);
}
$otp = generateOTP();

$results = $db->query("SELECT * FROM `admin` WHERE id='$a_idchk'");
$value = $results->fetch_object();
$Phno = $value->mobile_number;
$first_name = $value->first_name;
$last_name = $value->last_name;
$full_name = $first_name;
include_once 'send_sms_function.php';

$otp_msg = $db->query("UPDATE `admin` SET `otp`='$otp' WHERE id='$a_idchk'");
if ($otp_msg) {
	$_SESSION['msg'] = md5('success_otp');
	echo "success";
	
}else{
	   $_SESSION['msg'] = md5('failed_otp');
     echo "failed";
}



?>