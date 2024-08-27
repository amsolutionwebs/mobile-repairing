<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM purchase_managment WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
	$customer_id = $value_emp->customer_id;
	$device_type = $value_emp->device_type;
	$customer_remark = $value_emp->customer_remark;
	
}




$data = $db->query("SELECT purchase_number FROM purchase_managment WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->purchase_number;
if(empty($recipt_name))
{
  $freciept_name = "POR-"."01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = "POR-".'0'.$exe_value;
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
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-shopping-cart" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Purchase</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="purchase_managment_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="purchase_management_action.php" class="needs-validation" novalidate>
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Purchase Details:-</b></h4>
              <hr> </div>
          

          <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Name <b style="color:red;"><sup>*</sup></b></label>
								<button class="btn btn-success btn-sm" style="float:right;" type="button" data-toggle="modal" data-target="#add_customer_modal"><i class="fa fa-plus"></i></button>
								<select class="form-control select2" name="customer_id" id="getCustomerData" disabled>
									<option value="">Select Customer</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `customer_managment` ORDER BY id ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($customer_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?></option>
                      <?php } ?>
								</select>
								 </div>
						</div>
            
             <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Purchase Number</label>
								<input type="text" name="purchase_number" value="<?php if($action == 'update'){echo $value_emp->purchase_number;}else{echo $freciept_name;} ?>" class="form-control" placeholder="Enq-123" readonly> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Purchase Date</label>
								<input type="datetime-local" name="purchase_date" value="<?php echo $value_emp->purchase_date; ?>" class="form-control" disabled> </div>
						</div>
						
					
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Device Type</label>
									<select class="form-control select2" name="device_type" disabled>
									<option value="0">Select Device Type</option>
									<option value="Mobile" <?php if($device_type==='Mobile'){echo 'selected';} ?>>Mobile</option>
									<option value="Laptop" <?php if($device_type==='Laptop'){echo 'selected';} ?>>Laptop</option>
									<option value="Other" <?php if($device_type==='Other'){echo 'selected';} ?>>Other</option>
								</select>
								 </div>
						</div>
					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Purchase Amount</label>
								<input type="text" name="purchase_amount" value="<?php echo $value_emp->purchase_amount; ?>" class="form-control" oninput="validateNumberInput(this)" placeholder="Purchase Amount" disabled> </div>
						</div>

						  <div class="col-md-3">
                              <div class="form-group">
                              	
                                <label for="cat_id">Select Categories :</label>
                                <select class="form-control select2" name="cat_id" onchange="getSubCat(this.value)" id="getCategoryData" disabled>
                                  <option value="">Select Categories</option>
                                  
           <?php 
                   $data1 = $db->query("SELECT * FROM `category` ORDER BY id ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($value_emp->cat_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->category_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
          </div>
				
				 <div class="col-md-3">
                              <div class="form-group">
                              
                                <label for="sub_cat_id">Select Sub Categories :</label>
                                <select class="form-control select2" name="sub_cat_id" id="sub_cat_id" disabled>
                                  <option value="">Select Sub Categories</option>
                                  
           <?php 
                   $data1 = $db->query("SELECT * FROM `sub_category` ORDER BY sub_category_name ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($value_emp->sub_cat_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->sub_category_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>

                              <div class="col-md-3">
                              <div class="form-group">
                              
                                <label for="brand_id"> Select Brand :</label>
                                <select class="form-control select2" name="brand_id" onchange="getModelNumber(this.value)" disabled>
                                  <option value="">Select Brand</option>
                                  
           <?php 
                   $data13 = $db->query("SELECT * FROM `brand` ORDER BY brand_name ASC");
                    while ($value13 = $data13->fetch_object()) { ?>
                      <option value="<?php echo $value13->id; ?>"  <?php if($value_emp->brand_id===$value13->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value13->brand_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>

                             <div class="col-md-3">
                              <div class="form-group">
                              
                                <label for="model_id">Select Model Number :</label>
                                <select class="form-control select2" name="model_number_id" id="model_number_id_get" disabled>
                                  <option value="">Select Model Number</option>
                                  
           <?php 
                   $data14 = $db->query("SELECT * FROM `model_number` ORDER BY model_number ASC");
                    while ($value14 = $data14->fetch_object()) { ?>
                      <option value="<?php echo $value14->id; ?>"  <?php if($value_emp->model_number_id===$value14->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value14->model_number; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>
                            		<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" name="status" disabled>
									<option>Select Status</option>
									 <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
                                
                                  
								</select>
							</div>
						</div>


						 		<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Problem Diagnosis</label>
								<select class="form-control select2" name="problem_diagnosis" onchange="getProblemField(this.value)" disabled>
									<option>Select Problem Diagnosis</option>
                                  <option value="no" <?php if($post_status == 'no'){echo "selected"; } ?>>No</option>

									 <option value="yes" <?php if($post_status == 'yes'){echo "selected"; } ?>>Yes</option>
                                
                                  
								</select>
							</div>
						</div>

						<div class="col-md-12 d-none" id="problem_dscription">
                           <div class="form-group">
								<label>Problem Diagnosis Description</label>
								<input type="text" name="problem_diagnosis_dscription" value="<?php echo $value_emp->problem_diagnosis_dscription; ?>"  class="form-control" placeholder="Problem Diagnosis Description"> </div>
                        </div>
                            
                            
                            <div class="col-md-12">
                            	<div class="row">
                            		
                            		 <div class="col-md-6">
                              <div class="form-group">
                                <label for="products_title">Products Title:</label>
                                <input type="text" class="form-control input-sm" name="products_title" id="products_title" value="<?php echo $value_emp->products_title; ?>" placeholder="Products Title" disabled> </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="products_qty">SKU Number. :</label>
                                <input type="text" name="products_sku" class="form-control" value="<?php echo $value_emp->products_sku; ?>" placeholder="SKU Number" disabled> </div>
                            </div>

                            	</div>
                            </div>
                           
						
						
						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Address</label>
								
								<textarea class="form-control" name="address" disabled> <?php echo $value_emp->customer_address; ?></textarea>


							</div>
						</div>
           
           	<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Remark</label>
								
								<textarea class="form-control" name="remark" disabled> <?php echo $customer_remark; ?></textarea>


							</div>
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

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="modal fade" id="add_customer_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
        <h5 class="modal-title">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_model">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

            <div class="modal-body">
            
             
             <form role="form" method="post" enctype="multipart/form-data" id="add_customer_by_leads">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Customer Details:-</b></h4>
              <hr> </div>
          
            <?php

             function generateRandomPassword($length = 35) {
    $characters = 'abcdefghijklmnopqrstuvwxyz'.time();
    $password = '';
  
    $maxIndex = strlen($characters) - 1;
  
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $maxIndex);
        $password .= $characters[$randomIndex];
    }
  
    return $password;
}

// Usage:
$genrated_url = generateRandomPassword(8);




             ?>
              <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Referal Code</label>
								<input type="text" name="referal_id" value="<?php if($action == 'update'){echo $value_emp->referal_id;}else{echo $genrated_url;} ?>" class="form-control" readonly> </div>
						</div>
					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Referal Code</label>
								<input type="text" name="coming_referal_id" value="<?php echo $value_emp->coming_referal_id; ?>" class="form-control" placeholder="Enter Referal Code"> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Type</label>
								<select class="form-control" name="type_of_customer" disabled>
									<option value=""> Choose Customer Type</option>
									<option value="all"> All</option>
									<option value="repairing_purpose" <?php if($value_emp->type_of_customer == 'repairing_purpose'){echo "selected"; } ?>>Repairing Purpose</option>
									<option value="sales_purchase_type" <?php if($value_emp->type_of_customer == 'sales_purchase_type'){echo "selected"; } ?>>Sales/Purchase types</option>

								</select>
								 </div>
						</div>
					
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Name</label>
								<input type="text" name="name" value="<?php echo $value_emp->name; ?>" class="form-control" placeholder="Customer Name" disabled> </div>
						</div>
						
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Mobile Number" disabled> </div>
						</div>
            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Whatsapp Number" id="whatsapp_number2" disabled> </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control" placeholder="expample@yourmail.com"> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Opening Dues</label>
								<input type="text" name="opening_dues" value="<?php echo $value_emp->opening_dues; ?>" class="form-control" oninput="validateNumberInput(this)" placeholder="Opening Dues" disabled> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Credit Threshold</label>
								<input type="date" name="credit_threshold" placeholder="Credit Threshold" value="<?php echo $value_emp->credit_threshold; ?>" class="form-control" disabled> </div>
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
						
						
           
           
            <!--  -->
           
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
    </div></div>
  </section>



<!-- add cate -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="modal fade" id="add_category">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_category_model">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

            <div class="modal-body">
            
             
             <form role="form" method="post" enctype="multipart/form-data" id="add_category_form">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Category Details:-</b></h4>
              <hr> </div>
          
          
             
					

              <div class="col-lg-12 col-sm-12 col-12">
							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="category_name" value="<?php echo $value_emp->category_name; ?>" class="form-control" > </div>
						</div>
						
			<div class="col-lg-12 col-sm-12 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									 <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
								</select>
							</div>
						</div>


            <!--  -->
         
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
    </div></div>
  </section>
  <!-- end cat -->
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

	$(document).ready(function() {
	$("#add_customer_by_leads").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "customer_managment_for_leads_action.php",
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			success: function(response) {
				if(response.trim() == "success") {
					
				
					setTimeout(function() {
							$.ajax({
						type: "POST",
						url: 'get_all_customer.php',
						success: function(data) {
						  alert("Successfully Added !");
						  $("#close_model").click();
							$("#getCustomerData").html(data);
							
						}
					});

					},500);


				

					 }else {

					alert("Try Again Latter !")
					
					setTimeout(function() {
						$("#add_customer_by_leads").trigger('reset');
						
					}, 3500);
				}
			}
		});
	});
});


	// add category

		$(document).ready(function() {
	$("#add_category_form").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "add_category_action_form.php",
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			success: function(response) {

				if(response.trim() == "success") {
					
				
					setTimeout(function() {
							$.ajax({
						type: "POST",
						url: 'get_all_category.php',
						success: function(data) {
						  alert("Successfully Added !");
						  $("#close_category_model").click();
							$("#getCategoryData").html(data);
							
						}
					});

					},500);


				

					 }else {

					alert("Try Again Latter !")
					
					setTimeout(function() {
						$("#add_customer_by_leads").trigger('reset');
						
					}, 3500);
				}
			}
		});
	});
});


		function getProblemField(value) {
			if(value=='yes'){
				
				$("#problem_dscription").removeClass("d-none");
			}else{
				$("#problem_dscription").addClass("d-none");
			}

		}
</script>
</body>
</html>