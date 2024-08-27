<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

$commission_select=$db->query("SELECT * FROM `employee_commission` WHERE employee_id='$user_id'"); 
$commission_fetch=$commission_select->fetch_object(); 
$emp_commission = $commission_fetch->commission;

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
                  <div class="col-1">
                     <?php if($add_transation=='yes'){ ?> 
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="#"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  <?php }else{ ?>

                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="#"><i class="fa fa-inr" style="font-size: 30px; color:#fff;"></i></a>
                    </div>

                  <?php } ?>

                   
                  </div>
                  <div class="col-10">
                  
                    <h5> All Transations</h5>
                   
                  </div>


                 

                  <div class="col-1 mb-5">
                   <a href="dashboard.php" class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"><i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a>
                </div>
                
                 


                </div>


                 <div class="row">
                   
        
        <div class="col-md-5">
          <form class="form" method="GET" action="earning_history.php">
        <div class="form-group">
        <label>Start date</label>
        <input name="start_date" id="start_date" class="form-control" type="date"  required>
             
        </div>
        </div>
       <div class="col-md-5">
        <div class="form-group">
        <label>End Date</label>
       <input name="end_date" id="end_date" class="form-control" type="date" required>
        </div>
        </div>
    <div class="col-md-2">
  <div class="form-group">
          <label>&nbsp;</label>
          <br>
        <button type="submit"  class="btn btn-success ">Get List</button>
            </div> 

            </form>   
            </div>
            
            </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
               
                  <th>Repair Id</th>
                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Total Amount</th>
                  <th>Commision</th>
                  <th>Profit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;

             if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    // Quote the dates in the SQL query
    $data = $db->query("SELECT * FROM repair_managment WHERE `store_id`='$store_id' AND `user_id`='$user_id' AND `task`='Complete' AND `repair_date` BETWEEN '$start_date' AND '$end_date'");

} else {
    $data = $db->query("SELECT * FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
}


                    
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $status = $value->status;

                    $data2 = $db->query("SELECT * FROM customer_managment WHERE id='$value->customer_id'");
                    $value_customer = $data2->fetch_object();
                  ?>
                <tr>
                  
                  
                 
                  <td><?php echo $value->id; ?></td>
                  <td><?php echo $value_customer->name; ?></td>
                   <td><?php echo date("d-M-Y", strtotime($value->date)); ?></td>
                  
                  <td><i class="fa fa-inr"></i> <?php echo number_format($value->total_amount,2); ?></td>
                 
                 
                  <td> <?php echo $emp_commission; ?>%</td>
                   <td><i class="fa fa-inr"></i> 

                    <?php 

                   $totals1 = ($value->total_amount)-($value->total_service_tax_amount+$value->total_product_purchase_amount);

                   echo number_format(($emp_commission / 100) * $totals1,2);

                    ?>


                  </td>
                  <td><?php echo $status; ?></td>
                  
                  
                  <td>
                    <?php if ($view_transation=='yes') { ?>
                   <a href='view_repair_managment.php?repair_id=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
                   <?php } ?>
                   
                  </td>
                </tr>
              <?php } ?>

               <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM por_repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $status = $value->status;

                    $data2 = $db->query("SELECT * FROM customer_managment WHERE id='$value->customer_id'");
                    $value_customer = $data2->fetch_object();

                                          ?>
                <tr>
                  
                  
                  <td><?php echo $value->id; ?></td>
                  <td><?php echo $value_customer->name; ?></td>
                  <td><?php echo $value->date; ?></td>
                  <td><i class="fa fa-inr"></i> <?php echo number_format($value->service_charge,2); ?></td>

                 
                  
                  <td> <?php echo $emp_commission; ?>%</td>
                   <td><i class="fa fa-inr"></i> <?php echo ($emp_commission / 100) * $value->service_charge; ?></td>
                  
                  <td><?php echo $status; ?></td>
                  
                  
                  <td>

                    
                      <?php if ($view_transation=='yes') { ?>
                   <a href='view_repair_managment.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
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

</body>
</html>