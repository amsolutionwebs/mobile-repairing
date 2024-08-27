<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM store WHERE id='$id'");
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Store</h5> </div>
              
              <div class="col-1 px-2 d-flex">
                  <a href="store_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="store_action.php" class="needs-validation" novalidate>
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Store Details:-</b></h4>
              <hr> </div>
          
            
              <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Financial Year</label>
								<select class="form-control select2" name="financial_year" required>
									<option value="">Select Financial Year</option>
								
									<option value="2024-2025" <?php if($value_emp->financial_year=='2024-2025'){echo "selected"; } ?>>2024-2025</option>
									<option value="2025-2026" <?php if($value_emp->financial_year=='2025-2026'){echo "selected"; } ?>>2025-2026</option>
									<option value="2026-2027" <?php if($value_emp->financial_year=='2026-2027'){echo "selected"; } ?>>2026-2027</option>
									<option value="2027-2028" <?php if($value_emp->financial_year=='2027-2028'){echo "selected"; } ?>>2027-2028</option>
									<option value="2028-2029" <?php if($value_emp->financial_year=='2028-2029'){echo "selected"; } ?>>2028-2029</option>
									<option value="2029-2030" <?php if($value_emp->financial_year=='2029-2030'){echo "selected"; } ?>>2029-2030</option>
									<option value="2030-2031" <?php if($value_emp->financial_year=='2030-2031'){echo "selected"; } ?>>2030-2031</option>
								</select>
								</div>
			  </div>

            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Store Name</label>
								<input type="text" name="store_name" value="<?php echo $value_emp->store_name; ?>" class="form-control" placeholder="Store Name" required> </div>
						</div>

					<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Country</label>
								<select class="form-control select2" name="country" onchange="getState(this.value)">
									<option value="0">Select Country</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `countries`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($value_emp->country===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?></option>
                      <?php } ?>
								</select>
								</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>State</label>
								<select class="form-control select2" name="state" id="state_field">
									<option value="0">Select State</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `states`");
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
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" minlength="10" maxlength="10" oninput="validateNumberInput(this)" class="form-control" placeholder="+9170524XXXXX" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>"  class="form-control" placeholder="store@mail.com"> </div>
						</div>

						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								
								<textarea class="form-control" name="address"><?php echo $value_emp->address; ?></textarea>


							</div>
						</div>

						


						
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>GST</label>
								<input type="text" name="gst" value="<?php echo $value_emp->gst; ?>" minlength="15" maxlength="15" class="form-control" placeholder="GSTIN"> </div>
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
<script type="text/javascript">

  function getState(value){
    
			$.ajax({
				type: "POST",
				url: 'get_states.php',
				data: {
					value: value
				},
				beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
				success: function(response) {
				    $("#setloader").removeClass("pageloader");
				    $("#state_field").html(response);
			
				}
			});
}
  
</script>
</body>
</html>