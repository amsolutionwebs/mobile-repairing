<?php
include 'config/config.php';
if(!empty($_POST["value"]))
{
$query =$db->query("SELECT * FROM states WHERE country_id = '" . $_POST["value"] . "'");
?>
<option value="">Select State</option>

<?php
while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
<?php
}
}
?>