<?php
include 'config/config.php';
if(!empty($_POST["cat_id"]))
{
$query =$db->query("SELECT * FROM sub_category WHERE category_id = '" . $_POST["cat_id"] . "'");
?>
<option value="">Choose Sub Category</option>

<?php
while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["sub_category_name"]; ?></option>
<?php
}
}
?>