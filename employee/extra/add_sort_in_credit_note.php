<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

$invoice_id = $_GET['invoice_id'];
$update_id = $_GET['post'];


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
									<div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-file" style="font-size: 25px; color:#fff;"></i> </div>
									<h5 class="d-flex justify-content-center align-items-center text-center">Add Sort In Credit Note</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="credit_note_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="credit_note_sort_add_action.php" class="needs-validation" novalidate>
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Credit Note Details:- </b></h4>
										<hr> </div>
							
						

						<div class="col-lg-12 col-sm-12 col-12 mb-4 " >
										<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
											</div>
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






												<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control myselect2 sort_select" name="sort_no[]" id="sort_by_indent">
																	<option value="0">--Choose Sort--</option>
																	
		<?php 
		 $dbn_id2 = $_GET['post'];
                
                   $data_srt = $db->query("SELECT * FROM `credit_note_sort_data` WHERE `credit_note_id`='$dbn_id2'");
                    while ($value_debit_sort = $data_srt->fetch_object()) { 


                    	$data_invoice = $db->query("SELECT * FROM `invoice_sort_date` WHERE id='$value_debit_sort->sort_id'");
                       $value_invoice = $data_invoice->fetch_object();
                  

                       $data4 = $db->query("SELECT * FROM `indent_plus` WHERE id='$value_invoice->sort_id'");
                       $value4 = $data4->fetch_object();
        
        $data3 = $db->query("SELECT * FROM sort WHERE id='$value4->sort_id'");
        $value_sort = $data3->fetch_object();




                    	?>
											<option value="<?php echo $value_invoice->id; ?>" >
												<?php echo $value_sort->sort_no; ?> - <?php echo $value_sort->sort_description; ?>
											</option>
											<?php } ?>



																</select>
															
													</td>
													<td>
														<input type="text" name="hsn_code[]" class="hsn_code form-control text-center" id="currency_invoice" placeholder="HSN/SAC Code"  required>
													</td>
													<td>
														<input type="text" name="unit_messure[]" class="unit_messure form-control text-center" id="unit_messure" placeholder="U/M" required> </td>
													<td>
														<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice" placeholder="Quantity" onchange="Calc(this)"  required > </td>
												<td>
											<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice" placeholder="Rate" onchange="Calc(this)"  required> </td>
											<td>
												<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first"   readonly>
												
												<input type="hidden" name="sort_post_id[]" value="<?php echo $value_entry->id;?>">
												 </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>
											



					<?php 
$dbn_id = $_GET['post'];


	$data_cmp2 = $db->query("SELECT * FROM credit_note_payment_details WHERE credit_note_id='$dbn_id'");
	$master_value_sort  = $data_cmp2->fetch_object();
	$total_first = $master_value_sort->total_first;
	$insurance = $master_value_sort->insurance;
	$cashdiscount = $master_value_sort->cashdiscount;
	$cgst = $master_value_sort->cgst;
	$sgst = $master_value_sort->sgst;
	$igst = $master_value_sort->igst;
	$total_insurance = $master_value_sort->total_insurance;
	$total_cashdiscount = $master_value_sort->total_cashdiscount;
	$total_cgst = $master_value_sort->total_cgst;
	$total_sgst = $master_value_sort->total_sgst;
	$total_igst = $master_value_sort->total_igst;
	$misc_name = $master_value_sort->misc_name;
	$misc_value = $master_value_sort->misc_value;
	$round_off = $master_value_sort->round_off;
	$indent_no = $master_value_sort->indent_no;
	$units = $master_value_sort->units;
	$all_total_amount = $master_value_sort->all_total_amount;


					$data_entry = $db->query("SELECT * FROM credit_note_sort_data WHERE credit_note_id='$dbn_id'");
                    while ($value_entry = $data_entry->fetch_object()) {
									?>




												<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control  sort_select" name="sort_no[]" id="sort_by_indent" disabled>
																	<option value="0">--Choose Sort--</option>
																	
	<?php 
                
                   $data_srt = $db->query("SELECT * FROM `credit_note_sort_data` WHERE `credit_note_id`='$dbn_id'");
                    while ($value_debit_sort = $data_srt->fetch_object()) { 


                    	$data_invoice = $db->query("SELECT * FROM `invoice_sort_date` WHERE id='$value_debit_sort->sort_id'");
                       $value_invoice = $data_invoice->fetch_object();
                  

                       $data4 = $db->query("SELECT * FROM `indent_plus` WHERE id='$value_invoice->sort_id'");
                       $value4 = $data4->fetch_object();
        
        $data3 = $db->query("SELECT * FROM sort WHERE id='$value4->sort_id'");
        $value_sort = $data3->fetch_object();




                    	?>
											<option value="<?php echo $value_invoice->id; ?>" <?php if($value_invoice->id==$value_debit_sort->sort_id){echo "selected";} ?>>
												<?php echo $value_sort->sort_no; ?> - <?php echo $value_sort->sort_description; ?>
											</option>
											<?php } ?>



																</select>
															
													</td>
													<td>
														<input type="text" name="hsn_code[]" class="hsn_code form-control text-center" id="currency_invoice" placeholder="HSN/SAC Code" value="<?php echo $value_entry->hsn_code;?>" disabled>
													</td>
													<td>
														<input type="text" name="unit_messure[]" class="unit_messure form-control text-center" id="unit_messure" value="<?php echo $value_entry->units;?>" placeholder="U/M" disabled> </td>
													<td>
														<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice" placeholder="Quantity" onchange="Calc(this)" value="<?php echo $value_entry->quantity;?>" disabled > </td>
												<td>
											<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice" placeholder="Rate" onchange="Calc(this)" value="<?php echo $value_entry->rate;?>" disabled> </td>
											<td>
												<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_entry->total_one;?>"  disabled>
												
												<input type="hidden" name="sort_post_id[]" value="<?php echo $value_entry->id;?>">
												 </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" disabled> <i class="fas fa-times text-light"></i> </button>
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
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="border: none;background: #1b2850;color: #fff;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $all_total_amount;?>" id="total3" ></th>
										</tr>
									</thead>
										</table>
									</div>



						

								 <div class="col-md-12">
        <input type="hidden" name="submit" value="update" />
        <input type="hidden" name="invoice_id" class="invoice_id" value="<?php echo $invoice_id; ?>">
				 
				<input type="hidden" name="company_id" class="company_id" value="<?php echo $company_login_id; ?>" id="company_id">

		<input type="hidden" name="post_id" value="<?php echo $update_id; ?>">
        <input type="submit" id="submitButtonId" value="Update" class="btn btn-primary float-right"> </div>
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
	
function getDebitAlready(value) {
		var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_debit_already.php',
		data: {
			value: value,
			company_login_id: company_login_id
		},
		success: function(data) {
			if(data.trim()=="yes"){
				alert("Debite Note Already Exits");
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

 $.ajax({
    type: "POST",
    url: 'get_master_mill.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#master_mill").val(data);
    }
  });

 $.ajax({
    type: "POST",
    url: 'get_master_mill_name.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#master_mill_name_2").val(data);
    }
  });


}

function getDealerName_2(value) {

var mill_code = $("#mill_code").val();
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
    url: 'get_invoice_by_mill.php',
    data: {
      value: value,
      mill_code : mill_code

    },
    success: function(data) {
    	
      $("#indent_no_invoice").html(data);
    }
  });


}


function getReferenceValue(value) {

	if (value=='Goods_Return') {
		$("#goods_return_data_filed").removeClass("d-none");
		$("#doc_encl_fields").removeClass("d-none");
		$("#transporter_fields").removeClass("d-none");
		$("#lr_no_fields").removeClass("d-none");
		$("#lr_date_fields").removeClass("d-none");
	}else{
		$("#goods_return_data_filed").addClass("d-none");
		$("#doc_encl_fields").addClass("d-none");
		$("#transporter_fields").addClass("d-none");
		$("#lr_no_fields").addClass("d-none");
		$("#lr_date_fields").addClass("d-none");
		$("#total_debit_amount").removeClass("d-none");
	}
}

function getInvoiceValueData(value) {

		$.ajax({
		type: "POST",
		url: 'get_invoice_data.php',
		data: {
			value: value
		},
		success: function(response) {
		
		if(response.trim() != "no_data"){
		   var all_data = JSON.parse(response.trim());
		  $("#transporter").val(all_data[0].transporter);
		  $("#lr_no").val(all_data[0].lr_no);
		  $("#lr_date").val(all_data[0].lr_date);
		  
    	}else{
    	    alert("No Data Found");
    	}
		}
	});


		$.ajax({
    type: "POST",
    url: 'get_sort_data_by_invoice.php',
    data: {
      value: value
    },
    success: function(data) {
      $("#sort_data_by_indent").html(data);
    }
  });

		

}

	
		

function AddMore(){

var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
$(tbd).find("input").val('');
$(tbd).find("select").select2();
$(tbd).removeClass("d-none");

$(tbd).find(".sort_select").each(function() {	
		$(this).on("change",function() {
			var value  = $(this).val();
					$.ajax({
				type: "POST",
				url: 'get_invoice_sort_data.php',
				data: {
					value: value
				},
				success: function(response) {
			
				if(response.trim() != "no_data"){
				   var all_data = JSON.parse(response.trim());
				   $(tbd).find("#quantity_invoice").val(all_data[0].quantity);
				   $(tbd).find("#rate_invoice").val(all_data[0].rate);
				   $(tbd).find("#hsn_code").val(all_data[0].hsn_code);
				   $(tbd).find("#unit_messure").val(all_data[0].units);



					  var qty =	$(tbd).find("#quantity_invoice").val();
						var rate =	$(tbd).find("#rate_invoice").val();
						var amt = qty*rate;
						$(tbd).find("#total_amount_first").val(amt);
						total1();
						}else{
		    	    alert("No Data Found");
		    	}
				}
			});
		});
});

}


$(document).ready(function() {
	$('.sort_select').each(function() {
		$(this).on("change",function() {
			var value  = $(this).val();
					$.ajax({
				type: "POST",
				url: 'get_invoice_sort_data.php',
				data: {
					value: value
				},
				success: function(response) {
			
				if(response.trim() != "no_data"){
				   var all_data = JSON.parse(response.trim());
				  $("#quantity_invoice").val(all_data[0].quantity);
				  $("#rate_invoice").val(all_data[0].rate);
				  $("#hsn_code").val(all_data[0].hsn_code);
				  $("#unit_messure").val(all_data[0].units);
				 
				 var qty = $("#quantity_invoice").val();
				 var rate = $("#rate_invoice").val();
				 var amt = qty*rate;
				 
				 $("#total_amount_first").val(amt);
				 total1();
		    	}else{
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

document.getElementById("total_2").value = sum;


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