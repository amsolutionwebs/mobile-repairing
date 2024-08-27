<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM sort WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$master_mill_code = $master_value->master_mill_code;
	$master_mill_name = $master_value->master_mill_name;
	$mill_code = $master_value->mill_code;
	$mill_name = $master_value->mill_name;
	$sort_no = $master_value->sort_no;
	$sort_description = $master_value->sort_description;
	$products_type = $master_value->products_type;
	$width_per_inch = $master_value->width_per_inch;
	$remark = $master_value->remark; 
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Sort</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="sort_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
             
              	<form role="form" method="post" enctype="multipart/form-data" action="sort_action.php">		<div class="row px-2 py-3">

            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Sort Details:-</b></h4>
              <hr> </div>
            
         
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Master Mill Code</label>
									<select class="form-control mill_code" name="mill_code" onchange="getMasterMillName(this.value)">
										<option>Choose Mill Code</option>
										<?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
											<option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$master_mill_code){echo "selected";}?>>
												<?php echo $value_master->mill_code; ?>-<?php echo $value_master->mill_name; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="form-group">
									<label>Master Mill Name</label>
									<input type="text" name="mill_name" value="<?php echo $master_mill_name; ?>" id="mill_name" class="form-control mill_name" readonly="readonly"> </div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($mill_code)){echo "d-none";}?>" id="submillfield">
								<div class="form-group">
									<label>Mill Code</label>
									<select class="form-control submillselect sub_mill_code" name="sub_mill_code" onchange="getSubMillName(this.value)">
										<option>Choose</option>
										<?php 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
											<option value="<?php echo $value_subm->id; ?>" <?php  if($value_subm->id==$mill_code){echo "selected";} ?>>
												<?php echo $value_subm->mill_code; ?>-<?php echo $value_subm->mill_name; ?>
											</option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12 <?php if(empty($mill_code)){echo "d-none";}?>" id="submillfieldname">
								<div class="form-group">
									<label>Mill Name</label>
									<input type="text" name="sub_mill_name" value="<?php echo $mill_name; ?>" id="sub_mill_name" class="form-control sub_mill_name2" class="form-control" readonly="readonly"> </div>
							</div>
							
						
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Sort No</label>
								<input type="text" name="sort_no" value="<?php echo $sort_no; ?>" <?php if($action!=='update'){ echo 'onchange="getSortAlready(this.value)"';} ?>  class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Sort Description</label>
								<input type="text" name="sort_description" value="<?php echo $sort_description; ?>" class="form-control" required> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Products Type</label>
								<input type="text" name="products_type" value="<?php echo $products_type; ?>" class="form-control" required> </div>
						</div>


					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Width Per Inch</label>
								<input type="text" name="width_per_inch" value="<?php echo $width_per_inch; ?>" class="form-control"> </div>
						</div>

					


						

					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									 <option value="enable" <?php if($post_status=='enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status=='disable'){echo "selected"; } ?>>Disable</option>
								</select> </div>
						</div>

						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Remark</label>
								<textarea name="remark" class="form-control"><?php echo $remark; ?></textarea> </div>
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



function getSortAlready(value) {
	var company_login_id = $("#company_id").val();
	$.ajax({
		type: "POST",
		url: 'get_sort_already.php',
		data: {
			value: value,
			company_login_id: company_login_id
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