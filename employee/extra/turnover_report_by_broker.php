<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$selected_year = $_POST['selected_year'];
$broker_code = $_POST['broker_code'];
$company_login_id = $_SESSION['company_id'];
$data_dea = $db->query("SELECT * FROM `broker` WHERE id='$broker_code' AND company_id='$company_login_id'");
$value_broker2 = $data_dea->fetch_object();



$dat = explode("-" ,$selected_year);
$start_year = $dat[0];
$end_year = $dat[1];

$april_start = $start_year."-04-01";
$may_start = $start_year."-05-01";
$june_start = $start_year."-06-01";
$july_start = $start_year."-07-01";
$august_start = $start_year."-08-01";
$september_start = $start_year."-09-01";
$october_start = $start_year."-10-01";
$november_start = $start_year."-11-01";
$december_start = $start_year."-12-01";
$january_start = $end_year."-01-01";
$february_start = $end_year."-02-01";
$march_start = $end_year."-03-01";


$april_end = $start_year."-04-30";
$may_end = $start_year."-05-31";
$june_end = $start_year."-06-30";
$july_end = $start_year."-07-31";
$august_end = $start_year."-08-31";
$september_end = $start_year."-09-30";
$october_end = $start_year."-10-31";
$november_end = $start_year."-11-30";
$december_end = $start_year."-12-30";
$january_end = $end_year."-01-31";
$february_end = $end_year."-02-28";
$march_end = $end_year."-03-31";



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
                  
                    <h5> Total Turnover of <?php echo $value_broker2->name_one." from ".$selected_year; ?></h5>
                    <span>  <?php 
$data_invoice = $db->query("SELECT sum(all_total_amount) as total_fees FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$april_start' AND '$march_end'");
$total_inc = $data_invoice->fetch_object();
echo number_format($total_inc->total_fees,2);




?></span>
                  </div>


                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="turnover_by_broker.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>

               <div class="table-responsive text-nowrap">
        <!--Table-->
        <table id="example" class="table table-bordered">

          <!--Table head-->
          <thead>
            <tr>
              <th style="width:70px">S.N</th>
           
              <th>Dealer Name</th>
              <th>April</th>
              <th>May</th>
              <th>June</th>
              <th>July</th>
              <th>August</th>
              <th>September</th>
              <th>October</th>
              <th>November</th>
              <th>December</th>
              <th>January</th>
              <th>February</th>
              <th>March</th>
               <th>Mill Total Value</th>
              
            </tr>
          </thead>

        

          <!--Table head-->

          <!--Table body-->
          <tbody>
             <?php
                    $sl = 0;
                    $company_login_id = $_SESSION['company_id'];

                    $data = $db->query("SELECT DISTINCT dealer_code FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$april_start' AND '$march_end'"); 
                    while ($value_mill = $data->fetch_object()) {

                     

                     
                         $data_dealer_broker = $db->query("SELECT * FROM `dealer` WHERE id='$value_mill->dealer_code'");

                        $value_dealer_broker = $data_dealer_broker->fetch_object();



                      $sl++;



                      ?>
                  
                   


                    

            <tr>
              <th><?php echo $sl; ?>.</th>
             

               <td><?php echo $value_dealer_broker->dealer_name; ?></td>

              <td><?php 
$data_april = $db->query("SELECT sum(all_total_amount) as total_april_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$april_start' AND '$april_end'");
$total_april = $data_april->fetch_object();
echo number_format($total_april->total_april_month,2);

?></td>
              <td><?php 
$data_may = $db->query("SELECT sum(all_total_amount) as total_may_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$may_start' AND '$may_end'");
$total_may1 = $data_may->fetch_object();
echo number_format($total_may1->total_may_month,2);

?> </td>
              <td><?php 
$data_june = $db->query("SELECT sum(all_total_amount) as total_june_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$june_start' AND '$june_end'");
$total_june1 = $data_june->fetch_object();
echo number_format($total_june1->total_june_month,2);

?></td>
 
  <td><?php 
$data_july = $db->query("SELECT sum(all_total_amount) as total_july_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$july_start' AND '$july_end'");
$total_july1 = $data_july->fetch_object();
echo number_format($total_july1->total_july_month,2);

?></td>
              <td><?php 
$data_august = $db->query("SELECT sum(all_total_amount) as total_august_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$august_start' AND '$august_end'");
$total_data_august = $data_august->fetch_object();
echo number_format($total_data_august->total_august_month,2);

?></td>
              <td><?php 
$data_september = $db->query("SELECT sum(all_total_amount) as total_september_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$september_start' AND '$september_end'");
$total_september1 = $data_september->fetch_object();
echo number_format($total_september1->total_september_month,2);

?></td>
              <td><?php 
$data_october = $db->query("SELECT sum(all_total_amount) as total_october_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$october_start' AND '$october_end'");
$total_october1 = $data_october->fetch_object();
echo number_format($total_october1->total_october_month,2);

?></td>
              <td><?php 
$data_november = $db->query("SELECT sum(all_total_amount) as total_november_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$november_start' AND '$november_end'");
$total_november1 = $data_november->fetch_object();
echo number_format($total_november1->total_november_month,2);

?></td>
              <td><?php 
$data_december = $db->query("SELECT sum(all_total_amount) as total_december_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$december_start' AND '$december_end'");
$total_december1 = $data_december->fetch_object();
echo number_format($total_december1->total_december_month,2);

?></td>
              <td><?php 
$data_january = $db->query("SELECT sum(all_total_amount) as total_january_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$january_start' AND '$january_end'");
$total_january1 = $data_january->fetch_object();
echo number_format($total_january1->total_january_month,2);

?></td>
              <td><?php 
$data_february = $db->query("SELECT sum(all_total_amount) as total_february_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$february_start' AND '$february_end'");
$total_february1 = $data_february->fetch_object();
echo number_format($total_february1->total_february_month,2);

?></td>
              <td><?php 
$data_march = $db->query("SELECT sum(all_total_amount) as total_march_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$march_start' AND '$march_end'");
$total_march1 = $data_march->fetch_object();
echo number_format($total_march1->total_march_month,2);

?></td>
               <td><?php 
$data_april = $db->query("SELECT sum(all_total_amount) as total_april_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `dealer_code`='$value_mill->dealer_code' AND `invoice_date` BETWEEN '$april_start' AND '$march_end'");
$total_april = $data_april->fetch_object();
echo number_format($total_april->total_april_month,2);

?></td>


            </tr>
          
          <?php } 

                ?>
          


          </tbody>
          <!--Table body-->
          <thead>
            <tr>
              
              <th colspan="2">Total Amount</th>
              <th><?php 
$data_april_subtotal = $db->query("SELECT sum(all_total_amount) as total_april_subtotal FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$april_start' AND '$april_end'");
$total_april_subtotal2 = $data_april_subtotal->fetch_object();
echo number_format($total_april_subtotal2->total_april_subtotal,2);

?></th>
              <th><?php 
$data_may_subtotal = $db->query("SELECT sum(all_total_amount) as total_may_subtotal FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$may_start' AND '$may_end'");
$total_may_subtotal = $data_may_subtotal->fetch_object();
echo number_format($total_may_subtotal->total_may_subtotal,2);

?></th>
              <th><?php 
$data_june_sub = $db->query("SELECT sum(all_total_amount) as total_june_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$june_start' AND '$june_end'");
$total_june1_sub = $data_june_sub->fetch_object();
echo number_format($total_june1_sub->total_june_sub,2);

?></th>
              <th><?php 
$data_july_sub = $db->query("SELECT sum(all_total_amount) as total_july_sub_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$july_start' AND '$july_end'");
$total_july1_sub = $data_july_sub->fetch_object();
echo number_format($total_july1_sub->total_july_sub_month,2);

?></th>
              <th><?php 
$data_august_sub = $db->query("SELECT sum(all_total_amount) as total_august_sub_month FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$august_start' AND '$august_end'");
$total_sub_august = $data_august_sub->fetch_object();
echo number_format($total_sub_august->total_august_sub_month,2);

?></th>
              
              <th><?php 
$data_september_sub = $db->query("SELECT sum(all_total_amount) as total_september_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$september_start' AND '$september_end'");
$total_september1_sub = $data_september_sub->fetch_object();
echo number_format($total_september1_sub->total_september_sub,2);

?></th>
              <th><?php 
$data_october_sub = $db->query("SELECT sum(all_total_amount) as total_october_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$october_start' AND '$october_end'");
$total_october1_sub = $data_october_sub->fetch_object();
echo number_format($total_october1_sub->total_october_sub,2);

?></th>
              <th><?php 
$data_november_sub = $db->query("SELECT sum(all_total_amount) as total_november_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$november_start' AND '$november_end'");
$total_november1_sub = $data_november_sub->fetch_object();
echo number_format($total_november1_sub->total_november_sub,2);

?></th>
              <th><?php 
$data_december_sub = $db->query("SELECT sum(all_total_amount) as total_december_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$december_start' AND '$december_end'");
$total_december1_sub = $data_december_sub->fetch_object();
echo number_format($total_december1_sub->total_december_sub,2);

?></th>
              <th><?php 
$data_january_sub = $db->query("SELECT sum(all_total_amount) as total_january_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$january_start' AND '$january_end'");
$total_january1_sub = $data_january_sub->fetch_object();
echo number_format($total_january1_sub->total_january_sub,2);

?></th>
              <th><?php 
$data_february_sub = $db->query("SELECT sum(all_total_amount) as total_february_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$february_start' AND '$february_end'");
$total_february1_sub = $data_february_sub->fetch_object();
echo number_format($total_february1_sub->total_february_sub,2);

?></th>
              <th><?php 
$data_march_sub = $db->query("SELECT sum(all_total_amount) as total_march_sub FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$march_start' AND '$march_end'");
$total_march1_sub = $data_march_sub->fetch_object();
echo number_format($total_march1_sub->total_march_sub,2);

?></th>
               <th><?php 
$data_sub_all = $db->query("SELECT sum(all_total_amount) as total_sub_all FROM `invoice` WHERE company_id='$company_login_id' AND `broker_code`='$broker_code' AND `invoice_date` BETWEEN '$april_start' AND '$march_end'");
$total_sub_final = $data_sub_all->fetch_object();
echo number_format($total_sub_final->total_sub_all,2);

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