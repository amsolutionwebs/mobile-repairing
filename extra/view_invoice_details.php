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
									<h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "View";}else{echo "Add";} ?> Invoice Details</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="invoice_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="invoice_action.php">
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Inovice Details:-</b></h4>
										<hr> </div>
									<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Default Mill Code</label>
									<select class="form-control select2 default_mill_code" name="default_mill_code" disabled>
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
								<div class="form-group" >
									<label>Master Mill Code</label>
									<select class="form-control select2 mill_code" name="mill_code" onchange="getMasterMillName2(this.value)" id="master_mill_invoice" disabled>
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
									<input type="text" name="mill_name"  id="mill_name_2" class="form-control mill_name" value="<?php echo $mill_name; ?>" disabled readonly="readonly"> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Dealer Code</label>
									<select class="form-control select2 dealer_code" name="dealer_code" onchange="getDealerName_2(this.value)" disabled id="dealer_code_invoice" <?php if($exits=="yes"){echo "readonly";}?>>
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
									<input type="text" class="form-control dealer_name" name="dealer_name" id="dealer_name_2" value="<?php echo $dealer_name; ?>" disabled readonly="readonly"> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "ddd ";} ?>" id="submillfield_2">
								<div class="form-group">
									<label>Mill Code</label>
									<select class="form-control submillselect sub_mill_code" name="sub_mill_code" onchange="getSubMillName(this.value)" id="mill_code_invoice" disabled>
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
									<input type="text" name="sub_mill_name"  id="sub_mill_name" class="form-control sub_mill_name2" value="<?php echo $sub_mill_name; ?>" readonly="readonly" disabled> </div>
							</div>
							
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Broker/Salesman</label>
									<select class="form-control select2" name="broker_code" disabled>
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
									<select class="form-control select2 indent_no" name="indent_no" id="indent_no_invoice" onchange="getIndentValueInvoice(this.value)" disabled>
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
									<input type="text" name="invoice_number" class="form-control invoice_number" value="<?php echo $invoice_number; ?>" <?php if($action!=='update'){ echo 'onchange="getInvoiceAlready(this.value)"';} ?> disabled> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Invoice Date </label>
									<input type="date" class="form-control cal-icon invoice_date" placeholder="Choose Invoice Date" value="<?php echo $invoice_date; ?>" name="invoice_date" autocomplete="off" disabled > </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Document Through</label>
									<select class="form-control select2 document_through" name="document_through" disabled>
										<option value="#">--Choose Document Through--</option>
										<option value="direct" <?php if($document_through=='direct' ){ echo "selected";}?>>Direct</option>
										<option value="self" <?php if($document_through=='self' ){ echo "selected";}?>>Self</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Doc. Encl</label>
									<select class="form-control select2 doc_encl" name="doc_encl" disabled>
										<option>--Choose Doc. Encl --</option>
										<option value="yes" <?php if($doc_encl=='yes' ){ echo "selected";}?>>Yes</option>
										<option value="no" <?php if($doc_encl=='no' ){ echo "selected";}?>>No</option>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Transporter</label>
									<input type="text" name="transporter" class="form-control transporter" id="transporter" value="<?php echo $transporter; ?>" disabled> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label for="lr_no">L/R No</label>
									<input type="text" value="<?php echo $lr_no; ?>" name="lr_no" class="form-control lr_no" disabled> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>LR Date </label>
									<input type="date" class="form-control cal-icon lr_date" placeholder="Choose Lr Date"  value="<?php echo $lr_date; ?>" autocomplete="off" disabled> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Currency</label>
									<input type="text"  value="<?php echo $currency; ?>" class="form-control currency"  disabled> </div>
							</div>




							<?php 



$invoice_id = $_GET['post'];
$indent_id = $_GET['indent_id'];

  $data_cmp = $db->query("SELECT * FROM invoice WHERE id='$invoice_id'");
	$master_value  = $data_cmp->fetch_object();
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
	

?>

	<!-- Content Wrapper. Contains page content -->
		<form role="form" method="post" enctype="multipart/form-data" action="invoice_sort_update_action.php">
								<div class="row px-2 py-1">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Inovice Entry Details:-</b></h4>
										<hr> </div>
								

									

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
											
										</tr>
											</thead>
										

											<tbody id="Tbodyinvoice">


<?php 


					$data_entry = $db->query("SELECT * FROM invoice_sort_date WHERE invoice_id='$invoice_id' AND indent_id='$indent_id'");
                    while ($value_entry = $data_entry->fetch_object()) {
									?>




												<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control myselect2 sort_select" disabled>
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
														<input type="text"  class="hsn_code form-control text-center"  placeholder="HSN/SAC Code" value="<?php echo $value_entry->hsn_code;?>" disabled>
													</td>
													<td>
														<input type="text"  class="unit_messure form-control text-center" value="<?php echo $value_entry->units;?>" placeholder="U/M" disabled> </td>
													<td>
														<input type="text"  class="quantity_invoice form-control text-center"  placeholder="Quantity"  value="<?php echo $value_entry->quantity;?>" disabled > </td>
												<td>
											<input type="text"  class="rate_invoice form-control text-center"  placeholder="Rate"  value="<?php echo $value_entry->rate;?>" disabled> </td>
											<td>
												<input type="text"  class="total_amount_first form-control text-center" placeholder="Total"  value="<?php echo $value_entry->total_one;?>"  disabled>
												
												
												 </td>
													
												</tr>
											


<?php } ?>








											</tbody>



											<tbody width="100%">
										
										<tr>
											<td colspan="4" style="text-align: center;"> Total </td>
											<td colspan="3">
												<input type="text"  class="currency form-control text-center total_2" placeholder="Total" value="<?php echo $total_first;?>" disabled> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> Insurance (Value)</td>
											<td colspan="1" style="text-align: center;"> <input type="text" class="insurance form-control text-center" value="<?php echo $insurance;?>" placeholder="Insurance (With Value)" disabled></td>
											<td colspan="3">
												<input type="text" name="total_insurance" class="total_insurance form-control text-center" placeholder="Total Value Of Insurance" value="<?php echo $total_insurance;?>" disabled> </td>
										</tr>

										<tr>
											<td colspan="3" style="text-align: center;"> Cash Discount (%)</td>
											<td colspan="1" style="text-align: center;"> 

												<input type="text"  class="cashd form-control text-center cashd" placeholder="Cash.D (in %)" value="<?php echo $cashdiscount;?>" disabled >
											</td>
											<td colspan="3">
												<input type="text" class="total_cashd form-control text-center cashd" placeholder="Total Value Of Cash Discount"  value="<?php echo $total_cashdiscount; ?>" disabled readonly> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> CGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="text" class="cgst form-control text-center" value="<?php echo $cgst;?>" disabled placeholder="CGST (in %)" ></td>
											<td colspan="3">
												<input type="text"  class="total_cgst form-control text-center" placeholder="Total Value Of CGST" value="<?php echo $total_cgst;?>" disabled> </td>
										</tr>
										
										<tr>
											<td colspan="3" style="text-align: center;"> SGST (%)</td>
											<td colspan="1" style="text-align: center;"> 
											<input type="text"  class="sgst form-control text-center" value="<?php echo $sgst;?>" disabled placeholder="SGST (in %)"  >
										</td>
											<td colspan="3">
												<input type="text"  class="total_sgst form-control text-center" placeholder="Total Value Of SGST"  value="<?php echo $total_sgst;?>" disabled> </td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;"> IGST (%)</td>
											<td colspan="1" style="text-align: center;"> <input type="text"  class="igst form-control text-center" placeholder="IGST (in %)" value="<?php echo $igst;?>" disabled></td>
											<td colspan="3">
												<input type="text" name="total_igst" class="total_igst form-control text-center" placeholder="Total Value Of IGST" value="<?php echo $total_igst; ?>" disabled> </td>
										</tr>
										<tr>
											<td colspan="1" style="text-align: center;"> Other</td>
											<td colspan="3" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name" value="<?php echo $misc_name; ?>" disabled></td>
											<td colspan="3">
												<input type="text" name="total_miscs" class="total_miscs form-control text-center" placeholder="Total Misc Value" id="total_miscs" value="<?php echo $misc_value; ?>" disabled onchange="getMiscOff(this.value)"> </td>
										</tr>
										<tr>
											<td colspan="4" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off"  disabled value="<?php echo $round_off; ?>"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3">Total Amount </th>
											<th><input type="text" name="units" class="units text-center" placeholder="Total Quantity" style="border: none;background: #1b2850;color: #fff;"  value="<?php echo $units;?>" disabled></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $all_total_amount;?>"  disabled></th>
										</tr>
									</thead>
										</table>
									</div>
								
								
									<!--  -->
								</div>
							</form>
	<!-- /.content-wrapper -->
	

							
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
		
		</body>

		</html>