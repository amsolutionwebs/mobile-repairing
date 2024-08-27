<?php

include 'config/config.php';

$value = mysqli_real_escape_string($db, $_POST['value']);
$id = mysqli_real_escape_string($db, $_POST['id']);
$query = $db->query("UPDATE `product_variation` SET `status`='$value' WHERE id='$id'");
  if($query){
	  $_SESSION['msg'] = md5('6');
	  echo "success";
  }else{
  	echo "failed";
  }


?>