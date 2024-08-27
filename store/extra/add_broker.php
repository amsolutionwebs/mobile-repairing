<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM broker WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$code_one = $master_value->code_one;
	$name_one = $master_value->name_one;
	$main_address = $master_value->main_address;
	$alternate_address = $master_value->alternate_address;
	$city = $master_value->city;
	$state = $master_value->state;
	$pincode = $master_value->pincode;
	$country = $master_value->country;
	$contact_person = $master_value->contact_person;
	$phone_off = $master_value->phone_off;
	$phone_res = $master_value->phone_res;
	$email = $master_value->email;
	$broker_type = $master_value->broker_type;
	$commission = $master_value->commission;
	$gst_number = $master_value->gst_number;
	$post_status = $master_value->status;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Broker/Salesman</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="broker_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
             
              	<form role="form" method="post" enctype="multipart/form-data" action="broker_action.php">
              	 <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Broker/Salesman Details:-</b></h4>
              <hr> </div>
            
          <div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Broker Code</label>
								<input type="text" name="code_one" value="<?php echo $code_one; ?>" <?php if($action!=='update'){ echo 'onchange="getBrokerAlready(this.value)"';} ?> class="form-control" required> </div>
						</div>

						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Broker/Salesman Name</label>
								<input type="text" name="name_one" value="<?php echo $name_one; ?>" class="form-control" required> </div>
						</div>

						
						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								<textarea rows="5" cols="5" class="form-control" placeholder="Enter main address here" autocomplete="off" name="main_address"><?php echo $main_address; ?></textarea> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>City</label>
								<input type="text" name="city" value="<?php echo $city; ?>" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>State</label>
								<input type="text" name="state" value="<?php echo $state; ?>" class="form-control" required> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Pincode</label>
								<input type="text" name="pincode" value="<?php echo $pincode; ?>" maxlength="6" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Country</label>
								<input type="text" name="country" value="<?php echo $country; ?>" class="form-control" required> </div>
						</div>

						


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Contact Person</label>
								<input type="text" name="contact_person" value="<?php echo $contact_person; ?>" maxlength="10" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone Office</label>
								<input type="text" name="phone_off" value="<?php echo $phone_off; ?>" maxlength="10" class="form-control" required> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone Residence</label>
								<input type="text" name="phone_res" value="<?php echo $phone_res; ?>" maxlength="10" class="form-control" required> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>E-Mail</label>
								<input type="text" name="email" value="<?php echo $email; ?>" class="form-control" required> </div>
						</div>
                        
                        <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Broker/Salesman</label>
								<select class="form-control select2" name="borker_type" required>
									 <option value="broker" <?php if($broker_type == 'broker'){echo "selected"; } ?>>Broker</option>
                                  <option value="salesman" <?php if($broker_type == 'salesman'){echo "selected"; } ?>>Salesman</option>
								</select> </div>
						</div>
						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Commission</label>
								<input type="text" name="commission" value="<?php echo $commission; ?>" class="form-control"> </div>
						</div>

						

						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>GST Number</label>
								<input type="text" name="gst_number" value="<?php echo $gst_number; ?>" class="form-control" required> </div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control select2" name="status" required>
									 <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
								</select> </div>
						</div>

            
            <div class="col-md-12">
            <input type="hidden" name="submit" value="<?php if($action=='update'){echo "update";}else{echo "publish";} ?>" />
			 <input type="hidden" name="post_id" value="<?php echo $id; ?>">
			<input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
             

              <input type="submit" id="submitButtonId" value="<?php if($action=='update'){echo "Update";}else{echo "Submit";} ?>" class="btn btn-primary float-right"> </div>
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


function getBrokerAlready(value) {
	var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_broker_already.php',
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


</script>
</body>
</html>