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
                  <h5 class="d-flex justify-content-center align-items-center text-center"> Broker/Salesman Details For Turnover</h5> </div>

                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="report.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
             
              </div>
              <!--  -->
             
                <form role="form" method="post" enctype="multipart/form-data" action="turnover_report_by_broker.php">
                 <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Choose  Broker/Salesman Details For Turnover :-</b></h4>
              <hr> </div>
            
        

            <div class="col-lg-6 col-sm-4 col-12">
              <div class="form-group">
                <label>Select Financial year</label>
                <select class="form-control select2" name="selected_year">
                  <option value="2023-2024">2023-2024</option>
                  <option value="2024-2025">2024-2025</option>
                  <option value="2025-2026">2025-2026</option>
                  <option value="2026-2027">2026-2027</option>
                  <option value="2027-2028">2027-2028</option>
                  <option value="2028-2029">2028-2029</option>
                  <option value="2029-2030">2029-2030</option>
                  <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                  <option value="2032-2033">2032-2033</option>
                  
                </select> </div>
            </div>


              <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                  <label>Broker/Salesman</label>
                  <select class="form-control select2" name="broker_code">
                    <option>Choose Broker/Salesman Code</option>
                    <?php 
                
                   $data_bb = $db->query("SELECT * FROM `broker` WHERE company_id='$company_login_id'");
                    while ($value_br = $data_bb->fetch_object()) { ?>
                      <option value="<?php echo $value_br->id; ?>" <?php if($value_br->id==$broker_code){echo "selected";}?>>
                        <?php echo $value_br->code_one; ?>-<?php echo $value_br->name_one; ?>
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