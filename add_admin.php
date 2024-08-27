<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM admin WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Admin</h5> </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="admin_action.php" class="needs-validation" autocomplete="off" novalidate>
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Admin Details:-</b></h4>
              <hr> </div>
          
            

            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="first_name" value="<?php echo $value_emp->first_name; ?>" class="form-control" placeholder="First Name" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="last_name" value="<?php echo $value_emp->last_name; ?>" class="form-control" placeholder="Last Name"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control" placeholder="adminmail@mail.com" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" minlength="10" maxlength="10" class="form-control" placeholder="70524XXXXX" oninput="validateNumberInput(this)" onchange="copyInputValue(this.value)" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" minlength="10" maxlength="10" class="form-control" id="whatsapp_number" placeholder="70524XXXXX" oninput="validateNumberInput(this)"> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Admin Password</label>
								<input type="text" name="password" value="<?php echo $value_emp->password; ?>" class="form-control" placeholder="***********" required> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Admin Age</label>
								<input type="text" name="age" value="<?php echo $value_emp->age; ?>" minlength="2" maxlength="2" class="form-control" placeholder="Admin Age" oninput="validateNumberInput(this)" required> </div>
						</div>


				
					

						

						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" name="status" required>
									 <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
								</select>
							</div>
						</div>
					 
					 	<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Country</label>
								<select class="form-control select2" name="country_id" required onChange="getState(this.value)">
								<option value="0">Select Country</option>	 
									<?php 
                
                   $data_country = $db->query("SELECT * FROM `countries`");
                    while ($value_country = $data_country->fetch_object()) { ?>
						<option value="<?php echo $value_country->id; ?>" <?php if($value_country->id==$value_emp->country_id){echo "selected";}?>>
												<?php echo $value_country->sortname; ?>-<?php echo $value_country->name; ?>
											</option>
											<?php } ?>	 
									 
									 
									 
								</select>
							</div>
						</div>
						
						
							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>State</label>
								<select class="form-control select2" name="state_id" id="state_field" required onChange="getCity(this.value)">
								    <option value="0">Select State</option>
								    <?php 
                
                   $data_state = $db->query("SELECT * FROM `states`");
                    while ($value_state = $data_state->fetch_object()) { ?>
						<option value="<?php echo $value_state->id; ?>" <?php if($value_state->id==$value_emp->state_id){echo "selected";}?>>
												<?php echo $value_state->name; ?>
											</option>
											<?php } ?>
											
											
									 
								</select>
							</div>
						</div>
						
						
							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>City</label>
								
								<input type="text" class="form-control" name="city" value="<?php echo $value_emp->city; ?>" placeholde="Enter Your City"/>
								
							</div>
						</div>
						
							<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Pincode</label>
							<input type="text" class="form-control" minlength="6" maxlength="6" name="pincode" placeholder="XXXXXX" oninput="validateNumberInput(this)" value="<?php echo $value_emp->pincode; ?>" required />
							</div>
						</div>
						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Complete Address</label>
								
								<textarea class="form-control" name="address" required><?php echo $value_emp->address; ?></textarea>


							</div>
						</div>
           
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
							  <input type="hidden" name="post_id" value="<?php echo $id; ?>">
			
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
<script>

function copyInputValue(value) {
    $.ajax({
		type: "POST",
		url: 'get_admin_already.php',
		data: {
			value: value
		},
		success: function(data) {
			if(data.trim()=="yes"){
				window.location = location.href;
			}else{
			   var result = confirm("Are you sure you want to use as a whatsapp Number ?");
              // Check the result
              if (result) {
              document.getElementById('whatsapp_number').value = value;
              } 
			}
		}
	});
	
}
    
</script>
</body>
</html>