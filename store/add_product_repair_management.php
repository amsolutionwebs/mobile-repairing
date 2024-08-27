<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['repair_id']))
{
	
	$repair_id = $_GET['repair_id'];
	$data_emp = $db->query("SELECT * FROM repair_managment WHERE id='$repair_id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
	$customer_id = $value_emp->customer_id;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center"><?php if($action == 'update'){echo "Update";}else{echo "Add";} ?> Repair</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="repair_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
          
        
        <form role="form" method="post" enctype="multipart/form-data" action="repair_management_add_product_action.php">
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Repair Product Details:-</b></h4>
              <hr> </div>
          
          
					
					
						
           <!-- add product section -->

           <div class="col-lg-12 col-sm-12 col-12 mb-4">
										<div class="table-top mb-1">
											<div class="wordset">
												<button type="button" class="btn btn-success mb-1 float-right btn-added my-table-create" id="add_invoice_item" onclick="AddMore()">+ Add New Item</button>
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
<input type="text" name="gst_invoice[]" class="gst_invoice form-control text-center" id="gst_invoice" placeholder="SERVICE TAX (GST)" onchange="Calc(this)"  required> </td>


<td width="130">
	<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" required readonly> </td>


<td class="text-center justify-conent-center">
	<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="TableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
</td>
</tr>


 <?php
    $repair_id = $_GET['repair_id'];
    $data_repair_details = $db->query("SELECT * FROM repair_product_details WHERE repair_id='$repair_id'");
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
<input type="text" name="quantity_invoice[]" class="quantity_invoice form-control text-center" id="quantity_invoice_update" placeholder="Quantity" onchange="Calc(this)" value="<?php echo $value_repair_details->quantity; ?>" disabled required> </td>

<td>
<input type="text" name="rate_invoice[]" class="rate_invoice form-control text-center" id="rate_invoice_update" placeholder="Rate" onchange="Calc(this)" value="<?php echo $value_repair_details->rate; ?>" disabled required> </td>

<td width="130">
<input type="text" name="discount_invoice[]" class="discount_invoice form-control text-center" id="discount_invoice_update" placeholder="Discount" onchange="Calc(this)" value="<?php echo $value_repair_details->discount; ?>" disabled> </td>

<td width="130">
<input type="text" name="gst_invoice[]" class="gst_invoice form-control text-center" id="gst_invoice" placeholder="SERVICE TAX (GST)" onchange="Calc(this)" value="<?php echo $value_repair_details->gst ?>" disabled> </td>

<td>
	<input type="text" name="total_amount_first[]" class="total_amount_first form-control text-center" placeholder="Total" id="total_amount_first" value="<?php echo $value_repair_details->amount; ?>" required disabled readonly> </td>

<td class="text-center justify-conent-center">
	<input type="hidden" name="post_id_update[]" value="<?php echo $value_repair_details->id; ?>" />
<button type="button" class="btn setclose" style="background: #ea5455;" onclick="TableDelete(this,<?php echo $repair_id; ?>,<?php echo $value_repair_details->id; ?>)" disabled> <i class="fas fa-times text-light"></i> </button>


</td>

</tr>


   <?php } ?>





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
												<input type="text" name="service_charge" class="service_charge form-control text-center" placeholder="Total Value of Service Charge" id="service_charge" value="<?php echo $value_emp->service_charge;?>" onchange="Calc2(this)"> </td>
												<td colspan="1">
												<input type="text" name="service_charge_tax" class="service_charge_tax form-control text-center" placeholder="SERVICE TAX (GST)" id="service_charge_tax" value="<?php echo $value_emp->service_charge_tax;?>" onchange="Calc2(this)"> </td>
											<td colspan="3">
												<input type="text" name="total_service_charge" class="total_service_charge form-control text-center" placeholder="Total Value of Service Charge" id="total_service_charge" value="<?php echo $value_emp->total_service_charge;?>" onchange="Calc2(this)"> </td>
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
											<th colspan="4">Total </th>
											<th colspan="2"><input type="text" name="all_quantity" class="all_quantity text-center" placeholder="Total Quantity" id="all_quantity" style="border: none;background: #1b2850;color: #fff;" value="<?php echo  $value_emp->total_quntity;?>" ></th>
											<th colspan="3" style="text-align: right !important;"><input type="text" name="total3" style="border: none;background: #1b2850;color: #fff;font-size:18px;" class="total3 text-center" placeholder="All Total Amount" value="<?php echo $value_emp->total_amount;?>" id="total3"></th>
										</tr>
									</thead>
										</table>
									</div>

           <!-- end product section -->
           
            <!--  -->
            <div class="col-md-12">
             <input type="hidden" name="submit" value="update" />
				<input type="hidden" name="repair_id" value="<?php echo $repair_id; ?>">			  
				<input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			
              <input type="submit" value="Update" class="btn btn-primary float-right" id="submit-btn"> </div>
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


function TableDelete(btndelete) {
  $(btndelete).parent().parent().remove();
  total1(btndelete);
}

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
  document.getElementById("total_2").value = sum;
  var units_all = document.getElementsByName("quantity_invoice[]");
  var sum_units = 0;
  for(let i = 0; i < units_all.length; i++) {
    var total_unites = units_all[i].value;
    sum_units = +(sum_units) + +(total_unites);
  }
  document.getElementById("all_quantity").value = sum_units;
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