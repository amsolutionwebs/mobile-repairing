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
                    <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;">
                     <i class="fas fa-user-cog" style="font-size: 30px; color:#fff;"></i>
                    </div>
                  </div>
                  <div class="col-10">
                  
                    <h5> All Active Module for Employee</h5>
                    <span>  <?php 
$data4 = $db->query("SELECT count(id) as total_fees FROM user_module WHERE status='enable'");
$total_subscriber = $data4->fetch_object();
echo $total_subscriber->total_fees;

?></span>
                  </div>
                
                 <div class="col-1 px-2 d-flex">
                  <a href="employee_details.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
                
                 
                </div>
               
                 
               </div>
               
                <table id="example1" class="table table-bordered">
                  
                <thead>
                <tr>
                   <th>S.N</th>
                  <th>Employee Id</th>
                  <th>Name</th>
                  
                  <th>Module Name</th>
                  <th>Add</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                    <th>Action</th>
                </tr>
              </thead>

					<tbody>
                 <?php
                    $sl = 0;
                
                    $data1 = $db->query("SELECT * FROM user_module WHERE status='enable'");
                    while ($value1 = $data1->fetch_object()) {
                    $id = $value1->id;
                    $sl++;

                      $data = $db->query("SELECT * FROM employee WHERE id='$value1->employee_id'");
                   $value = $data->fetch_object();

                     $data22 = $db->query("SELECT * FROM module WHERE id='$value1->module_id'");
                   $value22 = $data22->fetch_object();
                                          ?>
                <tr>
                  
                  
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $value->employee_id; ?></td>
                  <td><?php echo $value->first_name; ?></td>
                  
                  <td><?php echo $value22->module_name; ?></td>
                 
              <td>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
<input type="checkbox" class="custom-control-input" id="changePermissionAdd<?php echo $value1->id; ?>" onchange="changePermissionAdd(<?php echo $value1->id; ?>,'<?php echo $value1->add; ?>')" <?php if($value1->add=='yes'){echo "checked";} ?>>
<label class="custom-control-label" for="changePermissionAdd<?php echo $value1->id; ?>"></label>
</div>
          </td>

          <td>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
<input type="checkbox" class="custom-control-input" id="changePermissionView<?php echo $value1->id; ?>" onchange="changePermissionView(<?php echo $value1->id; ?>,'<?php echo $value1->view; ?>')" <?php if($value1->view=='yes'){echo "checked";} ?>>
<label class="custom-control-label" for="changePermissionView<?php echo $value1->id; ?>"></label>
</div>
          </td>
              
              <td>
           <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
<input type="checkbox" class="custom-control-input" id="changePermissionEdit<?php echo $value1->id; ?>" onchange="changePermissionEdit(<?php echo $value1->id; ?>,'<?php echo $value1->edit; ?>')" <?php if($value1->edit=='yes'){echo "checked";} ?>>
<label class="custom-control-label" for="changePermissionEdit<?php echo $value1->id; ?>"></label>
</div>
          </td>

          <td>
           <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
<input type="checkbox" class="custom-control-input" id="changePermissionDelete<?php echo $value1->id; ?>" onchange="changePermissionDelete(<?php echo $value1->id; ?>,'<?php echo $value1->delete_module; ?>')" <?php if($value1->delete_module=='yes'){echo "checked";} ?>>
<label class="custom-control-label" for="changePermissionDelete<?php echo $value1->id; ?>"></label>
</div>    </td>    
                 
                  <td>
                           
                              <a href='employee_module_add_action.php?post=<?php echo $value1->id; ?>&action=delete' title='Delete' onClick="return confirm('Are You Sure want to delete ?')" ><button class='btn btn-xs btn-danger p-1'><i class='fas fa-trash'></i> </button></a>

                   
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
 $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthMenu": [[200, 100, 50, 25], [200, 100, 50, 25]], "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
   function changePermissionAdd(module_id,permission) {
    var foradd = 'foradd';
     $.ajax({
        type: "POST",
        url: 'give_permission_action.php',
        data: {
          foradd: foradd,
          module_id : module_id,
          permission : permission

        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(data) {
           $("#setloader").removeClass("pageloader");
           if(data.trim()=="success"){
              
               window.location = location.href;
           }else{

            alert("Permission change failed");
           }
           
        }
      });

  }


  function changePermissionView(module_id,permission) {
    var forview = 'forview';
     $.ajax({
        type: "POST",
        url: 'give_permission_action.php',
        data: {
          forview: forview,
          module_id : module_id,
          permission : permission

        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(data) {
           $("#setloader").removeClass("pageloader");
           if(data.trim()=="success"){
      
             
               window.location = location.href;
           }else{

            alert("Permission change failed");
           }
           
        }
      });

  }


  // for edit
  function changePermissionEdit(module_id,permission) {
    var foredit = 'foredit';
     $.ajax({
        type: "POST",
        url: 'give_permission_action.php',
        data: {
          foredit: foredit,
          module_id : module_id,
          permission : permission

        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(data) {
 
           $("#setloader").removeClass("pageloader");
           if(data.trim()=="success"){
             
              window.location = location.href;
           }else{

            alert("Permission change failed");
           }
           
        }
      });

  }

  // for delete

  function changePermissionDelete(module_id,permission) {
    var fordelete = 'fordelete';
     $.ajax({
        type: "POST",
        url: 'give_permission_action.php',
        data: {
          fordelete: fordelete,
          module_id : module_id,
          permission : permission

        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(data) {
           $("#setloader").removeClass("pageloader");
           if(data.trim()=="success"){
              
               window.location = location.href;
           }else{

            alert("Permission change failed");
           }
           
        }
      });

  }
</script>
</body>
</html>