<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

error_reporting(E_ALL);
//ini_set("display_errors", 0);
 
//error_reporting(E_ALL | E_DEPRECATED | E_STRICT);
// Same as error_reporting(E_ALL);
//ini_set("error_reporting", E_ALL);
// Report all errors except E_NOTICE
//error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE); 
// Report all errors
//error_reporting(E_ALL);

/*
* set maximum script execution time to overcome
* timeout situations
* I have set it for 5 minutes, i.e. 5 mins * 60 seconds,
* But dont use unlimited or too much time as it may cause
* too much server load and even breakdown
*/
set_time_limit(10 * 60);

if($_SERVER['HTTP_HOST']=="localhost")
{
if (!defined('ROOTINDEX')){define('ROOTINDEX','http://localhost/mobile/employee/');}
if (!defined('ROOTLIMG')){define('ROOTLIMG','http://localhost/mobile/employee/upload/logo');}
if (!defined('ROOTBIMG')){define('ROOTBIMG','http://localhost/mobile/employee/upload/banner-images');}
if (!defined('ROOTCATEGORY')){define('ROOTCATEGORY','http://localhost/mobile/employee/upload/categories-images/');}
if (!defined('ROOTIMG')){define('ROOTIMG','http://localhost/mobile/employee/upload/post-images');}
if (!defined('ROOTPIMG')){define('ROOTPIMG','http://localhost/mobile/upload/profile_images');} 
if (!defined('ROOT')){define('ROOT','http://localhost/mobile/employee/');}
///define('HOST', $_SERVER['SERVER_NAME']);
$server = 'localhost';
$user = 'root';
$password = ''; 
$database = 'mwb';
$port = '3308';
}else{
if (!defined('ROOTINDEX')){define('ROOTINDEX','https://outfoxdemo.xyz/mobile/employee/');}
if (!defined('ROOTLIMG')){define('ROOTLIMG','https://outfoxdemo.xyz/mobile/employee/upload/logo');}
if (!defined('ROOTBIMG')){define('ROOTBIMG','https://outfoxdemo.xyz/mobile/employee/upload/banner-images');}
if (!defined('ROOTIMG')){define('ROOTIMG','https://outfoxdemo.xyz/mobile/employee/upload/post-images');}
if (!defined('ROOTPIMG')){define('ROOTPIMG','https://outfoxdemo.xyz/mobile/employee/upload/profile_images');} 
if (!defined('ROOT')){define('ROOT','https://outfoxdemo.xyz/mobile/employee/');}
$server = 'localhost';
$user = 'etasrvdl_mwb';
$password = '@Aman1020'; 
$database = 'etasrvdl_mwb';
}
//Open a new connection to the MySQL server
$db = new mysqli($server, $user, $password, $database);
//Output any connection error
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}
//echo '<p>Connection OK '. $db->host_info.'</p>';
//echo '<p>Server '.$db->server_info.'</p>';
//$db->close();



$url = $_SERVER['REQUEST_URI'];
$url = explode('/',$url);


