<?php
include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM mill WHERE id='$id'");
$data_mill = $query->fetch_object();
echo $data_mill->mill_name;

?>