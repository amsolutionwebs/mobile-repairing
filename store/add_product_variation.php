<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM product_variation WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
}

$id = $_GET['post'];
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Product Variation</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="single_product_variation.php?post=<?php echo $product_id; ?>" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="product_variation_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            
            <div class="col-lg-12 col-sm-12 col-12 mb-4">
                     
                     
                      <div class="table-top mb-1 <?php if($action ==='update'){echo 'd-none';} ?>">
                        <div class="wordset">
                          <button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
                        </div>
                      </div>
                      
                      
                      <table class="mytabledesing" width="100%">
                        <thead style="background: #1b2850;">
                          <tr>
                           <th>Variation</th>
                            <th>Variation Type</th>
                            <th>Sub Variation Name</th>
                            <th>Quantity</th>
                            <th>Purchase Price</th>
                            <th>Price</th>
                            <th>Discounted Price</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="Tbodyvariation">
                          <tr id="TRbodyvariation">
                           
                             <td>
                                  <select class="form-control" name="variation[]" id="variation">
                                  <option value="">Select Variation</option>
           <?php 
                   $data1 = $db->query("SELECT * FROM `variation`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>" <?php if($value_emp->variation_id===$value1->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value1->variation_name; ?></option>
                      <?php } ?>
                                </select>
                              </td>

                           
                               <td>
                                  <select class="form-control" name="variation_id[]" id="variation_id">
                                  <option value="">Select Variation</option>
           <?php 
                   $data1 = $db->query("SELECT * FROM `variation`");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>" <?php if($value_emp->variation_id===$value1->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value1->variation_name; ?></option>
                      <?php } ?>
                                </select>
                              </td>
                              <td>
                                  <select class="form-control" name="sub_variation_id[]" id="sub_variation_id">
                                	<option value="">Select Sub Variation</option>
           <?php 
                   $data2 = $db->query("SELECT * FROM `sub_variation`");
                    while ($value2 = $data2->fetch_object()) { ?>
                      <option value="<?php echo $value2->id; ?>" <?php if($value_emp->sub_variation_id===$value2->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value2->sub_variation_name; ?></option>
                      <?php } ?>
                                </select>
                              </td>

                              <td><input type="text" name="quantity[]" class="form-control" placeholder="Quantity" value="<?php echo $value_emp->qty; ?>" oninput="validateNumberInput(this)"/></td>

                              <td><input type="text" name="purchase_price[]" class="form-control" placeholder="P.O Price" value="<?php echo $value_emp->purchase_price; ?>" oninput="validateNumberInput(this)"/></td>

                              

                            <td><input type="text" name="price[]" class="form-control" value="<?php echo $value_emp->price; ?>" placeholder="Price" oninput="validateNumberInput(this)"/></td>
                             
                             <td><input type="text" name="discunted_price[]" value="<?php echo $value_emp->discounted_price; ?>" class="form-control" placeholder="Discounted Price"  oninput="validateNumberInput(this)"/></td>
                        
                             <td>
                              <select class="form-control" name="status[]">
                                  
                                  <option value="enable" <?php if($value_emp->status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($value_emp->status == 'disable'){echo "selected"; } ?>>Disable</option>
                                </select>
                            </td>
                            
                           
                            <td class="text-center justify-conent-center">
                              <button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this)" <?php if($action ==='update'){echo 'disabled';} ?>> <i class="fas fa-times text-light"></i> </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
					
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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
  $(tbd).find('#variation_id').each(function() {
    $(this).on("change", function() {
      var variation_id = $(this).val();
   
      $.ajax({
        type: "POST",
        url: 'get_sub_variation_for_add.php',
        data: {
          variation_id: variation_id
         
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
     $(tbd).find("#sub_variation_id").html(response);
        }
      });
    });
  });
  
}

function TableDelete(btndelete) {
  $(btndelete).parent().parent().remove();

}

function getSubCategory(value){
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


$(document).ready(function() {
  $('#variation_id').each(function() {
    $(this).on("change", function() {
      var variation_id = $(this).val();
   
      $.ajax({
        type: "POST",
        url: 'get_sub_variation_for_add.php',
        data: {
          variation_id: variation_id
         
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
      $("#sub_variation_id").html(response);
        }
      });
    });
  });
});



</script>
</body>
</html>