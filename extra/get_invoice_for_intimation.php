<?php
include 'config/config.php';

$dealer_id = $_POST['value'];
$mill_code = $_POST['default_mill_code'];

$query =$db->query("SELECT * FROM invoice WHERE `default_mill_code`='$mill_code' AND `dealer_code`='$dealer_id'");

if($query->num_rows > 0){ ?>


<option value="0">--Choose Invoice--</option>
<?php while($row=mysqli_fetch_array($query))
{
?>

<option value="<?php echo $row["id"]; ?>"><?php echo $row["invoice_number"]; ?></option>
<?php
}
  }else{
  		echo "no_fount";
  	}
?>


