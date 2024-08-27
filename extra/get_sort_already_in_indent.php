<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$indent_id = mysqli_real_escape_string($db, $_POST['indent_id']);

$query = $db->query("SELECT * FROM indent_plus WHERE indent_id='$indent_id' AND sort_id='$value'");
  if($query->num_rows > 0){
	  $_SESSION['msg'] = md5('p_error');
	  echo "yes";
  }else{
  	echo "no";
  }


?>