<?php
include 'config/config.php';
if(!empty($_POST["value"]))
{
$query =$db->query("SELECT * FROM cities WHERE state_id = '" . $_POST["value"] . "'");
?>
<option value="">Select City</option>

<?php
while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["city"]; ?></option>
<?php
}
}
?>