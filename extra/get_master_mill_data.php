<?php

include 'config/config.php';
$id = $_POST['value'];

$get_data = "SELECT * FROM `mill` WHERE id='$id'";

$response = $db->query($get_data);

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