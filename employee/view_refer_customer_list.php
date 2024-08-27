<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");
$rereral_id = $_GET['rereral_id'];
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
                  <div class="col-10">
                  
                    <h5> All Active With Refer Customer</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM customer_managment WHERE coming_referal_id='$rereral_id'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>

                  <div class="col-1 px-2 d-flex">
                  <a href="customer_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                 <th>Opening Balance</th>
                  <th>Customer Type</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Status</th>
              
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM customer_managment WHERE coming_referal_id='$rereral_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                <td><?php echo $value->opening_dues; ?></td>
                  <td><?php echo $value->type_of_customer; ?></td>
                  <td><?php echo $value->name; ?></td>
                  <td><?php echo $value->mobile_number; ?></td>
                  
                  <td><?php echo $value->status; ?></td>
                  
                  
                  
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