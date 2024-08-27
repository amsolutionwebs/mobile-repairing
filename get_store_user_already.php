<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$employee_id = mysqli_real_escape_string($db, $_POST['employee_id']);

$query = $db->query("SELECT * FROM employee_store WHERE employee_id='$employee_id' AND store_id='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>