<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$default_mill_id = $_POST['default_mill_code'];



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
                      <a href="#" title="Add Statics Invoice"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>




                   

                  </div>
                  <div class="col-10">
                  
                    <h5> Total Outstanding of <?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                    echo $value_master->mill_name;

                    ?>

                    <?php 
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                     echo $value_subm->mill_name;

                      ?> From <?php echo date("d-m-Y", strtotime($start_date)); ?> To <?php echo date("d-m-Y", strtotime($end_date)); ?></h5>
                    <span>  <?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `invoice` WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></span>
                  </div>


                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="outstanding_by_mill.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Invoice No.</th>
                  <th>Invoice Date</th>
                  
                  <th>Dealer Name</th>
                  <th>Amount</th> 
                  <th>Balance Amount</th>
                  
                  
                </tr>
              </thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM `invoice` WHERE `company_id`='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;

                    

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->invoice_number; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($value->invoice_date)); ?></td>
                  
                   <td><?php 
                   $dealer_data = $db->query("SELECT dealer_code FROM `dealer` WHERE `id`='$value->dealer_code' ");
      $value_dealer = $dealer_data->fetch_object();
      echo $value_dealer->dealer_code."-".$value->dealer_name;
       ?></td>
                  <td><?php echo number_format($value->all_total_amount,2); ?></td>
                 
                  
                <td><?php echo number_format($value->payment_amount,2); ?></td>
              
                </tr>



                







              <?php } ?>





                
              </tbody>

          <thead>

            <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT DISTINCT dealer_code FROM `invoice` WHERE `company_id`='$company_login_id' AND `status`='unpaid' AND `default_mill_code`='$default_mill_id' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value7 = $data->fetch_object()) { 
                  
                    $sl++;

                    

                      ?>

             <tr>
                
                <th  colspan="3" style="text-align:right;">Dealer Total Value</th>
                

                 
                   <th><?php 
      $dealer_name = $db->query("SELECT dealer_code,dealer_name FROM `dealer` WHERE `id`='$value7->dealer_code' ");
      $value_dealer_name = $dealer_name->fetch_object();
      echo $value_dealer_name->dealer_code."-".$value_dealer_name->dealer_name;


                    ?></th>
                  <th>
                    <?php 
$data4 = $db->query("SELECT sum(all_total_amount) as dealer_total FROM invoice WHERE `company_id`='$company_login_id' AND `dealer_code`='$value7->dealer_code' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_d_amt = $data4->fetch_object();
echo number_format($total_d_amt->dealer_total,2);

?>
</th>
<th><?php 
$data4due = $db->query("SELECT sum(payment_amount) as dealer_total_payment_due FROM invoice WHERE `company_id`='$company_login_id' AND `dealer_code`='$value7->dealer_code' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_d_amt_due = $data4due->fetch_object();
echo number_format($total_d_amt_due->dealer_total_payment_due,2);

?></th>
                  

              </tr>
             <?php } ?>


              <tr>
                
                <th  colspan="4" style="text-align:right;">Grand Total Value</th>
                <th >
                

                 <?php 
$data_ex_invoice = $db->query("SELECT sum(all_total_amount) as total_ex_invoice FROM `invoice` WHERE `company_id`='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_exe_invoice = $data_ex_invoice->fetch_object();
echo number_format($total_exe_invoice->total_ex_invoice,2);

?></th>
  <th><?php 
$data_ex_due = $db->query("SELECT sum(payment_amount) as total_ex_due FROM `invoice` WHERE `company_id`='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `status`='unpaid' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_exe_due = $data_ex_due->fetch_object();
echo number_format($total_exe_due->total_ex_due,2);

?></th>



 
               

                     

                 
              </tr>
          </thead>


                  
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
          </div>
         
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