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
                      <i class="fas fa-store-alt" style="font-size: 30px; color:#fff;"></i>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Store Employee</h5>
                    <span>  </span>
                  </div>
                
                 <div class="col-1 px-2 d-flex">
                  <a href="employee_details.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Employee Id</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Store Name</th>
                
                 
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data1 = $db->query("SELECT * FROM employee_store");
                    while ($value1 = $data1->fetch_object()) {
                    $id1 = $value1->id;
                    $sl++;

                    $data = $db->query("SELECT * FROM employee WHERE id='$value1->employee_id'");
                   $value = $data->fetch_object();

                   $data2 = $db->query("SELECT * FROM store WHERE id='$value1->store_id'");
                   $value2 = $data2->fetch_object();

                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->employee_id; ?></td>
                  <td><?php echo $value->first_name; ?></td>
                  <td><?php echo $value->mobile_number; ?></td>
                  <td><?php echo $value2->store_name; ?></td>
                
              
                 
                  
                  
                  <td>
                    
                              
                              <a href='employee_store_add_action.php?post=<?php echo $value1->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

                   
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