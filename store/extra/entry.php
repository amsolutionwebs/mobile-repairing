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
            <h1 class="m-0">Entry</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Entry</li>
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM indent WHERE company_id='$company_login_id'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></h3>

                <p>Indent</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/invoice-2.webp" width="50%"></i>
              </div>
              <a href="indent_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `invoice` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></h3>

                <p>Invoice</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="invoice_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-light" style="background-color: #EA4033;">
              <div class="inner">
                <h3><?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `payment` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></h3>

                <p>Payment</p>
              </div>
              <div class="icon">
              <i><img src="dist/img/enquiry_list.png" width="50%"></i>
              </div>
              <a href="payment_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `debit_note` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></h3>

                <p>Debit Note</p>
              </div>
              <div class="icon">
                 <i><img src="dist/img/rupees.png" width="50%"></i>
              </div>
              <a href="debit_note_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #889EF1; F82D1D">
              <div class="inner">
                <h3><?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `credit_note` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></h3>

                <p>Credit Note</p>
              </div>
              <div class="icon">
                   <i><img src="dist/img/invoice.webp" width="50%"></i>
              </div>
              <a href="credit_note_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `payment` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></h3>

                <p>Invoice Payment</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/insurance.png" width="30%"></i>
              </div>
              <a href="view_invoice_payment_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

            
          
          <!-- ./col -->
        </div>
        
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
