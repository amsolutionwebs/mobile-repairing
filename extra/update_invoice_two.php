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
	$misc_name = $master_value->misc_name;
	$misc_value = $master_value->misc_value;
	$round_off = $master_value->round_off;
	$indent_no = $master_value->indent_no;
	$units = $master_value->units;
	$all_total_amount = $master_value->all_total_amount;
	


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
									<h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Invoice</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="invoice_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="invoice_action_two.php">
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Inovice Details:- </b></h4>
										<hr> </div>
									<div class="col-lg-3 col-sm-6 col-12">
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

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Master Mill Code</label>
									<select class="form-control select2 mill_code" name="mill_code" onchange="getMasterMillName2(this.value)" id="master_mill_invoice" >
										<option>-- Choose Master Mill Code -- </option>
										<?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
											<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$mill_code){echo "selected";}?>>
												<?php echo $value_master->mill_code; ?>-<?php echo $value_master->mill_name; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Master Mill Name</label>
									<input type="text" name="mill_name"  id="mill_name_2" class="form-control mill_name" value="<?php echo $mill_name; ?>" readonly="readonly"> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Dealer Code</label>
									<select class="form-control select2 dealer_code" name="dealer_code" onchange="getDealerName_2(this.value)" id="dealer_code_invoice" <?php if($exits=="yes"){echo "readonly";}?>>
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
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Dealer Name</label>
									<input type="text" class="form-control dealer_name" name="dealer_name" id="dealer_name_2" value="<?php echo $dealer_name; ?>" readonly="readonly"> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "ddd ";} ?>" id="submillfield_2">
								<div class="form-group">
									<label>Mill Code</label>
									<select class="form-control submillselect sub_mill_code" name="sub_mill_code" onchange="getSubMillName(this.value)" id="mill_code_invoice">
										<option>-- Choose Mill Code --</option>
										<?php 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
											<option value="<?php echo $value_subm->id; ?>" <?php if($value_subm->id==$sub_mill_code){echo "selected";}?>>
												<?php echo $value_subm->mill_code; ?>-<?php echo $value_subm->mill_name; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "ddd ";} ?>" id="submillfieldname_2">
								<div class="form-group">
									<label>Mill Name</label>
									<input type="text" name="sub_mill_name"  id="sub_mill_name" class="form-control sub_mill_name2" value="<?php echo $sub_mill_name; ?>" readonly="readonly"> </div>
							</div>
							
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Broker/Salesman</label>
									<select class="form-control select2" name="broker_code">
										<option>Choose Broker/Salesman Code</option>
										<?php 
                
                   $data_bb = $db->query("SELECT * FROM `broker` WHERE company_id='$company_login_id'");
                    while ($value_br = $data_bb->fetch_object()) { ?>
											<option value="<?php echo $value_br->id; ?>" <?php if($value_br->id==$broker_code){echo "selected";}?>>
												<?php echo $value_br->code_one; ?>-<?php echo $value_br->name_one; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>


							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Indent Number</label>
									<select class="form-control select2 indent_no" name="indent_no" id="indent_no_invoice" onchange="getIndentValueInvoice(this.value)"  readonly>
										<option value="0">--Choose Indent--</option>
										<?php 
                
                   $data_indent = $db->query("SELECT * FROM `indent` WHERE company_id='$company_login_id' AND mill_code='$mill_code' AND dealer_code='$dealer_code'");
                    while ($value_indent = $data_indent->fetch_object()) { ?>
											<option value="<?php echo $value_indent->id; ?>" <?php if($value_indent->id==$indent_no){echo "selected";}?>>
												<?php echo $value_indent->indent_no; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Invoice Number</label>
									<input type="text" name="invoice_number" class="form-control invoice_number" value="<?php echo $invoice_number; ?>" <?php if($action!=='update'){ echo 'onchange="getInvoiceAlready(this.value)"';} ?> required> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Invoice Date </label>
									<input type="date" class="form-control cal-icon invoice_date" placeholder="Choose Invoice Date" value="<?php echo $invoice_date; ?>" name="invoice_date" autocomplete="off"  > </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Document Through</label>
									<select class="form-control select2 document_through" name="document_through" required>
										<option value="#">--Choose Document Through--</option>
										<option value="direct" <?php if($document_through=='direct' ){ echo "selected";}?>>Direct</option>
										<option value="self" <?php if($document_through=='self' ){ echo "selected";}?>>Self</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Doc. Encl</label>
									<select class="form-control select2 doc_encl" name="doc_encl" required>
										<option>--Choose Doc. Encl --</option>
										<option value="yes" <?php if($doc_encl=='yes' ){ echo "selected";}?>>Yes</option>
										<option value="no" <?php if($doc_encl=='no' ){ echo "selected";}?>>No</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Transporter</label>
									<input type="text" name="transporter" class="form-control transporter" id="transporter" value="<?php echo $transporter; ?>" required> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label for="lr_no">L/R No</label>
									<input type="text" value="<?php echo $lr_no; ?>" name="lr_no" class="form-control lr_no"> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>LR Date </label>
									<input type="date" class="form-control cal-icon lr_date" placeholder="Choose Lr Date" name="lr_date" value="<?php echo $lr_date; ?>" autocomplete="off"> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Currency</label>
									<input type="text" name="currency" value="<?php echo $currency; ?>" class="form-control currency" id="currency_invoice"> </div>
							</div>

							<div class="col-lg-12 col-sm-12 col-12 mb-4">
										<div class="table-top mb-1">
											
										</div>
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											<th>Sort</th>
											<th>HSN/SAC Code</th>
											<th>U/M</th>
											<th>Quantity</th>
											<th>Rate</th>
											<th>Total Value</th>
											<th>Action</th>
										</tr>
											</thead>
										

											<tbody id="Tbodyinvoice">


<?php 
					
$invoice_id = $_GET['post'];
$indent_id = $_GET['indent_id'];
					$data_entry = $db->query("SELECT * FROM invoice_sort_date WHERE invoice_id='$invoice_id' AND indent_id='$indent_id'");
                    while ($value_entry = $data_entry->fetch_object()) {
									?>




												<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control myselect2 sort_select" name="sort_no[]" id="sort_by_indent">
																	<option value="0">--Choose Sort--</option>
																	
	<?php 
                
                   $data_indent_plus = $db->query("SELECT * FROM `indent_plus` WHERE indent_id='$indent_id'");
                    while ($value_indent_plus = $data_indent_plus->fetch_object()) { 

                    	$datasrt = $db->query("SELECT * FROM sort WHERE id='$value_indent_plus->sort_id'");
                    $value_sort = $datasrt->fetch_object();


                    	?>
											<option value="<?php echo $value_indent_plus->id; ?>" <?php if($value_indent_plus->id==$value_entry->sort_id){echo "selected";} ?>>
												<?php echo $value_sort->sort_no; ?> - <?php echo $value_sort->sort_description; ?>
											</option>
											<?php } ?>



																</select>
															
													</td>
													<td>
														<input type="text" name="hsn_code[]" class="hsn_code form-control text-center" id="currency_invoice" placeholder="HSN/SAC Code" value="<?php echo $value_entry->hsn_code;?>" required>
													</td>
													<td>
														<input type="text" name="unit_messure[]" class="unit_messure form-control text-center" id="unit_messure" value="<?php echo $value_entry->units;?>" placeholder="U/M" required> </td>
													<td>
														<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice" placeholder="Quantity" onchange="Calc(this)" value="<?php echo $value_entry->quantity;?>" required > </td>
												<td>
											<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice" placeholder="Rate" onchange="Calc(this)" value="<?php echo $value_entry->rate;?>" required> </td>
											<td>
												<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_entry->total_one;?>"  readonly>
												
												<input type="hidden" name="sort_post_id[]" value="<?php echo $value_entry->id;?>">
												 </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this,<?php echo $value_entry->id;?>)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>
											


<?php } ?>








											</tbody>



											<tbody width="100%">
										
										<tr>
											<td colspan="4" style="text-align: center;"> Total </td>
											<td colspan="3">
												<input type="text" name="total_2" class="currency form-control text-center total_2" placeholder="Total" id="total_2" value="<?php echo $total_first;?>" readonly> </td>
										</tr>
										

										<tr>
											<td colspan="3" style="text-align: center;"> Cash Discount (%)</td>
											<td colspan="1" style="text-align: center;"> 

												<input type="text" name="cashd" class="cashd form-control text-center cashd" placeholder="Cash.D (in %)" value="<?php echo $cashdiscount;?>" id="cashd" onchange="Calc2(this)" >
											</td>
											<td colspan="3">
												<input type="text" name="total_cashd" class="total_cashd form-control text-center cashd" placeholder="Total Value Of Cash Discount" id="total_cashd" value="<?php echo $total_cashdiscount; ?>"> </td>
										</tr>

										<tr>
											<td colspan="3" style="text-align: center;"> Insurance (Value)</td>
											<td colspan="1" style="text-align: center;"> <input type="text" name="insurance" class="insurance form-control text-center" value="<?php echo $insurance;?>" placeholder="Insurance (With Value)" id="insurance" onchange="Calc2(this)" ></td>
											<td colspan="3">
												<input type="text" name="total_insurance" class="total_insurance form-control text-center" placeholder="Total Value Of Insurance" value="<?php echo $total_insurance;?>" id="total_insurance"> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> CGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="text" name="cgst" class="cgst form-control text-center" value="<?php echo $cgst;?>" placeholder="CGST (in %)" id="cgst" onchange="Calc2(this)"></td>
											<td colspan="3">
												<input type="text" name="total_cgst" class="total_cgst form-control text-center" placeholder="Total Value Of CGST" id="total_cgst" value="<?php echo $total_cgst;?>"> </td>
										</tr>
										
										<tr>
											<td colspan="3" style="text-align: center;"> SGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="text" name="sgst" class="sgst form-control text-center" value="<?php echo $sgst;?>" placeholder="SGST (in %)" id="sgst" onchange="Calc2(this)">
										</td>
											<td colspan="3">
												<input type="text" name="total_sgst" class="total_sgst form-control text-center" placeholder="Total Value Of SGST" id="total_sgst" value="<?php echo $total_sgst;?>"> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> IGST (%)</td>
											<td colspan="1" style="text-align: center;"> <input type="text" name="igst" class="igst form-control text-center" placeholder="IGST (in %)" value="<?php echo $igst;?>" id="igst" onchange="Calc2(this)"></td>
											<td colspan="3">
												<input type="text" name="total_igst" class="total_igst form-control text-center" placeholder="Total Value Of IGST" id="total_igst" value="<?php echo $total_igst; ?>"> </td>
										</tr>



										<tr>
											<td colspan="1" style="text-align: center;"> Other</td>
											<td colspan="3" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name" value="<?php echo $misc_name;?>" ></td>
											<td colspan="3">
												<input type="text" name="total_miscs" class="total_miscs form-control text-center" placeholder="Total Misc Value" id="total_miscs" value="<?php echo $misc_value;?>" onchange="getMiscOff(this.value)"> </td>
										</tr>

										<tr>
											<td colspan="4" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getRoundOff(this)" value="<?php echo $round_off; ?>"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3">Total Amount </th>
											<th><input type="text" name="units" class="units text-center" placeholder="Total Quantity" id="units" style="border: none;background: #1b2850;color: #fff;" value="<?php echo $units;?>" ></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="font-size:18px;border: none;background: #1b2850;color: #fff;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $all_total_amount;?>" id="total3" ></th>
										</tr>
									</thead>
										</table>
									</div>

								 <div class="col-md-12">
        <input type="hidden" name="submit" value="<?php if($action=='update'){echo "update";}else{echo "publish";} ?>" class="submit"/>
        <input type="hidden" name="invoice_id" class="invoice_id" value="<?php echo $invoice_id; ?>">
				<input type="hidden" name="indent_id" class="indent_id" value="<?php echo $indent_id; ?>"> 
				<input type="hidden" name="company_id" class="company_id" value="<?php echo $company_login_id; ?>" id="company_id">

		<input type="hidden" name="post_id" value="<?php echo $id; ?>">
        <input type="submit" id="submitButtonId" value="<?php if($action=='update'){echo "Update";}else{echo "Submit";} ?>" class="btn btn-primary float-right"> </div>
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
	
function getInvoiceAlready(value) {
		var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_invoice_already.php',
		data: {
			value: value,
			company_login_id: company_login_id
		},
		success: function(data) {
			if(data.trim()=="yes"){
				alert("Invoice Already Exits");
				window.location = location.href;
			}
		}
	});
}
	function getMasterMillName2(value) {
		
  $.ajax({
    type: "POST",
    url: 'get_mill_name.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#mill_name_2").val(data);
      
    }
  });

  $.ajax({
    type: "POST",
    url: 'get_sub_mill.php',
    data: {
      value: value
    },
    success: function(response) {
    
      if(response.trim() == "no") {
        $("#submillfield_2").addClass("d-none");
        $("#submillfieldname_2").addClass("d-none");
        $('#submillselect_2').val(false);
      }else{
      $("#submillfield_2").removeClass("d-none");
      $("#submillfieldname_2").removeClass("d-none");
      $("#mill_code_invoice_2").html(response);
      }
      
    }
  });
}


function getSubMillName_2(value) {
  $.ajax({
    type: "POST",
    url: 'get_sub_mill_name.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#sub_mill_name_2").val(data);
    }
  });
}

function getDealerName_2(value) {

var masterMill = $("#master_mill_invoice").val();
  $.ajax({
    type: "POST",
    url: 'get_dealer_name.php',
    data: {
      value: value
    },
    success: function(data) {
    
      $("#dealer_name_2").val(data);
    }
  });

 $.ajax({
    type: "POST",
    url: 'get_indent_by_mill.php',
    data: {
      value: value,
      masterMill : masterMill

    },
    success: function(data) {
    	
      $("#indent_no_invoice").html(data);
    }
  });


}

function getIndentValueInvoice(value) {

		$.ajax({
		type: "POST",
		url: 'get_indent_invoice_data.php',
		data: {
			value: value
		},
		success: function(response) {
		
		if(response.trim() != "no_data"){
		   var all_data = JSON.parse(response.trim());
		  $("#transporter").val(all_data[0].transporter);
		  $("#currency_invoice").val(all_data[0].currency);
		  // $('select[name^="document_through"]').val(all_data[0].document_through);
    	}else{
    	    alert("No Data Found");
    	}
		}
	});


		$.ajax({
    type: "POST",
    url: 'get_sort_data_indent_and_invoice.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#sort_data_by_indent").html(data);
    }
  });

		

}

function getSortDataByIndent(value) {
	$.ajax({
		type: "POST",
		url: 'get_sort_data_indent.php',
		data: {
			value: value
		},
		success: function(response) {
		
		if(response.trim() != "no_data"){
		   var all_data = JSON.parse(response.trim());
		  $("#quantity_invoice").val(all_data[0].quantity);
		  $("#rate_invoice").val(all_data[0].price);
		
    	}else{
    	    alert("No Data Found");
    	}
		}
	});
}
		
	

$(document).ready(function() {
	$('.sort_select').each(function() {
		$(this).on("change",function() {
			var value  = $(this).val();
					$.ajax({
				type: "POST",
				url: 'get_sort_data_indent.php',
				data: {
					value: value
				},
				success: function(response) {
			
				if(response.trim() != "no_data"){
				   var all_data = JSON.parse(response.trim());
				  $("#quantity_invoice").val(all_data[0].quantity);
				  $("#rate_invoice").val(all_data[0].price);
				 
				 var qty = $("#quantity_invoice").val();
				 var rate = $("#rate_invoice").val();
				 var amt = qty*rate;
				 
				 $("#total_amount_first").val(amt).toFixed(2);
				 total1();
		    	}else{
		    	    alert("No Data Found");
		    	}
				}
			});
		});
  });
});





function TableDelete(btndelete,value) {
	const result = confirm("Are you sure you want to delete this sort?");

if(result){
$(btndelete).parent().parent().remove();
total1(btndelete);
var invoice_id = $('.invoice_id').val();
var indent_id = $('.indent_id').val();
var company_id = $('.company_id').val();

var total_2 = $(".total_2").val();
var insurance = $(".insurance").val();
var total_insurance = $(".total_insurance").val();
var cashd = $('.cashd').val();
var total_cashd = $('.total_cashd').val();
var cgst = $('.cgst').val();
var total_cgst = $('.total_cgst').val();
var sgst = $('.sgst').val();
var total_sgst = $('.total_sgst').val();
var igst = $('.igst').val();
var total_igst = $('.total_igst').val();
var miscs_name = $('.miscs_name').val();
var total_miscs = $('.total_miscs').val();
var round_off = $('.round_off').val();
var total3 = $('.total3').val();
var units = $('.units').val();
var submit = $('.submit').val();



$.ajax({
					type: 'POST',
					url: 'invoice_sort_delete_action.php',
					data: {
		        	invoice_id : invoice_id,
		        	indent_id : indent_id,
		        	company_id : company_id,
		        	total_2 : total_2,
		        	insurance : insurance,
		        	total_insurance : total_insurance,
		        	cashd : cashd,
		        	total_cashd : total_cashd,
		        	cgst : cgst,
		        	total_cgst : total_cgst,
		        	sgst : sgst,
		        	total_sgst : total_sgst,
		        	igst : igst,
		        	total_igst : total_igst,
		        	miscs_name : miscs_name,
		        	total_miscs : total_miscs,
		        	round_off : round_off,
		        	units : units,
		        	total3 : total3,
		        	value : value,
		        	submit: submit
		            },
					success: function(response) {

						
					if(response.trim()=="yes") {
						window.location.href = location.href;
        	}else{
        		window.location.href = 'invoice_list.php';
           
        	}
					},
					error: function() {
						alert('An error occurred while submitting the form.');
					}
				});


}}


function Calc(value) {
	var index = $(value).parent().parent().index();
	var qty = document.getElementsByName("quantity_invoice[]")[index].value;
	var rate = document.getElementsByName("rate_invoice[]")[index].value;
	var amt = qty*rate;
	document.getElementsByName("total_amount_first[]")[index].value=amt.toFixed(2);
	total1();
}

function total1(value) {
	var amts = document.getElementsByName("total_amount_first[]");
	var sum=0;
	for (let i = 0; i<amts.length; i++) {
		var total2 = amts[i].value;
		sum = +(sum)+ +(total2);

	}




document.getElementById("total_2").value = sum.toFixed(2);


	var units_all = document.getElementsByName("quantity_invoice[]");
	var sum_units=0;
	for (let i = 0; i<units_all.length; i++) {
		var total_unites = units_all[i].value;
		sum_units = +(sum_units)+ +(total_unites);

	}
document.getElementById("units").value = sum_units;

Calc2();
}





function Calc2(value) {

var total2 = document.getElementById("total_2").value;
var insurance = document.getElementById("insurance").value
var cashd = document.getElementById("cashd").value;
var cgst = document.getElementById("cgst").value;
var sgst = document.getElementById("sgst").value;
var igst = document.getElementById("igst").value;
var units = document.getElementById("units").value;

var cash_discount_amount = (total2 * cashd) / 100;
document.getElementById("total_cashd").value = cash_discount_amount.toFixed(2);

var total_ins_plus = +(total2)+ +(insurance);
document.getElementById("total_insurance").value = insurance;


var cash_discounted_value = (total_ins_plus)-(cash_discount_amount);

var cgst_value_percentage = (cash_discounted_value) * (cgst) / 100;

document.getElementById("total_cgst").value = cgst_value_percentage.toFixed(2);

var sgst_value_percentage = (cash_discounted_value) * (sgst) / 100;

document.getElementById("total_sgst").value = sgst_value_percentage.toFixed(2);

var igst_value_percentage = (cash_discounted_value * igst) / 100;

document.getElementById("total_igst").value = igst_value_percentage.toFixed(2);

var all_total_gst = +(cash_discounted_value)+ +(cgst_value_percentage)+ +(sgst_value_percentage)+ +(igst_value_percentage);

var gstval = Math.round(all_total_gst * 100) / 100;
document.getElementById("total3").value = gstval.toFixed(2);
getRoundOff();
}


function getMiscOff(value) {

var total_ff = document.getElementById("total_2").value;
var total_cd = document.getElementById("total_cashd").value;
var total_inc = document.getElementById("total_insurance").value;
var total_cgst2r =document.getElementById("total_cgst").value;
var total_sgst2r = document.getElementById("total_sgst").value;
var total_igst2r = document.getElementById("total_igst").value;
var total_miscs = document.getElementById("total_miscs").value;
var total_rounde = document.getElementById("round_off").value;

var final_round_off = (total_ff)-(total_cd)+ +(total_inc)+ +(total_cgst2r)+ +(total_sgst2r)+ +(total_igst2r)+ +(total_cgst2r)+ +(total_miscs)+ +(total_rounde);

document.getElementById("total3").value = final_round_off.toFixed(2);

}

function getRoundOff(value) {

var total_ff = document.getElementById("total_2").value;
var total_cd = document.getElementById("total_cashd").value;
var total_inc = document.getElementById("total_insurance").value;
var total_cgst2r =document.getElementById("total_cgst").value;
var total_sgst2r = document.getElementById("total_sgst").value;
var total_igst2r = document.getElementById("total_igst").value;
var total_miscs = document.getElementById("total_miscs").value;
var total_rounde = document.getElementById("round_off").value;

var final_round_off = (total_ff)-(total_cd)+ +(total_inc)+ +(total_cgst2r)+ +(total_sgst2r)+ +(total_igst2r)+ +(total_cgst2r)+ +(total_miscs)+ +(total_rounde);

document.getElementById("total3").value = final_round_off.toFixed(2);

}




		</script>
		</body>

		</html>