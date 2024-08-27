<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM purchase_order WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
	$vendor_id = $value_emp->vendor_id;
	$purchase_order_number = $value_emp->purchase_order_number;

}


$datey = date("Y");
$date_next = date("y")+1;
$data = $db->query("SELECT * FROM purchase_order WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->purchase_order_number;
if(empty($recipt_name))
{
  $freciept_name = 'PO-'.$datey."-".$date_next."/01";
}else
{
  $explode_val= explode("/",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = 'PO-'.$datey.'-'.$date_next.'/0'.$exe_value;
}

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-md-12">
						<div class="card mt-2 px-1" style="border-top:3px solid tomato;">
							<!-- /.card-header -->
							<div class="row py-2 px-1 border-bottom" style="background: #e0f7e870;">
								<div class="col-11 px-2 d-flex">
									<div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users" style="font-size: 25px; color:#fff;"></i> </div>
									<h5 class="d-flex justify-content-center align-items-center text-center">Update Vendor Purchase Order</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="vendor_purchase_managment_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="vendor_purchase_order_action.php">
								<div class="row px-2 py-3">
									<!-- registration page -->
				
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Purchase Order Number</label>
									<input type="text" name="purchase_order_number" class="form-control purchase_order_number" value="<?php echo $purchase_order_number; ?>" readonly> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Purchase Order Date </label>
									<input type="text" class="form-control cal-icon purchase_order_date" placeholder="Choose Purchase Date" value="<?php echo $value_emp->purchase_order_date; ?>" name="purchase_order_date"> </div>
							</div>
							
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Vendor Name</label>
									<select class="form-control select2 vendor_id" name="vendor_id">
										<option>-- Choose Vendor -- </option>
										<?php 
                
                 $data_master = $db->query("SELECT * FROM `vendor_managment` WHERE store_id='$store_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
											<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$vendor_id){echo 'selected';} ?>>
												<?php echo $value_master->vendor_id.'-'.$value_master->vendor_name; ?>
											</option>
										
                                    <?php } ?>
									</select>
								</div>
							</div>
							
							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
								<option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
								</select>
							</div>
						</div>
							
							

							<div class="col-lg-12 col-sm-12 col-12 mb-4 mt-3">
										
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											<th>Product Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
										</tr>
											</thead>
										

											<tbody id="Tbodyinvoice">
<?php
    $product_details_id = $_GET['post'];
    $data_repair_details = $db->query("SELECT * FROM purchase_order_details WHERE purchase_order_id='$product_details_id'");
    while ($value_order_details = $data_repair_details->fetch_object()) {
    
    ?>
<tr id="TRbodyinvoice">
													<td id="mysort" width="250">
												
																<select class="form-control" name="product_id[]">
                                	
           <?php 
                   $data1 = $db->query("SELECT * FROM `products`");
                    while ($value_products = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value_products->id; ?>" <?php if($value_products->id==$value_order_details->product_id){echo "selected";} ?>  style="text-transform: uppercase;"><?php echo  $value_products->products_title; ?></option>
                      <?php } ?>
                                </select>
															
													</td>
												
													<td>
														<input type="text" name="product_desc[]" class="product_desc form-control text-center" id="product_desc" placeholder="Description" value="<?php echo $value_order_details->product_desc; ?>" required> </td>
													<td>
														<input type="text" name="quantity[]" class="quantity form-control text-center" id="quantity" placeholder="Quantity"  value="<?php echo $value_order_details->quantity; ?>" onchange="Calc(this)" required> </td>
												<td>
											<input type="text" name="price[]" class="price form-control text-center" id="price" placeholder="Price" onchange="Calc(this)" value="<?php echo $value_order_details->price; ?>" required> </td>
											<td>
												<input type="text" name="total[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_order_details->total; ?>" required readonly> </td>
													<td class="text-center justify-conent-center">
														<input type="hidden" name="post_id_update[]" value="<?php echo $value_order_details->id; ?>" />
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this,<?php echo $product_details_id; ?>,<?php echo $value_order_details->id; ?>)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>


<?php } ?>




											</tbody>



											<tbody width="100%">
										
										<tr>
											<td colspan="4" style="text-align: center;"> Total </td>
											<td colspan="3">
												<input type="text" name="total_first" class="currency form-control text-center total_first" placeholder="Total" id="total_first" value="<?php echo $value_emp->total_first;?>" readonly> </td>
										</tr>

									

										<tr>
											<td colspan="1" style="text-align: center;"> Other</td>
											<td colspan="3" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name"  value="<?php echo $value_emp->misc_name;?>"></td>
											<td colspan="3">
												<input type="text" name="misc_value" class="misc_value form-control text-center" placeholder="Total Misc Value" id="misc_value" value="<?php echo $value_emp->misc_value;?>" onchange="getMiscOff(this.value)"> </td>
										</tr>

										<tr>
											<td colspan="4" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getMiscOff(this)" value="<?php echo $value_emp->round_off;?>"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="4">Total Amount </th>
										
											<th colspan="4" style="text-align: right !important;"><input type="text" name="final_price" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="final_price text-center" placeholder="All Total Amount" value="<?php echo $value_emp->final_price;?>" id="final_price"></th>
										</tr>
									</thead>
										</table>
									</div>

								 <div class="col-md-12">
             <input type="hidden" name="submit" value="update" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
							  
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			
              <input type="submit" value="Update" class="btn btn-primary float-right"> </div>
									<!--  -->
								</div>
							</form>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /.container-fluid -->
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php 
require_once("common/footer.php");
require_once("common/script.php");
?>
		<script>

function AddMore() {
	var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
	$(tbd).find("input").val('');
	$(tbd).find("select").select2();
	$(tbd).removeClass("d-none");
	$(tbd).find(".sort_select").each(function() {
		$(this).on("change", function() {
			var value = $(this).val();
			$.ajax({
				type: "POST",
				url: 'get_sort_data_indent.php',
				data: {
					value: value
				},
					beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
				success: function(response) {
				     $("#setloader").removeClass("pageloader");
					if(response.trim() != "no_data") {
						var all_data = JSON.parse(response.trim());
						var paid_quantity = all_data[0].paid_quantity;
						var quantity = all_data[0].quantity;
						var blance_qty = (quantity)-(paid_quantity);
						$(tbd).find("#quantity_invoice").val(blance_qty);
						$(tbd).find("#rate_invoice").val(all_data[0].price);
						var qty = $(tbd).find("#quantity_invoice").val();
						var rate = $(tbd).find("#rate_invoice").val();
						var amt = qty * rate;
						$(tbd).find("#total_amount_first").val(amt);
						total1();
					} else {
						alert("No Data Found");
					}
				}
			});
		});
	});
}
$(document).ready(function() {
	$('.sort_select').each(function() {
		$(this).on("change", function() {
			var value = $(this).val();
			$.ajax({
				type: "POST",
				url: 'get_sort_data_indent.php',
				data: {
					value: value
				},
				beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
				success: function(response) {
				    $("#setloader").removeClass("pageloader");
					if(response.trim() != "no_data") {
						var all_data = JSON.parse(response.trim());
						var paid_quantity = all_data[0].paid_quantity;
						var quantity = all_data[0].quantity;
						var blance_qty = (quantity)-(paid_quantity);
						$("#quantity_invoice").val(blance_qty);
						$("#rate_invoice").val(all_data[0].price);
						var qty = $("#quantity_invoice").val();
						var rate = $("#rate_invoice").val();
						var amt = qty * rate;
						$("#total_amount_first").val(amt);
						total1();
					} else {
						alert("No Data Found");
					}
				}
			});
		});
	});
});

function TableDelete(btndelete,por_id,product_details_id) {
				var result = confirm("Are you sure you want to delete this sort?");

				if(result){
					$(btndelete).parent().parent().remove();
        	total1(btndelete);

var total_first = $(".total_first").val();
var miscs_name = $('.miscs_name').val();
var misc_value = $('.misc_value').val();
var round_off = $('.round_off').val();
var final_price = $('.final_price').val();


				var delete_vendor_purchase_order = 'delete_vendor_purchase_order';
 						 $.ajax({
        type: "POST",
        url: "delete_action.php",
        data: {
        	delete_vendor_purchase_order : delete_vendor_purchase_order,
        	por_id : por_id,
        	product_details_id : product_details_id,
        	total_first : total_first,
        	miscs_name : miscs_name,
        	misc_value : misc_value,
        	round_off : round_off,
        	final_price : final_price,
        	
        },
        success: function(e){
        
        if(e.trim()=="success"){
        	window.location = location.href;
        }else{
        	window.location = location.href;
        }

         }  
 							
		       
		    });
 						
	
}}

function Calc(value) {
	var index = $(value).parent().parent().index();
	var qty = document.getElementsByName("quantity[]")[index].value;
	var rate = document.getElementsByName("price[]")[index].value;
	var amt = qty * rate;
	document.getElementsByName("total[]")[index].value = amt.toFixed(2);
	total1();
	
}

function total1(value) {
	var amts = document.getElementsByName("total[]");
	var sum = 0;
	for(let i = 0; i < amts.length; i++) {
		var total2 = amts[i].value;
		sum = +(sum) + +(total2);
	}
	document.getElementById("total_first").value = sum;
	getMiscOff();
}



function getMiscOff(value) {
	var total_ff = document.getElementById("total_first").value;
	
	var total_miscs = document.getElementById("misc_value").value;
	var total_rounde = document.getElementById("round_off").value;
	var final_round_off = + +(total_ff)+ +(total_miscs) + +(total_rounde);
	document.getElementById("final_price").value = final_round_off;
}









		</script>
		</body>

		</html>