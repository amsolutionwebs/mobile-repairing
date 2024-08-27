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
            <h1 class="m-0 font-weight-bold text-dark">Employee Details</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Employee Details</li>
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

             <?php if ($usertype=='admin') { ?>
        
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>User Type</h3>

                <p>Details</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/idcard.png" width="85%"></i>
              </div>
              <a href="user_list_by_user_type.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Employee</h3>

                <p>Commission</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/fee_details.png" width="30%"></i>
              </div>
              <a href="employee_commission_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Employee</h3>

                <p>Module</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="35%"></i>
              </div>
              <a href="user_module_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Employee</h3>

                <p>Store Details</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/monitor.png" width="30%"></i>
              </div>
              <a href="employee_store_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <?php } ?>
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