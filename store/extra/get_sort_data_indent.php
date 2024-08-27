<?php

include 'config/config.php';
$id = $_POST['value'];
$response = $db->query("SELECT * FROM `indent_plus` WHERE id='$id'");

$all_master_mill_data = [];



if($response)
{
	while($data = $response->fetch_assoc())
	{
	array_push($all_master_mill_data,$data);
	}

	echo json_encode($all_master_mill_data);
}
else
{
	echo"no_data";
}

?>