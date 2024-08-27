<?php
include 'config/config.php';

$company_login_id = $_POST['company_login_id'];

$query =$db->query("SELECT * FROM sort WHERE company_id='$company_login_id' ORDER BY id DESC");
?>
<option value="0">--Choose Sort--</option>

<?php
while($row=mysqli_fetch_array($query))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["sort_no"]; ?></option>
<?php
}



?>

