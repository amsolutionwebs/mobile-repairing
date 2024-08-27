<?php
include 'config/config.php';

$variation_id = $_POST['variation_id'];
$query =$db->query("SELECT * FROM `sub_variation` WHERE  `variation_id`='$variation_id'");

if($query->num_rows > 0){ ?>


<option value="0">Select Sub Variation</option>
<?php while($row=mysqli_fetch_array($query))
{


?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['sub_variation_name']; ?></option>
<?php
}
  }else{ ?>
  		<option value="0">No Sub Variation Available</option>
  <?php	}
?>
