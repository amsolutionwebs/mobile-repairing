<?php
$Msg="Hello ".$full_name." Your OTP for verification is: ".$otp." Please enter this OTP for authentication. Thank you for choosing MobileWaleBhaiya.com! Regards Satyam Telecom";
$Password = 'Google@123';
$SenderID = 'MWBIND';
$UserID = 'MWB';
$EntityID = '1601438169846661084';
$TemplateID = '1607100000000290096';

function send_message($Phno, $Msg, $Password, $SenderID, $UserID, $EntityID, $TemplateID)
{
    $url = 'http://bulksms.promotionkart.com/api/SmsApi/SendSingleApi?UserID=' . $UserID . '&Password=' . $Password . '&SenderID=' . $SenderID . '&Phno=' . $Phno . '&Msg=' . urlencode($Msg) . '&EntityID=' . $EntityID . '&TemplateID=' . $TemplateID;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        // Handle the error
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);

    // return $output;
}

echo send_message($Phno, $Msg, $Password, $SenderID, $UserID, $EntityID, $TemplateID);
?>