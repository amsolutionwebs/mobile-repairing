
<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['sales_id']))
{
  $action = $_GET['action'];
  $sales_id = $_GET['sales_id'];
  $data_emp = $db->query("SELECT * FROM sales_managment WHERE id='$sales_id'");
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

$value_employee1 = '';
$data_ebg = $db->query("SELECT * FROM employee_user_type WHERE user_type_id='7'");
              while($value_eng = $data_ebg->fetch_object()){
                $data_emp = $db->query("SELECT * FROM employee WHERE id='$value_eng->employee_id'");

                $value_employee = $data_emp->fetch_object();
                  echo $value_employee1 = $value_employee->employee_id;
              }

// for sales no

$data = $db->query("SELECT sales_number FROM sales_managment WHERE store_id='$store_id' ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();
$recipt_name = $value->sales_number;
if(empty($recipt_name))
{
  $freciept_name = "SALESINV-"."01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[1]+1;
  $freciept_name = "SALESINV-".'0'.$exe_value;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Sales</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="sales_managment_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="sales_management_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Customer Details For Sales:-</b></h4>
              <hr> </div>
          
           <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Customer Name <b style="color:red;"><sup>*</sup></b></label>
                <button class="btn btn-success btn-sm" style="float:right;" type="button" data-toggle="modal" data-target="#add_customer_modal"><i class="fa fa-plus"></i></button>
                <select class="form-control select2" name="customer_id" id="getCustomerData" disabled>
                  <option value="">Select Customer</option>
                   <?php 
                   $data1 = $db->query("SELECT * FROM `customer_managment` ORDER BY id ASC");
                    while ($value1 = $data1->fetch_object()) { ?>
                      <option value="<?php echo $value1->id; ?>"  <?php if($customer_id===$value1->id){echo 'selected';} ?> style="text-transform: uppercase;"><?php echo  $value1->name; ?></option>
                      <?php } ?>
                </select>
                 </div>
            </div>
            
              <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Sales Number</label>
                <input type="text" name="sales_number" value="<?php if($action == 'update'){echo $value_emp->sales_number;}else{echo $freciept_name;} ?>" class="form-control" placeholder="Enq-123" disabled> </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Sales Date</label>
                <input type="datetime-local" name="sales_date" value="<?php echo $value_emp->sales_date; ?>" class="form-control" disabled> </div>
            </div>
            
              <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Device Type</label>
                  <select class="form-control select2" name="device_type" disabled>
                  <option value="0">Select Device Type</option>
                  <option value="Mobile" <?php if($value_emp->device_type==='Mobile'){echo 'selected';} ?>>Mobile</option>
                  <option value="Laptop" <?php if($value_emp->device_type==='Laptop'){echo 'selected';} ?>>Laptop</option>
                  <option value="Other" <?php if($value_emp->device_type==='Other'){echo 'selected';} ?>>Other</option>
                </select>
                 </div>
            </div>


            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Payment Mode</label>
                <select class="form-control select2" name="payment_mode" disabled>
                  <option value="0">Choose Payment Mode</option>
                  <option value="Cash" <?php if ($value_emp->payment_mode=='Cash') { echo "selected";} ?>>Cash</option>
                  <option value="Online" <?php if ($value_emp->payment_mode=='Online') { echo "selected";} ?>>Online</option>
                  <option value="Credit" <?php if ($value_emp->payment_mode=='Credit') { echo "selected";} ?>>Credit</option>
                <option value="Pay_later" <?php if ($value_emp->payment_mode=='Pay_later') { echo "selected";} ?>>Pay Later</option>
                <!-- paylatter work left -->
                </select>
              </div>
            </div>
          
          

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Salesman Code<b style="color:red;"><sup>*</sup></b></label>
                <input type="text"  value="<?php echo $employee_id; ?>" class="form-control" disabled>

                <input type="hidden" name="salesman" value="<?php echo $a_idchk; ?>"> </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Warranty(in Days) if any</label>
                <select class="form-control select2" name="warranty_in_days" disabled>
                  <option value="0">Select Warranty Days</option>

                  <option value="0_days" <?php if ($value_emp->warranty_in_days=='0_days') { echo "selected";} ?>>0 Days</option>
                  <option value="30_days" <?php if ($value_emp->warranty_in_days=='30_days') { echo "selected";} ?>>30 Days</option>
                  <option value="60_days" <?php if ($value_emp->warranty_in_days=='60_days') { echo "selected";} ?>>60 Days</option>
                  <option value="90_days" <?php if ($value_emp->warranty_in_days=='90_days') { echo "selected";} ?>>90 Days</option>
                  <option value="120_days" <?php if ($value_emp->warranty_in_days=='120_days') { echo "selected";} ?>>120 Days</option>
                  
                  <option value="360_days" <?php if ($value_emp->warranty_in_days=='360_days') { echo "selected";} ?>>360 Days</option>


                </select>
                 </div>
            </div>


            

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" disabled>
                   <option value="enable" <?php if($post_status == 'enable'){echo "selected"; } ?>>Enable</option>
                                  <option value="disable" <?php if($post_status == 'disable'){echo "selected"; } ?>>Disable</option>
                </select>
              </div>
            </div>


            <div class="col-lg-12 col-sm-12 col-12">
              <div class="form-group">
                <label>Customer Address</label>
                <input type="text" name="customer_address" value="<?php echo $value_emp->customer_address; ?>" class="form-control" disabled> </div>
            </div>


             <div class="col-lg-12 col-sm-12 col-12">
              <div class="form-group">
                <label>Customer Remark</label>
                <input type="text" name="customer_remark" value="<?php echo $value_emp->customer_remark; ?>" class="form-control" disabled> </div>
            </div>
            

            
            
  <!-- add product section -->
 <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Product Details For Sales:-</b></h4>
              <hr> </div>
       
                 <div class="col-lg-12 col-sm-12 col-12 mb-4">
									
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

 <?php
    $sales_id = $_GET['sales_id'];
    $data_repair_details = $db->query("SELECT * FROM sales_product_details WHERE sales_id='$sales_id'");
    while ($value_repair_details = $data_repair_details->fetch_object()) {
    
    ?>

<tr width="180">
	<td>
		<select class="form-control product_id" name="product_id[]" id="product_id" disabled>
			<option value="0">Select Product</option>
																	
	<?php 
    $data_product = $db->query("SELECT * FROM `products`");
    while ($value_products = $data_product->fetch_object()) { ?>
		<option value="<?php echo $value_products->id; ?>" <?php if($value_products->id==$value_repair_details->product_id){echo "selected";} ?>>
		<?php echo $value_products->products_title; ?>
		</option>
	<?php } ?>
</select>
	</td>
 <td width="100">
		<select class="form-control variation_id" name="variation_id[]" id="variation_id" disabled>
				<option value="0">Variation</option>
	 <?php 
    $data_variation = $db->query("SELECT * FROM `variation`");
    while ($value_variation = $data_variation->fetch_object()) { ?>
    <option value="<?php echo $value_variation->id; ?>" <?php if($value_repair_details->variation_id==$value_variation->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value_variation->variation_name; ?></option>
    <?php } ?>
   </select>
	</td>
<td width="180">
	<select class="form-control sub_variation_id" name="sub_variation_id[]" id="sub_variation_id" disabled>
		<option value="0">Sub Variation</option>
																	
 <?php 
  $data_sub_v = $db->query("SELECT * FROM `sub_variation`");
   while ($value_sub_v = $data_sub_v->fetch_object()) { ?>
    <option value="<?php echo $value_sub_v->id; ?>" <?php if($value_repair_details->sub_variation_id==$value_sub_v->id) { echo "selected"; } ?>  style="text-transform: uppercase;"><?php echo  $value_sub_v->sub_variation_name; ?></option>
 <?php } ?>
</select>
</td>
<td width="20">
<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice_update" placeholder="Quantity" onchange="Calc(this)" value="<?php echo $value_repair_details->qunatity; ?>" disabled> </td>

<td>
<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice_update" placeholder="Rate" onchange="Calc(this)" value="<?php echo $value_repair_details->rate; ?>"  disabled> </td>

<td width="130">
<input type="text" name="discount_invoice[]" class="discount_invoice form-control text-center" id="discount_invoice_update" placeholder="Discount" onchange="Calc(this)" value="<?php echo $value_repair_details->discount; ?>" disabled> </td>

<td width="130">
<input type="text" name="gst_invoice[]" class="gst_invoice form-control text-center" id="gst_invoice" placeholder="SERVICE TAX (GST)" onchange="Calc(this)" value="<?php echo $value_repair_details->gst ?>" > </td>

<td>
	<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_repair_details->amount; ?>" required readonly> </td>

<td class="text-center justify-conent-center">
	<input type="hidden" name="post_id_update[]" value="<?php echo $value_repair_details->id; ?>" />
<button type="button" class="btn setclose" style="background: #ea5455;" onclick="TableDelete(this,<?php echo $sales_id; ?>,<?php echo $value_repair_details->id; ?>)" disabled> <i class="fas fa-times text-light"></i> </button>


</td>

</tr>


   <?php } ?>




											</tbody>



											<tbody width="100%">
										<tr>
											<td colspan="6" style="text-align: center;"> Total Spare Value With GST</td>
											<td colspan="3">
												<input type="text" name="total_2" class="total_2 form-control text-center total_2" placeholder="Total Value of Spare" id="total_2" value="<?php echo $value_emp->total_2;?>" disabled> </td>
										</tr>


<tr>
											<td colspan="2" style="text-align: center;"> Service Charge </td>
											<td colspan="3">
												<input type="text" name="service_charge" class="service_charge form-control text-center" placeholder="Total Value of Service Charge" id="service_charge" value="<?php echo $value_emp->service_charge;?>" onchange="Calc2(this)" disabled> </td>
												<td colspan="1">
												<input type="text" name="service_charge_tax" class="service_charge_tax form-control text-center" placeholder="SERVICE TAX (GST)" id="service_charge_tax" value="<?php echo $value_emp->service_charge_tax;?>" onchange="Calc2(this)" disabled> </td>
											<td colspan="3">
												<input type="text" name="total_service_charge" class="total_service_charge form-control text-center" placeholder="Total Value of Service Charge" id="total_service_charge" value="<?php echo $value_emp->total_service_charge;?>" onchange="Calc2(this)" disabled> </td>
										</tr>

												<tr>
											<td colspan="2" style="text-align: center;"> Other</td>
											<td colspan="4" style="text-align: center;"> <input type="text" name="miscs_name" class="miscs_name form-control text-center" placeholder="Misc. Name"  value="<?php echo $value_emp->miscs_name; ?>" disabled></td>
											<td colspan="3">
												<input type="text" name="total_miscs" class="total_miscs form-control text-center" placeholder="Total Misc Value" id="total_miscs" value="<?php echo $value_emp->total_miscs ?>" onchange="Calc2(this)" disabled> </td>
										</tr>


								

										<tr>
											<td colspan="6" style="text-align: center;"> Round Offf </td>
									
											<td colspan="3">
												<input type="text" name="round_off" class="round_off form-control text-center" placeholder="Round Off" id="round_off" onchange="getMiscOff(this)" value="<?php echo $value_emp->round_off; ?>" disabled> </td>
										</tr>
									</tbody>
									<thead style="background: #1b2850;">
										<tr>
											<th colspan="4">Total </th>
											<th colspan="2"><input type="text" name="all_quantity" class="all_quantity text-center" placeholder="Total Quantity" id="all_quantity" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->all_quantity;?>" disabled></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $value_emp->total_amount;?>" id="total3" disabled></th>
										</tr>
									</thead>
										</table>
									</div>

           <!-- end product section -->
           
          
            
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
  function AddMore() {
  var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
  $(tbd).find("input").val('');
  $(tbd).find("select").select2();
  $(tbd).removeClass("d-none");

  $(tbd).find('.product_id').each(function() {
    $(this).on("change", function() {
      var product_id = $(this).val();
     
      $.ajax({
        type: "POST",
        url: 'get_variation.php',
        data: {
          product_id: product_id
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
      $(tbd).find("#variation_id").html(response);
        }
      });
    });
  });


    $(tbd).find('.variation_id').each(function() {
    $(this).on("change", function() {
      var variation_id = $(this).val();
      var product_id = $(tbd).find('.product_id').val();
      $.ajax({
        type: "POST",
        url: 'get_sub_variation.php',
         data: {
          variation_id: variation_id,
          product_id: product_id
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


    $(tbd).find('.sub_variation_id').each(function() {
    $(this).on("change", function() {
      var sub_variation_id = $(this).val();
      var variation_id = $(tbd).find('.variation_id').val();
      var product_id = $(tbd).find('.product_id').val();
      $.ajax({
        type: "POST",
        url: 'get_product_final_value_for_repair.php',
        data: {
          sub_variation_id: sub_variation_id,
          variation_id: variation_id,
          product_id: product_id
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
     $(tbd).find("#rate_invoice").val(response);
     Calc();
     total1();
     Calc2();
     getMiscOff();
        }
      });
    });
  });


}


function TableDelete(btndelete,sales_id,product_details_id) {
				var result = confirm("Are you sure you want to delete this sort?");

				if(result){
					$(btndelete).parent().parent().remove();
        	total1(btndelete);

var total_2 = $(".total_2").val();
var service_charge = $(".service_charge").val();
var service_charge_tax = $(".service_charge_tax").val();
var total_service_charge = $('.total_service_charge').val();
var miscs_name = $('.miscs_name').val();
var total_miscs = $('.total_miscs').val();
var round_off = $('.round_off').val();
var all_quantity = $('.all_quantity').val();
var total3 = $('.total3').val();


				var delete_sales_product = 'delete_sales_product';
 						 $.ajax({
        type: "POST",
        url: "delete_action.php",
        data: {
        	delete_sales_product : delete_sales_product,
        	sales_id : sales_id,
        	product_details_id : product_details_id,
        	total_2 : total_2,
        	service_charge : service_charge,
        	service_charge_tax : service_charge_tax,
        	total_service_charge : total_service_charge,
        	miscs_name : miscs_name,
        	total_miscs : total_miscs,
        	round_off : round_off,
        	all_quantity : all_quantity,
        	total3 : total3
        },
        success: function(e){
        
        if(e.trim()=="success"){
        	window.location = location.href;
        }else{
        	window.location = location.href;
        }

         }  
 							
		       
		    });
 						
	
}}


$(document).ready(function() {
  $('.product_id').each(function() {
    $(this).on("change", function() {
      var product_id = $(this).val();
      $.ajax({
        type: "POST",
        url: 'get_variation.php',
        data: {
          product_id: product_id
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
      $("#variation_id").html(response);
        }
      });
    });
  });
});


$(document).ready(function() {
  $('.variation_id').each(function() {
    $(this).on("change", function() {
      var variation_id = $(this).val();
      var product_id = $('.product_id').val();
      $.ajax({
        type: "POST",
        url: 'get_sub_variation.php',
        data: {
          variation_id: variation_id,
          product_id: product_id
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


$(document).ready(function() {
  $('.sub_variation_id').each(function() {
    $(this).on("change", function() {
      var sub_variation_id = $(this).val();
      var variation_id = $('.variation_id').val();
      var product_id = $('.product_id').val();
      $.ajax({
        type: "POST",
        url: 'get_product_final_value_for_repair.php',
        data: {
          sub_variation_id: sub_variation_id,
          variation_id: variation_id,
          product_id: product_id
        },
        beforeSend: function() {
          $("#setloader").addClass("pageloader");
        },
        success: function(response) {
            $("#setloader").removeClass("pageloader");
      
      $("#rate_invoice").val(response);
    
      Calc();
     total1();
     Calc2();
     getMiscOff();
        }
      });
    });
  });
});


function Calc(value) {
  var index = $(value).parent().parent().index();
  var qty = document.getElementsByName("quantity_invoice[]")[index].value;
  var rate = document.getElementsByName("rate_invoice[]")[index].value;
  var discount = document.getElementsByName("discount_invoice[]")[index].value;
  var gst = document.getElementsByName("gst_invoice[]")[index].value;
  var amt = (qty) * (rate)-(discount);

  var final_with_gst = (amt * gst) / 100;
  var final_value_first = +(amt)+ +(final_with_gst);
  document.getElementsByName("total_amount_first[]")[index].value = final_value_first.toFixed(2);
  total1();
}

function total1(value) {
	var amts = document.getElementsByName("total_amount_first[]");
  var sum = 0;
  for(let i = 0; i < amts.length; i++) {
    var total2 = amts[i].value;
    sum = +(sum) + +(total2);
  }

  document.getElementById("total_2").value = (sum);
  
  var units_all = document.getElementsByName("quantity_invoice[]");
  var sum_units = 0;
  for(let i = 0; i < units_all.length; i++) {
    var total_unites = units_all[i].value;
    sum_units = +(sum_units) + +(total_unites);
  }




  document.getElementById("all_quantity").value = (sum_units);
  Calc2();
}


function Calc2(value) {
  var total2 = document.getElementById("total_2").value;
  var service_charge = document.getElementById("service_charge").value;
  var service_charge_tax = document.getElementById("service_charge_tax").value;

  var final_service_charge1 = (service_charge) * (service_charge_tax) / 100;
  var final_service_charge2 = (final_service_charge1)+ +(service_charge);
  document.getElementById("total_service_charge").value = final_service_charge2;

  var total_miscs = document.getElementById("total_miscs").value;
  var sum_one = +(total2)+ +(service_charge)+ +(total_miscs);
  
 
  document.getElementById("total3").value = sum_one;
  getMiscOff();
}


function getMiscOff(value) {
  var total_ff = document.getElementById("total_2").value;
  var service_charge = document.getElementById("total_service_charge").value;
  var total_miscs = document.getElementById("total_miscs").value;

  var total_rounde = document.getElementById("round_off").value;
  var final_value_1 = +(total_ff)+ +(service_charge)+ +(total_miscs);
  var getFinal = (final_value_1)+ +(total_rounde)
  document.getElementById("total3").value = getFinal.toFixed(2);
}
 


</script>
</body>
</html>