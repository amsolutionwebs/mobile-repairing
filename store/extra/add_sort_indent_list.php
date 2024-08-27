<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];

$get_data = "SELECT * FROM indent WHERE id='$id'";
$response = $db->query($get_data);
$data_indent = $response->fetch_assoc();

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
													<input type="text" name="grade" value="<?php echo $grade; ?>" <?php if($action!=='update' ){ echo 'onchange="getGradeAlready(this.value)"';} ?> class="form-control" required> </div>
											</div>
											<div class="col-lg-12 col-sm-6 col-12">
												<div class="form-group">
													<label>Description</label>
													<textarea rows="3" cols="3" class="form-control" placeholder="Enter main address here" autocomplete="off" name="description">
														<?php echo $description; ?>
													</textarea>
												</div>
											</div>
											<div class="form-group ">
												<input type="hidden" name="submit" value="publish" />
												<input type="hidden" name="post_id" value="<?php echo $id; ?>">
												<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
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
														<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$master_mill_code){echo "selected";}?>>
															<?php echo $value_master->mill_code; ?>-<?php echo $value_master->mill_name; ?>
														</option>
														<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Master Mill Name</label>
												<input type="text" name="mill_name" value="<?php echo $master_mill_name; ?>" id="mill_name" class="form-control mill_name" readonly="readonly"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12 <?php if(empty($mill_code)){echo " d-none ";}?>" id="submillfield">
											<div class="form-group">
												<label>--Choose Mill Code--</label>
												<select class="form-control submillselect sub_mill_code" name="sub_mill_code" onchange="getSubMillName(this.value)">
													<option>Choose</option>
													<?php 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
														<option value="<?php echo $value_subm->id; ?>" <?php if($value_subm->id==$mill_code){echo "selected";} ?>>
															<?php echo $value_subm->mill_code; ?>
														</option>
														<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12 <?php if(empty($mill_code)){echo " d-none ";}?>" id="submillfieldname">
											<div class="form-group">
												<label>Mill Name</label>
												<input type="text" name="sub_mill_name" value="<?php echo $mill_name; ?>" id="sub_mill_name" class="form-control sub_mill_name2" class="form-control" readonly="readonly"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort No</label>
												<input type="text" name="sort_no" value="<?php echo $sort_no; ?>" <?php if($action!=='update' ){ echo 'onchange="getSortAlready(this.value)"';} ?> class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Sort Description</label>
												<input type="text" name="sort_description" value="<?php echo $sort_description; ?>" class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Products Type</label>
												<input type="text" name="products_type" value="<?php echo $products_type; ?>" class="form-control" required> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Width Per Inch</label>
												<input type="text" name="width_per_inch" value="<?php echo $width_per_inch; ?>" class="form-control"> </div>
										</div>
										<div class="col-lg-6 col-sm-6 col-12">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name="status" required>
													<option value="enable" <?php if($post_status=='enable' ){echo "selected"; } ?>>Enable</option>
													<option value="disable" <?php if($post_status=='disable' ){echo "selected"; } ?>>Disable</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-sm-6 col-12">
											<div class="form-group">
												<label>Remark</label>
												<textarea name="remark" class="form-control">
													<?php echo $remark; ?>
												</textarea>
											</div>
										</div>
										<div class="col-md-12">
											<input type="hidden" name="submit" value="publish" />
											<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
											<input type="submit" name="add_grade" value="Submit" class="btn form-control" style="background-color: yellowgreen;color:white;">

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
									 
										<h4 style="color:#d9534f;"><b>Indent Details:- <?php echo $data_indent['mill_name']; ?></b></h4>
										<hr> </div>
									
									<div class="col-lg-12 col-sm-12 col-12 mb-4">
										<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
											</div>
										</div>
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
												<tr id="TRbodyinvoice">
													<td id="mysort" width="420">
														<div class="row">
															<div class="col-lg-9 col-sm-9 col-9" id="sort_fileds">
																<select class="form-control py-2 sort_select" name="sort_no[]" id="sort_already" required>
																	<option value="0">--Choose Sort--</option>
																	<?php 
                $mill_id = $_GET['mill_id'];
                   $data_sortl = $db->query("SELECT * FROM `sort` WHERE company_id='$company_login_id' AND `master_mill_code`='$mill_id' ORDER BY sort_no");
                    while ($value_sortl = $data_sortl->fetch_object()) { ?>
																		<option value="<?php echo $value_sortl->id; ?>">
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
													<td width="220">
														<div class="row">
															<div class="col-lg-9 col-sm-9 col-9" id="grade_fields">
																<select class="form-control py-2 select_grade" name="grade" required>
																	<option value="0">--Choose grade--</option>
																	<?php 
                
                   $data_gradel = $db->query("SELECT * FROM `grade` WHERE company_id='$company_login_id' ORDER BY id DESC");
                    while ($value_gradel = $data_gradel->fetch_object()) { ?>
																		<option value="<?php echo $value_gradel->id; ?>">
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
														<input type="number" class="form-control quantity" name="quantity" placeholder="Quantity" required> </td>
													<td>
														<input type="number" class="form-control price" name="price" placeholder="Price" required> </td>
													<td class="text-center justify-conent-center">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDeleteInent(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									
									<div class="col-md-12">
										<input type="hidden" name="submit" value="update" class="submit" />
										<input type="hidden" name="post_id" value="<?php echo $id; ?>" class="post_id">
										
										<input type="submit" id="submitButtonId" value="Add Now !" class="btn btn-primary float-right add_indent"> </div>
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


function AddMore(){

var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
$(tbd).find("input").val('');
$(tbd).removeClass("d-none");
}

function TableDeleteInent(btndelete) {
$(btndelete).parent().parent().remove();
}



$(document).ready(function(){
	$(".add_indent").click(function(e){
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


		var object1 = JSON.stringify(sort_one);
		var object2 = JSON.stringify(grade_one);
		var object3 = JSON.stringify(quantity_one);
		var object4 = JSON.stringify(price_one);
		var post_id = $('.post_id').val();
		var submit = $('.submit').val();
	
		

        $.ajax({
        type :"POST",
        url: 'indent_sort_and_gradeadd_action.php',
        data: {
        	json_Data1 : object1,
        	json_Data2 : object2,
        	json_Data3 : object3,
        	json_Data4 : object4,
        	post_id : post_id,
        	submit : submit
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

//check_sort_already

$(document).ready(function() {
	$("#sort_already").each(function() {
	   
		$(this).on("change", function() {
		    
		     
			var value = $(this).val();
			var indent_id = $(".post_id").val();
			 
			$.ajax({
				type: "POST",
				url: 'get_sort_already_in_indent.php',
				data: {
					value: value,
					indent_id : indent_id
				},
				success: function(data) {
			if(data.trim()=="yes"){
				alert("Sort No Already Exits");
			
			}
		}
					
			});

		
		});
	});
});
		</script>
		</body>

		</html>