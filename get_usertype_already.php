<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);

$query = $db->query("SELECT * FROM user_type WHERE user_type='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>