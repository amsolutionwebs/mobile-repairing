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
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;">
                      <i class="fa fa-book" style="font-size: 20px; color:#fff;"></i>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Product Variation</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_p FROM product_variation");
$total_p = $data4->fetch_object();
echo $total_p->total_p;

?></span>
                  </div>
                  
                  
                  <div class="col-1">
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;">
                      <a href="inventory.php"><i class="fa fa-arrow-left" style="font-size: 20px; color:#fff;"></i></a>
                    </div>
                  </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                  <thead>
                    <tr>
                    <th>S.N</th>
                    <th>Serial No</th>
                    <th>Products Title</th>
                    <th>Variation</th>
                    <th>Sub Variation</th>
                   
                     <th>Stock</th>
                    <th>MRP</th>
                    <th>Price</th>
                    <th>Discounted price</th>
                    
                     <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                    $sl = 0;
                    $data = $db->query("SELECT * FROM product_variation");
                    while ($value = $data->fetch_object()) {
            $id = $value->id;
                      $sl++;
              $data1 = $db->query("SELECT * FROM variation WHERE id='$value->variation_id'");
              $value1 = $data1->fetch_object();

              $data2 = $db->query("SELECT * FROM sub_variation WHERE id='$value->sub_variation_id'");
              $value2 = $data2->fetch_object();

              $data3 = $db->query("SELECT * FROM products WHERE id='$value->product_id'");
              $value3 = $data3->fetch_object();
              
              

                      ?>
                      <tr>
                      <td><?php echo $sl; ?></td>
                     <td><?php echo $value->serial_no; ?></td>
                      <td><?php echo substr($value3->products_title,0,15); ?></td>
                      <td><?php echo $value1->variation_name; ?></td>
                      <td><?php echo $value2->sub_variation_name; ?></td>
                  <td><?php echo $value->qty; ?></td>
                 
                  <td><i class="fa fa-inr"></i> <?php echo number_format($value->purchase_price,2); ?></td>
                  <td><i class="fa fa-inr"></i> <?php echo number_format($value->price,2); ?></td>
                  <td><i class="fa fa-inr"></i> <?php echo number_format($value->discounted_price,2); ?></td>
                     
                          <td>
                        
  
<select class="form-control form-control-sm" name="best_seller_name" id="best_seller" style="color:white;background-color:<?php if($value->status=='enable'){echo "green"; }else{echo "red";} ?>"  onchange="changeStatus(this.value,<?php echo $value->id; ?>)">
                          <option value="enable" <?php if($value->status=='enable'){echo "selected"; } ?>>Enable</option>
                          <option value="disable" <?php if($value->status=='disable'){echo "selected"; } ?>>Disable</option>
                        
                        </select>





                      </td>
                      <td>
                        

                       
                              
                          
                              <a href='view_variation_delete_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>
                              
                          
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
    function changeStatus(value,id){
        $.ajax({
        type: "POST",
        url: 'change_variation_status_on_view.php',
        data: {
          value: value,
          id : id
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            if(response.trim()=="success") {
                window.location=location.href;
            }
        }
      });
    }
</script>
</body>
</html>