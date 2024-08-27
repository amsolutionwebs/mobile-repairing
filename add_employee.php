<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM employee WHERE id='$id'");
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Employee</h5> </div>

                  <div class="col-1 px-2 d-flex">
                  <a href="employee_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="employee_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Employee Details:-</b></h4>
              <hr> </div>
          
             <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Date Of Joining</label>
								<input type="date" name="date_of_joining" value="<?php echo $value_emp->date_of_joining; ?>" class="form-control input-sm"> </div>
						</div>

					


            <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="first_name" value="<?php echo $value_emp->first_name; ?>" class="form-control" placeholder="First Name"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="last_name" value="<?php echo $value_emp->last_name; ?>" class="form-control" placeholder="Last Name"> </div>
						</div>


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Date of birth</label>
								<input type="date" name="date_of_birth" value="<?php echo $value_emp->date_of_birth; ?>" class="form-control" > </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Adhar Number</label>
								<input type="text" name="adhar_number" value="<?php echo $value_emp->adhar_number; ?>" class="form-control" oninput="validateNumberInput(this)" minlength="12" maxlength="12" placeholder="****************"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Age</label>
								<input type="text" name="age" value="<?php echo $value_emp->age; ?>" class="form-control" oninput="validateNumberInput(this)" minlength="2" maxlength="2" placeholder="Age"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Email Id</label>
								<input type="email" name="email_id" value="<?php echo $value_emp->email_id; ?>" class="form-control" placeholder="employee@mail.com"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="text" name="mobile_number" value="<?php echo $value_emp->mobile_number; ?>" minlength="10" maxlength="10" class="form-control" oninput="validateNumberInput(this)" onchange="copyInputValueEmployee(this.value)" placeholder="70524XXXXX"> </div>
						</div>

					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Alternate Mobile Number</label>
								<input type="text" name="alternate_mobile_number" value="<?php echo $value_emp->alternate_mobile_number; ?>" minlength="10" maxlength="10" class="form-control" oninput="validateNumberInput(this)" placeholder="70524XXXXX"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Whatsapp Number</label>
								<input type="text" name="whatsapp_number" id="whatsapp_number" value="<?php echo $value_emp->whatsapp_number; ?>" minlength="10" maxlength="10" class="form-control" oninput="validateNumberInput(this)" placeholder="70524XXXXX"> </div>
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
								<input type="text" name="city" value="<?php echo $value_emp->city; ?>"  class="form-control" placeholder="City"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Pincode</label>
								<input type="text" name="pincode" value="<?php echo $value_emp->pincode; ?>" minlength="6" maxlength="6" oninput="validateNumberInput(this)" class="form-control" placeholder="Pincode"> </div>
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
						
						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Address</label>
								
								<textarea class="form-control" name="address"><?php echo $value_emp->address; ?></textarea>


							</div>
						</div>
           	
           	<div class="col-md-12">
           		<div class="row">
           			 <div class="col-md-6">
           			<?php 
            if(!empty($value_emp->profile_picture)){
              ?>
              <div class="form-group">
              <label for="photo">Photo:</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="profile_picture" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red; font-size:10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.</span> 
        <img id="output_category" src ="employee/upload/profile_images/<?php echo $value_emp->profile_picture; ?>" height="100"/>
        </div>
              
                          <?php } else { ?>  
                           <div class="form-group">
              <label for="photo">Photo :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="profile_picture" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red;font-size: 10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.</span> 
        <img id="output_category" src ="dist/img/No-Image-Basic.png" height="100"/>
        </div>
                            <?php } ?> 
           			</div>
           			 <div class="col-md-6">
           			 <?php 
            if(!empty($value_emp->adhar_card)){
              ?>
              <div class="form-group">
              <label for="photo">Adhar Card :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="adhar_card" accept="image/*" onchange="loadFile1(event)">
              <span class="help-block" style="color:red; font-size:10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.</span> 
        <img id="output_category1" src ="employee/upload/adhar_card/<?php echo $value_emp->adhar_card; ?>" height="100"/>
        </div>
              
                          <?php } else { ?>  
                           <div class="form-group">
              <label for="photo">Adhar Card  :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="adhar_card" accept="image/*" onchange="loadFile1(event)">
              <span class="help-block" style="color:red;font-size: 10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.</span> 
        <img id="output_category1" src ="dist/img/No-Image-Basic.png" height="100"/>
        </div>
                            <?php } ?> 
           			</div>
           		</div>
           	</div>
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
							  <input type="hidden" name="post_id" value="<?php echo $id; ?>">
							<input type="hidden" name="usertype" value="employee" />
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
    $(document).ready(function () {
      $('input[type=file]').change(function () {
        var val = $(this).val().toLowerCase();
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png|PNG)$");
        if (!(regex.test(val))) {
          $(this).val('');
          alert('Please select correct file format ( jpg|jpeg|png|PNG )');
        }
      });
    });
  </script>
  <script>
var loadFile = function(event) {
var output = document.getElementById('output_category');
output.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile1 = function(event) {
var output1 = document.getElementById('output_category1');
output1.src = URL.createObjectURL(event.target.files[0]);
};
</script>

<script>
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

function copyInputValueEmployee(value) {
    $.ajax({
		type: "POST",
		url: 'get_emloyee_already.php',
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