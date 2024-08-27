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



           <?php
                   
                
                    $data_module1 = $db->query("SELECT * FROM user_module WHERE employee_id='$a_idchk' AND status='enable'");
                    while ($value_module1 = $data_module1->fetch_object()) {
                      $mid = $value_module1->module_id;
                      $db1 = $db->query("SELECT * FROM module WHERE id='$mid'");
                    $value_module = $db1->fetch_object();

                   if($value_module->id == '1'){ ?>

                   <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php 
$data_leads = $db->query("SELECT count(id) as total_leads FROM leads_managment WHERE store_id='$store_id'");
$total_leads = $data_leads->fetch_object();
echo $total_leads->total_leads;

?></h3>

                <p>TOTAL LEADS</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendance_list.png" width="40%"></i>
              </div>
              <a href="leads_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

                   <?php } ?>   


                   <?php if($value_module->id == '2'){ ?>

                    <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php 
$data_vendor = $db->query("SELECT count(id) as total_vednor FROM `vendor_managment` WHERE store_id='$store_id'");
$total_vendor = $data_vendor->fetch_object();
echo $total_vendor->total_vednor;

?></h3>

                <p>TOTAL VENDOR</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/attendence.png" width="40%"></i>
              </div>
              <a href="vendor_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->
                     <?php if($value_module->id == '3'){ ?>

                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
$data_product = $db->query("SELECT count(id) as total_product FROM `products`");
$total_product = $data_product->fetch_object();
echo $total_product->total_product;

?></h3>

                <p>TOTAL INVENTORY</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/enquiry_list.png" width="60%"></i>
              </div>
              <a href="inventory.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->
                     <?php if($value_module->id == '4'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
$data_cs = $db->query("SELECT count(id) as total_customer FROM `customer_managment` WHERE store_id='$store_id'");
$total_customer = $data_cs->fetch_object();
echo $total_customer->total_customer;

?></h3>

                <p>TOTAL CUSTOMER</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/customer-support.png" width="30%"></i>
              </div>
              <a href="customer_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->

                     <?php if($value_module->id == '5'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
$data_order = $db->query("SELECT count(id) as total_order FROM `order_managment` WHERE store_id='$store_id'");
$total_order = $data_order->fetch_object();
echo $total_order->total_order;

?></h3>

                <p>TOTAL ORDER</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/invoice-2.webp" width="40%"></i>
              </div>
              <a href="order_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->

                     <?php if($value_module->id == '6'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data_return = $db->query("SELECT count(id) as total_return FROM `return_managment` WHERE store_id='$store_id'");
$total_return = $data_return->fetch_object();
echo $total_return->total_return;

?></h3>

                <p>TOTAL RETURN</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/fee_details.png" width="40%"></i>
              </div>
              <a href="return_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>
                   <!-- third module -->

                    <?php if($value_module->id == '8'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data_task = $db->query("SELECT count(id) as total_task FROM `eng_task`  WHERE store_id='$store_id'");
$total_task = $data_task->fetch_object();
echo $total_task->total_task;

?></h3>

                <p>TOTAL TASK</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/insurance.png" width="30%"></i>
              </div>
              <a href="task_managment_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>


                    <?php if($value_module->id == '9'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?php 
$data_purchase_m = $db->query("SELECT count(id) as total_purchase_mng FROM `purchase_managment` WHERE store_id='$store_id'");
$total_purchase_mng = $data_purchase_m->fetch_object();
echo $total_purchase_mng->total_purchase_mng;

?></h3>

                <p>TOTAL PURCHASE</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/monitor.png" width="30%"></i>
              </div>
              <a href="purchase_managment_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>


                    <?php if($value_module->id == '10'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
$data_sales = $db->query("SELECT count(id) as total_sales FROM `sales_managment` WHERE store_id='$store_id'");
$total_sales = $data_sales->fetch_object();
echo $total_sales->total_sales;

?></h3>

                <p>TOTAL SALES</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/software.png" width="30%"></i>
              </div>
              <a href="sales_managment_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>


                    <?php if($value_module->id == '11'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>TRANSATION</h3>

                <p>HISTORY</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="earning_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>


                    <?php if($value_module->id == '12'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php 
$data_repair = $db->query("SELECT count(id) as total_repair FROM `repair_managment` WHERE store_id='$store_id'");
$total_repair = $data_repair->fetch_object();
echo $total_repair->total_repair;

?></h3>

                <p>TOTAL REPAIR</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/repair-service.png" width="30%"></i>
              </div>
              <a href="repair_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php } ?>


                    <?php if($value_module->id == '13'){ ?>
                      <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php 
$data_por_repair = $db->query("SELECT count(id) as total_por_repair FROM `por_repair_managment` WHERE store_id='$store_id'");
$total_por_repair = $data_por_repair->fetch_object();
echo $total_por_repair->total_por_repair;

?></h3>

                <p>TOTAL PURCHASE REPAIR</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/repair.png" width="30%"></i>
              </div>
              <a href="por_repair_management_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
                   <?php }}?>
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
