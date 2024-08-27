<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM submill WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$master_mill_code = $master_value->master_mill_code;
	$master_mill_name = $master_value->master_mill_name;
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$main_address = $master_value->main_address;
	$alternate_address = $master_value->alternate_address;
	$city = $master_value->city;
	$state = $master_value->state;
	$pincode = $master_value->pincode;
	$phone_off = $master_value->phone_off;
	$phone_res = $master_value->phone_res;
	$email = $master_value->email;
	$bank_name = $master_value->bank_name;
	$ifsc_code = $master_value->ifsc_code;
	$bank_account_number = $master_value->bank_account_number; 
	$opening_blance = $master_value->opening_blance;
	$commission = $master_value->commission;
	$credit_days = $master_value->credit_days;
	$rate_of_interest = $master_value->rate_of_interest;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Mill</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="sub_mill_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
             
              	<form role="form" method="post" enctype="multipart/form-data" action="sub_mill_action.php">
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Sub Mill Details:-</b></h4>
              <hr> </div>
            
           <div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
							    	<label>Select Master Mill Code</label>
							    	<select class="form-control" name="master_mill_code" onchange="getMasterMillData(this.value)">
								
								
								<option value="0">-- Select Master Mill Code --</option>
								
								<?php 
                
                   $data_mill = $db->query("SELECT * FROM `mill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_mill = $data_mill->fetch_object()) { ?>
                                <option value="<?php echo $value_mill->id; ?>" <?php if($master_mill_code == $value_mill->id) echo"selected"; ?> >
                                    <?php echo $value_mill->mill_code; ?>- <?php echo $value_mill->mill_name; ?>
                                </option>
                                <?php } ?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
							    	<label>Master Mill Name</label>
							   <input type="text" name="master_mill_name" value="<?php echo $master_mill_name; ?>" id="master_mill_name" class="form-control" readonly="readonly"> 
							</div>
						</div>
						
						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Mill Code</label>
								<input type="text" name="mill_code" value="<?php echo $mill_code; ?>" 
								<?php if($action!=='update'){ echo 'onchange="getSubMillAlready(this.value)"';} ?> class="form-control" required> </div>
						</div>

						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Mill Name</label>
								<input type="text" name="mill_name" value="<?php echo $mill_name; ?>" class="form-control" required> </div>
						</div>

						

						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Main Address</label>
								<textarea rows="5" cols="5" class="form-control" placeholder="Enter main address here" autocomplete="off" name="main_address" id="main_address"><?php echo $main_address; ?></textarea> </div>
						</div>


						<div class="col-lg-6 col-sm-6 col-12">
							<div class="form-group">
								<label>Alernate Address</label>
								<textarea rows="5" cols="5" class="form-control" placeholder="Enter alternate address here" autocomplete="off" name="alternate_address" id="alternate_address"><?php echo $alternate_address; ?></textarea> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>City</label>
								<input type="text" name="city" value="<?php echo $city; ?>" id="city" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>State</label>
								<input type="text" name="state" value="<?php echo $state; ?>" id="state" class="form-control" required> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Pincode</label>
								<input type="number" name="pincode" value="<?php echo $pincode; ?>" id="pincode" class="form-control" required> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone (off)</label>
								<input type="number" name="phone_off" value="<?php echo $phone_off; ?>" id="phone_off" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Phone (res)</label>
								<input type="number" name="phone_res" value="<?php echo $phone_res; ?>" id="phone_res" class="form-control" required> </div>
						</div>
						


						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" value="<?php echo $email; ?>" id="email" class="form-control" required> </div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Bank Name</label>
								<input type="text" name="bank_name" value="<?php echo $bank_name; ?>" id="bank_name" class="form-control" required> </div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>IFSC Code</label>
								<input type="text" name="ifsc_code" value="<?php echo $ifsc_code; ?>" id="ifsc_code" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Bank Account Number</label>
								<input type="number" name="bank_account_number" value="<?php echo $bank_account_number; ?>" id="bank_account_number" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Opening Blance</label>
								<input type="text" name="opening_blance" value="<?php echo $opening_blance; ?>" id="opening_blance" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Commission</label>
								<input type="text" name="commission" value="<?php echo $commission; ?>" id="commission" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label for="credit_days">Credit Days</label>
								<input type="text" name="credit_days" value="<?php echo $credit_days; ?>" id="credit_days" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Rate of interest</label>
								<input type="text" name="rate_of_interest" value="<?php echo $rate_of_interest; ?>" id="rate_of_interest" class="form-control" required> </div>
						</div>
    
                        <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>GST Number</label>
								<input type="text" name="gst_number"  value="<?php echo $gst_number; ?>" id="gst_number" class="form-control" required> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" id="status" required>
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

function getMasterMillData(value) {
    	$.ajax({
		type: "POST",
		url: 'get_master_mill_data.php',
		data: {
			value: value
		},
			beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
		success: function(response) {
		 $("#setloader").removeClass("pageloader");
		if(response.trim() != "no_data"){
		   var all_data = JSON.parse(response.trim());
		   $("#master_mill_name").val(all_data[0].mill_name);
		   $("#main_address").val(all_data[0].main_address);
		   $("#alternate_address").val(all_data[0].alternate_address);
		   $("#city").val(all_data[0].city);
		   $("#state").val(all_data[0].state);
		   $("#pincode").val(all_data[0].pincode);
		   $("#phone_off").val(all_data[0].phone_off);
		   $("#phone_res").val(all_data[0].phone_res);
		   $("#email").val(all_data[0].email);
		   $("#bank_name").val(all_data[0].bank_name);
		   $("#ifsc_code").val(all_data[0].ifsc_code);
		   $("#bank_account_number").val(all_data[0].bank_account_number);
		   $("#opening_blance").val(all_data[0].opening_blance);	   
		   $("#commission").val(all_data[0].commission);
		   $("#credit_days").val(all_data[0].credit_days);
		   $("#rate_of_interest").val(all_data[0].rate_of_interest);
		   $("#gst_number").val(all_data[0].gst_number);
    	}else{
    	    alert("No Data Found");
    	}
		}
	});
}


function getSubMillAlready(value) {
	var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_sub_mill_already.php',
		data: {
			value: value,
			company_login_id : company_login_id
		},
			beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
		success: function(data) {
		     $("#setloader").removeClass("pageloader");
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