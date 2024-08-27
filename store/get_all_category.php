<?php
include 'config/config.php';
// $id = $_POST['value'];
$query = $db->query("SELECT * FROM `category` ORDER BY category_name");
if($query->num_rows > 0){ ?>

<option value="">Select Category</option>
<?php

while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["category_name"]; ?></option>
<?php
}}else{ ?>
  	<option value="">No Found</option>
  <?php } ?>