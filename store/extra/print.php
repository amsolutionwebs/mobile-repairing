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
            <h1 class="m-0">Print</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              <li class="breadcrumb-item active">Print</li>
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
                <h3>Intimation Print</h3>

                <p>of Invoice</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/print-2.webp" width="30%"></i>
              </div>
              <a href="print_initmation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Payment Advoice </h3>

                <p>With Details</p>
              </div>
              <div class="icon">
                <i><img src="dist/img/print.webp" width="30%"></i>
              </div>
              <a href="print_payment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Indent Print </h3>

                <p>With Details </p>
              </div>
              <div class="icon">
                <i><img src="dist/img/print-2.webp" width="30%"></i>
              </div>
              <a href="print_indent.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
   
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
