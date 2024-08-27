<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$default_mill_id = $_GET['default_mill_code'];
$id = $_GET['post'];


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
                      <a href="#" title="Add Statics Invoice"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>




                   

                  </div>
                  <div class="col-10">
                  
                    <h5> Total Indent Sort of <?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                    echo $value_master->mill_name;

                    ?>

                    <?php 
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                     echo $value_subm->mill_name;




                      ?> From <?php echo date("d-m-Y", strtotime($start_date)); ?> To <?php echo date("d-m-Y", strtotime($end_date)); ?></h5>

                     <span>Dealer Name :- <?php echo $_GET['dealer_name']; ?></span>
                  </div>


                  <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="view_indent_report_by_mill.php?post=<?php echo $value->id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&default_mill_code=<?php echo $default_mill_id; ?>&action=update"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
                 
                </div>
               
                 
               </div>
               
            


                <table id="example1" class="table table-bordered">
                  
                 <thead>
                <tr>
                  <th>S.N</th>
                  <th>Sort No.</th>
                  <th>Grade</th>
                  <th>Rate</th>
                  <th>Order Qty.</th>
                  <th>Received Qty.</th>
                  <th>Balance Qty.</th>
                 
                  
                </tr>
              </thead>
  <tbody>
                 <?php

                    $indent_id = $_GET['post'];
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM `indent_plus` WHERE `indent_id`='$indent_id'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;

                    

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php 

                  $sort_data = $db->query("SELECT sort_no FROM `sort` WHERE `id`='$value->sort_id' ");
      $value_sort = $sort_data->fetch_object();
      echo $value_sort->sort_no;

       ?></td>
                  <td><?php 
                  $sort_grade = $db->query("SELECT grade FROM `grade` WHERE `id`='$value->grade_id' ");
      $value_grade = $sort_grade->fetch_object();
      echo $value_grade->grade;

    ?></td>       
     <td><?php echo $value->price; ?></td>
     <td><?php echo $value->quantity; ?></td>
      <td>

                  <?php 
$data_invoice = $db->query("SELECT sum(quantity) as total_fees FROM `invoice_sort_date` WHERE `indent_id`='$indent_id' AND sort_id='$value->id'");

$total_inc = $data_invoice->fetch_object();
if(empty($total_inc->total_fees)){

  echo "0";
}else{
  echo $total_inc->total_fees;
}
  

?></td>
                  <td>

<?php echo $value->quantity-$total_inc->total_fees; ?>
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