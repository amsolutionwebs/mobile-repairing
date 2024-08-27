<?php

require_once 'config/config.php';
require_once 'config/helper.php';
if (!empty($_SESSION['ebc'])) {
if ($_SESSION['ebc'] != session_id() && $_SESSION['logintype'] != 'employee') {
header('Location: index.php');
exit;
}
} else {
header('Location: index.php');
exit;
}

if ($_SESSION['ebc'] && $_SESSION['company_id']) {
$employee_login_id  = $_SESSION['e_id'];
$company_login_id = $_SESSION['company_id'];
$data_cmp = $db->query("SELECT * FROM company WHERE id='$company_login_id'");
$master_cmp  = $data_cmp->fetch_object();
$company_name_login = $master_cmp->company_name;
}


$default_mill_id = $_POST['default_mill_code'];
$dealer_code = $_POST['dealer_code'];

$company_login_id = $_SESSION['company_id'];
$data_dea = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' AND company_id='$company_login_id'");
$value_dealer2 = $data_dea->fetch_object();


$query_mill = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_mill = $query_mill->fetch_object();


$query_sub_mill = $db->query("SELECT * FROM `submill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_sub_mill = $query_sub_mill->fetch_object();
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
  <title>Invoice Intimation</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
        <div class="tm_invoice_left tm_mb10">
              <h3 class="tm_mb2"><b class="tm_primary_color" style="display:flex;justify-content: center;color:red;"><?php echo $company_name_login; ?></b></h3>
              <p style="display:flex;justify-content: center;color:blue;">
                <?php echo $master_cmp->address; ?> ,
                <?php echo $master_cmp->city; ?> ,<?php echo $value_state->state_name; ?> <?php echo $master_cmp->pincode; ?> Mobile No. <?php echo $master_cmp->phone_number; ?> <br> 
              
              </p>
            </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_seperator "></div>
            <div class="tm_invoice_info_list">
             
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"><?php echo date("d-m-Y"); ?></b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <h5 class="tm_mb2"><b class="tm_primary_color">M/S-<?php echo $value_dealer2->dealer_name; ?></b></h5>
              <p>
                                     
<?php echo $value_dealer2->main_address; ?> <br/>
<?php echo $value_dealer2->city; ?>, - <?php echo $value_dealer2->pincode; ?>,

<br/>
<?php echo $value_dealer2->phone_off; ?>
<br/>
GST. No.: <?php echo $value_dealer2->gst_number; ?>
              </p>
            </div>
          
          </div>
       
            <div class="msg">
              
              <p>
                Dear Sir,<br>
                We are received following document from <b>M/S <?php echo $value_mill->mill_name; ?> <?php echo $value_sub_mill->mill_name; ?>.</b> in your account.
              </p>
            </div>
           
           
         
          <div class="tm_table tm_style1 tm_mb15">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                      <th class="tm_width_3 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Inovice No.</th>
                      <th class="tm_width_4 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">DATE</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">SORT&QUAILITY</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">QTY</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right" style="text-align: center;">RATE</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right" style="text-align: center;">NET AMOUNT</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php
    $total_final_value = 0;
     $inovice_no = $_POST['inovice_no'];
    for($i=0; $i<count($_POST["inovice_no"]); $i++)
    {
        $result1 = $db->query("SELECT * FROM `invoice` WHERE `company_id`='$company_login_id' AND id='$inovice_no[$i]'"); 
            $value= $result1->fetch_object();
            $total_final_value =  $total_final_value+$value->all_total_amount;
            ?>


                    <tr>
                      <td class="tm_width_3" style="padding: 5px 15px;"><?php echo $value->invoice_number; ?></td>
                      <td class="tm_width_4" style="padding: 5px 15px;"><?php echo date("d-m-Y", strtotime($value->invoice_date)); ?></td>
                     
                        <?php 
                          
                          $query_sort = $db->query("SELECT * FROM `invoice_sort_date` WHERE `invoice_id`='$inovice_no[$i]'"); 
                          while($result_sort= $query_sort->fetch_object()){
                          
                           ?>
                           
                           <td class="tm_width_2" style="padding: 5px 15px;">
                       <!--     <table border="0">-->
                       <!--    <tr>-->
                       <!--        <td>52</td>-->
                                
                       <!--    </tr>-->
                       <!--    <tr>-->
                       <!--        <td>52</td>-->
                                
                       <!--    </tr>-->
                       <!--    <tr>-->
                       <!--        <td>52</td>-->
                                
                       <!--    </tr>-->
                       <!--    <tr>-->
                       <!--        <td>52</td>-->
                                
                       <!--    </tr>-->
                       <!--</table>-->
                       
                       <?php echo $result_sort->quantity; ?>
                          
                         </td>
                         
                         
                         
                         
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo $result_sort->quantity; ?></td>
                     
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $result_sort->rate; ?></td>
                       <?php } ?>
                       
                    
                       <td class="tm_width_2" style="padding: 5px 15px;"><?php echo number_format($value->all_total_amount,2); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer">
              <div class="tm_left_footer">
                <p class="tm_mb2"><b class="tm_primary_color"></b></p>
                <p class="tm_m0"></p>
              </div>
              <div class="tm_right_footer">
                <table>
                  <tbody>
                  
                    <tr class="tm_border_top tm_border_bottom">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"> <?php echo number_format($total_final_value,2); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="tm_padd_15_20 tm_round_border tm_mb10">
            <p class="tm_mb5"><b class="tm_primary_color">Remark:</b></p>
            <ul class="tm_m0 tm_note_list">
              <li>No. Complaint will be accepted after cutting and washing of the bulk</li>
             
            </ul>
          </div><!-- .tm_note -->
          
           <div class="tm_padd_15_20 tm_invoice_head tm_mb10" style="margin-top:50px;">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">For - <?php echo $company_name_login; ?></b></p>
             
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">For - <?php echo $value_dealer2->dealer_name; ?></b></p>
             
            </div>
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
        <a href="print_initmation.php" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
           <ion-icon name="home"></ion-icon>
          </span>
          
          <span class="tm_btn_text">Home</span>
        </a>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jspdf.min.js"></script>
  <script src="assets/js/html2canvas.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>