<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");



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
                  <h5 class="d-flex justify-content-center align-items-center text-center"> Mill Details</h5> </div>

                   <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="report.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
             
              </div>
              <!--  -->
             
                <form role="form" method="post" enctype="multipart/form-data" action="payment_commission_report.php">
                 <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Choose Mill Details:-</b></h4>
              <hr> </div>
            
          <div class="col-lg-4 col-sm-4 col-12">
              <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" required> </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-12">
              <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" required> </div>
            </div>


              <div class="col-lg-4 col-sm-6 col-12">
                <div class="form-group">
                  <label>Mill Code</label>
                  <select class="form-control select2 default_mill_code" name="default_mill_code">
                    <option>-- Choose Mill Code -- </option>
                    <?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id'");
                    while ($value_master = $data_master->fetch_object()) { ?>
                      <option value="<?php echo $value_master->id; ?>" <?php if($value_master->id==$mill_code){echo "selected";}?>>
                        <?php echo $value_master->mill_code; ?>-<?php echo $value_master->mill_name; ?>
                      </option>
                      <?php } 
                
                   $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id'");
                    while ($value_subm = $datasubm->fetch_object()) { ?>
                      <option value="<?php echo $value_subm->id; ?>" <?php if($value_subm->id==$sub_mill_code){echo "selected";}?>>
                        <?php echo $value_subm->mill_code; ?>-<?php echo $value_subm->mill_name; ?>
                      </option>
                      <?php } ?>

                  </select>
                </div>
              </div>

            
            

            
            <div class="col-md-12">
            <input type="hidden" name="submit" value="publish" />
     
      <input type="hidden" name="company_id" value="<?php echo $company_login_id; ?>" id="company_id">
             

              <input type="submit" id="submitButtonId" value="Submit" class="btn btn-primary float-right"> </div>
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