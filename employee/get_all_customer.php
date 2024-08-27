<?php
include 'config/config.php';
// $id = $_POST['value'];
$store_id = $_SESSION['store_id'];

$query = $db->query("SELECT * FROM `customer_managment` WHERE store_id='$store_id' ORDER BY name");
if($query->num_rows > 0){ ?>

<option value="">Select Customer</option>
<?php

while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?>-<?php echo $row["mobile_number"]; ?></option>
<?php
}}else{
  	echo "no";
  }
?>