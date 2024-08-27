<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM dealer WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$broker_code = $master_value->broker_code;
	$broker_name = $master_value->broker_name;
	$dealer_code = $master_value->dealer_code;
	$dealer_name = $master_value->dealer_name;
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
	$commission = $master_value->commission;
	$gst_number = $master_value->gst_number;
	$dealer_class = $master_value->dealer_class;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Dealer</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="dealer_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
             
              	<form role="form" method="post" enctype="multipart/form-data" action="dealer_action.php">
              			<div class="row px-2 py-3">

            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Dealer Details:-</b></h4>
              <hr> </div>
            
          <div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Dealer Code</label>
								<input type="text" name="dealer_code" value="<?php echo $dealer_code; ?>" <?php if($action!=='update'){ echo 'onchange="getDealerAlready(this.value)"';} ?> class="form-control" required> </div>
						</div>

						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Dealer Name</label>
								<input type="text" name="dealer_name" value="<?php echo $dealer_name; ?>" class="form-control" required> </div>
						</div>

					


						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								<textarea rows="5" cols="5" class="form-control" placeholder="Enter main address here" autocomplete="off" name="main_address"><?php echo $main_address; ?></textarea> </div>
						</div>


						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Alernate Address</label>
								<textarea rows="5" cols="5" class="form-control" placeholder="Enter alternate address here" autocomplete="off" name="alternate_address"><?php echo $alternate_address; ?></textarea> </div>
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
								<input type="text" name="pincode" value="<?php echo $pincode; ?>" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Country</label>
								<input type="text" name="country" value="<?php echo $country; ?>" class="form-control" required> </div>
						</div>

						


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Contact Person</label>
								<input type="text" name="contact_person" value="<?php echo $contact_person; ?>" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone Office</label>
								<input type="text" name="phone_off" value="<?php echo $phone_off; ?>" class="form-control" required> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone Residence</label>
								<input type="text" name="phone_res" value="<?php echo $phone_res; ?>" class="form-control" required> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>E-Mail</label>
								<input type="text" name="email" value="<?php echo $email; ?>" class="form-control"> </div>
						</div>
                        
                        	<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
							    	<label>Select Broker Code</label>
							    	<select class="form-control" name="broker_code" onchange="getBrokerName(this.value)">
								
								
								<option value="0">-- Select Broker Code --</option>
								
								<?php 
                
                   $data_broker = $db->query("SELECT * FROM `broker` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_broker = $data_broker->fetch_object()) { ?>
                                <option value="<?php echo $value_broker->id; ?>" <?php if($broker_code==$value_broker->id) echo"selected"; ?> >
                                    <?php echo $value_broker->code_one; ?>
                                </option>
                                <?php } ?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12 <?php if($action=='update'){echo "d";}else{echo "d-none";} ?> " id="broker_name_filed">
							<div class="form-group">
							    	<label>Broker Name</label>
							   <input type="text" name="broker_name" value="<?php echo $broker_name; ?>" id="broker_name_input" class="form-control" class="form-control" readonly="readonly"> 
							</div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Commission</label>
								<input type="text" name="commission" value="<?php echo $commission; ?>" id="commision_id" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>GST Number.</label>
								<input type="text" name="gst_number" value="<?php echo $gst_number; ?>" class="form-control"> </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Dealer Class</label>
								<select class="form-control" name="dealer_class" required>
									 <option value="wholeseller" <?php if($dealer_class=='wholeseller'){echo "selected"; } ?>>Wholeseller</option>
                                  <option value="garmentor" <?php if($dealer_class=='garmentor'){echo "selected"; } ?>>Garmentor</option>
								</select> </div>
						</div>

					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									 <option value="enable" <?php if($post_status=='enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status=='disable'){echo "selected"; } ?>>Disable</option>
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


function getDealerAlready(value) {
var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_dealer_already.php',
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