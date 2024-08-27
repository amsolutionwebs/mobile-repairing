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
                    <?php if($add_vendor=='yes'){ ?> 
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="add_vendor_management.php"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                     <?php }else{ ?>
                      <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <i class="fas fa-users" style="font-size: 30px; color:#fff;"></i>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Active Vendor</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM vendor_managment WHERE store_id='$store_id'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>

                   <div class="col-1">
                   <a href="dashboard.php" class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"><i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a>
                </div>
                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Vendor Id</th>
                 
                  <th>Vendor Name</th>
                  <th>Mobile Number</th>
                  
                  <th>Whatsapp Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM vendor_managment WHERE store_id='$store_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->vendor_id; ?></td>
                  <td><?php echo $value->vendor_name; ?></td>
                 
                  <td><?php echo $value->whatsapp_number; ?></td>
                  <td><?php echo $value->whatsapp_number; ?></td>
                  
                  <td><?php echo $value->status; ?></td>
                  
                  
                  <td>

                    <?php if ($view_vendor=='yes') { ?>
            <a href='view_vendor_managment.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>

    <?php } if ($edit_vendor=='yes') { ?>
             <a href='add_vendor_management.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>

    <?php } if ($delete_vendor=='yes') { ?>
          <a href='vendor_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

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