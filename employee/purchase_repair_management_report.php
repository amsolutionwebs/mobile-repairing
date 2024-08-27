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
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-wrench" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"> Repair Managment Report</h5> </div>

                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="report.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
             
              </div>
              <!--  -->
             
                <form role="form" method="GET" enctype="multipart/form-data" action="view_purchase_repair_managment_report.php">
                 <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Choose date for repair details:-</b></h4>
              <hr> </div>
            
          <div class="col-lg-5 col-sm-4 col-12">
              <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" required> </div>
            </div>

            <div class="col-lg-5 col-sm-4 col-12">
              <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" required> </div>
            </div>


            <div class="col-md-12">
            <input type="hidden" name="submit" value="publish" />
     
      <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
             

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