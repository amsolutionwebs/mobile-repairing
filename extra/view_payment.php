<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM payment WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$payment_ref = $master_value->payment_ref;
	$payment_date = $master_value->payment_date;
	$default_mill_code = $master_value->default_mill_code;
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$sub_mill_code = $master_value->sub_mill_code;
	$sub_mill_name = $master_value->sub_mill_name;
	$broker_code = $master_value->broker_code;
	$dealer_code = $master_value->dealer_code;
	$dealer_name = $master_value->dealer_name;
	$total_payment_one = $master_value->total_payment_one;
	$total_payment_two = $master_value->total_payment_two;
	$remark_payment_details = $master_value->remark_payment_details;
	$final_invoice_value = $master_value->final_invoice_value;
	$final_debit_value = $master_value->final_debit_value;
	$final_credit_note_value = $master_value->final_credit_note_value;
	$total_payment_three = $master_value->total_payment_three;
	$total_invoice_two = $master_value->total_invoice_two;
	$total_debit_note_two = $master_value->total_debit_note_two;
	$total_credit_note_two = $master_value->total_credit_note_two;
	$total_blance_amount = $master_value->total_blance_amount;
	$misc_name = $master_value->misc_name;
	$total_misc_amount = $master_value->total_misc_amount;
	$round_off = $master_value->round_off;
	$total_payment_four = $master_value->total_payment_four;


}

?>



	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="modal model-xl fade" id="sort_model_field">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">View Invoice</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_sort"> <span aria-hidden="true">×</span> </button>
							</div>
							<div class="modal-body">
								
								  <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                 
                   <th><input type="checkbox"></th>
                  <th>Invoice No.</th>
                  <th>Invoice Date</th>
                  <th>Net Amount.</th>
                  <th>D.N</th>
                  <th>C.R</th>
                  <th>Payment Receive</th>
                  <th>Balance Amount</th>
                 
                  <th>Cash Discount</th>
                 
                  
                  <th>Status</th>
                 
                </tr>
              </thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM invoice WHERE company_id='$company_login_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                   

                      ?>
                <tr>
                  
                   <td><input type="checkbox"></td>
                  
                   <td><?php echo $value->invoice_number; ?></td>
                     <td><?php echo date("d-m-Y", strtotime($value->invoice_date)); ?></td>
                  <td><?php echo number_format($value->all_total_amount,2); ?></td>
                  <td>

                  	<?php 
$data_debite_view = $db->query("SELECT sum(total_debit_note_amount) as total_debit FROM `payment_debit_details` WHERE invoice_number='$id'");
$total_debit_view = $data_debite_view->fetch_object();
echo number_format($total_debit_view->total_debit,2);

?>







                  </td>


                       <td>

                  	<?php 
$data_credit_view = $db->query("SELECT sum(total_credit_note_amount) as total_credit FROM `payment_credit_details` WHERE invoice_number='$id'");
$total_credit_view = $data_credit_view->fetch_object();
echo number_format($total_credit_view->total_credit,2);

?>







                  </td>
                  

 <td>
 	<?php 
$data_invoice = $db->query("SELECT sum(payment_amount) as total_fees FROM `payment_invoice_details` WHERE invoice_number='$id'");
$total_inc = $data_invoice->fetch_object();
echo number_format($total_inc->total_fees,2);

?></td>
<td><?php $total_amount_total_view = $value->all_total_amount - $total_inc->total_fees - $total_debit_view->total_debit + $total_credit_view->total_credit;
echo number_format($total_amount_total_view,2); ?></td>

                  <td><?php echo number_format($value->total_cashdiscount,2); ?></td>
                
                 
                  <td> 


                  	<?php if ($value->all_total_amount+$total_credit_view->total_credit==$total_debit_view->total_debit+$total_inc->total_fees) { ?>
                  		 <a href='#' title='Veryfie Payment'><button class='btn btn-xs btn-success p-1'>Paid</button></a>
                  
                  	<?php }else { ?>

                  		 <a href='add_payment.php?sname=<?php echo $value->id;?>' title='Veryfie Payment'><button class='btn btn-xs btn-danger p-1'> Unpaid</button></a>
                  	
                   
                   <?php }} ?>


                    </td>
                  
                </tr>
           
                
              </tbody>

                  
                </table>
							
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
			</div>
		</div>
	</section>

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
									<h5 class="d-flex justify-content-center align-items-center text-center">Add Payment</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="payment_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data" action="payment_action.php" class="needs-validation" novalidate>
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Payment Details:- </b></h4>
										<hr> </div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Payment Reference Number</label>
									<input type="text" name="payment_ref" class="form-control payment_ref" value="<?php echo $payment_ref; ?>" readonly disabled>
									<div class="invalid-feedback">This field is required!</div>
     </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Paymen Date </label>
									<input type="date" class="form-control payment_date" name="payment_date" value="<?php echo $payment_date; ?>" disabled> 
								<div class="invalid-feedback">This field is required!</div></div>

							</div>




							

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
								<div class="form-group">
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
									<input type="text" name="mill_name"  id="mill_name_2" class="form-control mill_name" value="<?php echo $mill_name; ?>" readonly="readonly" disabled> </div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "d-block";} ?>" id="submillfield_2">
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
									<label>Dealer Code</label>
									<select class="form-control select2 dealer_code" name="dealer_code" onchange="getDealerName_2(this.value)" id="dealer_code_invoice" <?php if($exits=="yes"){echo "readonly";}?> disabled>
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
									<input type="text" class="form-control dealer_name" name="dealer_name" id="dealer_name_2" value="<?php echo $dealer_name; ?>" readonly="readonly" disabled> </div>
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
									<label>Total Amount Of Payment </label>
									<input type="text" class="form-control"  value="<?php echo $total_payment_one; ?>" name="total_payment_one" id="total_payment_amount" autocomplete="off"  onchange="paymentAmt(this.value)" disabled> </div>
							</div>

							<div class="col-lg-12 col-sm-12 col-12 mb-4" >
										
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											<th>Payment Type</th>
											<th>Check Number</th>
											<th>Date</th>
											<th>Bank Name</th>
											<th>Total Amount</th>										
											
										</tr>
											</thead>
										

											<tbody id="Tbodyinvoice">
<?php 

					$payement_id = $_GET['post'];
					$data_entry = $db->query("SELECT * FROM payment_details WHERE payment_id='$payement_id'");
                    while ($value_payment_details = $data_entry->fetch_object()) {
									?>
<tr id="TRbodyinvoice">
													<td id="mysort" width="230">
												
																<select class="form-control payment_type" name="payment_type[]" id="payment_type" disabled>
																	
<option value="0">Choose Payment Type</option>
															<option value="CHECK" <?php if($value_payment_details->payment_type=='CHECK') echo "selected"; ?>>CHECK</option>
															<option value="RTGS" <?php if($value_payment_details->payment_type=='RTGS') echo "selected"; ?>>RTGS</option>
															<option value="TRANSFER" <?php if($value_payment_details->payment_type=='TRANSFER') echo "selected"; ?>>TRANSFER</option>
															<option value="CASH" <?php if($value_payment_details->payment_type=='CASH') echo "selected"; ?>>CASH</option>
															<option value="NEFT" <?php if($value_payment_details->payment_type=='NEFT') echo "selected"; ?>>NEFT</option>
															<option value="OTHER" <?php if($value_payment_details->payment_type=='OTHER') echo "selected"; ?>>OTHER</option>



																</select>
															
													</td>
													<td>
														<input type="text" name="check_number[]" class="check_number form-control text-center" id="check_number" placeholder="Check Number" value="<?php echo $value_payment_details->check_number; ?>" disabled>
													</td>
													<td>
														<input type="date" name="pay_date[]" class="pay_date form-control text-center" id="pay_date" value="<?php echo $value_payment_details->pay_date; ?>" placeholder="Date" disabled> </td>
													<td>
														<input type="text" name="bank_name[]" class="bank_name form-control text-center" id="bank_name" placeholder="Bank Name" value="<?php echo $value_payment_details->bank_name; ?>" disabled> </td>
											
											<td>
												<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_payment_details->total_amount_first; ?>" onchange="total1(this.value)" disabled> </td>



													
												</tr>
											<?php } ?>

											</tbody>





									<thead style="background: #1b2850;">
										<tr>
											<th colspan="4" style="text-align: right !important;">Total Amount </th>
											
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total_payment_two" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $total_payment_two; ?>" disabled id="total3" ></th>
										</tr>
									</thead>
										</table>
									</div>


									<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Remark</label>
									<textarea rows="2" class="form-control" name="remark_payment_details" disabled><?php echo $remark_payment_details; ?></textarea> </div>



							</div>


						
<div class="col-lg-12 col-sm-12 col-12 mb-4 invoice_fieled" >
										


										<div class="table-top">
											<div class="wordset">
												<button type="button" class="btn btn-primary mb-1 mx-3 float-right btn-added my-table-create" data-toggle="modal"  data-target="#sort_model_field"><i class="fas fa-eye text-light"></i>  <span class="mx-1">View Invoice</span></button>
											</div>
										</div>


										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
												<th>Payment Mode</th>
											<th>Invoice Number</th>
											<th>Invoice Date</th>
									
											<th>Invoice Amount</th>
											<th>Balance Amount</th>
											<th>Payment Amount</th>
											
											
										
											
											
										</tr>
											</thead>
										

											<tbody id="TbodyinvoiceAddMore">
<?php 

					$payement_id = $_GET['post'];
					$data_invoice = $db->query("SELECT * FROM payment_invoice_details WHERE payment_id='$payement_id'");
                    while ($value_invoice_details = $data_invoice->fetch_object()) {

                    	$data_invoice2 = $db->query("SELECT * FROM invoice WHERE id='$value_invoice_details->invoice_number'");
                    	$value_invoice2 = $data_invoice2->fetch_object();


									?>
<tr id="TRbodyinvoiceAddMore">
													<td width="230">
												
									
									<select class="form-control" name="payment_mode[]" disabled>
										<option value="">Choose Payment Mode</option>
										<option value="pay" <?php if($value_invoice_details->payment_mode=='pay') echo "selected"; ?>>Pay</option>
										<option value="advance" <?php if($value_invoice_details->payment_mode=='advance') echo "selected"; ?>>Advance</option>
									

									</select>
							
															
													</td>
													<td width="230">

														<select class="form-control" name="invoice_number[]" id="invoice_number_for_invoice" disabled>
										

										<option value="<?php echo $value_invoice2->id
										; ?>"><?php echo $value_invoice2->invoice_number
										; ?></option>
										
									

									</select>

													
												
													</td>
													<td>
														<input type="date" name="invoice_date[]" class="invoice_date form-control text-center" id="invoice_date" placeholder="Date" value="<?php echo $value_invoice_details->invoice_date; ?>" disabled> </td>
												
											
											<td>
												<input type="text" name="invoice_value[]" class="invoice_value form-control text-center" placeholder="Invoice Amount" id="invoice_value" value="<?php echo $value_invoice_details->total_amount; ?>" disabled > </td>




												<td>
												<input type="text" name="balance_value[]" class="balance_value form-control text-center" placeholder="Balance Amount"  value="<?php echo $value_invoice_details->balance_amount; ?>" disabled> </td>

													<td>
												<input type="text" name="payment_amount_value[]" class="payment_amount_value form-control text-center" value="<?php echo $value_invoice_details->payment_amount; ?>" disabled> </td>



													
												</tr>

											<?php } ?>


											</tbody>


										





										<thead style="background: #1b2850;">
										<tr>
											<th colspan="3" style="text-align: right !important;">Total Amount Of Invoice</th>
											
											<th colspan="1"><input type="text" name="final_invoice_value" style="border: none;background: #1b2850;color: #fff;" class="final_invoice_value text-center" placeholder="Total Amount of Invoice"  readonly id="final_invoice_value" ></th>

											<th colspan="1" ><input type="text" name="final_blance_value" style="border: none;background: #1b2850;color: #fff;" class="final_blance_value text-center" placeholder="Total Balance Amount"  readonly id="final_blance_value" ></th>

											<th colspan="2" style="text-align: right !important;"><input type="text" name="pay_amount_of_invoice" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="pay_amount_of_invoice text-center" placeholder="Total Amount of Payment"  readonly id="pay_amount_of_invoice" ></th>
										</tr>
									</thead>
										</table>
									</div>





						


									<div class="col-lg-12 col-sm-12 col-12 mb-4">
										

									


										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											
											<th>Invoice Number</th>
											<th>Debit Note Number</th>
											<th>Debit Note Date</th>
											<th>Total Debit Note Amount</th>
											
											
										
										</tr>
											</thead>
										

											<tbody id="TbodyDebitNote">
											<?php 

					$payement_id = $_GET['post'];
					$data_debit_invoice = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$payement_id'");
                    while ($value_debit_details = $data_debit_invoice->fetch_object()) { 


                    		$data_invoice2 = $db->query("SELECT * FROM invoice WHERE id='$value_debit_details->invoice_number'");
                    	$value_invoice2 = $data_invoice2->fetch_object();

                    	?>


                    	<tr id="TRbodyDebitNote">
		<td width="230">
				<select class="form-control" name="invoice_number_debit_note[]" id="invoice_number_for_debit_note" disabled>
										<option value="<?php echo $value_invoice2->id; ?>"><?php echo $value_invoice2->invoice_number; ?></option>
										
									

									</select>
			
		</td>
		
		<td width="230">
         <input type="text" name="debit_note_number[]" class="form-control" value="<?php echo $value_debit_details->debit_note_number; ?>" disabled>
        </td>
		
		<td>
			<input type="date" name="debit_note_date[]" class="debit_note_date form-control text-center" id="debit_note_date" placeholder="Debit Note Date" value="<?php echo $value_debit_details->debit_note_date; ?>" disabled> 
		</td>
												
		<td>
			<input type="text" name="debit_note_value[]" class="debit_note_value form-control text-center" placeholder="Total Debit Note Amount" id="debit_note_value" value="<?php echo $value_debit_details->total_debit_note_amount; ?>" onchange="totalDebitNote(this.value)" disabled> 
		</td>
    </tr>


                    <?php } ?>



											</tbody>


										





									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3" style="text-align: right !important;">Total Amount Of Debit Note</th>
											
											<th colspan="1" style="text-align: right !important;"><input type="text" name="final_debit_value" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="final_debit_value text-center" placeholder="Total Amount Of Debit Note" value="<?php echo $final_debit_value; ?>" disabled id="final_debit_value" ></th>
										</tr>
									</thead>
										</table>
									</div>

									<div class="col-lg-12 col-sm-12 col-12 mb-4" >
										


										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											
											<th>Invoice Number</th>
											<th>Credit Note Number</th>
											<th>Credit Note Date</th>
											<th>Total Credit Note Amount</th>
											
											
											
										</tr>
											</thead>
										

											<tbody id="TbodyCreditNote">
												<?php 

					$payement_id = $_GET['post'];
					$data_credit_invoice = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$payement_id'");
                    while ($value_credit_details = $data_credit_invoice->fetch_object()) { 


                    		$data_invoice2 = $db->query("SELECT * FROM invoice WHERE id='$value_credit_details->invoice_number'");
                    	$value_invoice2 = $data_invoice2->fetch_object();

                    	?>


                    	<tr id="TRbodyCreditNote">
		<td width="230">
				<select class="form-control" name="invoice_number_credit_note[]" id="invoice_number_for_debit_note" disabled>
					<option value="<?php echo $value_invoice2->id; ?>"><?php echo $value_invoice2->invoice_number; ?></option>
										
									

									</select>
			
		</td>
		
		<td width="230">
         <input type="text" name="credit_note_number[]" class="form-control" value="<?php echo $value_credit_details->credit_note_number; ?>" disabled>
        </td>
		
		<td>
			<input type="date" name="credit_note_date[]" class="credit_note_date form-control text-center" id="credit_note_date" placeholder="Credit Note Date" value="<?php echo $value_credit_details->credit_note_date; ?>" disabled> 
		</td>
												
		<td>
			<input type="text" name="total_credit_note_amount[]" class="total_credit_note_amount form-control text-center" placeholder="Total Debit Note Amount" id="total_credit_note_amount" value="<?php echo $value_credit_details->total_credit_note_amount; ?>" onchange="totalCreditNoteAmts(this.value)" disabled> 
		</td>
    </tr>


                    <?php } ?>



											</tbody>


										





									<thead style="background: #1b2850;">
										<tr>
											<th colspan="3" style="text-align: right !important;">Total Amount Of Credit Note</th>
											
											<th colspan="1" style="text-align: right !important;"><input type="text" name="final_credit_note_value" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="final_credit_note_value text-center" placeholder="Total Amount Of Credit Note" value="<?php echo $final_credit_note_value; ?>" disabled id="final_credit_note_value" ></th>
										</tr>
									</thead>
										</table>
									</div>


							


										<div class="col-lg-12 col-sm-12 col-12 mb-4 invoice_fieled" >
										


										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											<th colspan="3">Payment Details</th>
											
									
											<th colspan="2">Total Amount</th>
											
										</tr>
											</thead>
										

											


											<tbody width="100%">
												<tr>
											<td colspan="3" style="text-align: center;">Total Amount Of Invoice</td>
											<td colspan="2">
												<input type="text" name="total_invoice_two" class="form-control text-center total_invoice_amount_calc" placeholder="Total Amount Of Invoice" value="<?php echo $total_invoice_two; ?>" id="total_invoice_amount_calc" disabled > </td>
										</tr>


											<tr>
											<td colspan="3" style="text-align: center;">Total Balance Amount Of Invoice</td>
											<td colspan="2">
												<input type="text" name="total_balance_two_calc" class="form-control text-center total_balance_two_calc" placeholder="Total Balance Amount Of Invoice" id="total_balance_two_calc" value="" readonly  > </td>
										</tr>


										<tr>
											<td colspan="3" style="text-align: center;"> Debit Note Amount </td>
											<td colspan="2">
												<input type="text" name="total_debit_note_two" class="currency form-control text-center total_amount_of_debit_note_calc" placeholder="Total Amount of Debit Note" id="total_amount_of_debit_note_calc" value="<?php echo $total_debit_note_two; ?>" disabled> </td>
										</tr>

										<tr>
											<td colspan="3" style="text-align: center;"> Credit Note Amount </td>
											<td colspan="2">
												<input type="text" name="total_credit_note_two" class="currency form-control text-center total_amount_of_credit_note_calc" placeholder="Total Amount of Credit Note" id="total_amount_of_credit_note_calc" value="<?php echo $total_credit_note_two; ?>" disabled> </td>
										</tr>
											<tr>
											<td colspan="3" style="text-align: center;">Total Payment Amount </td>
											<td colspan="2">
												<input type="text" name="total_payment_three" class="form-control text-center total_payment_amount_clc" placeholder="Total Payment Amount" value="<?php echo $total_payment_three; ?>" id="total_payment_amount_clc" disabled> </td>
										</tr>

										

										

									

											<tr>
											<td colspan="3" style="text-align: center;"> Balance Amount </td>
											<td colspan="2">
												<input type="text" name="total_blance_amount" class="currency form-control text-center total_blance_amount" placeholder="Total Balance Amount" id="total_blance_amount"  onchange="getTotalValues(this.value)" value="<?php echo $total_blance_amount; ?>" disabled> </td>
										</tr>
										

										

										<tr><td colspan="1" style="text-align: center;"> Other</td><td colspan="2" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" value="<?php echo $misc_name; ?>" placeholder="Misc. Name" disabled></td><td colspan="2"><input type="text" name="total_miscs" class="total_miscs form-control text-center" placeholder="Total Misc Value" id="total_miscs"  onchange="getTotalValues(this.value)" value="<?php echo $total_misc_amount; ?>" disabled> </td></tr>
										<tr>
											<td colspan="3" style="text-align: center;"> Round Offf </td>
									
											<td colspan="2">
												<input type="text" name="round_off" class="round_off form-control text-center" value="<?php echo $round_off; ?>" placeholder="Round Off" id="round_off" onchange="getTotalValues(this.value)" disabled> </td>
										</tr>
									</tbody>





									<thead style="background: #1b2850;">
										<tr>
											<th colspan="4" style="text-align: right !important;">Total Balance Amount Of Invoice</th>
											
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total_payment_four" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total_payment_amount_calc text-center" placeholder="Total Amount of Payment" readonly id="total_payment_amount_calc" value="<?php echo $total_payment_four; ?>" disabled></th>
										</tr>
									</thead>
										</table>
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
	


function paymentAmt(value) {
	$("#total_payment_amount_clc").val(value);
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
			} else {
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
	var mill_code = $("#master_mill_invoice").val();
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
		url: 'get_invoice_for_payment_by_mill.php',
		data: {
			value: value,
			mill_code: mill_code
		},
		success: function(data) {
			$("#invoice_number_for_invoice").html(data);
		}
	});
}

function AddMoreInvoice() {
	var tbdinvoice = $("#TRbodyinvoiceAddMore").clone().appendTo("#TbodyinvoiceAddMore");
	$(tbdinvoice).find("input").val('');
	$(tbdinvoice).find("select").select2();
	$(tbdinvoice).find("#invoice_number_for_invoice").each(function() {
		$(this).on("change", function() {
			var value = $(this).val();
			$.ajax({
				type: "POST",
				url: 'get_invoice_value_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					if(response.trim() != "no_data") {
						var all_data = JSON.parse(response.trim());
						$(tbdinvoice).find("#invoice_date").val(all_data[0].invoice_date);
						$(tbdinvoice).find("#invoice_value").val(all_data[0].all_total_amount);
						totalInvoice();
					  
						
					} else {
						alert("No Data Found");
					}
				}
			});


			$.ajax({
				type: "POST",
				url: 'get_debit_note_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					$("#TbodyDebitNote").append(response);
						totalDebitNote();
				}
			});


			$.ajax({
				type: "POST",
				url: 'get_credit_note_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					$("#TbodyCreditNote").append(response);

						totalCreditNoteAmts();
				}
			});


		});
	});
}


$(document).ready(function() {
	$("#invoice_number_for_invoice").each(function() {
		$(this).on("change", function() {
			var value = $(this).val();
			$.ajax({
				type: "POST",
				url: 'get_invoice_value_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					if(response.trim() != "no_data") {
						var all_data = JSON.parse(response.trim());
						$("#invoice_date").val(all_data[0].invoice_date);
						$("#invoice_value").val(all_data[0].all_total_amount);
						totalInvoice();
					
						
						
					} else {
						alert("No Data Found");
					}
				}
			});

			$.ajax({
				type: "POST",
				url: 'get_debit_note_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					$("#TbodyDebitNote").append(response);
					totalDebitNote();
				}
			});
			$.ajax({
				type: "POST",
				url: 'get_credit_note_for_payment.php',
				data: {
					value: value
				},
				success: function(response) {
					$("#TbodyCreditNote").append(response);
					totalCreditNoteAmts();

				}
			});
		});
	});
});

function InvoiceTableDelete(btndelete) {
	$(btndelete).parent().parent().remove();
	total1(btndelete);
}

function AddMore() {
	var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
	$(tbd).find("input").val('');
	$(tbd).find("select").select2();
	$(tbd).removeClass("d-none");
	$(tbd).find(".total_amount_first").each(function() {
		$(this).on("change", function() {
			var payment_ammount = document.getElementById("total_payment_amount").value;
			var amts = document.getElementsByName("total_amount_first[]");
			var sum = 0;
			for(let i = 0; i < amts.length; i++) {
				var total2 = amts[i].value;
				sum = +(sum) + +(total2);
			}
			if(sum <= payment_ammount) {
				document.getElementById("total3").value = sum.toFixed(2);
			} else {
				alert("Sorry Payment Amount Should be less then Total Ammount of Payment");
				$(this).val("");
			}
		});
	});
}
var numericInput = document.getElementById("total_amount_first");
numericInput.addEventListener("input", function(event) {
	var inputValue = event.target.value;
	var regex = /^\d*\.?\d*$/; // Regular expression to match numbers and decimal values
	if(!regex.test(inputValue)) {
		event.target.value = inputValue.slice(0, -1); // Remove the last entered character
	}
});
var numericInput2 = document.getElementById("total_payment_amount");
numericInput2.addEventListener("input", function(event) {
	var inputValue = event.target.value;
	var regex = /^\d*\.?\d*$/; // Regular expression to match numbers and decimal values
	if(!regex.test(inputValue)) {
		event.target.value = inputValue.slice(0, -1); // Remove the last entered character
	}
});
$(".total_amount_first").each(function() {
	$(this).on("change", function() {
		var payment_ammount = document.getElementById("total_payment_amount").value;
		var amts = document.getElementsByName("total_amount_first[]");
		var sum = 0;
		for(let i = 0; i < amts.length; i++) {
			var total2 = amts[i].value;
			sum = +(sum) + +(total2);
		}
		if(sum <= payment_ammount) {
			document.getElementById("total3").value = sum.toFixed(2);
		} else {
			alert("Sorry Payment Amount Should be less then Total Ammount of Payment");
			$(this).val("");
		}
	});
});

function totalInvoice(value) {
	var invoice_amts = document.getElementsByName("invoice_value[]");
	var sum_invoice = 0;
	for(let i = 0; i < invoice_amts.length; i++) {
		var total2 = invoice_amts[i].value;
		sum_invoice = +(sum_invoice) + +(total2);
	}
	document.getElementById("final_invoice_value").value = sum_invoice.toFixed(2);
	document.getElementById("total_invoice_amount_calc").value = sum_invoice.toFixed(2);
	getTotalBlance();
}

function totalDebitNote(value) {
	var debit_note_amts = document.getElementsByName("debit_note_value[]");
	var sum_debit_note = 0;
	for(let i = 0; i < debit_note_amts.length; i++) {
		var total2debit = debit_note_amts[i].value;
		sum_debit_note = +(sum_debit_note) + +(total2debit);
	}
	document.getElementById("final_debit_value").value = sum_debit_note.toFixed(2);
	document.getElementById("total_amount_of_debit_note_calc").value = sum_debit_note.toFixed(2);
}

function totalCreditNoteAmts(value) {
	var credit_note_amts = document.getElementsByName("total_credit_note_amount[]");
	var sum_credit_note = 0;
	for(let i = 0; i < credit_note_amts.length; i++) {
		var total2credit = credit_note_amts[i].value;
		sum_credit_note = +(sum_credit_note) + +(total2credit);
	}
	document.getElementById("final_credit_note_value").value = sum_credit_note.toFixed(2);
	document.getElementById("total_amount_of_credit_note_calc").value = sum_credit_note.toFixed(2);
}

function getTotalBlance(value) {
	var total_pmt = document.getElementById("total_payment_amount_clc").value;
	var total_invc = document.getElementById("total_invoice_amount_calc").value;
	var total_deb = document.getElementById("total_amount_of_debit_note_calc").value;
	var total_crd = document.getElementById("total_amount_of_credit_note_calc").value;
	var total_miscs = document.getElementById("total_miscs").value;
	var total_rounde = document.getElementById("round_off").value;
	var final_blance = (total_pmt) - (total_invc)- -(total_deb)+ +(total_crd);
	
	document.getElementById("total_blance_amount").value = final_blance.toFixed(2);
	getTotalValues();
}

function getTotalValues(value) {
	var total_pmt = document.getElementById("total_payment_amount_clc").value;
	var total_invc = document.getElementById("total_invoice_amount_calc").value;
	var total_deb = document.getElementById("total_amount_of_debit_note_calc").value;
	var total_crd = document.getElementById("total_amount_of_credit_note_calc").value;
	var total_blc = document.getElementById("total_blance_amount").value;
	var total_miscs = document.getElementById("total_miscs").value;
	var total_rounde = document.getElementById("round_off").value;
	var final_round_off = (total_pmt) - (total_invc)- -(total_deb)+ +(total_crd) + +(total_blc) + +(total_miscs)+ +(total_rounde);
	document.getElementById("total_payment_amount_calc").value = final_round_off.toFixed(2);
}



function TableDelete(btndelete) {
	$(btndelete).parent().parent().remove();
	total1(btndelete);
}
$(function() {
	$("#example1").DataTable({
		"responsive": true,
		"lengthChange": false,
		"autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print"]
	}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});
</script>
</body>
</html>