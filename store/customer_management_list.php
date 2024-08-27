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
                      <a href="add_customer_management.php"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-11">
                  
                    <h5> All Active Customer</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM customer_managment WHERE status='enable'");
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
                 <th>Referal Id</th>
                  <th>Customer Type</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM customer_managment");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                 <td><?php echo $value->referal_id; ?></td>
                  <td><?php echo $value->type_of_customer; ?></td>
                  <td><?php echo $value->name; ?></td>
                  <td><?php echo $value->mobile_number; ?></td>
                  
                  <td><?php echo $value->status; ?></td>
                  
                  
                  <td>
                     <a href='view_customer_management.php?post=<?php echo $value->id; ?>&action=view' title='View Customer'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>

                   <a href='view_refer_customer_list.php?rereral_id=<?php echo $value->referal_id; ?>&action=view' title='View Refer Customer'><button class='btn btn-xs btn-info mr-2 p-1'><i class='fa fa-user'></i> </button></a>
                   
                   <a href='add_customer_management.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
                              
                              <a href='customer_managment_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

                   
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