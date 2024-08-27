
<?php
include 'config/config.php';

$indent_id = $_POST['value'];

$query =$db->query("SELECT * FROM `indent_plus` WHERE indent_id='$indent_id'");
?>
<option value="0">--Choose Sort--</option>

<?php
while($value = $query->fetch_object())
{
		 $data = $db->query("SELECT * FROM sort WHERE id='$value->sort_id'");
                    $value2 = $data->fetch_object();
?>

<option value="<?php echo $value->id; ?>"><?php echo $value2->sort_no; ?> - <?php echo $value2->sort_description; ?></option>


<?php
}

?>

