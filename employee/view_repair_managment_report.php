<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];




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
                  <div class="col-9">
                  
                    <h5> Total Repair From <?php echo date("d-m-Y", strtotime($start_date)); ?> To <?php echo date("d-m-Y", strtotime($end_date)); ?></h5>
                    <span>  <?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `repair_managment` WHERE store_id='$store_id'  AND `date` BETWEEN '$start_date' AND '$end_date'");
$total_inc = $data_invoice->fetch_object();
echo $total_inc->total_fees;

?></span>
                  </div>


                   <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: #2749d3;border-radius: 50%; width: 45px; height: 45px; text-align: center;"> <a href="print_repair_managment_report.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&default_mill_code=<?php echo $default_mill_id; ?>" target="_blank"><i class="fa fa-print" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                
                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="repair_management_report.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Purchase Amount</th>
                  <th>Repair Amount</th>
                  <th>Commission</th>
                  <th>Sale</th>
                  <th>Profite</th>
                </tr>
              </thead>
  <tbody>
                 <?php
                    

                    $sl = 0;
                    $data = $db->query("SELECT * FROM `repair_managment` WHERE `store_id`='$store_id'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;
                      
                  ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $sl; ?></td>
                 
                </tr>


              <?php } ?>
                
              </tbody>

          


                  
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
</body>
</html>