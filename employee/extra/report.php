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
            <h1 class="m-0">Report</h1>

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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Invoice</h3>

                <p>Commission</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="view_invoice_report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Payment </h3>

                <p>Commission</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="view_payment_commission.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Invoice </h3>

                <p>Register By Mill</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/insurance.png" width="30%"></i>
              </div>
              <a href="invoice_register_by_mill.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Invoice </h3>

                <p>Register By Dealer</p>
              </div>
              <div class="icon">
                 <i><img src="dist/img/rupees.png" width="50%"></i>
              </div>
              <a href="invoice_register_by_dealer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #889EF1; F82D1D">
              <div class="inner">
                <h3>Indent</h3>

                <p> Register By Mill</p>
              </div>
              <div class="icon">
                   <i><img src="dist/img/staff_attendance.png" width="30%"></i>
              </div>
              <a href="indent_register_by_mill.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box text-light" style="background-color: #EA4033;">
              <div class="inner">
                <h3>Indent</h3>

                <p>Register By Dealer</p>
              </div>
              <div class="icon">
              <i><img src="dist/img/enquiry_list.png" width="50%"></i>
              </div>
              <a href="indent_register_by_dealer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Outstanding</h3>

                <p> By Mill</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="outstanding_by_mill.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Outstanding</h3>

                <p> By Dealer</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="40%"></i>
              </div>
              <a href="outstanding_by_dealer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Turnover</h3>

                <p> By Mill</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/rupees.png" width="30%"></i>
              </div>
              <a href="turnover_by_mill.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Turnover </h3>

                <p>By Dealer</p>
              </div>
              <div class="icon">
                 <i><img src="dist/img/rupees.png" width="50%"></i>
              </div>
              <a href="turnover_by_dealer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Turnover </h3>

                <p>By Salesman/Broker</p>
              </div>
              <div class="icon">
                 <i><img src="dist/img/rupees.png" width="50%"></i>
              </div>
              <a href="turnover_by_broker.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #889EF1; F82D1D">
              <div class="inner">
                <h3>Ledger</h3>

                <p>.</p>
              </div>
              <div class="icon">
                   <i><img src="dist/img/staff_attendance.png" width="30%"></i>
              </div>
              <a href="ledger.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
          <!-- ./col -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- second -->
  
          
       
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
