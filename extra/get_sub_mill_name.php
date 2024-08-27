<?php
include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM `submill` WHERE id='$id'");
$data_sub = $query->fetch_object();
echo $data_sub->mill_name;

?>