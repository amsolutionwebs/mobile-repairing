<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM invoice WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$sub_mill_code = $master_value->sub_mill_code;
	$sub_mill_name = $master_value->sub_mill_name;
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
	$round_off = $master_value->round_off;
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
									<h5 class="d-flex justify-content-center align-items-center text-center">Add Invoice</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="invoice_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data">
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Inovice Details:-</b></h4>
										<hr> </div>
									<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Default Mill Code</label>
									<select class="form-control default_mill_code" name="mill_code" >
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
									<select class="form-control mill_code" name="mill_code" onchange="getMasterMillName2(this.value)" id="master_mill_invoice">
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
									<input type="text" name="mill_name"  id="mill_name_2" class="form-control mill_name" readonly="readonly"> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Dealer Code</label>
									<select class="form-control dealer_code" name="dealer_code" onchange="getDealerName_2(this.value)" id="dealer_code_invoice">
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
									<input type="text" class="form-control dealer_name" name="dealer_name" id="dealer_name_2"  readonly="readonly"> </div>
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
									<input type="text" name="sub_mill_name"  id="sub_mill_name" class="form-control sub_mill_name2" value="" readonly="readonly"> </div>
							</div>
							



							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Indent Number</label>
									<select class="form-control indent_no" name="indent_no" id="indent_no_invoice" onchange="getIndentValueInvoice(this.value)">
										<option value="0">--Choose Indent--</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Invoice Number</label>
									<input type="text" name="invoice_number" value="" class="form-control invoice_number" onchange="getInvoiceAlready(this.value)" required> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Invoice Date </label>
									<input type="date" class="form-control cal-icon invoice_date" placeholder="Choose Invoice Date" value="" name="invoice_date" autocomplete="off"  > </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Document Through</label>
									<select class="form-control document_through" name="document_through" required>
										<option value="#">--Choose Document Through--</option>
										<option value="direct" <?php if($document_through=='direct' ){ echo "selected";}?>>Direct</option>
										<option value="self" <?php if($document_through=='self' ){ echo "selected";}?>>Self</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Doc. Encl</label>
									<select class="form-control doc_encl" name="doc_encl" required>
										<option>--Choose Doc. Encl --</option>
										<option value="yes">Yes</option>
										<option value="no">No</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Transporter</label>
									<input type="text" name="transporter" class="form-control transporter" id="transporter"value="" required> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label for="lr_no">L/R No</label>
									<input type="text" name="lr_no" class="form-control lr_no"> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>LR Date </label>
									<input type="text" class="form-control cal-icon lr_date" placeholder="Choose Lr Date" value="" name="lr_date" autocomplete="off"> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Currency</label>
									<input type="text" name="currency" class="form-control currency" id="currency_invoice" value=""> </div>
							</div>

									

									<div class="col-lg-12 col-sm-12 col-12 mb-4">
										
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
												<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control py-2 sort_select" name="sort_no[]" id="sort_by_indent" onchange="getSortDataByIndent(this.value)">
																	<option value="0">--Choose Sort--</option>
																	
																</select>
															
													</td>
													<td>
														<input type="text" name="hsn_code" class="hsn_code form-control text-center" id="currency_invoice" placeholder="HSN/SAC Code" required>
													</td>
													<td>
														<input type="text" name="unit_messure" class="unit_messure form-control text-center" id="unit_messure" placeholder="U/M" required> </td>
													<td>
														<input type="number" name="quantity_invoice" class="quantity_invoice form-control text-center" id="quantity_invoice" placeholder="Quantity" onchange="Calc(this)" required> </td>
												<td>
											<input type="number" name="rate_invoice" class="rate_invoice form-control text-center" id="rate_invoice" placeholder="Rate" onchange="Calc(this)" > </td>
											<td>
												<input type="number" name="total_amount_first" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" readonly> </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDeleteInent(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>
											</tbody>



											<tbody width="100%">
										
										<tr>
											<td colspan="4" style="text-align: center;"> Total </td>
											<td colspan="3">
												<input type="number" name="total_2" class="currency form-control text-center total_2" placeholder="Total" id="total_2" readonly> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> Insurance (Value)</td>
											<td colspan="1" style="text-align: center;"> <input type="number" name="insurance" class="insurance form-control text-center" placeholder="Insurance (With Value)" id="insurance" onchange="Calc2(this)"></td>
											<td colspan="3">
												<input type="text" name="total_insurance" class="total_insurance form-control text-center" placeholder="Total Value Of Insurance" id="total_insurance" readonly> </td>
										</tr>

										<tr>
											<td colspan="3" style="text-align: center;"> Cash Discount (%)</td>
											<td colspan="1" style="text-align: center;"> 

												<input type="number" name="cashd" class="cashd form-control text-center cashd" placeholder="Cash.D (in %)" id="cashd" onchange="Calc2(this)">
											</td>
											<td colspan="3">
												<input type="number" name="total_cashd" class="total_cashd form-control text-center cashd" placeholder="Total Value Of Cash Discount" id="total_cashd" readonly> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> CGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="number" name="cgst" class="cgst form-control text-center" placeholder="CGST (in %)" id="cgst" onchange="Calc2(this)"></td>
											<td colspan="3">
												<input type="number" name="total_cgst" class="total_cgst form-control text-center" placeholder="Total Value Of CGST" id="total_cgst" readonly> </td>
										</tr>
										
										<tr>
											<td colspan="3" style="text-align: center;"> SGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="number" name="sgst" class="sgst form-control text-center" placeholder="SGST (in %)" id="sgst" onchange="Calc2(this)">
										</td>
											<td colspan="3">
												<input type="number" name="total_sgst" class="total_sgst form-control text-center" placeholder="Total Value Of SGST" id="total_sgst" readonly> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> IGST (%)</td>
											<td colspan="1" style="text-align: center;"> <input type="number" name="sgst" class="igst form-control text-center" placeholder="SGST (in %)" id="igst" onchange="Calc2(this)"></td>
											<td colspan="3">
												<input type="text" name="total_igst" class="total_igst form-control text-center" placeholder="Total Value Of IGST" id="total_igst" readonly> </td>
										</tr>
										<tr>
											<td colspan="4" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="number" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getRoundOff(this)"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3">Total Amount </th>
											<th><input type="number" name="units" class="units text-center" placeholder="Total Quantity" id="units" style="border: none;background: #1b2850;color: #fff;" readonly></th>
											<th colspan="3" style="text-align: right !important;"><input type="number" name="total3" style="border: none;background: #1b2850;color: #fff;" class="total3 text-center" placeholder="All Total Amount" id="total3" readonly></th>
										</tr>
									</thead>
										</table>
									</div>
								
									<div class="col-lg-12">
								<input type="hidden" name="submit" value="publish" class="submit"/>
								<input type="hidden" name="post_id">
								<input type="hidden" name="company_id" class="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
								<a href="invoice_list.php" class="btn btn-danger float-right">Cancel</a>
								<button href="javascript:void(0);" class="btn mx-2 btn-primary me-2 add_invoice float-right" type="submit">Submit </button> 

								 </div>
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
	    url: 'get_data_by_indent_invoice.php',
	    data: {
	      value: value
	   
	    },
	    success: function(data) {
	    	
	     $("#sort_by_indent").html(data);

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
		


function AddMore(){

var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
$(tbd).find("input").val('');
$(tbd).removeClass("d-none");
}

function TableDeleteInent(btndelete) {
$(btndelete).parent().parent().remove();
}


function TableDelete(btndelete) {
$(btndelete).parent().parent().remove();
total1(btndelete);

}

function Calc(value) {
	var index = $(value).parent().parent().index();
	var qty = document.getElementsByName("quantity_invoice")[index].value;
	var rate = document.getElementsByName("rate_invoice")[index].value;
	var amt = qty*rate;
	document.getElementsByName("total_amount_first")[index].value=amt;

	total1();
}

function total1(value) {
	var amts = document.getElementsByName("total_amount_first");
	var sum=0;
	for (let i = 0; i<amts.length; i++) {
		var total2 = amts[i].value;
		sum = +(sum)+ +(total2);

	}
document.getElementById("total_2").value = sum;


	var units_all = document.getElementsByName("quantity_invoice");
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

var total_ins_plus = +(total2)+ +(insurance);
document.getElementById("total_insurance").value = insurance;

var cash_discount_amount = (total_ins_plus * cashd) / 100;
document.getElementById("total_cashd").value = cash_discount_amount.toFixed(3);
var cash_discounted_value = (total_ins_plus)-(cash_discount_amount);

var cgst_value_percentage = (cash_discounted_value) * (cgst) / 100;

document.getElementById("total_cgst").value = cgst_value_percentage.toFixed(3);

var sgst_value_percentage = (cash_discounted_value) * (sgst) / 100;

document.getElementById("total_sgst").value = sgst_value_percentage.toFixed(3);

var igst_value_percentage = (cash_discounted_value * igst) / 100;

document.getElementById("total_igst").value = igst_value_percentage.toFixed(3);

var all_total_gst = +(cash_discounted_value)+ +(cgst_value_percentage)+ +(sgst_value_percentage)+ +(igst_value_percentage);

var gstval = Math.round(all_total_gst * 100) / 100;
document.getElementById("total3").value = gstval;

}

function getRoundOff(value) {

var to = document.getElementById("total3").value;
var gstval2 = document.getElementById("round_off").value;
var gstval22 = +(to)+ +(gstval2);
document.getElementById("total3").value = gstval22;

}

$(document).ready(function(){
	$(".add_invoice").click(function(e){
		e.preventDefault();
		
		var default_mill_code = $(".default_mill_code").val();
		var mill_code = $(".mill_code").val();
		var mill_name = $(".mill_name").val();
		var sub_mill_code = $('.sub_mill_code').val();
		var sub_mill_name = $('.sub_mill_name2').val();
		var dealer_code = $('.dealer_code').val();
		var dealer_name = $('.dealer_name').val();
		var indent_no = $('.indent_no').val();
		var invoice_number = $('.invoice_number').val();
		var invoice_date = $('.invoice_date').val();
		var document_through = $('.document_through').val();
		var doc_encl = $('.doc_encl').val();
		var transporter = $('.transporter').val();
		var lr_no = $('.lr_no').val();
		var lr_date = $('.lr_date').val();
		var currency = $('.currency').val();
		var total_2 = $('.total_2').val();
		var insurance = $('.insurance').val();
		var cashd = $('.cashd').val();
		var cgst = $('.cgst').val();
		var sgst = $('.sgst').val();
		var igst = $('.igst').val();
		var round_off = $('.round_off').val();
		var units = $('.units').val();
		var total3 = $('.total3').val();
		var submit = $('.submit').val();
		var company_id = $('.company_id').val();


		var sort_one = [];
		var sort_length = $(".sort_select").length;
		var i ;
		for (i=0;i<sort_length;i++){
			sort_one[i] = document.getElementsByClassName('sort_select')[i].value;
		}

		// twp
		var hsn_code = [];
		var hsn_length = $(".hsn_code").length;
		var i;
		for (i=0;i<hsn_length;i++){
			hsn_code[i] = document.getElementsByClassName('hsn_code')[i].value;
		}
		// three
		var unite_one = [];
		var unit_length = $(".unit_messure").length;
		var q ;
		for (q=0;q<unit_length;q++){
			unite_one[q] = document.getElementsByClassName('unit_messure')[q].value;
		}
		// four
		var quantity_one = [];
		var quantity_length = $(".quantity_invoice").length;
		var p;
		for (p=0;p<quantity_length;p++){
			quantity_one[p] = document.getElementsByClassName('quantity_invoice')[p].value;
		}


		var rate_one = [];
		var rate_length = $(".rate_invoice").length;
		var r;
		for (r=0;r<rate_length;r++){
			rate_one[r] = document.getElementsByClassName('rate_invoice')[r].value;
		}

		var total_amount_one = [];
		var total_amount_length = $(".total_amount_first").length;
		var m;
		for (m=0;m<total_amount_length;m++){
			total_amount_one[m] = document.getElementsByClassName('total_amount_first')[m].value;
		}



		var object1 = JSON.stringify(sort_one);
		var object2 = JSON.stringify(hsn_code);
		var object3 = JSON.stringify(unite_one);
		var object4 = JSON.stringify(quantity_one);
		var object5 = JSON.stringify(rate_one);
		var object6 = JSON.stringify(total_amount_one);


        $.ajax({
        type :"POST",
        url: 'invoice_action.php',
        data: {
        	json_Data1 : object1,
        	json_Data2 : object2,
        	json_Data3 : object3,
        	json_Data4 : object4,
        	json_Data5 : object5,
        	json_Data6 : object6,
        	default_mill_code : default_mill_code,
        	mill_code : mill_code,
        	mill_name : mill_name,
        	sub_mill_code : sub_mill_code,
        	sub_mill_name : sub_mill_name,
        	dealer_code : dealer_code,
        	dealer_name : dealer_name,
        	indent_no : indent_no,
        	invoice_number : invoice_number,
        	invoice_date : invoice_date,
        	document_through : document_through,
        	doc_encl : doc_encl,
        	transporter : transporter,
        	lr_no : lr_no,
        	lr_date : lr_date,
        	currency : currency,
        	total_2 : total_2,
        	insurance : insurance,
        	cashd : cashd,
        	cgst : cgst,
        	sgst : sgst,
        	igst : igst,
        	round_off : round_off,
        	units : units,
        	total3 : total3,
        	submit : submit,
        	company_id : company_id

        },


        success: function(data) {
           window.location.href = 'invoice_list.php';
        	

        },
        error: function(xhr, status, error) {
            // Handle error
            console.log(error);
        }
        });
		


	});
});



		</script>
		</body>

		</html>