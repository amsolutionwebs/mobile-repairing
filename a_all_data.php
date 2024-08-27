<?php


ob_start("ob_html_compress");

// suparadmin data

if ($_SESSION['usertype']==='suparadmin') {

$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];

$comp_select=$db->query("SELECT * FROM `supar_admin` WHERE id='$a_idchk'"); 
$comp_fetch=$comp_select->fetch_object(); 
$ab1 =$comp_fetch->first_name;
$ab2=$comp_fetch->last_name;

$first_character1 = mb_substr($ab1, 0, 1);
$first_character2 = mb_substr($ab2, 0, 1);
$character = $first_character1.$first_character2;


$a_company = $ab1." ".$ab2;
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

}

// admin data

if ($_SESSION['usertype_admin']==='admin') {

$usertype = $_SESSION['usertype_admin'];
$a_idchk = $_SESSION['user_id_admin'];


$comp_select=$db->query("SELECT * FROM `admin` WHERE id='$a_idchk'"); 
$comp_fetch=$comp_select->fetch_object(); 
$ab1 =$comp_fetch->first_name;
$ab2=$comp_fetch->last_name;

$first_character1 = mb_substr($ab1, 0, 1);
$first_character2 = mb_substr($ab2, 0, 1);
$character = $first_character1.$first_character2;

$a_company = $ab1." ".$ab2;
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
 $company_name_login = $comp_fetch->company_name;




}




 
?>