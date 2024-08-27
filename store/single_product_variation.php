<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

$p_id = $_GET['post'];
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
                      <a href="add_product_variation.php?product_id=<?php echo $p_id; ?>"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Active Sub Variation</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT products_title FROM products WHERE id='$p_id'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->products_title;

?></span>
                  </div>

                   <div class="col-1 px-2 d-flex">
                  <a href="product_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Variation Type</th>
                  <th>Sub Variation Name</th>
                  <th>Qty</th>
                  
                  <th>P.Price</th>
                  <th>Price</th>
                  <th>Discounted Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM product_variation WHERE product_id='$p_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $data1 = $db->query("SELECT * FROM `variation` WHERE id='$value->variation_id'");
                    $value1 = $data1->fetch_object();

                     $data12 = $db->query("SELECT * FROM `sub_variation` WHERE id='$value->sub_variation_id'");
                    $value12 = $data12->fetch_object();

                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value1->variation_name; ?></td>
                  <td><?php echo $value12->sub_variation_name; ?></td>
                  <td><?php echo $value->qty; ?></td>
                
                  <td><?php echo $value->purchase_price; ?></td>
                  <td><?php echo $value->price; ?></td>
                  <td><?php echo $value->discounted_price; ?></td>
                  
                  <td><?php echo $value->status; ?></td>
    
                  <td>
                    <a href='variation_product_images_list.php?product_id=<?php echo $p_id; ?>&variation_id=<?php echo $value->id; ?>&action=view' title='Variation Product Images'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fa fa-image'></i> </button></a>


                   <a href='add_product_variation.php?post=<?php echo $value->id; ?>&product_id=<?php echo $p_id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
                              

                              <a href='product_variation_action.php?post=<?php echo $value->id; ?>&product_id=<?php echo $p_id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

                   
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