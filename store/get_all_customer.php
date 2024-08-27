<?php
include 'config/config.php';
// $id = $_POST['value'];
$query = $db->query("SELECT * FROM `customer_managment` ORDER BY name");
if($query->num_rows > 0){ ?>

<option value="">Select Customer</option>
<?php

while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
<?php
}}else{
  	echo "no";
  }
?>