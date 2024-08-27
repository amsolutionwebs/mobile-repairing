<?php
include 'config/config.php';

$indent_id = $_POST['value'];
$data_indent_plus = $db->query("SELECT * FROM `indent_plus` WHERE indent_id='$indent_id'");
?>
<option value="0">--Choose Sort--</option>

<?php
while($row=mysqli_fetch_array($data_indent_plus))
{
	$sort_id = $row["sort_id"];
	$datasrt = $db->query("SELECT * FROM sort WHERE id='$sort_id'");
                    $value_sort = $datasrt->fetch_object();
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $value_sort->sort_no; ?> - <?php echo $value_sort->sort_description; ?></option>
<?php
}



?>

