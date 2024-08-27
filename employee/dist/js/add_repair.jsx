
  function AddMore() {
  var tbd = $("#TRbodyinvoice").clone().appendTo("#Tbodyinvoice");
  
  var product_id = $('#product_url').val();
  if (product_id !== "") {
    $(tbd).find("#product_id option[value='"+product_id+"']").attr('selected', true);
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
            $('#product_url').val('');
            $(tbd).find("#variation_id").html(response);
        }
      });
  }



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
      var response2 = JSON.parse(response);

     $(tbd).find("#rate_invoice").val(response2.discounted_price);
     $(tbd).find("#total_purchase_amount_first").val(response2.purchase_price);

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
 
  Calc(btndelete);
  total1(btndelete);
  Calc2(btndelete);
  getMiscOff(btndelete);
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
      
        var response2 = JSON.parse(response);

     $("#rate_invoice").val(response2.discounted_price);
     $("#total_purchase_amount_first").val(response2.purchase_price);

    
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
  var index = $(value).closest("tr").index(); // Get the index of the closest table row
    var qty = parseFloat($("input[name='quantity_invoice[]']").eq(index).val()); // Get the quantity value
    var rate = parseFloat($("input[name='rate_invoice[]']").eq(index).val()); // Get the rate value
    var discount = parseFloat($("input[name='discount_invoice[]']").eq(index).val()); // Get the discount value
    var gst = parseFloat($("input[name='gst_invoice[]']").eq(index).val()); // Get the GST value

    var amt = (qty * rate) - discount; // Calculate the amount

  var final_with_gst = (amt * gst) / 100;
  var final_value_first = +(amt)+ +(final_with_gst);
  document.getElementsByName("total_amount_first[]")[index].value = final_value_first;
  document.getElementsByName("total_gst_amount_first[]")[index].value = final_with_gst;
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

  // for qty

  var units_all = document.getElementsByName("quantity_invoice[]");
  var sum_units = 0;
  for(let i = 0; i < units_all.length; i++) {
    var total_unites = units_all[i].value;
    sum_units = +(sum_units) + +(total_unites);
  }
  document.getElementById("all_quantity").value = sum_units;

  // for all gst
  var tax_all = document.getElementsByName("gst_invoice[]");
  var sum_tax = 0;
  for(let i = 0; i < tax_all.length; i++) {
    var total_taxs = tax_all[i].value;
    sum_tax = +(sum_tax) + +(total_taxs);
  }
  document.getElementById("total_service_tax").value = sum_tax;

  // for all gst amount

   var tax_all_amount = document.getElementsByName("total_gst_amount_first[]");
  var sum_tax_amount = 0;
  for(let i = 0; i < tax_all_amount.length; i++) {
    var total_taxs_amt = tax_all_amount[i].value;
    sum_tax_amount = +(sum_tax_amount) + +(total_taxs_amt);
  }
  document.getElementById("total_service_tax_amount").value = sum_tax_amount;

  // for purchase amount

    var purchase_amount = document.getElementsByName("total_purchase_amount_first[]");
  var pramt_amount = 0;
  for(let i = 0; i < purchase_amount.length; i++) {
    var total_pr_amt = purchase_amount[i].value;
    pramt_amount = +(pramt_amount) + +(total_pr_amt);
  }
  document.getElementById("total_product_purchase_amount").value = pramt_amount;

  
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
 
function scanFunction(e) {

  $("#product_id option[value='"+e+"']").attr('selected', true);

}
