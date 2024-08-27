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
                  <div class="col-1">
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="#"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-11">
                  
                    <h5> All Active Task</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM eng_task");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>

                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Work Name.</th>
                  <th>Given By</th>
                  
                   <th>Date</th>
                   <th>Work Status</th>
                   <th>View</th>
                  
                </tr>
              </thead>

						<tbody style="text-transform:capitalize;">
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM eng_task WHERE store_id='$store_id' AND user_id='$user_id' ORDER BY id DESC");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $data_employee = $db->query("SELECT * FROM employee WHERE id='$value->given_id'");
                    $value_emp = $data_employee->fetch_object();

                    $data2 = $db->query("SELECT * FROM customer_managment WHERE id='$value->customer_id'");
                    $value_customer = $data2->fetch_object();

                    
                  ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value_customer->name; ?></td>
                      <td><?php echo $value_customer->mobile_number; ?></td>
                  <td><?php echo $value->work_name; ?></td>
                   <td style="text-transform:capitalize;"><?php echo $value_emp->first_name." ".$value_emp->last_name; ?></td>
                    
                 
                   <td><?php echo $value->date; ?></td>
                   <td>

                    <?php if ($value->work_status=='Pending') { ?>
                      <a href='update_task__status_action_for_eng.php?post_id=<?php echo $value->id; ?>&work_id=<?php echo $value->work_id; ?>&work_name=<?php echo $value->work_name; ?>&action=update&status=<?php echo $value->work_status; ?>' title='Update'><button class='btn btn-xs <?php if($value->work_status=='Pending'){echo "btn-danger";}else{echo "btn-success";} ?> mr-2 p-1'><i class='fas fa-edit'></i> <?php echo $value->work_status; ?> </button></a>
                  <?php  }else{ ?>

                    <img src="dist/img/tick.png" width="25" style="border-radius:50%;" />

                   <?php } ?>
                      

                  </td>
                    <td>


                    <a href='view_repair_managment.php?repair_id=<?php echo $value->work_id; ?>&action=update' title='Update' target="_blank"><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>

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