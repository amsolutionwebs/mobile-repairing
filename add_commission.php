<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM employee_commission WHERE employee_id='$id'");
	$value_emp = $data_emp->fetch_object();
	$commission = $value_emp->commission;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Commission Details</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="employee_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="employee_commission_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Commission Details:- <?php echo 	$employee_name; ?></b></h4>
              <hr> </div>
          
             <div class="col-lg-12 col-sm-12 col-12 mb-4">
                     
                     
                      
                      
                      
                      <table class="mytabledesing" width="100%">
                        <thead style="background: #1b2850;">
                          <tr>
                           
                            <th>Commission</th>
                            
                          </tr>
                        </thead>
                        <tbody id="Tbodyvariation">
                          <tr id="TRbodyvariation">
                           
                            
                           
                           <td>
                             <input type="text" class="form-control" name="commision" placeholder="Employee Commission in %" onchange="getUserCommission(this.value)"  value="<?php echo $commission; ?>"/> </td>
                            
                            
                           
                           
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  		
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
				<input type="hidden" id="employee_id" name="employee_id" value="<?php echo $id; ?>">			 	 
			
			
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

function getUserCommission(value){
     var employee_id = $("#employee_id").val();
        $.ajax({
    type: "POST",
    url: 'get_commission_user_already.php',
    data: {
      value: value,
      employee_id : employee_id
      
    },
    	beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
    success: function(data) {
    $("#setloader").removeClass("pageloader");
      if(data.trim()=="yes"){
        alert("Commission is already set and will we update !");
       
        
      }
    }
  });
}
</script>
</body>
</html>