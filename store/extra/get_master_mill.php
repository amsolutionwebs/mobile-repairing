<?php
include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM `submill` WHERE id='$id'");
$result = $query->fetch_object();
$master_mill_id = $result->master_mill_code;
$query2 = $db->query("SELECT * FROM `mill` WHERE id='$master_mill_id'");
if($query2->num_rows > 0){ 

	$result2 = $query2->fetch_object();
	echo $result2->mill_code;

}else{
  	echo "no";
  }
?>