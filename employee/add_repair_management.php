<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM repair_managment WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
	$customer_id = $value_emp->customer_id;
}

 function generateRandomPassword($length = 35) {
    $characters = 'abcdefghijklmnopqrstuvwxyz'.time();
    $password = '';
  
    $maxIndex = strlen($characters) - 1;
  
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $maxIndex);
        $password .= $characters[$randomIndex];
    }
  
    return $password;
}

// Usage:
$genrated_url = generateRandomPassword(8);


$value_enge_id = '';             
$value_employee1 = '';
$data_ebg = $db->query("SELECT * FROM `employee` INNER JOIN `employee_user_type` ON `employee`.`id` = `employee_user_type`.`employee_id` INNER JOIN `user_type` ON `user_type`.`id` = `employee_user_type`.`user_type_id` INNER JOIN `employee_store` ON `employee`.`id` = `employee_store`.`employee_id` INNER JOIN `store` ON `store`.`id` = `employee_store`.`store_id` WHERE `user_type`.`user_type` = 'Engineer' AND `store`.`id` = '$store_id' ORDER BY RAND() LIMIT 1;");
while($value_eng = $data_ebg->fetch_object()){
$data_emp = $db->query("SELECT * FROM employee WHERE id='$value_eng->employee_id'");
	$value_employee = $data_emp->fetch_object();
$value_employee1 = $value_employee->employee_id;
$value_enge_id = $value_eng->employee_id;
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
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa fa-wrench" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Repair</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="repair_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
             
        <form role="form" method="post" enctype="multipart/form-data" action="repair_management_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Repair Details:-</b></h4>
              <hr> </div>
          
          
						 <div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Name <b style="color:red;"><sup>*</sup></b></label>
								<select class="form-control select2" name="customer_id">
									<option value="">Select Customer</option>
									 <?php 
                   $data1 = $db->query("SELECT * FROM `customer_managment` ORDER BY id ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($customer_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?>-<?php echo  $value1->mobile_number; ?></option>
                      <?php } ?>
								</select>
								 </div>
						</div>
						
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>IMEI</label>
								<input type="text" name="imei" value="<?php echo $value_emp->imei; ?>" class="form-control" oninput="validateNumberInput(this)"> </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Product Password</label>
								<input type="text" name="password" value="<?php echo $value_emp->password; ?>" class="form-control"> </div>
						</div>
						
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Customer Remark</label>
								<input type="text" name="customer_remark" value="<?php echo $value_emp->customer_remark; ?>" class="form-control"> </div>
						</div>

					


						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Problem Diagnosed<b style="color:red;"><sup>*</sup></b></label>
								<input type="text" name="problem_diagnosis" value="<?php echo $value_emp->problem_diagnosis; ?>" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Estimated Repairing Time</label>
								<input type="datetime-local" name="est_repair_time" value="<?php echo $value_emp->est_repair_time; ?>" class="form-control"> </div>
						</div>

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Risk(if any)</label>
								<input type="text" name="risk" value="<?php echo $value_emp->risk; ?>" class="form-control"> </div>
						</div>

					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Payment Mode</label>
								<select class="form-control select2" name="repair_mode">
									<option value="0">Choose Payment Mode</option>
									<option value="Cash" <?php if ($value_emp->repair_mode=='Cash') { echo "selected";} ?>>Cash</option>
									<option value="Online" <?php if ($value_emp->repair_mode=='Online') { echo "selected";} ?>>Online</option>
									<option value="Credit" <?php if ($value_emp->repair_mode=='Credit') { echo "selected";} ?>>Credit</option>
								<option value="Pay_later" <?php if ($value_emp->repair_mode=='Pay_later') { echo "selected";} ?>>Pay Later</option>
								<!-- paylatter work left -->
								</select>
							</div>
						</div>
					
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
							    	<label>Engg Code <b style="color:red;"><sup>*</sup></b></label>
							    	<select class="form-control select2" name="engineer_id" id="engineer_id" required>
			<option value="0">Select Engg Code</option>
																	
	<?php 
   $data_ebg = $db->query("SELECT * FROM `employee` INNER JOIN `employee_user_type` ON `employee`.`id` = `employee_user_type`.`employee_id` INNER JOIN `user_type` ON `user_type`.`id` = `employee_user_type`.`user_type_id` INNER JOIN `employee_store` ON `employee`.`id` = `employee_store`.`employee_id` INNER JOIN `store` ON `store`.`id` = `employee_store`.`store_id` WHERE `user_type`.`user_type` = 'Engineer' AND `store`.`id` = '$store_id' ORDER BY RAND() LIMIT 1;");
while($value_eng = $data_ebg->fetch_object()){
$data_emp = $db->query("SELECT * FROM employee WHERE id='$value_eng->employee_id'");
	$value_employee = $data_emp->fetch_object(); ?>
    
    
		<option value="<?php echo $value_eng->employee_id; ?>">
		<?php echo $value_employee->employee_id; ?>-<?php echo $value_employee->first_name; ?>
		</option>
	<?php } ?>
</select>


							   <input type="hidden" name="salesman" value="<?php echo $a_idchk; ?>">
							 </div>
						</div>

					

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Warranty(in Days)</label>
								<select class="form-control select2" name="warranty_in_days">
									<option value="0">Select Warranty Days</option>
									<option value="0_days" <?php if ($value_emp->warranty_in_days=='0_days') { echo "selected";} ?>>0 Days</option>
									<option value="7_days" <?php if ($value_emp->warranty_in_days=='7_days') { echo "selected";} ?>>7 Days</option>
									<option value="15_days" <?php if ($value_emp->warranty_in_days=='15_days') { echo "selected";} ?>>15 Days</option>
									<option value="30_days" <?php if ($value_emp->warranty_in_days=='30_days') { echo "selected";} ?>>30 Days</option>
									<option value="90_days" <?php if ($value_emp->warranty_in_days=='90_days') { echo "selected";} ?>>90 Days</option>
									<option value="180_days" <?php if ($value_emp->warranty_in_days=='180_days') { echo "selected";} ?>>180 Days</option>
									<option value="360_days" <?php if ($value_emp->warranty_in_days=='360_days') { echo "selected";} ?>>360 Days</option>


								</select>
								 </div>
						</div>

						

						<div class="col-lg-3 col-sm-6 col-12">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									 <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
								</select>
							</div>
						</div>
						
						
           <!-- add product section -->
         

           <div class="col-lg-12 col-sm-12 col-12 mb-4">
           	<div class="row">
           		<div class="col-md-10">
           			<input type="text" id="product_url" placeholder="Enter scan code" class="form-control" autofocus renat="server" onkeyup="AddMore(this.value)">
           		</div>
           		<div class="col-md-2">
           		<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
											</div>
										</div>
									</div>
           	</div>
										
										<table class="mytabledesing" width="100%">
											<thead style="background: #1b2850;">
											<tr>
											<th>Product</th>
											<th>Variation</th>
											<th>Sub Variation</th>
											<th>Quantity</th>
											<th>Rate</th>
											<th>Discount</th>
											<th>SERVICE TAX (GST)</th>
											<th>Total Value</th>
											<th>Action</th>
										</tr>
											</thead>
										

											<tbody id="Tbodyinvoice">



<tr id="TRbodyinvoice">
	<td id="mysort" width="170">
			<select class="form-control product_id" name="product_id[]" id="product_id" required>
			<option value="0">Select Product</option>
																	
	<?php 
    $data_product = $db->query("SELECT * FROM `products`");
    while ($value_products = $data_product->fetch_object()) { ?>
		<option value="<?php echo $value_products->id; ?>">
		<?php echo $value_products->products_title; ?>
		</option>
	<?php } ?>
</select>


		
	</td>
 <td id="mysort" width="150">
		<select class="form-control variation_id" name="variation_id[]" id="variation_id" required>
				<option value="0">Variation</option>
	 <?php 
    $data1 = $db->query("SELECT * FROM `variation`");
    while ($value1 = $data1->fetch_object()) { ?>
    <option value="<?php echo $value1->id; ?>" <?php if($value_emp->brand_id===$value1->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value1->variation_name; ?></option>
    <?php } ?>
   </select>
	</td>
<td id="mysort" width="150">
	<select class="form-control sub_variation_id" name="sub_variation_id[]" id="sub_variation_id" required>
		<option value="0">Sub Variation</option>
																	
 <?php 
  $data2 = $db->query("SELECT * FROM `sub_variation`");
   while ($value2 = $data2->fetch_object()) { ?>
    <option value="<?php echo $value2->id; ?>" <?php if($value_emp->brand_id===$value2->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value2->sub_variation_name; ?></option>
 <?php } ?>
</select>
</td>
<td width="50">
<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice" placeholder="Qty" onchange="Calc(this)" required> </td>
<td width="130">
<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice" placeholder="Rate" onchange="Calc(this)"  required> </td>

<td width="130">
<input type="text" name="discount_invoice[]" class="discount_invoice form-control text-center" id="discount_invoice" placeholder="Discount" onchange="Calc(this)"  required> </td>

<td width="130">
<input type="text" name="gst_invoice[]" class="gst_invoice form-control text-center" id="gst_invoice" placeholder="SERVICE TAX (GST)" onchange="Calc(this)"  required> 


	<input type="hidden" name="total_gst_amount_first[]" class="total_gst_amount_first" id="total_gst_amount_first"> 

<!-- total product purchase amount -->
	<input type="hidden" name="total_purchase_amount_first[]" class="total_purchase_amount_first" id="total_purchase_amount_first"> 
</td>

<!-- total serveice tax -->


<td width="130">
	<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" required readonly> </td>


<td class="text-center justify-conent-center">
	<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
</td>
</tr>








											</tbody>



											<tbody width="100%">
										<tr>
											<td colspan="6" style="text-align: center;"> Total Spare Value With GST</td>
											<td colspan="3">
												<input type="text" name="total_2" class="total_2 form-control text-center total_2" placeholder="Total Value of Spare" id="total_2" value="<?php echo $value_emp->total_2;?>" readonly> </td>
										</tr>


<tr>
											<td colspan="2" style="text-align: center;"> Service Charge </td>
											<td colspan="3">
												<input type="text" name="service_charge" class="service_charge form-control text-center" placeholder="Total Value of Service Charge" id="service_charge" value="<?php echo $value_emp->total_2;?>" onchange="Calc2(this)"> </td>
												<td colspan="1">
												<input type="text" name="service_charge_tax" class="service_charge_tax form-control text-center" placeholder="SERVICE TAX (GST)" id="service_charge_tax" value="<?php echo $value_emp->total_2;?>" onchange="Calc2(this)"> </td>
											<td colspan="3">
												<input type="text" name="total_service_charge" class="total_service_charge form-control text-center" placeholder="Total Value of Service Charge" id="total_service_charge" value="<?php echo $value_emp->total_2;?>" onchange="Calc2(this)"> </td>
										</tr>

												<tr>
											<td colspan="2" style="text-align: center;"> Other</td>
											<td colspan="4" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name"  value="<?php echo $value_emp->miscs_name; ?>"></td>
											<td colspan="3">
												<input type="text" name="total_miscs" class="total_miscs form-control text-center" placeholder="Total Misc Value" id="total_miscs" value="<?php echo $value_emp->total_miscs ?>" onchange="Calc2(this)"> </td>
										</tr>


									
										
							

										
									

								

										<tr>
											<td colspan="6" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getMiscOff(this)" value="<?php echo $value_emp->round_off; ?>"> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="2">Total </th>
											<th colspan="1"><input type="text" name="total_service_tax" class="total_service_tax text-center" placeholder="Total Service Tax" id="total_service_tax" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->total_quntity;?>" ></th>

											<th colspan="1"><input type="text" name="total_service_tax_amount" class="total_service_tax_amount text-center" placeholder="Total Service Tax Amount" id="total_service_tax_amount" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->total_quntity;?>" ></th>

											<th colspan="1"><input type="text" name="total_product_purchase_amount" class="total_product_purchase_amount text-center" placeholder="Total Product Purchase Amount" id="total_product_purchase_amount" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->total_quntity;?>" ></th>

											<th colspan="1"><input type="text" name="all_quantity" class="all_quantity text-center" placeholder="Total Quantity" id="all_quantity" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->total_quntity;?>" ></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $value_emp->total_amount;?>" id="total3"></th>
										</tr>
									</thead>
										</table>
									</div>

           <!-- end product section -->
           
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="<?php if($action == 'update'){echo "update";}else{echo "publish";} ?>" />
				<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
							  
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			
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
<script src="dist/js/add_repair.jsx"></script>
</body>
</html>