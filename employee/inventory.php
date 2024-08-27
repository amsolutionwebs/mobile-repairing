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
            <h1 class="m-0">Inventory Details</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
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
            
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM category WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="category_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
                      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM sub_category WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Sub Categories</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="sub_category_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM brand WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Brand</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="brand_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM model_number WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Model Number</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="model_no_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM variation WHERE store_id='$store_id' AND status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Variation</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="variation_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM sub_variation WHERE store_id='$store_id' AND status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Variation Type</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendance_list.png" width="40%"></i>
              </div>
              <a href="sub_variation_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->
          
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:rgb(161, 98, 7);">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM sub_variation_type WHERE store_id='$store_id' AND status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Sub Variation Type</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendance_list.png" width="40%"></i>
              </div>
              <a href="sub_variation_type_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM products WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/staff_attendance.png" width="30%"></i>
              </div>
              <a href="product_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
$datav4 = $db->query("SELECT count(id) as total_feesv FROM product_variation");
$total_vsubscriber = $datav4->fetch_object();
echo $total_vsubscriber->total_feesv;

?></h3>

                <p>Products Variation</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/staff_salary.png" width="55%"></i>
              </div>
              <a href="product_variation_view_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
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