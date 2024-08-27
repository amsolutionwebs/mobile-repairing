<?php
include 'config/config.php';

if(!empty($_POST["brand_id"]))
{
$query =$db->query("SELECT * FROM model_number WHERE brand_id = '". $_POST["brand_id"]."'");
?>
<option value="">Select Model Number</option>

<?php
while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["model_number"]; ?></option>
<?php
}
}
?>