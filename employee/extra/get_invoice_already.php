<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$company_login_id = mysqli_real_escape_string($db, $_POST['company_login_id']);
$default_mill_code = mysqli_real_escape_string($db, $_POST['default_mill_code']);
$query = $db->query("SELECT * FROM invoice WHERE company_id='$company_login_id' AND default_mill_code='$default_mill_code' AND invoice_number='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>