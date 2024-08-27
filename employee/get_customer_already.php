<?php

include 'config/config.php';
$store_id = $_SESSION['store_id'];
$value = mysqli_real_escape_string($db, $_POST['value']);
$query = $db->query("SELECT * FROM customer_managment WHERE store_id='$store_id' AND  mobile_number='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>