<?php
include 'config/config.php';

$sub_variation_id = $_POST['sub_variation_id'];
$query =$db->query("SELECT * FROM `sub_variation_type` WHERE  `sub_variation`='$sub_variation_id'");

if($query->num_rows > 0){ ?>


<option value="0">Select Sub Variation Type</option>
<?php while($row=mysqli_fetch_array($query))
{


?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['sub_variation_type']; ?></option>
<?php
}
  }else{ ?>
  		<option value="0">No Sub Variation Type Available</option>
  <?php	}
?>