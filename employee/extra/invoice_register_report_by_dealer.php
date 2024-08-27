<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$dealer_code = $_GET['dealer_code'];

 $query_find_dealer = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' ");
$value_find_dealer = $query_find_dealer->fetch_object();

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
                  
                    <h5> Invoice Register By Dealer :- <?php echo $value_find_dealer->dealer_name; ?></h5>
                    <span>  From <?php echo $start_date; ?> To <?php echo $end_date; ?> </span>
                  </div>


                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="invoice_register_by_dealer.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>

               <div class="table-responsive text-nowrap">
        <!--Table-->
        <table id="example" class="table table-bordered">

          <!--Table head-->
          <thead>
            <tr>
              <th>S.N</th>
              <th>Mill Name</th>
              <th>Invoice No</th>
              <th>Date</th>
              <th>Indent No.</th>
              
              <th>Sort No.</th>
              <th>Grade</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Ex. Mill Amount</th>
              <th>Net Amount</th>
              
            </tr>
          </thead>

        

          <!--Table head-->

          <!--Table body-->
          <tbody>
             <?php
                    $sl = 0;
                    $company_login_id = $_SESSION['company_id'];
                    $data = $db->query("SELECT * FROM `invoice` WHERE company_id='$company_login_id' AND `dealer_code`='$dealer_code' AND `invoice_date` BETWEEN '$start_date' AND '$end_date' ORDER BY id");
                    while ($value_invoice = $data->fetch_object()) {
                  
                    $sl++;
                    
                    $data_sort = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$value_invoice->id' ");
                  $value_invoice_sort = $data_sort->fetch_object();
                    
                    $data_sort_indent = $db->query("SELECT * FROM `indent` WHERE id='$value_invoice_sort->indent_id' ");
                    $value_invoice_sort_indent = $data_sort_indent->fetch_object();
                    
                    $query_find_mill = $db->query("SELECT * FROM `mill` WHERE id='$value_invoice->default_mill_code' ");
                    $value_find_mill = $query_find_mill->fetch_object();
                    
                    $query_find_sub_mill = $db->query("SELECT * FROM `submill` WHERE id='$value_invoice->default_mill_code' ");
                    $value_find_sub_mill = $query_find_sub_mill->fetch_object();
                    
                    
                      ?>


                    

            <tr>
              <th><?php echo $sl; ?>.</th>
               <td><?php echo $value_find_mill->mill_name; ?> <?php echo $value_find_sub_mill->mill_name; ?></td>
              <td><?php echo $value_invoice->invoice_number; ?></td>
              <td><?php echo date("d-m-Y", strtotime($value_invoice->invoice_date)); ?></td>
              <td><?php echo $value_invoice_sort_indent->indent_no; ?> </td>
             
 
  <td><table>
     <?php
     $data_sort2 = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$value_invoice->id' ");
                 while ($value_invoice_sort2 = $data_sort2->fetch_object()){ 
                 
                 $query_indent_plus = $db->query("SELECT * FROM `indent_plus` WHERE id='$value_invoice_sort2->sort_id'");
                 $value_indent_plus = $query_indent_plus->fetch_object();
                 
                 $final_sort_name = $db->query("SELECT * FROM `sort` WHERE id='$value_indent_plus->sort_id' ");
                 $final_sort = $final_sort_name->fetch_object();
                 
                 
                 ?>
      <tr><td><?php echo $final_sort->sort_no; ?></td></tr>
      
      <?php } ?>
  </table> </td>
              <td><table>
     <?php
     $data_sort3 = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$value_invoice->id' ");
                 while ($value_invoice_sort3 = $data_sort3->fetch_object()){ 
                 
                
                 
                 $query_indent_plus2 = $db->query("SELECT grade_id FROM `indent_plus` WHERE indent_id='$value_invoice_sort3->indent_id'");
                 $value_indent_plus2 = $query_indent_plus2->fetch_object();
                 
               
                 $final_sort_name2 = $db->query("SELECT * FROM `grade` WHERE id='$value_indent_plus2->grade_id' ");
                 $final_sort2 = $final_sort_name2->fetch_object();
                 
                 
                 ?>
      <tr><td><?php echo $final_sort2->grade; ?></td></tr>
      
      <?php } ?>
  </table></td>
              <td>
                  <table>
     <?php
     $data_sort4 = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$value_invoice->id' ");
                 while ($value_invoice_sort4 = $data_sort4->fetch_object()){ 
                 
    
                 
                 ?>
      <tr><td><?php echo $value_invoice_sort4->quantity; ?></td></tr>
      
      <?php } ?>
  </table>
  
  </td>
              <td> <table style="border:none;">
     <?php
     $data_sort5 = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$value_invoice->id' ");
                 while ($value_invoice_sort5 = $data_sort5->fetch_object()){ 
                 
    
                 
                 ?>
      <tr style="border:none;"><td style="border:none;"><?php echo number_format($value_invoice_sort5->rate,2); ?></td></tr>
      
      <?php } ?>
  </table>
  
  </td>

     <td><?php echo number_format($value_invoice->total_first,2); ?></td>

     <td><?php echo number_format($value_invoice->all_total_amount,2);?></td>

    


            </tr>
          
          <?php } ?>  
            
           
          
         
          


          </tbody>
          <!--Table body-->
          <thead>
            <tr>
              
              <th colspan="7">Total Amount</th>
              <th>
                  
                  <?php
                
  $final_qty_rate = 0;
  $event_select = $db->query("SELECT id FROM `invoice` WHERE company_id='$company_login_id' AND `dealer_code`='$dealer_code' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
  if (is_array($event_select) || is_object($event_select)){
  foreach($event_select as $event_fetch)
  {
      $inc_id = $event_fetch['id'];
      $event_select2 = $db->query("SELECT * FROM `invoice_sort_date` WHERE invoice_id='$inc_id' ");
        if (is_array($event_select2) || is_object($event_select2)){
            foreach($event_select2 as $event_fetch2){
                $quantity = $event_fetch2['quantity'];
                $final_qty_rate += $quantity;
            }
        }
  }}
                  
 echo $final_qty_rate;

                  
                  
                  ?>
                  
                  
                  
                  </th>
              <th></th>
           
          
              <th>
                 <?php
                 $data_ex_amount = $db->query("SELECT sum(total_first) as total_ex_amounte FROM `invoice` WHERE company_id='$company_login_id' AND `dealer_code`='$dealer_code' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_ex_amount = $data_ex_amount->fetch_object();
echo number_format($total_ex_amount->total_ex_amounte,2);

?>
              </th>
              <th><?php 
              $query_total_final10 = $db->query("SELECT sum(all_total_amount) as final_value FROM `invoice` WHERE company_id='$company_login_id' AND `dealer_code`='$dealer_code' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$value_final10_total = $query_total_final10->fetch_object();
echo number_format($value_final10_total->final_value,2);

?></th>
             
              
            </tr>
          </thead>

        </table>
        <!--Table-->
      </div>
</section>

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