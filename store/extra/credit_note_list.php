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
                      <a href="add_credit_note.php" title="Add Statics Invoice"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>

                   

                  </div>
                  <div class="col-10">
                  
                    <h5> All Credit Note</h5>
                    <span>  <?php 
$data_invoice = $db->query("SELECT count(id) as total_fees FROM `credit_note` WHERE company_id='$company_login_id'");
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
                  <th>Credit No.</th>
                   <th>Reference</th>
                  <th>Invoice No.</th>
                  <th>Mill Name</th>
                  <th>Broker/Salesman Name</th>
                  <th>Dealer Name</th>
                 
                  
                  <th>Amount</th>
                   <th>Status</th>
                  <th>Action</th>
                </tr>
							</thead>
  <tbody>
                 <?php
                    $sl = 0;
                   
                 $data = $db->query("SELECT * FROM credit_note WHERE company_id='$company_login_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $databr = $db->query("SELECT * FROM broker WHERE id='$value->broker_code'");
                   $value_broker = $databr->fetch_object();

                   $dataindet = $db->query("SELECT * FROM invoice WHERE id='$value->invoice_number'");
                   $value_invoice = $dataindet->fetch_object();

                      ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                   <td><?php echo $value->credit_note_number; ?></td>
                     <td><?php if($value->refrence=='Goods_Return'){
                     echo "G.R"; }?>
             <?php if($value->refrence=='Cash_Discount'){
                     echo "C.D"; }?>
                     <?php if($value->refrence=='Claim'){
                     echo "Claim"; }?>

                     </td>
                  <td><?php echo $value_invoice->invoice_number; ?></td>
                  <td>


                     <?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$value->default_mill_code'");
                    $value_master = $data_master->fetch_object();
                    echo $value_master->mill_name;

                    ?>

                    <?php 
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$value->default_mill_code'");
                    $value_subm = $datasubm->fetch_object();

                     echo $value_subm->mill_name;




                      ?>


                     </td>
                  <td><?php echo substr($value_broker->name_one,0,12); ?></td>
                  <td><?php echo substr($value->dealer_name,0,12); ?></td>
                
                 
                  <td><?php echo number_format($value->total_credit_note_amount,2); ?></td>
                  <td><?php echo $value->status; ?></td>
                  <td>
                   
                    
                    <a href='view_credit_note.php?post=<?php echo $value->id; ?>&action=update' title='View Details'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-eye'></i> </button></a>
                     
                    <?php if($value->refrence=='Goods_Return'){ ?>

                      <a href='add_sort_in_credit_note.php?post=<?php echo $value->id; ?>&invoice_id=<?php echo $value->invoice_number; ?>' title='Update Sort'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fas fa-plus'></i> </button></a>

                   <?php } ?>
                     
                    
                    <a href='update_credit_note.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
                              

                              <?php 
                    $delete_query = $db->query("SELECT payment_credit_details.credit_note_number FROM `payment_credit_details` WHERE payment_credit_details.credit_note_number = '$value->id'");
                    $value_delete_query = $delete_query->fetch_object(); 

                    if(empty($value_delete_query->credit_note_number)){ ?>
                       <a href='credit_note_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>
                   

                    <?php }
                    ?>

                    
                             


                   
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