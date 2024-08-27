<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");




$start_date = $_GET['start_date']; 
$end_date = $_GET['end_date']; 
$dealer_code = $_GET['dealer_code'];


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
                      <i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i>
                    </div>




                   

                  </div>
                  <div class="col-10">
                  
                    <h5> Total Indent of 

                    <?php 
      $dealer_data = $db->query("SELECT dealer_name FROM `dealer` WHERE `id`='$dealer_code' ");
      $value_dealer = $dealer_data->fetch_object();
      echo $value_dealer->dealer_name;


                    ?>


                    

                    From <?php echo date("d-m-Y", strtotime($start_date)); ?> To <?php echo date("d-m-Y", strtotime($end_date)); ?></h5>
               
                  </div>


                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="indent_register_by_dealer.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               


               


                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Indent No.</th>
                  <th>Date</th>
                  <th>Mill Code</th>
                  <th>Mill Name</th>
                  <th>Sort And Grade</th>
                 
                  
                </tr>
              </thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM `indent` WHERE `company_id`='$company_login_id' AND `dealer_code`='$dealer_code' AND `indent_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;

                    

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->indent_no; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($value->indent_date)); ?></td>
                   <td><?php 
      $mill_data = $db->query("SELECT mill_code FROM `mill` WHERE `id`='$value->mill_code' ");
      $value_mill = $mill_data->fetch_object();
      echo $value_mill->mill_code;
                    ?></td>
                    <td><?php 
      $mill_data_name = $db->query("SELECT mill_name FROM `mill` WHERE `id`='$value->mill_code' ");
      $value_mill_name = $mill_data_name->fetch_object();
      echo $value_mill_name->mill_name;
                    ?></td>
               <td><?php 
$data_indent_plus = $db->query("SELECT count(id) as total_indentd FROM `indent_plus` WHERE `indent_id`='$value->id' ");
$total_indentt = $data_indent_plus->fetch_object();
echo $total_indentt->total_indentd;

?>
              <a href='view_indent_plus_report_for_dealer.php?post=<?php echo $value->id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&dealer_code=<?php echo $dealer_code; ?>&mill_name=<?php echo $value_mill_name->mill_name; ?>&action=update' title='View Details'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
           </td>
                 
                
                  
                
              
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