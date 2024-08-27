<?php
$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];
$store_id = $_SESSION['store_id'];
$user_id = $_SESSION['user_id'];

ob_start("ob_html_compress");

// suparadmin data

if ($_SESSION['usertype']==='employee') {

$comp_select=$db->query("SELECT * FROM `employee` WHERE id='$a_idchk'"); 
$comp_fetch=$comp_select->fetch_object(); 
$ab1 =$comp_fetch->first_name;
$ab2=$comp_fetch->last_name;
$a_company = $ab1." ".$ab2;

$first_character1 = mb_substr($ab1, 0, 1);
$first_character2 = mb_substr($ab2, 0, 1);
$character = $first_character1.$first_character2;


$employee_id =$comp_fetch->employee_id;
$email_id =$comp_fetch->email_id;
$mobile_number =$comp_fetch->mobile_number;
$alternate_mobile_number =$comp_fetch->alternate_mobile_number;
$whatsapp_number =$comp_fetch->whatsapp_number;
$password =$comp_fetch->password;
$age =$comp_fetch->age;
$address =$comp_fetch->address;
$profile_picture =$comp_fetch->profile_picture;
$status =$comp_fetch->status;


$commission_select=$db->query("SELECT * FROM `employee_commission` WHERE id='$a_idchk'"); 
$commission_fetch=$commission_select->fetch_object(); 
$emp_commission = $commission_fetch->commission;


$social_link=$db->query("SELECT * FROM `social_links` WHERE user_id='$a_idchk' AND status='enable'"); 
$social_fetch=$social_link->fetch_object(); 
$social_phone=$social_fetch->phone;
$social_email=$social_fetch->email;
$social_whatspp=$social_fetch->whatspp;
$social_google_map=$social_fetch->google_map;
$social_facebook=$social_fetch->facebook;
// $social_youtube=$social_fetch->youtube;
$social_instagram=$social_fetch->instagram;
$social_twitter=$social_fetch->twitter;
$social_linkdin=$social_fetch->linkdin;


$user_type=$db->query("SELECT * FROM `employee_user_type` WHERE employee_id='$a_idchk'"); 
$employee_k=$user_type->fetch_object(); 


$user_type2=$db->query("SELECT * FROM `user_type` WHERE id='$employee_k->user_type_id'"); 
$employee_type=$user_type2->fetch_object();
$employee_type = $employee_type->user_type;


}

// admin data






 
?>