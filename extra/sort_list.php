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
                      <a href="add_sort.php"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Sort</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM `sort` WHERE company_id='$company_login_id'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>

                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="master.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                 <thead>
								<tr>
									<thead>
                <tr>
                  <th>
                    S.N
                  </th>
                  <th>Master Mill Name</th>
                  <th>Sort No</th>
                  <th>Sort Description</th>
                  <th>Product Type</th>
                  <th>Action</th>
                </tr>
              </thead>
							</thead>


              <tbody>
                 <?php
                    $sl = 0;
                    $company_login_id = $_SESSION['company_id'];
                    $data = $db->query("SELECT * FROM sort WHERE company_id='$company_login_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;
                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->master_mill_name; ?></td>
                  <td><?php echo $value->sort_no; ?></td>
                  <td><?php echo $value->sort_description; ?></td>
                  <td><?php echo $value->products_type; ?></td>
                  
              
                  
                  <td>
                  
         <a href='add_sort.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
                              
                              <a href='sort_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

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