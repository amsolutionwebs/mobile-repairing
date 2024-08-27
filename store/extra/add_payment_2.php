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
              <div class="card-body">
               
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Invoice No.</th>
                  <th>Invoice Date</th>
                  <th>Net Amount.</th>
                  <th>Payment Receive</th>
                  <th>Balance Amount</th>
                 
                  <th>Cash Discount</th>
                 
                  
                  <th>Status</th>
                 
                </tr>
              </thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM invoice WHERE company_id='$company_login_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                   

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                   <td><?php echo $value->invoice_number; ?></td>
                     <td><?php echo $value->invoice_date; ?></td>
                  <td><?php echo $value->all_total_amount; ?></td>
                  <td> <?php 
$dat_payment = $db->query("SELECT sum(total_payment_amount) as total_paid FROM `payment` WHERE company_id='$company_login_id' AND invoice_id='$value->id'");
$total_payment = $dat_payment->fetch_object();
echo $total_payment->total_paid;

?></td>
                  <td><?php 
$dat_payment = $db->query("SELECT sum(total_payment_amount) as total_paid FROM `payment` WHERE company_id='$company_login_id' AND invoice_id='$value->id'");
$total_payment = $dat_payment->fetch_object();
echo $value->all_total_amount-$total_payment->total_paid;

?>
</td>
                  <td><?php echo $value->total_cashdiscount; ?></td>
                
                 
                  <td> 

<?php 
$dat_payment = $db->query("SELECT sum(total_payment_amount) as total_paid FROM `payment` WHERE company_id='$company_login_id' AND invoice_id='$value->id'");
$total_payment = $dat_payment->fetch_object();






                    if($value->all_total_amount=$total_payment->total_paid){ ?>
                      <img src="dist/img/tick.png" width="30" />
                  <?php  }else{ ?>

                     <a href='add_payment.php?sname=<?php echo $value->id;?>' title='Veryfie Payment'><button class='btn btn-xs btn-success p-1'><i class="fas fa-inr"></i> Pay</button></a>
                      
                   
                   <?php } ?>


                    </td>
                  
                </tr>
              <?php } ?>
                
              </tbody>

                  
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
          </div>
          <div class="col-md-1"></div>
      </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
<?php 
require_once("common/footer.php");
require_once("common/script.php");
?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>