<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$indent_id = $_GET['indent_id'];
	$data_cmp = $db->query("SELECT * FROM invoice WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$sub_mill_code = $master_value->sub_mill_code;
	$sub_mill_name = $master_value->sub_mill_name;
	$broker_code = $master_value->broker_code;
	$dealer_code = $master_value->dealer_code;
	$dealer_name = $master_value->dealer_name;
	$indent_no = $master_value->indent_no;
	$invoice_number = $master_value->invoice_number;
	$invoice_date = $master_value->invoice_date;
	$document_through = $master_value->document_through;
	$doc_encl = $master_value->doc_encl;
	$transporter = $master_value->transporter;
	$lr_no = $master_value->lr_no;
	$lr_date = $master_value->lr_date;
	$currency = $master_value->currency;

	$total_first = $master_value->total_first;
	$insurance = $master_value->insurance;
	$cashdiscount = $master_value->cashdiscount;
	$cgst = $master_value->cgst;
	$sgst = $master_value->sgst;
	$igst = $master_value->igst;
	$total_insurance = $master_value->total_insurance;
	$total_cashdiscount = $master_value->total_cashdiscount;
	$total_cgst = $master_value->total_cgst;
	$total_sgst = $master_value->total_sgst;
	$total_igst = $master_value->total_igst;
	$round_off = $master_value->round_off;
	$indent_no = $master_value->indent_no;
	$units = $master_value->units;
	$all_total_amount = $master_value->all_total_amount;
	






}

$datey = date("Y");
$date_next = date("y")+1;
$data = $db->query("SELECT * FROM purchase_order ORDER BY id DESC LIMIT 1");
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
									<h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Purchase Order</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="purhase_managment_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="purchase_order_action.php">
								<div class="row px-2 py-3">
									<!-- registration page -->
				
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Purchase Order Number</label>
									<input type="text" name="purchase_order_number" class="form-control purchase_order_number" value="<?php echo $freciept_name; ?>" <?php if($action!=='update'){ echo 'onchange="getInvoiceAlready(this.value)"';} ?> readonly> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Purchase Order Date </label>
									<input type="text" class="form-control cal-icon purchase_order_date" placeholder="Choose Purchase Date" value="<?php echo date("d-m-Y H:i:s"); ?>" name="purchase_order_date" autocomplete="off" readonly > </div>
							</div>
							
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Vendor Name</label>
									<select class="form-control select2 vendor_id" name="vendor_id">
										<option>-- Choose Vendor -- </option>
										<?php 
                
                 $data_master = $db->query("SELECT * FROM `vendor_managment`");
                    while ($value_master = $data_master->fetch_object()) { ?>
											<option value="<?php echo $value_master->id; ?>">
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
										<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
											</div>
										</div>
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

<tr id="TRbodyinvoice">
													<td id="mysort" width="250">
												
																<select class="form-control" name="product_id[]">
                                	
           <?php 
                   $data1 = $db->query("SELECT * FROM `products`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>" <?php if($value_emp->category_id===$value1->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value1->products_title; ?></option>
                      <?php } ?>
                                </select>
															
													</td>
												
													<td>
														<input type="text" name="product_desc[]" class="product_desc form-control text-center" id="product_desc" placeholder="Description" required> </td>
													<td>
														<input type="text" name="quantity[]" class="quantity form-control text-center" id="quantity" placeholder="Quantity" onchange="Calc(this)" required> </td>
												<td>
											<input type="text" name="price[]" class="price form-control text-center" id="price" placeholder="Price" onchange="Calc(this)"  required> </td>
											<td>
												<input type="text" name="total[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" required readonly> </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>







											</tbody>



											<tbody width="100%">
										
										<tr>
											<td colspan="4" style="text-align: center;"> Total </td>
											<td colspan="3">
												<input type="text" name="total_first" class="currency form-control text-center total_first" placeholder="Total" id="total_first" value="<?php echo $total_first;?>" readonly> </td>
										</tr>

									

										<tr>
											<td colspan="1" style="text-align: center;"> Other</td>
											<td colspan="3" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name"  ></td>
											<td colspan="3">
												<input type="text" name="misc_value" class="misc_value form-control text-center" placeholder="Total Misc Value" id="misc_value" value="" onchange="getMiscOff(this.value)"> </td>
										</tr>

										<tr>
											<td colspan="4" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getMiscOff(this)" value="<?php echo $round_off; ?>"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3">Total Amount </th>
											<th><input type="text" name="total_price_two" class="text-center" placeholder="Total Price" id="total_price_two" style="border: none;background: #1b2850;color: #fff;" value="<?php echo $units;?>" ></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="final_price" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="final_price text-center" placeholder="All Total Amount" value="<?php echo $all_total_amount;?>" id="final_price"></th>
										</tr>
									</thead>
										</table>
									</div>

								 <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="5">
							  
				<input type="hidden" name="user_id" value="5">
			
              <input type="submit" value="<?php if($action=='update'){echo "Update";}else{echo "Submit";} ?>" class="btn btn-primary float-right"> </div>
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

function TableDelete(btndelete) {
	$(btndelete).parent().parent().remove();
	total1(btndelete);
}

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
	var units_all = document.getElementsByName("price[]");
	var sum_units = 0;
	for(let i = 0; i < units_all.length; i++) {
		var total_unites = units_all[i].value;
		sum_units = +(sum_units) + +(total_unites);
	}
	document.getElementById("total_price_two").value = sum_units;
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