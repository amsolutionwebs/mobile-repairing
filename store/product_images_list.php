<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

$product_id = $_GET['product_id'];
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
                      <a href="add_product_images.php?product_id=<?php echo $product_id; ?>&action=add"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Active Product Images</h5>
                    <span> <?php $datap = $db->query("SELECT products_title FROM products WHERE id='$product_id'");
                    $valuep = $datap->fetch_object(); 

                    echo $valuep->products_title?>


                     </span>
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
                  <th>Images</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM product_images WHERE product_id='$product_id'");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>

                  <td><img id="output_banner" src ="upload/post-images/<?php echo $value->product_images; ?>" height="50"/></td>
                 
                  
                  <td><?php echo $value->status; ?></td>
                  
                  
                  <td>
                   
                   <a href='add_product_images.php?post=<?php echo $value->id; ?>&product_id=<?php echo $product_id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
                              
                              <a href='product_images_action.php?post=<?php echo $value->id; ?>&product_id=<?php echo $product_id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

                   
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