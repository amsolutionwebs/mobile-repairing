<?php
include 'config/config.php';

$variation_id = $_POST['variation_id'];
$product_id = $_POST['product_id'];

$query =$db->query("SELECT * FROM `product_variation` WHERE `product_id`='$product_id' AND `variation_id`='$variation_id'");

if($query->num_rows > 0){ ?>


<option value="0">Select Sub Variation</option>
<?php while($row=mysqli_fetch_array($query))
{

  $sub_variation_id = $row['sub_variation_id'];
  $query1 = $db->query("SELECT * FROM `sub_variation` WHERE id='$sub_variation_id'");
  $value_sub_variation =  $query1->fetch_object();

?>

<option value="<?php echo $value_sub_variation->id; ?>"><?php echo $value_sub_variation->sub_variation_name; ?></option>
<?php
}
  }else{ ?>
  		<option value="0">No Sub Variation Available</option>
  <?php	}
?>
