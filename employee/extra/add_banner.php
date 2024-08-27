<?php 
require_once("common/header.php");
?>
  <?php require_once("common/navbar.php");
require_once("common/sidebar.php");
?>
    <?php

if($_GET['action']){
$action = $_GET['action'];
$id = $_GET['post'];
$get_data = "SELECT * FROM banner WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();
$banner_title = $data['banner_title'];
$banner_url = $data['banner_url'];
$page_type = $data['page_type'];
$banner_type = $data['banner_type'];
$banner_content = $data['banner_content'];
$sort_order = $data['sort_order'];
$banner_status = $data['banner_status'];
$banner_image = $data['banner_image'];

}

?> ?>
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
                        <h5> <?php if($action == 'update'){ echo "Update Banner"; }else{
                          echo "Add Banner";
                        }?></h5> </div>
                    </div>
                    <!--  -->
                  </div>
                  <div class="card-body border">
                    <form role="form" method="post" enctype="multipart/form-data" action="banner_action.php">
                      <div class="row">
                        <!-- registration page -->
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Banner Title:</label>
                                <input type="text" class="form-control input-sm" name="banner_title" id="title" value="<?php echo $banner_title; ?>"> </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Banner Url :</label>
                                <input type="url" class="form-control input-sm" name="banner_url" id="title" value="<?php echo $banner_url; ?>"> </div>
                            </div>


                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Page Type :</label>
                                <select class="form-control" name="page_type">
                                  <option value="home_top" <?php if($page_type == 'home_top'){echo "selected";} ?>>Home Top</option>
                                  <option value="restaurant_top" <?php if($page_type == 'restaurant_top'){echo "selected";} ?>>Restaurant Top</option>
                                </select> </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Banner Type :</label>
                                <select class="form-control" name="banner_type">
                                  <option value="top_banner" <?php if($banner_type == 'top_banner'){echo "selected";} ?>>Top Banner</option>
                                  <option value="offer_banner" <?php if($banner_type == 'offer_banner'){echo "selected";} ?>>Offer Banner</option>
                                  <option value="footer_banner" <?php if($banner_type == 'footer_banner'){echo "selected";} ?>>Footer Banner</option>
                                </select> </div>
                            </div>
                            
                            <div class="col-md-12">
                              <label  for="keywords">  Banner Content :</label>
                              <textarea class="form-control input-sm" name="banner_content" id="meta_description" rows="3"><?php echo $banner_content; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <?php 
            if(!empty($banner_image)){
              ?>
              <div class="form-group">
              <label for="photo">Banner Image :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="banner_image" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red;">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_banner" src ="upload/banner-images/<?php echo $banner_image; ?>" height="100"/>
        </div>
              
                          <?php } else { ?>  
                           <div class="form-group">
              <label for="photo">Banner Image :</label>
              <input  style="padding: 4px 5px 34px; height: 31px;"  type="file" class="form-control input-sm" name="banner_image" accept="image/*" onchange="loadFile(event)">
              <span class="help-block" style="color:red;">Browse only .jpg /.JPEG /.png /.PNG image.(Dimension:1920 X 820 px)</span> 
        <img id="output_banner" src ="dist/img/No-Image-Basic.png" height="100"/>
        </div>
                            <?php } ?> 
                            </div>
                            
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Sort Order:</label>
                                <input type="number" class="form-control input-sm" name="sort_order" id="sort_order" value="<?php if($sort_order == ''){echo "0";}else{echo $sort_order; } ?>"> </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="title">Status:</label>
                                <select class="form-control" name="status">
                                  <option value="enable" <?php if($banner_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($banner_status == 'disable'){echo "selected"; } ?>>Disable</option>
                                </select> </div>
                            </div>
                          </div>
                        </div>
                        <!-- enquiry type -->
                      </div>
                        <!--  -->
                        <div class="col-md-12 mt-5">
      <div class="form-group ">
                      
                <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                      <input type="submit" name="submitf" id="submit" value="<?php if($action == 'update'){echo "Update";}else{echo "Publish";} ?>" class="btn form-control" style="background-color: yellowgreen;color:white;" onClick="return confirm('Are You Sure want to submit ?')">
                    <span id='message'></span>
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
var output = document.getElementById('output_banner');
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
        </body>
        </html>