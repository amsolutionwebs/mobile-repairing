<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM leads_managment WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
	$customer_id = $value_emp->customer_id;
	$device_type = $value_emp->device_type;
	$leads_type = $value_emp->leads_type;
}




$data = $db->query("SELECT leads_no FROM leads_managment WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->leads_no;
if(empty($recipt_name))
{
  $freciept_name = "ENQ-"."01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = "ENQ-".'0'.$exe_value;
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
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users test" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Leads</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="leads_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="leads_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Leads Details:-</b></h4>
              <hr> </div>
          

          <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Name <b style="color:red;"><sup>*</sup></b></label>
								<button class="btn btn-success btn-sm" style="float:right;" type="button" data-toggle="modal" data-target="#add_customer_modal"><i class="fa fa-plus"></i></button>
								<select class="form-control select2" name="customer_id" id="getCustomerData" required>
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
								<label>Leads Number</label>
								<input type="text" name="leads_no" value="<?php if($action == 'update'){echo $value_emp->leads_no;}else{echo $freciept_name;} ?>" class="form-control" placeholder="Enq-123" readonly> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Leads Date</label>
								<input type="datetime-local" name="leads_date" value="<?php echo $value_emp->leads_date; ?>" class="form-control" > </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Leads Type</label>
								<select class="form-control select2" name="leads_type" required>
									<option value="0">Select Leads Type</option>
									<option value="Repair" <?php if($leads_type==='Repair'){echo 'selected';} ?>>Repair</option>
									<option value="Purchase" <?php if($leads_type==='Purchase'){echo 'selected';} ?>>Purchase</option>
									<option value="Sell" <?php if($leads_type==='Sell'){echo 'selected';} ?>>Sell</option>
									<option value="Other" <?php if($leads_type==='Other'){echo 'selected';} ?>>Other</option>
								</select>
								 </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Device Type</label>
									<select class="form-control select2" name="device_type">
									<option value="0">Select Device Type</option>
									<option value="Mobile" <?php if($device_type==='Mobile'){echo 'selected';} ?>>Mobile</option>
									<option value="Laptop" <?php if($device_type==='Laptop'){echo 'selected';} ?>>Laptop</option>
									<option value="Other" <?php if($device_type==='Other'){echo 'selected';} ?>>Other</option>
								</select>
								 </div>
						</div>
					
				<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>IMEI Number</label>
								<input type="text" name="imei_number" value="<?php echo $value_emp->imei_number; ?>" class="form-control" placeholder="013226002448955"> </div>
						</div>
						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Password</label>
								<input type="text" name="product_password" value="<?php echo $value_emp->product_password; ?>" class="form-control" placeholder="****************"> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" name="status">
									<option>Select Status</option>
									
                                
                                   <option value="Proccess" <?php if($post_status == 'Proccess'){echo "selected"; } ?>>Proccess</option>
                                   <option value="Converted" <?php if($post_status == 'Converted'){echo "selected"; } ?>>Converted</option>

                                    <option value="not_converted" <?php if($post_status == 'not_converted'){echo "selected"; } ?>>Not Converted</option>
								</select>
							</div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Followup Date</label>
								<input type="date" name="followup_date" value="<?php echo $value_emp->followup_date; ?>" class="form-control"> </div>
						</div>
                    
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
								<label>Customer Remark</label>
								<input type="text" name="remark1" value="<?php echo $value_emp->remark1; ?>"  class="form-control" placeholder="Customer Remark"> </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
								<label>Remark 2</label>
								<input type="text" name="remark2" value="<?php echo $value_emp->remark2; ?>"  class="form-control" placeholder="Remark 2"> </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								
								<textarea class="form-control" name="address"><?php echo $value_emp->address; ?></textarea>


							</div>
						</div>
           
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
							  
				<input type="hidden" name="employee_id" value="<?php echo $user_id; ?>">
			
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
								<select class="form-control" name="type_of_customer" required>
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
								<input type="text" name="name" value="<?php echo $value_emp->name; ?>" class="form-control" placeholder="Customer Name" required> </div>
						</div>
						
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Mobile Number" required> </div>
						</div>
            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Whatsapp Number" id="whatsapp_number2" required> </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control" placeholder="expample@yourmail.com"> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Opening Dues</label>
								<input type="text" name="opening_dues" value="<?php echo $value_emp->opening_dues; ?>" class="form-control" oninput="validateNumberInput(this)" placeholder="Opening Dues" required> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Credit Threshold</label>
								<input type="date" name="credit_threshold" placeholder="Credit Threshold" value="<?php echo $value_emp->credit_threshold; ?>" class="form-control" required> </div>
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
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
							  
				<input type="hidden" name="employee_id" value="<?php echo $user_id; ?>">
			
              <input type="submit" value="<?php if($action=='update'){echo "Update";}else{echo "Submit";} ?>" class="btn btn-primary float-right"> </div>
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
</script>
</body>
</html>