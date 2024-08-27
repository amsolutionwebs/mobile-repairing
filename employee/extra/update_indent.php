<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM indent WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$sub_mill_code = $master_value->sub_mill_code;
	$sub_mill_name = $master_value->sub_mill_name;
	$indent_no = $master_value->indent_no;
	$indent_date = $master_value->indent_date;
	$dealer_code = $master_value->dealer_code;
	$dealer_name = $master_value->dealer_name;
	$document_through = $master_value->document_through; 
	$destination = $master_value->destination;
	$transporter = $master_value->transporter;
	$firt_broker = $master_value->firt_broker;
	$currency = $master_value->currency;
	$description_button = $master_value->description_button;
	$notes = $master_value->notes;
	$remark = $master_value->remark;

}



?>
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="modal fade" id="grade_model_field">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Add Grade</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_grade"> <span aria-hidden="true">×</span> </button>
							</div>
							<div class="modal-body">
								<div class="col-sm-12">
									<form class="form-horizontal" id="grade_add_indent" method="post" enctype="multipart/form-data">
										<div class="card-body">
											<div class="col-lg-12 col-sm-6 col-12">
												<div class="form-group">
													<label>Grade</label>
													<input type="text" name="grade"  onchange="getGradeAlready3(this.value)" class="form-control" required> </div>
											</div>
											<div class="col-lg-12 col-sm-6 col-12">
												<div class="form-group">
													<label>Description</label>
													<textarea rows="3" cols="3" class="form-control" placeholder="Enter main address here" autocomplete="off" name="description"></textarea>
												</div>
											</div>
											<div class="form-group ">
												<input type="hidden" name="submit" value="publish" class="submit" />
											
												<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id" class="company_id">
												<input type="submit" name="add_grade" class="btn form-control" style="background-color: yellowgreen;color:white;"> </div>
										</div>
										<!-- /.card-body -->
										<!-- /.card-footer -->
									</form>
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
	
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="modal fade" id="sort_model_field">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Add Sort</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_sort"> <span aria-hidden="true">×</span> </button>
							</div>
							<div class="modal-body">
								<form role="form" method="post" enctype="multipart/form-data" id="sort_add_indent">
									<div class="row px-2 py-3">
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Master Mill Code</label>
												<select class="form-control mill_code" name="mill_code" onchange="getMasterMillName(this.value)">
													<option value="0">--Choose Master Mill--</option>
													<?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
														<option value="<?php echo $value_master->id; ?>">
															<?php echo $value_master->mill_code; ?>
														</option>
														<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Master Mill Name</label>
												<input type="text" name="mill_name"  id="mill_name" class="form-control mill_name" readonly="readonly"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12 <?php if(empty($mill_code)){echo " d-none ";}?>" id="submillfield">
											<div class="form-group">
												<label>--Choose Mill Code--</label>
												<select class="form-control submillselect sub_mill_code" name="sub_mill_code" onchange="getSubMillName(this.value)">
													<option>Choose</option>
													<?php 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
														<option value="<?php echo $value_subm->id; ?>" >
															<?php echo $value_subm->mill_code; ?>
														</option>
														<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12 <?php if(empty($mill_code)){echo " d-none ";}?>" id="submillfieldname">
											<div class="form-group">
												<label>Mill Name</label>
												<input type="text" name="sub_mill_name" id="sub_mill_name" class="form-control sub_mill_name2" class="form-control" readonly="readonly"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort No</label>
												<input type="text" name="sort_no" onchange="getSortAlready(this.value)"class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description</label>
												<input type="text" name="sort_description" class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Products Type</label>
												<input type="text" name="products_type" class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Width Per Inch</label>
												<input type="text" name="width_per_inch" class="form-control"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status" required>
													<option value="enable">Enable</option>
													<option value="disable">Disable</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-sm-6 col-12">
											<div class="form-group">
												<label>Remark</label>
												<textarea name="remark" class="form-control"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<input type="hidden" name="submit" value="publish" />
											<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
											<input type="submit" name="add_grade" value="<?php if($action=='update'){echo " Update ";}else{echo "Submit ";} ?>" class="btn form-control" style="background-color: yellowgreen;color:white;">

										 </div>
										<!--  -->
									</div>
								</form>
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
									<div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users" style="font-size: 25px; color:#fff;"></i> </div>
									<h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Indent</h5> </div>
								<div class="col-1 d-flex justify-content-right align-items-right">
									<div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="indent_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
								</div>
							</div>
							<!--  -->
							<form role="form" method="post" enctype="multipart/form-data">
								<div class="row px-2 py-3">
									<!-- registration page -->
									<div class="col-md-12">
										<h4 style="color:#d9534f;"><b>Indent Details:-</b></h4>
										<hr> </div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Master Mill Code</label>
											<select class="form-control mill_code_indent" name="mill_code" onchange="getMasterMillName2(this.value)" id="master_mill">
												<option>-- Choose Master Mill Code -- </option>
												<?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
													<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$mill_code){echo "selected";}?>>
														<?php echo $value_master->mill_code; ?>-
															<?php echo $value_master->mill_name; ?>
													</option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Master Mill Name</label>
											<input type="text" name="mill_name" value="<?php echo $mill_name; ?>" id="mill_name_2" class="form-control mill_name_indent" readonly="readonly"> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "ddd ";} ?>" id="submillfield_2">
										<div class="form-group">
											<label>Mill Code</label>
											<select class="form-control submillselect sub_mill_code_indent" name="sub_mill_code" onchange="getSubMillName_2(this.value)" id="mill_code_invoice">
												<option value="0">-- Choose Mill Code --</option>
												<?php 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
													<option value="<?php echo $value_subm->id; ?>" <?php if($value_subm->id==$sub_mill_code){echo "selected";}?>>
														<?php echo $value_subm->mill_code; ?>
													</option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($sub_mill_code)){echo " d-none ";}else{echo "ddd ";} ?>" id="submillfieldname_2">
										<div class="form-group">
											<label>Mill Name</label>
											<input type="text" name="sub_mill_name" value="<?php echo $sub_mill_name; ?>" id="sub_mill_name_2" class="form-control sub_mill_name_indent" readonly="readonly"> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Indent No</label>
											<input type="text" class="form-control indent_no" name="indent_no" value="<?php echo $indent_no; ?>" readonly> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Indent Date</label>
											<input type="date" class="form-control datetimepicker cal-icon indent_date" placeholder="Choose Date" name="indent_date" autocomplete="off" value="<?php echo $indent_date; ?>"> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Dealer Code</label>
											<select class="form-control dealer_code" name="dealer_code" onchange="getDealerName_2(this.value)" class="dealer_code">
												<option value="0">Choose Dealer</option>
												<?php 
                
                   $data_dealer = $db->query("SELECT * FROM `dealer` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_dealer = $data_dealer->fetch_object()) { ?>
													<option value="<?php echo $value_dealer->id; ?>" <?php if($value_dealer->id==$dealer_code){echo "selected";}?>>
														<?php echo $value_dealer->dealer_code; ?> -
															<?php echo $value_dealer->dealer_name; ?>
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
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Document Through</label>
											<select class="form-control document_through" name="document_through">
												<option value="#">Choose</option>
												<option value="direct" <?php if($document_through=='Direct To Buyer' ){ echo "selected";}?>>Direct</option>
												<option value="self" <?php if($document_through=='Direct to Us For Collection' ){ echo "selected";}?>>Self</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Destination </label>
											<input type="text" name="destination" class="form-control destination" value="<?php echo $destination; ?>" class="form-control" required> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Transporter </label>
											<input type="text" name="transporter" class="form-control transporter" value="<?php echo $transporter; ?>" class="form-control" required> </div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Broker</label>
											<select class="form-control firt_broker" name="firt_broker">
												<option value="0">--Choose Broker--</option>
												<?php 
                
                   $data_broker = $db->query("SELECT * FROM `broker` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_broker = $data_broker->fetch_object()) { ?>
													<option value="<?php echo $value_broker->id; ?>" <?php if($value_broker->id==$firt_broker ){ echo "selected";}?>>
														<?php echo $value_broker->code_one; ?>-
															<?php echo $value_broker->name_one; ?>
													</option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Currency</label>
											<input type="text" name="currency" class="currency form-control" value="<?php echo $currency; ?>"> </div>
									</div>
									<div class="col-lg-12 col-sm-12 col-12">
										<div class="row">
										
											<div class="col-lg-12 col-sm-12 col-12">
												<div class="form-group">
													<label>Remark </label>
													<textarea name="remark" class="remark form-control">
														<?php echo $remark; ?>
													</textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-12 mb-4">
										
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
												<tr>
													<th>Sort</th>
													<th>Grade</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="Tbodyinvoice">


												<?php
                    $indent_id = $_GET['post'];
                    $data = $db->query("SELECT * FROM indent_plus WHERE indent_id='$indent_id'");
                    while ($value_sort_entry = $data->fetch_object()) {
                    	$indent_plus_id = $value_sort_entry->id;
                    	$sort_ids = $value_sort_entry->sort_id;
                    	$grade_ids = $value_sort_entry->grade_id;
                    	$quantity_indent = $value_sort_entry->quantity;
                    	$price_indent = $value_sort_entry->price;

                   
                    
                      ?>
												<tr id="TRbodyinvoice">
													<td id="mysort" width="320">
														<div class="row">
															<div class="col-lg-9 col-sm-9 col-9" id="sort_fileds">
																<select class="form-control py-2 sort_select" name="sort_no[]">
																	<option value="0">--Choose Sort--</option>
																	<?php 
                
                   $data_sortl = $db->query("SELECT * FROM `sort` WHERE company_id='$company_login_id'");
                    while ($value_sortl = $data_sortl->fetch_object()) { ?>
																		<option value="<?php echo $value_sortl->id; ?>" <?php if($value_sortl->id==$sort_ids ){ echo "selected";}?>>
																			<?php echo $value_sortl->sort_no; ?>
																		</option>
																		<?php } ?>
																</select>
															</div>
															<div class="col-lg-3 col-sm-3 col-3 ps-0">
																<a href="#" class="btn btn-filters ms-auto" data-toggle="modal" type="button" data-target="#sort_model_field" style="background: #ff9f43;"> <i class="fas fa-plus text-light right"></i></a>
															</div>
														</div>
													</td>
													<td width="320">
														<div class="row">
															<div class="col-lg-9 col-sm-9 col-9" id="grade_fields">
																<select class="form-control py-2 select_grade" name="grade">
																	<option value="0">--Choose grade--</option>
																	<?php 
                
                   $data_gradel = $db->query("SELECT * FROM `grade` WHERE company_id='$company_login_id' ORDER BY id DESC");
                    while ($value_gradel = $data_gradel->fetch_object()) { ?>
																		<option value="<?php echo $value_gradel->id; ?>" <?php if($value_gradel->id==$grade_ids ){ echo "selected";}?>>
																			<?php echo $value_gradel->grade; ?>
																		</option>
																		<?php } ?>
																</select>
															</div>
															<div class="col-lg-3 col-sm-3 col-3 ps-0">
																<a href="#" class="btn btn-filters ms-auto" data-toggle="modal" type="button" data-target="#grade_model_field" style="background: #ff9f43;"> <i class="fas fa-plus text-light right"></i></a>
															</div>
														</div>
													</td>
													<td>
														<input type="text" class="form-control quantity" name="quantity" placeholder="Quantity" value="<?php echo $quantity_indent; ?>"> </td>
													<td>
														<input type="text" class="form-control price" name="price" placeholder="Price" value="<?php echo $price_indent; ?>">
														<input type="hidden" name="indent_sort_id" class="indent_sort_id" value="<?php echo $indent_plus_id; ?>">
														 </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDeleteInent(this,<?php echo $indent_plus_id; ?>)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>


											<?php } ?>

											</tbody>
										</table>
									</div>
									<div class="col-lg-12 col-sm-6 col-12">
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input checkbox1" type="checkbox" name="description_button" value="yes" id="invalidCheck2" required="required">
												<label class="form-check-label" for="invalidCheck2"> Agree to terms and conditions <a href="#" style="color:blue;">Know More !</a></label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<input type="hidden" name="submit" value="update" class="submit" />
										<input type="hidden" name="post_id" value="<?php echo $id; ?>" class="post_id">
										<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id" class="company_id">
										<input type="submit" id="submitButtonId" value="Update" class="btn btn-primary float-right update_indent"> </div>
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
	
  function getGradeAlready3(value) {
  var company_login_id = $("#company_id").val();
  $.ajax({
    type: "POST",
    url: 'get_grade_already.php',
    data: {
      value: value,
      company_login_id: company_login_id
    },
    success: function(data) {
      if(data.trim()=="yes"){
        alert("Code Already Exits");
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
}


		$(document).ready(function() {
			$('#grade_add_indent').submit(function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					type: 'POST',
					url: 'grade_action_indent.php',
					data: formData,
					success: function(response) {
						if(response.trim()=="yes") {
							$('#grade_add_indent')[0].reset();
							var company_login_id = $("#company_id").val();
							$.ajax({
								type: 'POST',
								url: 'get_all_grade_indent.php',
								data: {
									company_login_id: company_login_id
								},
								success: function(response) {


									$(".select_grade").html(response);
									$('#close_grade').click();
								},
								error: function() {
									alert('An error occurred while loading the data.');
								}
							});
						} else {
							alert("Try Again")
						}
					},
					error: function() {
						alert('An error occurred while submitting the form.');
					}
				});
			});
		});


			$(document).ready(function() {
			$('#sort_add_indent').submit(function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					type: 'POST',
					url: 'sort_action_indent.php',
					data: formData,
					success: function(response) {
						if(response.trim()=="yes") {
							$('#sort_add_indent')[0].reset();
							var company_login_id = $("#company_id").val();
							$.ajax({
								type: 'POST',
								url: 'get_all_sort_indent.php',
								data: {
									company_login_id: company_login_id
								},
								success: function(response) {
									$(".sort_select").html(response);
									$('#close_sort').click();
								},
								error: function() {
									alert('An error occurred while loading the data.');
								}
							});
						} else {
							alert("Try Again")
						}
					},
					error: function() {
						alert('An error occurred while submitting the form.');
					}
				});
			});
		});




function TableDeleteInent(btndelete,value) {

	$.ajax({
    type: "POST",
    url: 'delete_indent_sorts.php',
    data: {
      value: value
    },
    success: function(data) {
    	if(data.trim()=="yes") {
    	$(btndelete).parent().parent().remove();
    	}else{
    		alert("failed");
    	}
     
    }
  });

}



$(document).ready(function(){
	$(".update_indent").click(function(e){
		e.preventDefault();
		var sort_one = [];
		var sort_length = $(".sort_select").length;
		var i ;
		for (i=0;i<sort_length;i++){
			sort_one[i] = document.getElementsByClassName('sort_select')[i].value;
		}

		// twp
		var grade_one = [];
		var grade_length = $(".select_grade").length;
		var i;
		for (i=0;i<grade_length;i++){
			grade_one[i] = document.getElementsByClassName('select_grade')[i].value;
		}
		// three
		var quantity_one = [];
		var quantity_length = $(".quantity").length;
		var q ;
		for (q=0;q<quantity_length;q++){
			quantity_one[q] = document.getElementsByClassName('quantity')[q].value;
		}
		// four
		var price_one = [];
		var price_length = $(".price").length;
		var p;
		for (p=0;p<price_length;p++){
			price_one[p] = document.getElementsByClassName('price')[p].value;
		}

		var indent_sort_id_one = [];
		var indent_sort_id_length = $(".indent_sort_id").length;
		var iid;
		for (iid=0;iid<indent_sort_id_length;iid++){
			indent_sort_id_one[iid] = document.getElementsByClassName('indent_sort_id')[iid].value;
		}


		var object1 = JSON.stringify(sort_one);
		var object2 = JSON.stringify(grade_one);
		var object3 = JSON.stringify(quantity_one);
		var object4 = JSON.stringify(price_one);
		var object5 = JSON.stringify(indent_sort_id_one);
		
		var mill_code = $(".mill_code_indent").val();
		var mill_name = $(".mill_name_indent").val();
		var sub_mill_code = $('.sub_mill_code_indent').val();
		var sub_mill_name = $('.sub_mill_name_indent').val();
		var indent_no = $('.indent_no').val();
		var indent_date = $('.indent_date').val();
		var dealer_code = $('.dealer_code').val();
		var dealer_name = $('.dealer_name').val();
		var contract_no = $('.contract_no').val();
		var document_through = $('.document_through').val();
		var destination = $('.destination').val();
		var transporter = $('.transporter').val();
		var firt_broker = $('.firt_broker').val();
		var currency = $('.currency').val();
		
		var remark = $('.remark').val();
		var checkbox1 = $('.checkbox1').val();
		var submit = $('.submit').val();
		var company_id = $('.company_id').val();
		var post_id = $('.post_id').val();
		

        $.ajax({
        type :"POST",
        url: 'update_indent_action.php',
        data: {
        	json_Data1 : object1,
        	json_Data2 : object2,
        	json_Data3 : object3,
        	json_Data4 : object4,
        	json_Data5 : object5,
        	mill_code : mill_code,
        	mill_name : mill_name,
        	sub_mill_code : sub_mill_code,
        	sub_mill_name : sub_mill_name,
        	indent_no : indent_no,
        	indent_date : indent_date,
        	dealer_code : dealer_code,
        	dealer_name : dealer_name,
        	contract_no : contract_no,
        	document_through : document_through,
        	destination : destination,
        	transporter : transporter,
        	firt_broker : firt_broker,
        	currency : currency,
        
        	remark : remark,
        	description_button: checkbox1,
        	submit : submit,
        	company_id : company_id,
        	post_id : post_id

        },
        success: function(data) {
        	
        	if(data.trim()=="yes") {
        		window.location.href = 'indent_list.php';
        	}else{
        		window.location.href = location.href;
           
        	}

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