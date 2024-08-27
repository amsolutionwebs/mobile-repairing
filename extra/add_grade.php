<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_cmp = $db->query("SELECT * FROM grade WHERE id='$id'");
	$master_value  = $data_cmp->fetch_object();
	$grade = $master_value->grade;
	$description = $master_value->description;

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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action=='update'){echo "Update";}else{echo "Add";} ?> Grade</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="grade_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
             
              	<form role="form" method="post" enctype="multipart/form-data" action="grade_action.php">		<div class="row px-2 py-3">

            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Grade Details:-</b></h4>
              <hr> </div>
            
         
							<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Grade</label>
								<input type="text" name="grade" value="<?php echo $grade; ?>" <?php if($action!=='update'){ echo 'onchange="getGradeAlready2(this.value)"';} ?> class="form-control" required> </div>
						</div>

						<div class="col-lg-12 col-sm-6 col-12">
							<div class="form-group">
								<label>Description</label>
								<textarea rows="3" cols="3" class="form-control" placeholder="Enter main address here" autocomplete="off" name="description"><?php echo $description; ?></textarea> </div>
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
    function getGradeAlready2(value) {
  var company_login_id = $("#company_id").val();
  $.ajax({
    type: "POST",
    url: 'get_grade_already.php',
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