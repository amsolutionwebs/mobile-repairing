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
            <h1 class="m-0 font-weight-bold text-dark">Dashboard</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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

             <?php if($usertype=='suparadmin'){ ?>
          <!--  -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `admin`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL ADMIN</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="admin_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         <?php }elseif ($usertype=='admin') { ?>
       
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `store`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL STORE</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/insurance.png" width="30%"></i>
              </div>
              <a href="store_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `user_type`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL USER TYPE</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="35%"></i>
              </div>
              <a href="user_type_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
$data_mill = $db->query("SELECT count(id) as total_mill FROM `employee`");
$total_mills = $data_mill->fetch_object();
echo $total_mills->total_mill;

?></h3>

                <p>TOTAL EMPLOYEE</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/enquiry_list.png" width="60%"></i>
              </div>
              <a href="employee_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
