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
                      <a href="add_invoice.php" title="Add Statics Invoice"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>

                   

                  </div>
                  <div class="col-10">
                  
                    <h5> Total Payment Commission of <?php 
                
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
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `invoice` WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></span>
                  </div>

                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="view_payment_commission.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Pay. Ref No.</th>
                  <th>Pay. Date</th>
                 
                  
                  <th>Dealer Name</th>
                  <th>Pay. Amount</th>
                  <th>Rate %</th>
                  <th>Commission </th>
                  
                </tr>
              </thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM payment WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `payment_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;

                    

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->payment_ref; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($value->payment_date)); ?></td>
                   <td><?php echo $value->dealer_name; ?></td>
                   <td><?php echo number_format($value->total_payment_one,2); ?></td>
                  <td><?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                   $cammision1 =  $value_master->commission;

                     
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                    $commission2 = $value_subm->commission;


                    if (empty($cammision1)) {
                      echo $commission2;
                    }else{
                      echo $cammision1;
                    }


                      ?></td>
                  
                  <td><?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                   $comission_value1 =  $value_master->commission;

                     
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                    $comission_value2 = $value_subm->commission;



                    if(empty($comission_value1)){
  echo number_format(($comission_value2/100)*$value->total_payment_one,2);
}else{
  echo number_format(($comission_value1/100)*$value->total_payment_one,2);
}


                      ?></td>
                  
                
              
                </tr>


              <?php } ?>
                
              </tbody>

          <thead>
              <tr>
                
                <th rowspan="4" colspan="4" style="text-align:right;">Total Value</th>
                <th >
                 <?php 
$data_pp = $db->query("SELECT sum(total_payment_one) as total_value_payment FROM payment WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `payment_date` BETWEEN '$start_date' AND '$end_date'");
$total_value_pp = $data_pp->fetch_object();
echo number_format($total_value_pp->total_value_payment,2);

?></th>
               
                <th><?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                   $cammision1 =  $value_master->commission;

                     
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                    $commission2 = $value_subm->commission;


                    if (empty($cammision1)) {
                      echo $commission2;
                    }else{
                      echo $cammision1;
                    }


                      ?></th>


                 <th> <?php 

                 $data_pp = $db->query("SELECT sum(total_payment_one) as total_value_payment FROM payment WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `payment_date` BETWEEN '$start_date' AND '$end_date'");
$total_value_pp = $data_pp->fetch_object();
$payamt = $total_value_pp->total_value_payment;


                  $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                   $cammision1 =  $value_master->commission;

                     
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                    $commission2 = $value_subm->commission;


                    if (empty($cammision1)) {
                      echo number_format(($commission2/100)*$payamt,2);
                    }else{
                      echo number_format(($cammision1/100)*$payamt,2);
                    }




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