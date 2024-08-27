<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if($_GET['action']){
$action = $_GET['action'];
$id = $_GET['post'];
$get_data = "SELECT * FROM products WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();
$categories_id = $data['categories_id'];
$sub_categories_id = $data['sub_categories_id'];
$brand_id = $data['brand_id'];
$model_number_id = $data['model_number_id'];

$products_title = $data['products_title'];


$products_desc = $data['products_desc'];

$product_quantity = $data['product_quantity'];



$seo_title = $data['seo_title'];
$meta_keywords = $data['meta_keywords'];
$meta_description = $data['meta_description'];
$status = $data['status'];
$sort_order = $data['sort_order'];
$products_image = $data['products_image'];
$product_images_two = $data['product_images_two'];
$product_images_three = $data['product_images_three'];
$products_images_four = $data['products_images_four'];
$product_images_five = $data['product_images_five'];
}

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
                        <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;"> <i class="fa fa-plus" style="font-size: 30px; color:#fff;"></i> </div>
                      </div>
                      <div class="col-11">
                        <h5> <?php if($action == 'update'){ echo "Update Products"; }else{
                          echo "Add New Products";
                        }?></h5> </div>
                    </div>
                    <!--  -->
                  </div>
                  <div class="card-body border">
                    <form role="form" method="post" enctype="multipart/form-data" action="products_action.php" autocomplete="off" class="needs-validation" novalidate>
                      <div class="row">
                        <!-- registration page -->
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="cat_id"> Select Categories :</label>
                                <select class="form-control select2" name="cat_id" onchange="getSubCat(this.value)" required>
                                  <option value="">Select Categories</option>
                                  
           <?php 
                   $data1 = $db->query("SELECT * FROM `category` ORDER BY id ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($categories_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->category_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>

                             
                             <div class="col-md-3">
                              <div class="form-group">
                                <label for="sub_cat_id">Select Sub Categories :</label>
                                <select class="form-control select2" name="sub_cat_id" id="sub_cat_id" required>
                                  <option value="">Select Sub Categories</option>
                                  
           <?php 
                   $data1 = $db->query("SELECT * FROM `sub_category` ORDER BY sub_category_name ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($sub_categories_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->sub_category_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>
        
        <div class="col-md-3">
                              <div class="form-group">
                                <label for="brand_id"> Select Brand :</label>
                                <select class="form-control select2" name="brand_id" onchange="getModelNumber(this.value)" required>
                                  <option value="">Select Brand</option>
                                  
           <?php 
                   $data13 = $db->query("SELECT * FROM `brand` ORDER BY brand_name ASC");
                    while ($value13 = $data13->fetch_object()) { ?>
                      <option value="<?php echo $value13->id; ?>"  <?php if($brand_id===$value13->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value13->brand_name; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>

                             
                             <div class="col-md-3">
                              <div class="form-group">
                                <label for="model_id">Select Model Number :</label>
                                <select class="form-control select2" name="model_number_id" id="model_number_id_get" required>
                                  <option value="">Select Model Number</option>
                                  
           <?php 
                   $data14 = $db->query("SELECT * FROM `model_number` ORDER BY model_number ASC");
                    while ($value14 = $data14->fetch_object()) { ?>
                      <option value="<?php echo $value14->id; ?>"  <?php if($model_number_id===$value14->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value14->model_number; ?></option>
                      <?php } ?>
                                </select>
                                 </div>
                            </div>
                            
                            
                              
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="products_title">Products Title:</label>
                                <input type="text" class="form-control input-sm" name="products_title" id="products_title" value="<?php echo $products_title; ?>" required> </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="products_qty">SKU Number. :</label>
                                <input type="text" name="products_qty" class="form-control" value="<?php echo $product_quantity; ?>"> </div>
                            </div>

                           
                            
                            <div class="col-md-12 mb-2">
                              <label  for="products_desc"> Products Description:</label>
                              <textarea class="form-control input-sm" id="summernote" name="products_desc" rows="3" required><?php echo $products_desc; ?></textarea>
                              
                            </div>
                            
                            
                            
                          





                            

                            

                           <div class="col-md-6">
                              <div class="form-group">
                                <label for="title">Sort Order:</label>
                                <input type="number" class="form-control input-sm" name="sort_order" id="sort_order" value="<?php if($sort_order==''){echo "0";}else{echo $sort_order; } ?>"> </div>
                            </div>

                           
                           

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="title">Status:</label>
                                <select class="form-control" name="status">
                                  <option value="enable" <?php if($status=='enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($status=='disable'){echo "selected"; } ?>>Disable</option>
                                </select> </div>
                            </div>

                            

                          </div>
                        </div>

                       
                        <!-- enquiry type -->
                      </div>
                        <!--  -->
                        <div class="col-md-12 mt-5">
      <div class="form-group ">
                      
                <input type="hidden" name="submit" value="<?php if($action=='update'){echo "update";}else{echo "publish";} ?>" />
                <input type="hidden" name="products_id" value="<?php echo $id; ?>">
                      <input type="submit" name="submitf" id="submit" value="<?php if($action=='update'){echo "Update";}else{echo "Publish";} ?>" class="btn form-control" style="background-color: yellowgreen;color:white;" onClick="return confirm('Are You Sure want to submit ?')">
                    
                  </div>
      </div>
                        
                      </form>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
             </section>
          </div>
          <!-- /.container-fluid -->
       
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php 
require_once("common/footer.php");
require_once("common/script.php");

?>
 <script>
 
 function getSubCat(value) {
  $.ajax({
    type: "POST",
    url: 'get_sub_categories.php',
    data: {
      cat_id: value   
    },
    success: function(data) {
      $("#sub_cat_id").html(data);
    }
  });
}


function getModelNumber(value){
   
     $.ajax({
    type: "POST",
    url: 'get_model_number.php',
    data: {
      brand_id: value   
    },
    success: function(data) {
       
      $("#model_number_id_get").html(data);
    }
  });
}
    $(document).ready(function () {
      $('input[type=file]').change(function () {
        var val = $(this).val().toLowerCase();
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png|PNG|webp)$");
        if (!(regex.test(val))) {
          $(this).val('');
          alert('Please select correct file format ( jpg|jpeg|png|PNG|webp )');
        }
      });
    });
  
var loadFile = function(event) {
var output = document.getElementById('output_banner');
output.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile2 = function(event) {
var output = document.getElementById('output2');
output.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile3 = function(event) {
var output = document.getElementById('output3');
output.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile4 = function(event) {
var output4 = document.getElementById('output4');
output4.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile5 = function(event) {
var output4 = document.getElementById('output5');
output5.src = URL.createObjectURL(event.target.files[0]);
};
</script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>


        </body>
        </html>