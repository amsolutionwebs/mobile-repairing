<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM repair_managment WHERE id='$id'");
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


$data_ebg = $db->query("SELECT * FROM employee_user_type WHERE user_type_id='7'");
							while($value_eng = $data_ebg->fetch_object()){
								$data_emp = $db->query("SELECT * FROM employee WHERE id='$value_eng->employee_id'");

								$value_employee = $data_emp->fetch_object();
									echo $value_employee->employee_id;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Repair</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="repair_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="repair_management_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Repair Details:-</b></h4>
              <hr> </div>
          
          
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Name <b style="color:red;"><sup>*</sup></b></label>
								<input type="text" name="customer_name" value="<?php echo $value_emp->customer_name; ?>" class="form-control input-sm"> </div>
						</div>
						
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)"> </div>
						</div>
            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" class="form-control" minlength="10" maxlength="10" oninput="validateNumberInput(this)"> </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id (optional)</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control"> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>IMEI</label>
								<input type="text" name="imei" value="<?php echo $value_emp->imei; ?>" class="form-control" oninput="validateNumberInput(this)"> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" value="<?php echo $value_emp->password; ?>" class="form-control"> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Remark</label>
								<input type="text" name="customer_remark" value="<?php echo $value_emp->customer_remark; ?>" class="form-control"> </div>
						</div>

					


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Problem Diagnosed<b style="color:red;"><sup>*</sup></b></label>
								<input type="text" name="problem_diagnosis" value="<?php echo $value_emp->problem_diagnosis; ?>" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Estimated Repairing Time</label>
								<input type="datetime-local" name="est_repair_time" value="<?php echo $value_emp->est_repair_time; ?>" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Risk(if any)</label>
								<input type="text" name="risk" value="<?php echo $value_emp->risk; ?>" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Cost<b style="color:red;"><sup>*</sup></b></label>
								<input type="text" name="cost" value="<?php echo $value_emp->cost; ?>" class="form-control" oninput="validateNumberInput(this)"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Payment Mode</label>
								<select class="form-control select2" name="repair_mode">
									<option value="0">Choose Payment Mode</option>
									<option value="Cash" <?php if ($value_emp->repair_mode=='Cash') { echo "selected";} ?>>Cash</option>
									<option value="Online" <?php if ($value_emp->repair_mode=='Online') { echo "selected";} ?>>Online</option>
									<option value="Credit" <?php if ($value_emp->repair_mode=='Credit') { echo "selected";} ?>>Credit</option>
								
								</select>
							</div>
						</div>
					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Engg Code <b style="color:red;"><sup>*</sup></b></label>
								<input type="hidden" name="engineer_code" value="<?php echo $value_emp->id; ?>">

								<input type="text" value="<?php echo $value_emp->engineer_code; ?>" class="form-control" readonly> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Salesman Code<b style="color:red;"><sup>*</sup></b></label>
								<input type="text"  value="<?php echo $employee_id; ?>" class="form-control" readonly>

								<input type="hidden" name="salesman" value="<?php echo $a_idchk; ?>"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Warranty(in Days)</label>
								<select class="form-control select2" name="warranty_in_days">
									<option value="0">Select Warranty Days</option>
									<option value="30_days" <?php if ($value_emp->warranty_in_days=='30_days') { echo "selected";} ?>>30 Days</option>
									<option value="60_days" <?php if ($value_emp->warranty_in_days=='60_days') { echo "selected";} ?>>60 Days</option>
									<option value="90_days" <?php if ($value_emp->warranty_in_days=='90_days') { echo "selected";} ?>>90 Days</option>
									<option value="120_days" <?php if ($value_emp->warranty_in_days=='120_days') { echo "selected";} ?>>120 Days</option>
									
									<option value="360_days" <?php if ($value_emp->warranty_in_days=='360_days') { echo "selected";} ?>>360 Days</option>


								</select>
								 </div>
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
							  
				<input type="hidden" name="user_id" value="5">
			
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