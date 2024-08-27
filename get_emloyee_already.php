<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$query = $db->query("SELECT * FROM employee WHERE mobile_number='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>