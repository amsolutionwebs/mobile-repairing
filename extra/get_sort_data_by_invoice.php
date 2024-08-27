
<?php
include 'config/config.php';

$invoice_id = $_POST['value'];



$query =$db->query("SELECT * FROM `invoice_sort_date` WHERE `invoice_id`='$invoice_id'");
?>
<option value="0">--Choose Sort--</option>

<?php
while($value = $query->fetch_object())
{
		$data2 = $db->query("SELECT * FROM `indent_plus` WHERE id='$value->sort_id'");
        $value2 = $data2->fetch_object();
        
        $data3 = $db->query("SELECT * FROM sort WHERE id='$value2->sort_id'");
        $value3 = $data3->fetch_object();
        
?>

<option value="<?php echo $value->id; ?>"><?php echo $value3->sort_no; ?> - <?php echo $value3->sort_description; ?></option>


<?php
}

?>

