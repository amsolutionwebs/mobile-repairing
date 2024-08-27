<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if($_GET['action']){
$action = $_GET['action'];
$id = $_GET['post'];
$get_data = "SELECT * FROM category WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();
$category_title = $data['category_title'];
$category_description = $data['category_description'];
$seo_title = $data['seo_title'];
$category_images = $data['category_images'];
$post_status = $data['status'];
$sort_order = $data['sort_order'];
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
              <div class="row py-2 px-1 border-bottom" style="background: #e0f7e870;">
                <div class="col-11 px-2 d-flex">
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center">Add Category</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="user_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
               <form autocomplete="off" method="post"  enctype="multipart/form-data" action="category_action.php">
        
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Category Details:-</b></h4>
              <hr> </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Category Title</label>
                <br>
                <input type="text" name="category_title" value="<?php echo $category_title; ?>" class="form-control"> </div>
            </div>
            <!-- student ad date -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Category Description</label>
                <input type="text" name="category_description" placeholder="" value="<?php echo $category_description; ?>" class="form-control"> </div>
            </div>
          
             <div class="col-md-6">
                              <div class="form-group">
                                <label for="title">Status:</label>
                                <select class="form-control" name="status">
                                  <option value="enable" <?php if($post_status=='enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status=='disable'){echo "selected"; } ?>>Disable</option>
                                </select> </div>
                            </div>

              <div class="col-md-6">
               <div class="form-group">
                                <label for="title">Sort Order:</label>
                                <input type="number" class="form-control input-sm" name="sort_order" id="sort_order" value="<?php if($sort_order==''){echo "0";}else{echo $sort_order; } ?>"> </div>
            </div>

          
            
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Category Images:-</b></h4>
              <hr> </div>
          

                <div class="col-md-12">
                              <?php 
            if(!empty($category_images)){
              ?>
              <div class="form-group">
              <label for="photo">Category Images :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="category_images" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red; font-size:10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_category" src ="<?php echo $category_images; ?>" height="100"/>
        </div>
              
                          <?php } else { ?>  
                           <div class="form-group">
              <label for="photo">Category Images :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="category_images" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red;font-size: 10px;display: flex;">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_category" src ="dist/img/No-Image-Basic.png" height="100"/>
        </div>
                            <?php } ?> 
                            </div>


           
            <div class="col-md-12">
              <input type="hidden" name="submit" value="<?php if($action=='update'){echo "update";}else{echo "publish";} ?>" />
              <input type="hidden" name="post_id" value="<?php echo $id; ?>">
              <input type="submit" name="submitf" id="submit" value="<?php if($action=='update'){echo "Update";}else{echo "Publish";} ?>" class="btn btn-primary float-right" onClick="return confirm('Are You Sure want to submit ?')"> </div>
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

 <script>
    $(document).ready(function () {
      $('input[type=file]').change(function () {
        var val = $(this).val().toLowerCase();
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png|PNG)$");
        if (!(regex.test(val))) {
          $(this).val('');
          alert('Please select correct file format ( jpg|jpeg|png|PNG )');
        }
      });
    });
  </script>
  <script>
var loadFile = function(event) {
var output = document.getElementById('output_category');
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</body>
</html>