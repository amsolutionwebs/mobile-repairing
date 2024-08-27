<?php
//session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
if (!empty($_SESSION['main_sessin_id_admin'])) {
if ($_SESSION['main_sessin_id_admin'] != session_id()) {
header('Location: index.php');
exit;
}
} else {
header('Location: index.php');
exit;
}


$store_id = $_SESSION['store_id'];
$employee_id = $_SESSION['user_id'];

if ($_SESSION['usertype_admin']==='admin') {
  $user_id  = $_SESSION['user_id'];
  $data_cmp = $db->query("SELECT company_name FROM supar_admin");
  $master_cmp  = $data_cmp->fetch_object();
  $company_name_login = $master_cmp->company_name;

$store_id  = $_SESSION['store_id'];
  $store_link=$db->query("SELECT * FROM `store` WHERE id='$store_id'"); 
$loged_store_value=$store_link->fetch_object(); 



}




include_once "a_all_data.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome | <?php echo $company_name_login; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link href="plugins/select2/select2.min.css" rel="stylesheet" />
 
 <link rel="apple-touch-icon" sizes="180x180" href="dist/fevicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="dist/fevicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="dist/fevicon/favicon-16x16.png">
<link rel="manifest" href="dist/fevicon/site.webmanifest">

  <style>
    

   thead {
    background: rgb(38,113,206);
    color: rgb(255,255,255)!important;
    text-align: center !important;
    padding: 10px 5px !important;
    line-height: 1.2 !important;
    border: 1px solid rgb(3,52,112)!important;
    vertical-align: middle;
    font-size: 0.80rem !important;
    border:1px solid black !important;
    }
::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

::-webkit-scrollbar-track {
  background-color: #fff;
}

::-webkit-scrollbar-thumb {
  background-color: #ccc;
  border: 1px solid rgb(193, 193, 193);
  border-radius: 10px;
}

#add_vbtn {
  
  background-color: #FF9800;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
 
 
  z-index: 1000;
}
#add_vbtn::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#add_vbtn:hover {
  cursor: pointer;
  background-color: #333;
}
#add_vbtn:active {
  background-color: #555;
}


.my-table-create {
    display: flex;
    justify-content: center;
    align-items: center;
 

}

.mytabledesing thead th {
  color: #fff !important;
  padding: 9px;
  text-align: center;                           
}

#sort_fileds {
  display: flex !important;
  flex-direction: row !important;
}
tfoot {
  color: #fff !important;
  padding: 9px;
  text-align: center; 
}
.mytabledesing  th, td{
  border: 1px solid black;
  border-collapse: collapse;
}

.mytabledesing td{
  border: 1px solid black ;
  border-collapse: collapse;
}

/* Styles for the content section */

/*loader*/
.pageloader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('dist/img/loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
  opacity: .8;
}

  </style>
 
