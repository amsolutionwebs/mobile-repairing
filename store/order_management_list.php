<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");
?>
<div class="content-wrapper">
    
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           
          <div class="card mt-2 px-1" style="border-top:3px solid tomato;">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-1">
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;">
                      <a href="#"><i class="fa fa-shopping-cart" style="font-size: 20px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Order</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM order_managment");
$total_order = $data4->fetch_object();
echo $total_order->total_fees;

?></span>
                  </div>
                  
                  
                   <div class="col-1">
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;">
                      <a href="dashboard.php"><i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a>
                    </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example2" class="table table-bordered">
                  
                  <thead>
                    <tr>
                    <th>S.N</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                    <th>Order No</th>
                    
                    <th>Order Date</th>
                    <th>Order Status</th>
                  
                    <th>Total Amount</th>
                    <th>Paid/Unpaid</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                    $sl = 0;
                    $data = $db->query("SELECT * FROM order_managment WHERE store_id='$store_id' AND status='enable' ORDER BY id DESC");
                    while ($value = $data->fetch_object()) {
                      $id = $value->id;
                      $sl++;
                      $data2 = $db->query("SELECT * FROM customer_managment WHERE id='$value->customer_id'");
                    $value_customer = $data2->fetch_object();

                    $data23 = $db->query("SELECT * FROM repair_managment WHERE id='$value->order_id'");
                    $value_repair = $data23->fetch_object();
                    
                      ?>
                      <tr>
                      <td><?php echo $sl; ?></td>
                      <td><?php echo $value_customer->name; ?></td>
                      <td><?php echo $value_customer->mobile_number; ?></td>
                      <td style="text-transform: capitalize;"><?php echo $value->order_number; ?></td>
                     
                      
                      <td><?php echo $value->order_date;?></td>
                      <td><?php echo $value->order_status; ?></td>
                     
                      <td><i class="fa fa-inr"></i> <?php echo number_format($value_repair->total_amount,2); ?>/-</td>
                      <td>

                        <a href='<?php if($value->order_payment_status=='Unpaid'){echo "update_order_payment_status_action.php?post_id=";}else{echo "#";} ?><?php echo $value->id; ?>&action=update&status=<?php echo $value->order_payment_status; ?>' title='Update'><button class='btn btn-xs <?php if($value->order_payment_status=='Unpaid'){echo "btn-danger";}else{echo "btn-success"." disabled";} ?> mr-2 p-1'> <?php echo $value->order_payment_status; ?> </button></a></td>

                      <td>
                          
                          <?php
                        if ($value->order_payment_status =='Paid') {
                          $today_date = date("Y-m-d");
                        $exploded_value = explode('_',$value->warranty_in_days);
                        $warranty = $exploded_value[0];
                        $payment_date2 = new DateTime($value->payment_date);
                        $payment_date2->modify('+'.$warranty.' days');
                        $expiry_date = $payment_date2->format('Y-m-d');

                        if ($today_date>=$expiry_date){}else{ ?>
                          
                          <a href='add_task_in_warranty.php?post_id=<?php echo $value->id; ?>' title='Task Add'><button class='btn btn-xs btn-secondary mr-2 p-1'> <i class="fa fa-gear"></i> </button></a>
                        
                        <?php }}?>
                          
                          <a href='order_pdf.php?order_id=<?php echo $value->id; ?>&customer_id=<?php echo $value->customer_id; ?>' title='DOWNLOAD INVOICE' target="_blank"><button class='btn btn-xs btn-secondary mr-2 p-1'> <i class="fa fa-download"></i> </button></a>
                          
                          <a href='order_details.php?post=<?php echo $value->id; ?>&action=update' title='ORDER DETAILS'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fa fa-eye'></i> </button></a>
                          
                          <a href='customer_details.php?post=<?php echo $value->user_id; ?>&action=view' title='VIEW USER DETAILS'><button class='btn btn-xs btn-primary mr-2 p-1'><i class='fa fa-user'></i> </button></a>

                          
                           <a href='order_action.php?post=<?php echo $value->id; ?>&action=delete' title='DELETE'><button class='btn btn-xs btn-danger mr-2 p-1'><i class='fa fa-trash' onClick="return confirm('Are You Sure want to delete ?')"></i> </button></a>
                           
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