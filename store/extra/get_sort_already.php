<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$company_login_id = mysqli_real_escape_string($db, $_POST['company_login_id']);

$query = $db->query("SELECT * FROM sort WHERE company_id='$company_login_id' AND sort_no='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>