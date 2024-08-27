<?php
include 'config/config.php';

$dealer_id = $_POST['value'];
$master_mill_id = $_POST['masterMill'];

$query =$db->query("SELECT * FROM indent WHERE `mill_code`='$master_mill_id' AND `dealer_code`='$dealer_id'");

if($query->num_rows > 0){ ?>


<option value="0">--Choose Indent--</option>
<?php while($row=mysqli_fetch_array($query))
{
?>

<option value="<?php echo $row["id"]; ?>"><?php echo $row["indent_no"]; ?></option>
<?php
}
  }else{
  		echo "no_fount";
  	}
?>


