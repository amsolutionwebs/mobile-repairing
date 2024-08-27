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
                     <?php if($add_inventory=='yes'){ ?> 
                   <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <a href="add_product.php"><i class="fas fa-plus" style="font-size: 30px; color:#fff;"></i></a>
                    </div>
                  <?php }else{ ?>

                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                      <i class="fas fa-book" style="font-size: 30px; color:#fff;"></i>
                    </div>

                  <?php } ?>
                    
                  </div>
                  <div class="col-10">
                  
                    <h5> All Active Product</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM products WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>

                  <div class="col-1 px-2 d-flex">
                  <a href="inventory.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Product Name</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

						<tbody>
                 <?php
                    $sl = 0;
                
                    $data = $db->query("SELECT * FROM products");
                    while ($value = $data->fetch_object()) {
                    $id = $value->id;
                    $sl++;

                    $data_category = $db->query("SELECT * FROM category WHERE id='$value->categories_id'");
              $value_category = $data_category->fetch_object();


      $data_sub_category = $db->query("SELECT * FROM sub_category WHERE id='$value->sub_categories_id'");
      $value_subcategory = $data_sub_category->fetch_object();


              $data_brand = $db->query("SELECT * FROM brand WHERE id='$value->brand_id'");
              $value_brand = $data_brand->fetch_object();

              $data_model = $db->query("SELECT * FROM model_number WHERE id='$value->model_number_id'");
              $value_model = $data_model->fetch_object();
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                   <td><?php echo substr($value_category->category_name,0,20); ?></td>
                    <td><?php echo substr($value_subcategory->sub_category_name,0,20); ?></td>
                     <td><?php echo substr($value_brand->brand_name,0,20); ?></td>
                      <td><?php echo substr($value_model->model_number,0,20); ?></td>
                       <td><?php echo substr($value->products_title,0,20); ?></td>
                 
                  
                  <td><?php echo $value->status; ?></td>
                 
                  
                  <td>
                    <?php if ($edit_inventory=='yes') { ?>
              <a href='add_product.php?post=<?php echo $value->id; ?>&action=update' title='Update'><button class='btn btn-xs btn-warning mr-2 p-1'><i class='fas fa-edit'></i> </button></a>
  <?php } if ($add_inventory=='yes') { ?>
    <a href='product_images_list.php?product_id=<?php echo $value->id; ?>&action=view' title='Product Images'><button class='btn btn-xs btn-success mr-2 p-1'><i class='fa fa-image'></i> </button></a>

                   <a href='single_product_variation.php?post=<?php echo $value->id; ?>' title='Add Variation'><button class='btn btn-xs btn-info mr-2 p-1'><i class='fas fa-eye'></i> Add Vari.</button></a>
    <?php } if ($delete_inventory=='yes') { ?>
            <a href='products_action.php?post=<?php echo $value->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

    <?php } ?>

                   

                   
                              
                             

                   
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