<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['action'])){
$action = $_GET['action'];
$id = $_GET['post'];
$product_id = $_GET['product_id'];
$get_data = "SELECT * FROM product_images WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();

$status = $data['status'];

$product_images = $data['product_images'];

}

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
              <div class="row py-2 px-1 border-bottom" style="background: #e0f7e870;">
                <div class="col-11 px-2 d-flex">
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Prodcut Image </h5><br>

                   </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="product_images_list.php?product_id=<?php echo $product_id; ?>&action=add" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="product_images_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            
            <div class="col-md-6">
                              <?php 
            if(!empty($product_images)){
              ?>
              <div class="form-group">
              <label for="photo">Products Image : <span style="color:red;">You can select multiple image</span></label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="products_image[]" accept="image/*" onchange="loadFile(event)" multiple>
              <span class="help-block" style="color:red; font-size:10px">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_banner" src ="upload/post-images/<?php echo $product_images; ?>" height="80"/>
        </div>
              
                          <?php } else { ?>  
                           <div class="form-group">
              <label for="photo">Products Image : <span style="color:red;">You can select multiple image</span></label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="products_image[]" accept="image/*" onchange="loadFile(event)" multiple>
              <span class="help-block" style="color:red;font-size: 10px;">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_banner" src ="dist/img/No-Image-Basic.png" height="80"/>
        </div>
                            <?php } ?> 
                            </div>

                              <div class="col-md-6">
                              <div class="form-group">
                                <label for="title">Status:</label>
                                <select class="form-control" name="status">
                                  <option value="enable" <?php if($status=='enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($status=='disable'){echo "selected"; } ?>>Disable</option>
                                </select> </div>
                            </div>


					
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
					<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

              <input type="submit" value="<?php if($action=='update'){echo "Update";}else{echo "Submit";} ?>" class="btn btn-primary float-right"> </div>
            <!--  -->
            
          </div>
          </form>
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

<script type="text/javascript">
  function AddMore() {
  var tbd = $("#TRbodyvariation").clone().appendTo("#Tbodyvariation");
  $(tbd).find("input").val('');
  
}

function TableDelete(btndelete) {
  $(btndelete).parent().parent().remove();

}

var loadFile = function(event) {
var output = document.getElementById('output_banner');
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
</body>
</html>