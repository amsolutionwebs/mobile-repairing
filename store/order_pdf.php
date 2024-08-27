<?php 
include 'config/config.php';

$order_id = $_GET['order_id'];
$customer_id = $_GET['customer_id'];
                     
$customer_details = $db->query("SELECT * FROM customer_managment WHERE id='$customer_id'");
$customer_data=$customer_details->fetch_object();

$order_data=$db->query("SELECT * FROM order_managment WHERE id='$order_id'");
$value_order_data=$order_data->fetch_object();

$store_data=$db->query("SELECT * FROM store");
$value_store=$store_data->fetch_object();


?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Invoice</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="../assets/img/logo-e-fashion.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_seperator tm_gray_bg"></div>
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">#<?php echo time(); ?></b></p>
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"><?php echo date("d-m-Y"); ?></b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <p>
                <?php echo $value_store->store_name; ?> <br>
                <?php echo $value_store->address; ?>,<br><?php echo $value_store->state; ?>, <?php echo $value_store->city; ?>, <?php echo $value_store->pincode; ?><br>
               
               <a href="mailto:sales@fomojeans.com"><?php echo $value_store->email_id; ?></a><br/>
               Mobile No.  <?php echo $value_store->mobile_number; ?>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
              <p>
                <?php echo $customer_data->name; ?> <br>
                <?php echo $customer_data->address; ?>,<br><?php echo $customer_data->state; ?>, <?php echo $customer_data->city; ?>, <?php echo $customer_data->pincode; ?><br>
               
               <a href="mailto:sales@fomojeans.com"><?php echo $customer_data->email_id; ?></a><br/>
               Mobile No.  <?php echo $customer_data->mobile_number; ?>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1 tm_mb30">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                        
            
                      <th style="width: 5px !important;" class="tm_semi_bold tm_primary_color tm_gray_bg">SN.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Product</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Variation</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Sub Variation</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Qty</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Rate</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Discount</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Service Tax</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Total</th>


                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                     
      $data_repair = $db->query("SELECT * FROM repair_managment WHERE id='$value_order_data->order_id'");
      $repair_value = $data_repair->fetch_object();
        
         $sl = 0;
    $data_repair_details = $db->query("SELECT * FROM repair_product_details WHERE repair_id='$value_order_data->order_id'");
    while ($value_repair_details = $data_repair_details->fetch_object()){
        $sl++;
        
       $query_products = $db->query("SELECT * FROM products WHERE id='$value_repair_details->product_id'");
        $data_products = $query_products->fetch_object();

        $query_vrn = $db->query("SELECT * FROM variation WHERE id='$value_repair_details->variation_id'");
        $data_vrn = $query_vrn->fetch_object();

        $query_sub_vrn = $db->query("SELECT * FROM sub_variation WHERE id='$value_repair_details->sub_variation_id'");
        $data_sub_vrn = $query_sub_vrn->fetch_object();

        ?>
                    <tr>
                      <td style="width: 5px !important;"><?php echo $sl; ?>.</td>
                      <td class="tm_width_2"><span style="line-height: 1em;"><?php echo $data_products->products_title; ?></span></td>
                      <td class="tm_width_2"><?php echo $data_vrn->variation_name; ?></td>
                      <td class="tm_width_2"><?php echo $data_sub_vrn->sub_variation_name; ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->quantity,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->rate,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->discount,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo $value_repair_details->gst; ?>%</td>
                      <td class="tm_width_2 tm_text_right"><?php echo number_format($value_repair_details->amount,2); ?></td>
                    </tr>
                 <?php } ?>
                  
                  </tbody>

                  <tbody>

                    <tr >
                      <td colspan="6" class="tm_width_1 tm_primary_color tm_text_right  tm_bold">
                        Sub Total Spare
                      </td>
                      <td colspan="3" class="tm_width_1 tm_primary_color tm_text_right  tm_bold">
                       <?php echo number_format($repair_value->total_2,2); ?>
                      </td>
                    </tr>

                     <tr>
                      <td colspan="6" class="tm_width_1 tm_text_right tm_primary_color tm_border_none tm_bold">Service Charge</td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->service_charge,2); ?></td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->service_charge_tax,2); ?></td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->total_service_charge,2); ?></td>
                    </tr>

                     <tr>
                      <td colspan="6" class="tm_width_6 tm_text_right tm_primary_color tm_border_none tm_bold">Other</td>
                      <td  colspan="2"class="tm_width_4 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo$repair_value->miscs_name; ?></td>
                      <td colspan="1" class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->total_miscs,2); ?></td>
                     
                    </tr>
                    <tr>
                      <td colspan="6" class="tm_width_6 tm_text_right tm_primary_color tm_border_none tm_bold">Round Off</td>
                      <td  colspan="3" class="tm_width_4 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->round_off,2); ?></td>
                     
                     
                    </tr>
                   
                    <tr class="tm_border_top tm_border_bottom">
                      <td colspan="6" class="tm_width_3 tm_text_right tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total  </td>
                      <td colspan="3" class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"><?php echo number_format($repair_value->total_amount,2); ?></td>
                    </tr>
                  </tbody>

                </table>
              </div>
            </div>
          
          </div>
          <div class="tm_padd_15_20 tm_round_border">
            <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <ul class="tm_m0 tm_note_list">
              <li>All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to Seller within thirty (30) days after delivery of goods to the address stated.</li>
              <li>Delivery dates are not guaranteed and Seller has no liability for damages that may be incurred due to any delay in shipment of goods hereunder. Taxes are excluded unless otherwise stated.</li>
            </ul>
          </div><!-- .tm_note -->


          



        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jspdf.min.js"></script>
  <script src="assets/js/html2canvas.min.js"></script>
  <script src="assets/js/main.js"></script>



  <!-- final -->

   <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="../assets/img/logo-e-fashion.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_seperator tm_gray_bg"></div>
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">#<?php echo time(); ?></b></p>
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"><?php echo date("d-m-Y"); ?></b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <p>
                <?php echo $value_store->store_name; ?> <br>
                <?php echo $value_store->address; ?>,<br><?php echo $value_store->state; ?>, <?php echo $value_store->city; ?>, <?php echo $value_store->pincode; ?><br>
               
               <a href="mailto:sales@fomojeans.com"><?php echo $value_store->email_id; ?></a><br/>
               Mobile No.  <?php echo $value_store->mobile_number; ?>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
              <p>
                <?php echo $customer_data->name; ?> <br>
                <?php echo $customer_data->address; ?>,<br><?php echo $customer_data->state; ?>, <?php echo $customer_data->city; ?>, <?php echo $customer_data->pincode; ?><br>
               
               <a href="mailto:sales@fomojeans.com"><?php echo $customer_data->email_id; ?></a><br/>
               Mobile No.  <?php echo $customer_data->mobile_number; ?>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1 tm_mb30">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                        
            
                      <th style="width: 5px !important;" class="tm_semi_bold tm_primary_color tm_gray_bg">SN.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Product</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Variation</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Sub Variation</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Qty</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Rate</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Discount</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Service Tax</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Total</th>


                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                     
      $data_repair = $db->query("SELECT * FROM repair_managment WHERE id='$value_order_data->order_id'");
      $repair_value = $data_repair->fetch_object();
        
         $sl = 0;
    $data_repair_details = $db->query("SELECT * FROM repair_product_details WHERE repair_id='$value_order_data->order_id'");
    while ($value_repair_details = $data_repair_details->fetch_object()){
        $sl++;
        
       $query_products = $db->query("SELECT * FROM products WHERE id='$value_repair_details->product_id'");
        $data_products = $query_products->fetch_object();

        $query_vrn = $db->query("SELECT * FROM variation WHERE id='$value_repair_details->variation_id'");
        $data_vrn = $query_vrn->fetch_object();

        $query_sub_vrn = $db->query("SELECT * FROM sub_variation WHERE id='$value_repair_details->sub_variation_id'");
        $data_sub_vrn = $query_sub_vrn->fetch_object();

        ?>
                    <tr>
                      <td style="width: 5px !important;"><?php echo $sl; ?>.</td>
                      <td class="tm_width_2"><span style="line-height: 1em;"><?php echo $data_products->products_title; ?></span></td>
                      <td class="tm_width_2"><?php echo $data_vrn->variation_name; ?></td>
                      <td class="tm_width_2"><?php echo $data_sub_vrn->sub_variation_name; ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->quantity,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->rate,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo number_format($value_repair_details->discount,2); ?></td>
                      <td class="tm_width_1 tm_text_right"><?php echo $value_repair_details->gst; ?>%</td>
                      <td class="tm_width_2 tm_text_right"><?php echo number_format($value_repair_details->amount,2); ?></td>
                    </tr>
                 <?php } ?>
                  
                  </tbody>

                  <tbody>

                    <tr >
                      <td colspan="6" class="tm_width_1 tm_primary_color tm_text_right  tm_bold">
                        Sub Total Spare
                      </td>
                      <td colspan="3" class="tm_width_1 tm_primary_color tm_text_right  tm_bold">
                       <?php echo number_format($repair_value->total_2,2); ?>
                      </td>
                    </tr>

                     <tr>
                      <td colspan="6" class="tm_width_1 tm_text_right tm_primary_color tm_border_none tm_bold">Service Charge</td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->service_charge,2); ?></td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->service_charge_tax,2); ?></td>
                      <td colspan="1" class="tm_width_1 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->total_service_charge,2); ?></td>
                    </tr>

                     <tr>
                      <td colspan="6" class="tm_width_6 tm_text_right tm_primary_color tm_border_none tm_bold">Other</td>
                      <td  colspan="2"class="tm_width_4 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo$repair_value->miscs_name; ?></td>
                      <td colspan="1" class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->total_miscs,2); ?></td>
                     
                    </tr>
                    <tr>
                      <td colspan="6" class="tm_width_6 tm_text_right tm_primary_color tm_border_none tm_bold">Round Off</td>
                      <td  colspan="3" class="tm_width_4 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($repair_value->round_off,2); ?></td>
                     
                     
                    </tr>
                   
                    <tr class="tm_border_top tm_border_bottom">
                      <td colspan="6" class="tm_width_3 tm_text_right tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total  </td>
                      <td colspan="3" class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"><?php echo number_format($repair_value->total_amount,2); ?></td>
                    </tr>
                  </tbody>

                </table>
              </div>
            </div>
          
          </div>
          <div class="tm_padd_15_20 tm_round_border">
            <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <ul class="tm_m0 tm_note_list">
              <li>All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to Seller within thirty (30) days after delivery of goods to the address stated.</li>
              <li>Delivery dates are not guaranteed and Seller has no liability for damages that may be incurred due to any delay in shipment of goods hereunder. Taxes are excluded unless otherwise stated.</li>
            </ul>
          </div><!-- .tm_note -->


        <div style="position: absolute; 
            top: 120px; 
            left: 200px;
            z-index: 10000;
            font-size:100px; 
            color: red; 
            font-weight: bold;
            text-shadow: 4px 4px #ccc;
            transform:rotate(-30deg);
            opacity: 0.1;">
  DUPLICATE
</div>



        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jspdf.min.js"></script>
  <script src="assets/js/html2canvas.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>