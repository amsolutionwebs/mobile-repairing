<?php
include 'config/config.php';

$product_id = $_POST['product_id'];
$query =$db->query("SELECT `variation_id` FROM `product_variation` WHERE `product_id`='$product_id'");

if($query->num_rows > 0){ ?>




<option value="0">Select Variation</option>
<?php while($row=mysqli_fetch_array($query))
{
  $variation_id = $row['variation_id'];
  $query1 = $db->query("SELECT * FROM `variation` WHERE id='$variation_id'");
  $value_variation =  $query1->fetch_object();


?>

<option value="<?php echo $value_variation->id; ?>"><?php echo $value_variation->variation_name; ?></option>
<?php
}
  }else{ ?>
      <option value="0">No Variation Available</option>
  <?php }
?>
