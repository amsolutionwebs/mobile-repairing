<?php
include 'config/config.php';

$product_id = $_POST['product_id'];
$variation_id = $_POST['variation_id'];
$sub_variation_id = $_POST['sub_variation_id'];


$query =$db->query("SELECT purchase_price FROM `product_variation` WHERE `product_id`='$product_id' AND `variation_id`='$variation_id' AND `sub_variation_id`='$sub_variation_id'");

$data_dealer = $query->fetch_object();
echo $data_dealer->purchase_price;


?>
