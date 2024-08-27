<?php
$usertype = $_SESSION['usertype_admin'];
$a_idchk = $_SESSION['user_id_admin'];
$store_id = $_SESSION['store_id'];
$user_id = $_SESSION['user_id_admin'];

ob_start("ob_html_compress");

// suparadmin data

if ($_SESSION['usertype_admin']==='admin') {

// 
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
// 

 

$employee_type = 'Admin';


}

// admin data






 
?>