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
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="add_leads_management.php"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-11">
                  
                    <h5> All Transations</h5>
                    <span> Total Earning - <?php 

$data4 = $db->query("SELECT sum(service_charge) as total_amt1 FROM repair_managment WHERE user_id='$user_id'");
$total_amount1 = $data4->fetch_object();

$data5 = $db->query("SELECT sum(service_charge) as total_amt2 FROM por_repair_managment WHERE user_id='$user_id'");
$total_amount5 = $data5->fetch_object();
$total = $total_amount5->total_amt2+$total_amount1->total_amt1;

echo "<i class='fa fa-inr'></i>". number_format(($emp_commission / 100) * $total,2);


?></span>
                  </div>

                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
               
                  <th>Repair Id</th>
                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Commision</th>
                  <th>Earning</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;

                    $data = $db->query("SELECT * FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
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
                   <a href='view_repair_managment.php?repair_id=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
                   
                   
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
                   <a href='view_leads_managment.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
                   
                   
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