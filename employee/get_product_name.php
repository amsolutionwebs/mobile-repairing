<?php
include 'config/config.php';

$cat_id = $_POST['cat_id'];
$sub_cat_id = $_POST['sub_cat_id'];
$model_number_id_get = $_POST['model_number_id_get'];
$brand_id = $_POST['brand_id'];

$query_category = $db->query("SELECT * FROM `category` WHERE id='$cat_id'");
$data_category = $query_category->fetch_object();
$category_name = $data_category->category_name;

// get sub cate
$query_sub_cat_id = $db->query("SELECT * FROM `sub_category` WHERE id='$sub_cat_id'");
$data_query_sub_cat_id = $query_sub_cat_id->fetch_object();
$sub_category_name = $data_query_sub_cat_id->sub_category_name;

// get brand 
$query_brand = $db->query("SELECT * FROM `brand` WHERE id='$brand_id'");
$data_brand = $query_brand->fetch_object();
$brand_name = $data_brand->brand_name;

// get model 
$query_model = $db->query("SELECT * FROM `model_number` WHERE id='$model_number_id_get'");
$data_model = $query_model->fetch_object();
$model_name = $data_model->model_number;

echo $category_name."-".$sub_category_name."-".$brand_name."-".$model_name;


?>