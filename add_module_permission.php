<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM user_type WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
}

$data_employee = $db->query("SELECT * FROM employee WHERE id='$id'");
	$value_employee = $data_employee->fetch_object();
	$employee_name = $value_employee->first_name." ".$value_employee->last_name;
    


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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Module Permission For Employee</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="employee_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="employee_module_permission_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Module Permission Details:- <?php echo $employee_name; ?></b></h4>
              <hr> </div>
          
             <div class="col-lg-12 col-sm-12 col-12 mb-4">
                     
                     
                      <div class="table-top mb-1 <?php if($action ==='update'){echo 'd-none';} ?>">
                        <div class="wordset">
                          <button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
                        </div>
                      </div>
                      
                      
                      <table class="mytabledesing" width="100%">
                        <thead style="background: #1b2850;">
                          <tr>
                           	
                           	<th>Module</th>
                            <th>Permission</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="Tbodyvariation">
                          
                           <?php
                   
                    $data_permission = $db->query("SELECT * FROM employee_permission WHERE employee_id='$id'");
                    while ($value_permission = $data_permission->fetch_object()) {
                   
                                          ?>
                          
                          <tr id="TRbodyvariation1">
                           
                            
                           
                           <td>
                              <select class="form-control" name="module_id_update[]" required>
                                	<option value="">Select Module</option>
           <?php 
                   $data12 = $db->query("SELECT DISTINCT module_id FROM `user_module` WHERE `employee_id`='$id'");
                    while ($value12 = $data12->fetch_object()) { 
                    
                    $data1 = $db->query("SELECT * FROM `module` WHERE id='$value12->module_id'");
                    $value1 = $data1->fetch_object();
                    
                    
                    
                    
                    ?>
                      <option value="<?php echo $value1->id; ?>"   style="text-transform: uppercase;" <?php if($value_permission->module_id==$value1->id){echo "selected";} ?>><?php echo  $value1->module_name; ?></option>
                      <?php } ?>
                                </select> </td>

                                <td>
                              <select class="form-control" name="permission_update[]" required>
                                	<option value="0">Select Permission</option>
		           					<option value="view" <?php if($value_permission->permission=='view'){echo "selected";} ?>>View</option>
		           					<option value="edit" <?php if($value_permission->permission=='edit'){echo "selected";} ?>>Edit</option>
		           					<option value="delete" <?php if($value_permission->permission=='delete'){echo "selected";} ?>>Delete</option>
                                </select> </td>
                            
                            <td>
                              <select class="form-control" name="status_update[]">
                                  
                                  <option value="enable" <?php if($value_permission->status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($value_permission->status == 'disable'){echo "selected"; } ?>>Disable</option>
                                </select>
                            </td>
                            
                           
                            <td class="text-center justify-conent-center">
                              <input type="hidden" name="post_id_update[]" value="<?php echo $value_permission->id; ?>" />
                               <a href="delete_action.php?delete_user_permission=delete_user_permission&employee_permission_id=<?php echo $value_permission->id; ?>&emloyee_id=<?php echo $id; ?>" onClick="return confirm('Are You Sure want to delete ?')" class="btn btn-filter setclose" style="background: #ea5455;" <?php if($action ==='update'){echo 'disabled';} ?>> <i class="fas fa-times text-light"></i> </a>
                            </td>
                          </tr>
                          
                          <?php } ?>
                          
                          
                        <tr id="TRbodyvariation">
                           
                            
                           
                           <td>
                              <select class="form-control" name="module_id[]" required>
                                	<option value="">Select Module</option>
           <?php 
                   $data12 = $db->query("SELECT DISTINCT module_id FROM `user_module` WHERE `employee_id`='$id'");
                    while ($value12 = $data12->fetch_object()) { 
                    
                    $data1 = $db->query("SELECT * FROM `module` WHERE id='$value12->module_id'");
                    $value1 = $data1->fetch_object();
                    
                    
                    
                    
                    ?>
                      <option value="<?php echo $value1->id; ?>"   style="text-transform: uppercase;" <?php if($value_permission->module_id==$value1->id){echo "selected";} ?>><?php echo  $value1->module_name; ?></option>
                      <?php } ?>
                                </select> </td>

                                <td>
                              <select class="form-control" name="permission[]" required>
                                	<option value="0">Select Permission</option>
		           					<option value="view" <?php if($value_permission->permission=='view'){echo "selected";} ?>>View</option>
		           					<option value="edit" <?php if($value_permission->permission=='edit'){echo "selected";} ?>>Edit</option>
		           					<option value="delete" <?php if($value_permission->permission=='delete'){echo "selected";} ?>>Delete</option>
                                </select> </td>
                            
                            <td>
                              <select class="form-control" name="status[]">
                                  
                                  <option value="enable" <?php if($value_permission->status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($value_permission->status == 'disable'){echo "selected"; } ?>>Disable</option>
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
				<input type="hidden" name="employee_id" value="<?php echo $id; ?>">			 	 
			
			
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
</script>
</body>
</html>