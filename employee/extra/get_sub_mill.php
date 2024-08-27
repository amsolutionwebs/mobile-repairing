<?php
include 'config/config.php';
$id = $_POST['value'];
$query = $db->query("SELECT * FROM `submill` WHERE master_mill_code='$id'");
if($query->num_rows > 0){ ?>

<option value="">-- Choose Mill Code --</option>
<?php

while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["mill_code"]; ?></option>
<?php
}}else{
  	echo "no";
  }
?>