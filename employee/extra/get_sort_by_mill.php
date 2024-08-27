<?php
include 'config/config.php';

$master_mill_id = $_POST['masterMill'];

$query =$db->query("SELECT * FROM `sort` WHERE `master_mill_code`='$master_mill_id'");

if($query->num_rows > 0){ ?>


<option value="0">--Choose Sort--</option>
<?php while($row=mysqli_fetch_array($query))
{
?>

<option value="<?php echo $row["id"]; ?>"><?php echo $row["sort_no"]; ?></option>
<?php
}
  }else{ ?>
  		<option value="0">--No Sort Available--</option>
  <?php	}
?>


