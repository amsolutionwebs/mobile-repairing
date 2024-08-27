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

                   if($value_module->id == '1'){ ?>

                   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `admin`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL LEADS</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendance_list.png" width="40%"></i>
              </div>
              <a href="admin_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

                   <?php } ?>   


                   

                     <?php if($value_module->id == '6'){ ?>
                      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `admin`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL REPAIR</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/fee_details.png" width="40%"></i>
              </div>
              <a href="admin_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->

                     <?php if($value_module->id == '7'){ ?>
                      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `admin`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL INVOICE</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/insurance.png" width="40%"></i>
              </div>
              <a href="admin_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } }?>
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
