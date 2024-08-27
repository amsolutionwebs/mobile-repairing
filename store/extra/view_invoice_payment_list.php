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
                <div class="row">
                  <div class="col-1 d-flex">
                 

                    <div class="d-flex justify-content-center align-items-center" style="background-color: yellowgreen;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="add_payment.php" title="Add Payment"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>

                     <!-- <div class="d-flex justify-content-center align-items-center" style="background-color: yellowgreen;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="add_payment_2.php" title="Add Payment"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div> -->

                   

                  </div>
                  <div class="col-10">
                  
                    <h5> All Invoice Payment</h5>
                    <span>  <?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `payment` WHERE company_id='$company_login_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></span>
                  </div>


                   <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="entry.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
							 <tr>
                 
                   <th><input type="checkbox"></th>
                  <th>Invoice No.</th>
                  <th>Invoice Date</th>
                  <th>Net Amount.</th>
                  <th>D.N</th>
                  <th>C.R</th>
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
                  
                   <td><input type="checkbox"></td>
                  
                   <td><?php echo $value->invoice_number; ?></td>
                     <td><?php echo date("d-m-Y", strtotime($value->invoice_date)); ?></td>
                  <td><?php echo number_format($value->all_total_amount,2); ?></td>
                  <td>

                  	<?php 
$data_debite_view = $db->query("SELECT sum(total_debit_note_amount) as total_debit FROM `payment_debit_details` WHERE invoice_number='$id'");
$total_debit_view = $data_debite_view->fetch_object();
echo number_format($total_debit_view->total_debit,2);

?>







                  </td>


                       <td>

                  	<?php 
$data_credit_view = $db->query("SELECT sum(total_credit_note_amount) as total_credit FROM `payment_credit_details` WHERE invoice_number='$id'");
$total_credit_view = $data_credit_view->fetch_object();
echo number_format($total_credit_view->total_credit,2);

?>







                  </td>
                  

 <td>
 	<?php 
$data_invoice = $db->query("SELECT sum(payment_amount) as total_fees FROM `payment_invoice_details` WHERE invoice_number='$id'");
$total_inc = $data_invoice->fetch_object();
echo number_format($total_inc->total_fees,2);

?></td>
<td><?php $total_amount_total_view = $value->all_total_amount - $total_inc->total_fees - $total_debit_view->total_debit + $total_credit_view->total_credit;
echo number_format($total_amount_total_view,2); ?></td>

                  <td><?php echo number_format($value->total_cashdiscount,2); ?></td>
                
                 
                  <td> 


                  	<?php if ($value->all_total_amount+$total_credit_view->total_credit==$total_debit_view->total_debit+$total_inc->total_fees) { ?>
                  		 <a href='add_payment.php?sname=<?php echo $value->id;?>' title='Veryfie Payment'><button class='btn btn-xs btn-success p-1'>Paid</button></a>
                  	<?php }else { ?>
                  		 <a href='add_payment.php?sname=<?php echo $value->id;?>' title='Veryfie Payment'><button class='btn btn-xs btn-danger p-1'> Unpaid</button></a>
                  	
                   
                   <?php }} ?>


                    </td>
                  
                </tr>
           
                
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