<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold text-dark">Report</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">



           <?php
                   
                
                    $data_module1 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND status='enable'");
                    while ($value_module1 = $data_module1->fetch_object()) {
                      $mid = $value_module1->module_id;
                      $db1 = $db->query("SELECT * FROM module WHERE id='$mid'");
                    $value_module = $db1->fetch_object();
?>
                   <!-- third module -->




                     <?php if($value_module->id == '10'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#BE33FF;">
              <div class="inner">
                <h3 class="text-light">Sales</h3>

                <p class="text-light"> Managment Report</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/software.png" width="27%"></i>
              </div>
              <a href="sales_management_report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->



                     <?php if($value_module->id == '12'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#7DFF33;">
              <div class="inner">
                <h3 class="text-light">Repair </h3>

                <p class="text-light">Management Report</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/repair-service.png" width="25%"></i>
              </div>
              <a href="repair_management_report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->



                     <?php if($value_module->id == '13'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box " style="background-color:#FFC300;">
              <div class="inner">
                <h3>Purchase</h3>

                <p> Repair Management Report</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/repair.png" width="25%"></i>
              </div>
              <a href="purchase_repair_management_report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->



                     
                   <!-- third module -->

                   <?php } ?>
                   <!-- third module -->



          
          <!-- ./col -->
         
       

         
          <!-- ./col -->
      
        <!-- second -->        
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  </div>


  <!-- /.content-wrapper -->
<?php 
require_once("common/footer.php");
require_once("common/script.php");
?>
</body>
</html>
<?php ob_end_flush(); ?>
