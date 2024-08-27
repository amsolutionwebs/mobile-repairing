<?php
include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM `dealer` WHERE id='$id'");
$data_dealer = $query->fetch_object();
echo $data_dealer->dealer_name;

?>