<?php

include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM `submill` WHERE id='$id'");
$result = $query->fetch_object();
$master_mill_id = $result->master_mill_code;
$query2 = $db->query("SELECT * FROM `mill` WHERE id='$master_mill_id'");
$data_mill = $query2->fetch_object();
echo $data_mill->mill_name;

?>
