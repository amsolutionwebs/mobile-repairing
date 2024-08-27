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

                    

                   

                  </div>
                  <div class="col-10">
                  
                    <h5> All Payment</h5>
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
                  <th>S.N</th>
                  <th>Ref No.</th>
                  <th>Payment Date</th>
                  <th>Mill Name</th>
                  
                  <th>Dealer Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
							</thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM payment WHERE company_id='$company_login_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                  


                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                   <td><?php echo $value->payment_ref; ?></td>
                     
                  <td><?php echo date("d-m-Y", strtotime($value->payment_date));; ?></td>
                  <td><?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$value->default_mill_code'");
                    $value_master = $data_master->fetch_object();
                    echo $value_master->mill_name;

                    ?>

                    <?php 
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$value->default_mill_code'");
                    $value_subm = $datasubm->fetch_object();

                     echo $value_subm->mill_name;




                      ?></td>
                  
                  <td><?php echo substr($value->dealer_name,0,12); ?></td>
                
                 
                  <td><?php echo number_format($value->total_payment_two,2); ?></td>
                  <td>
                   
                    
                    <a href='view_payment.php?post=<?php echo $value->id; ?>&action=update' title='View Details'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
                     
                   
                     
                    
                   
                              
                              <a href='payment_delete_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>


                   
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