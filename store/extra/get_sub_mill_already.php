<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$company_login_id = mysqli_real_escape_string($db, $_POST['company_login_id']);

$query = $db->query("SELECT * FROM submill WHERE company_id='$company_login_id' AND mill_code='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>