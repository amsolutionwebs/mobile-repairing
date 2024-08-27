<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM customer_managment WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
}


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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Customer</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="customer_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="customer_managment_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Customer Details:-</b></h4>
              <hr> </div>
          
            
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
								<select class="form-control select2" name="type_of_customer">
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
								<input type="text" name="name" value="<?php echo $value_emp->name; ?>" class="form-control" placeholder="Customer Name"> </div>
						</div>
						
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Mobile Number" onchange="copyInputValue(this.value)"> </div>
						</div>
            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)" placeholder="Whatsapp Number" id="whatsapp_number"> </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control" placeholder="expample@yourmail.com"> </div>
						</div>

							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Opening Dues</label>
								<input type="text" name="opening_dues" value="<?php echo $value_emp->opening_dues; ?>" class="form-control" oninput="validateNumberInput(this)" placeholder="Opening Dues"> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Credit Threshold</label>
								<input type="date" name="credit_threshold" placeholder="Credit Threshold" value="<?php echo $value_emp->credit_threshold; ?>" class="form-control"> </div>
						</div>

							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Country</label>
								<select class="form-control select2" name="country" onchange="getStates(this.value)" required>
									<option value="0">Select Country</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `countries`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if('105'===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?></option>
                      <?php } ?>
								</select>
								</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>State</label>
								<select class="form-control select2" name="state" id="state_name" required>
									<option value="0">Select State</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `states` WHERE country_id='105'");
                    while ($value12 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value12->id; ?>"  <?php if($value_emp->state===$value12->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value12->name; ?></option>
                      <?php } ?>
								</select>
								</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>City</label>
								<input type="text" name="city" value="<?php echo $value_emp->city; ?>"  class="form-control" placeholder="City" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Pincode</label>
								<input type="text" name="pincode" value="<?php echo $value_emp->pincode; ?>" minlength="6" maxlength="6" oninput="validateNumberInput(this)" class="form-control" placeholder="XXXXXX" required> </div>
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
					<div class="col-md-12">
						<div class="row">
							
								<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								
								<textarea class="form-control" name="address"><?php echo $value_emp->address; ?></textarea>


							</div>
						</div>
						
				
						
							<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Remark</label>
								
								<textarea class="form-control" name="remark"><?php echo $value_emp->remark; ?></textarea>


							</div>
						</div>

							
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