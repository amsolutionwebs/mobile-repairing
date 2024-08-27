<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$default_mill_id = $_GET['default_mill_code'];
$dealer_code = $_GET['dealer_code'];



$company_login_id = $_SESSION['company_id'];
$data_dea = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' AND company_id='$company_login_id'");
$value_dealer2 = $data_dea->fetch_object();




$query_mill = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_mill = $query_mill->fetch_object();


$query_sub_mill = $db->query("SELECT * FROM `submill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_sub_mill = $query_sub_mill->fetch_object();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           
          <div class="card mt-1 px-1" style="border-top:3px solid tomato;">
              <!-- /.card-header -->
              <div class="card-body">
               
               
  <section style="background-color: #eee;">
  <div class="container py-1">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            
            <div class="row">
            <div class="col-md-6"> <h5 class="my-1 font-weight-bold">MILL: <?php echo $value_mill->mill_name; ?> <?php echo $value_sub_mill->mill_name; ?></h5>
            <h6><?php echo $value_mill->main_address; ?><?php echo $value_sub_mill->main_address; ?> <br/>                        
<?php echo $value_mill->city; ?><?php echo $value_sub_mill->city; ?> <br/>
<?php echo $value_mill->state; ?><?php echo $value_sub_mill->state; ?> - <?php echo $value_mill->pincode; ?><?php echo $value_sub_mill->pincode; ?><br/><?php echo $value_mill->email; ?><?php echo $value_sub_mill->email; ?>
<br/>
<?php echo $value_mill->phone_off; ?><?php echo $value_sub_mill->phone_off; ?>
<br/>
GST. No.: <?php echo $value_mill->gst_number; ?> <?php echo $value_sub_mill->gst_number; ?>
</h6></div>
              



              <div class="col-md-5"><h5 class="my-1 font-weight-bold" style="text-transform:uppercase !important;">DEALER: <?php echo $value_dealer2->dealer_name; ?></h5>
            <h6>                       
<?php echo $value_dealer2->main_address; ?> <br/>
<?php echo $value_dealer2->city; ?>,<?php echo $value_dealer2->city; ?> - <?php echo $value_dealer2->pincode; ?>,<br/>
<?php echo $value_dealer2->email; ?>
<br/>
<?php echo $value_dealer2->phone_off; ?>
<br/>
GST. No.: <?php echo $value_dealer2->gst_number; ?>
</h6></div>

 <div class="col-1 col-md-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="ledger.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
           
            </div>

              
            
            
            
          </div>
           
        </div>
        
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            
           

            <div class="col-md-12 text-center "><h6 class="font-weight-bold">FROM <?php echo date("d-m-Y", strtotime($start_date)); ?> TO <?php echo date("d-m-Y", strtotime($end_date)); ?></h6></div>
            
            
            
            
          </div>
           
        </div>
        
      </div>
     
    </div>

    <div class="row">
     
      
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
         
        
          <table class="table">
           <thead>
                <tr>
                 
                  <th>DOC<br/> NO.</th>
                  <th>DOC<br/> DATE</th>
                  <th>TYPE</th>
                  
                  
                  <th>DEBIT<br/>AMOUNT</th> 
                  <th>CREDIT<br/>AMOUNT</th> 
                   <th>BALANCE</br> AMOUNT</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                

               
              <?php

              

                    $sl = 0;
                   
                 
                    $query_ledger = $db->query("SELECT * FROM `ledger` WHERE `company_id`='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `dealer_code`='$dealer_code' AND `doc_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value_ledger = $query_ledger->fetch_object()) {
                    
                     
                    $sl++;

                      ?> 
            
          
          
            <tr>
              <td><?php echo $value_ledger->doc_number; ?></td>
               <td><?php echo date("d-m-Y", strtotime($value_ledger->doc_date)); ?></td>
                <td><?php echo $value_ledger->type; ?></td>
                
                    <td><?php echo number_format($value_ledger->debit_amount,2); ?></td>
              
                <td><?php echo number_format($value_ledger->credit_amount,2); ?></td>
                <td><?php echo number_format($value_ledger->blance_amount,2); ?>  <i><?php echo $value_ledger->db_cr; ?><i></td>
            </tr>

          <?php } ?>
    
            
          
            
         

              </tbody>
          </table>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>     
               </div>
               
                
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
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>