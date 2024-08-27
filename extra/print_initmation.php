<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

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
									<h5 class="d-flex justify-content-center align-items-center text-center">Select Mill And Dealer Detail For Intimation Print</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="print.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="print_intimation_invoice_final.php">
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Mill And Dealer Details:-</b></h4>
										<hr> </div>
									<div class="col-lg-4 col-sm-4 col-12">
								<div class="form-group">
									<label>Default Mill Code</label>
									<select class="form-control select2 default_mill_code" name="default_mill_code">
										<option>-- Choose Default Mill Code -- </option>
										<?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
											<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$mill_code){echo "selected";}?>>
												<?php echo $value_master->mill_code; ?>-<?php echo $value_master->mill_name; ?>
											</option>
											<?php } 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
											<option value="<?php echo $value_subm->id; ?>" <?php if($value_subm->id==$sub_mill_code){echo "selected";}?>>
												<?php echo $value_subm->mill_code; ?>-<?php echo $value_subm->mill_name; ?>
											</option>
											<?php } ?>

									</select>
								</div>
							</div>
								
								
									
								
								
									<div class="col-lg-4 col-sm-4 col-12">
								<div class="form-group">
									<label>Dealer Code</label>
									<select class="form-control select2 dealer_code" name="dealer_code" onchange="getInvoiceForIntimation(this.value)" id="dealer_code_invoice"  required>
										<option value="">-- Choose Dealer Code --</option>
										<?php 
                
                   $data_dealer = $db->query("SELECT * FROM `dealer` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_dealer = $data_dealer->fetch_object()) { ?>
											<option value="<?php echo $value_dealer->id; ?>" <?php if($value_dealer->id==$dealer_code){echo "selected";}?>>
												<?php echo $value_dealer->dealer_code; ?>-<?php echo $value_dealer->dealer_name; ?>
											</option>
											<?php } ?>
									</select>
									
								</div>
							</div>
									
								
								
							
									<div class="col-lg-12 col-sm-12 col-12 mb-4">
										<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Invoice</button>
											</div>
										</div>
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
												<tr>
													<th>Invoice Number</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="Tbodyinvoice">
												<tr id="TRbodyinvoice">
													<td id="mysort" >
														<div class="row">
															<div class="col-lg-12 col-sm-12 col-12" id="sort_fileds">
																<select class="form-control py-2 invoice_by_default_mill" id="invoice_by_default_mill" name="inovice_no[]">
																	<option value="0">--Choose Invoice Number--</option>
																
																</select>
															</div>
														
														</div>
													</td>
													<td class="text-center justify-conent-center" width="200">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDeleteInent(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								
									<div class="col-md-12">
										<input type="hidden" name="submit" value="publish" />
										
										<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id" class="company_id">
										<input type="submit" id="submitButtonId" value="Submit" class="btn btn-primary float-right add_indent"> </div>
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
	
function getInvoiceForIntimation(value){
    	var mill_code = $(".default_mill_code").val();
    	$.ajax({
		type: "POST",
		url: 'get_invoice_for_intimation.php',
		data: {
			value: value,
			default_mill_code: mill_code
		},
			beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
		success: function(data) {
		  
		    $("#setloader").removeClass("pageloader");
			$("#invoice_by_default_mill").html(data);
		}
	});
}  


function AddMore(){

var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
$(tbd).find("input").val('');
$(tbd).removeClass("d-none");
}

function TableDeleteInent(btndelete) {
$(btndelete).parent().parent().remove();
}



		</script>
		</body>

		</html>