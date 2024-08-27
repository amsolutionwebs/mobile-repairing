<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM states WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> State</h5> </div>
              
              <div class="col-1 px-2 d-flex">
                  <a href="state_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="state_action.php" class="needs-validation" novalidate>
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>State Details:-</b></h4>
              <hr> </div>
          
            
           	
                        <div class="col-lg-6 col-sm-12 col-6">
							<div class="form-group">
								<label>Country</label>
								<select class="form-control select2" name="country">
									<option value="0">Select Country</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `countries`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($value_emp->country_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?></option>
                      <?php } ?>
								</select>
								</div>
						</div>
						
						<div class="col-lg-6 col-sm-12 col-6">
							<div class="form-group">
								<label>State</label>
								<input type="text" name="name" value="<?php echo $value_emp->name; ?>"  class="form-control" placeholder="State" required> </div>
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

function getStates(value) {
              $.ajax({
            type: "POST",
            url: 'get_states.php',
            data: {
              value: value   
            },
            success: function(data) {
              $("#state_name").html(data);
            }
          });
    }
  
</script>
</body>
</html>