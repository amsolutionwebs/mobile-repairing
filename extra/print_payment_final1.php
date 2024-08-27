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


$default_mill_id = $_GET['default_mill_code'];
$dealer_code = $_GET['dealer_code'];
$payment_number = $_GET['payment_number'];


$company_login_id = $_SESSION['company_id'];
$data_dea = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' AND company_id='$company_login_id'");
$value_dealer2 = $data_dea->fetch_object();

$data_state = $db->query("SELECT * FROM `state` WHERE state_id='$master_cmp->state'");
$value_state = $data_state->fetch_object();



$data_dea = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' AND company_id='$company_login_id'");
$value_dealer2 = $data_dea->fetch_object();


$query_mill = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_mill = $query_mill->fetch_object();


$query_sub_mill = $db->query("SELECT * FROM `submill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_sub_mill = $query_sub_mill->fetch_object();

 $pay_id2 = $_GET['payment_number'];
 $data21 = $db->query("SELECT * FROM `payment` WHERE id='$pay_id2'");
 $value_payment = $data21->fetch_object();     
 
  
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
  <title>Payment Advoice</title>
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
          <div class="tm_invoice_info tm_mb10">
            <div class="tm_invoice_seperator "></div>
            <div class="tm_invoice_info_list">
                
              <p class="tm_invoice_date tm_m0"><b class="tm_primary_color">Pay Ref No.: </b><?php echo $value_payment->payment_ref; ?><br>
              <b class="tm_primary_color">Date: </b><?php echo date("d-m-Y", strtotime($value_payment->payment_date)); ?></p>
            
            </div>
            
          </div>
          
          
          
            <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left" style="width:55% !important;">
              <p class="tm_mb2"><b class="tm_primary_color">To:<br><?php echo $value_mill->mill_name; ?> <?php echo $value_sub_mill->mill_name; ?></b></p>
              <p>
                                  
<?php echo $value_mill->main_address; ?><?php echo $value_sub_mill->main_address; ?> <br/>
<?php echo $value_mill->city; ?><?php echo $value_sub_mill->city; ?> - <?php echo $value_mill->state; ?><?php echo $value_sub_mill->state; ?> - <?php echo $value_mill->pincode; ?><?php echo $value_sub_mill->pincode; ?>,<br/>

<?php echo $value_mill->phone_off; ?><?php echo $value_sub_mill->phone_off; ?>
<br/>
GST. No.: <?php echo $value_mill->gst_number; ?> <?php echo $value_sub_mill->gst_number; ?>
              </p>
            </div>
            <div class="tm_invoice_right " style="width:45% !important;">
              <p class="tm_mb2"><b class="tm_primary_color">From:<br><?php echo $value_dealer2->dealer_name; ?></b></p>
              <p>
                                     
<?php echo $value_dealer2->main_address; ?> <br/>
<?php echo $value_dealer2->city; ?>, - <?php echo $value_dealer2->pincode; ?>,<br/>

<br/>
<?php echo $value_dealer2->phone_off; ?>
<br/>
GST. No.: <?php echo $value_dealer2->gst_number; ?>
              </p>
            </div>
          </div>
          
          
       
            <div class="msg">
             
              <p>
               
                We are pleased to enclose herewith following Draft (s)/Cheque(s) Totaling <b>Rs. <?php echo $value_payment->total_payment_one;?>.00</b> towords payment of your bellow noted Invoice(s) account of 
                M/s <?php echo $value_dealer2->dealer_name; ?>.
              </p>
              
            </div>
           
          <div class="tm_table tm_style1 tm_mb30">
              <b>Payment Details :</b>
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                   
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Payment Type.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Ref. No.</th>
                       <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Date</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Bank</th>
                       <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Amount (Rs.)</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     	<?php
                     $sl = 0;
                  
                    $data1 = $db->query("SELECT * FROM payment_details WHERE payment_id='$payment_number'");
                    while ($value_pay_entry = $data1->fetch_object()) {
                    	

                   $sl++;
                    
                   
                    
                    
                      ?>


                    <tr>
                    
                      
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo $value_pay_entry->payment_type; ?></td>
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo $value_pay_entry->check_number; ?></td>
                      
                      <td class="tm_width_1" style="text-align:center;padding: 5px 15px;"><?php echo $value_pay_entry->pay_date; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $value_pay_entry->bank_name; ?></td>
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo number_format($value_pay_entry->total_amount_first,2); ?></td>
                      
                    
                       
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
               
              </div>
            </div>
          </div>
         
          <div class="tm_table tm_style1 tm_mb30">
              <b>Invoice Details :</b>
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                    
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Invoice No.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Date.</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Balance Amount</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Payment Amount</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     	<?php
                     $sl = 0;
                   
                    $data = $db->query("SELECT * FROM payment_invoice_details WHERE payment_id='$payment_number'");
                    while ($value_pyinvoice_entry = $data->fetch_object()) {
                    

                   $sl++;
                    
                 
                    
                      ?>


                    <tr>
                     
                 
                      
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $value_pyinvoice_entry->invoice_number; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $value_pyinvoice_entry->invoice_date; ?></td>
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo number_format($value_pyinvoice_entry->total_amount,2); ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo number_format($value_pyinvoice_entry->payment_amount,2); ?></td>
                    
                       
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
               
              </div>
            </div>
          </div>
          <?php
           $data_dbn = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$payment_number'");
   if($data_dbn->num_rows > 0){ ?>
      
  
          <div class="tm_table tm_style1 tm_mb30">
              <b>Debit Note Details :</b>
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                     
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Invoice No.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Debit Note No.</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Debit Note Date</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Debit Note Amount</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     	<?php
                     $sl = 0;
                   
                    $data = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$payment_number'");
                    while ($value_db_entry = $data->fetch_object()) {
                    

                   $sl++;
                    
                 
                    
                      ?>


                    <tr>
                      
                      
                 
                      
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $value_db_entry->invoice_number; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $value_db_entry->debit_note_number; ?></td>
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $value_db_entry->debit_note_date; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo number_format($value_db_entry->total_debit_note_amount,2); ?></td>
                    
                       
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
               
              </div>
            </div>
          </div>
          <?php } ?>
          
          <div class="tm_table tm_style1 tm_mb30">
           <?php
           
           $data_cr = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$payment_number'");
          if($data_cr->num_rows > 0){ ?>
              <b>Credit Note Details :</b>
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                   
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Invoice No.</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Credit Note No.</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Credit Note Date</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">Credit Note Amount</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     	<?php
                     $sl = 0;
                   
                    $data = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$payment_number'");
                    while ($value_cr_entry = $data->fetch_object()) {
                    

                   $sl++;
                    
                 
                    
                      ?>


                    <tr>
                    
                 
                      
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $value_cr_entry->invoice_number; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $value_cr_entry->credit_note_number; ?></td>
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $value_cr_entry->credit_note_date; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $value_cr_entry->total_credit_note_amount; ?></td>
                    
                       
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            
            <?php } ?>
            
           <div class="tm_invoice_footer">
              <div class="tm_left_footer" style="width:40%;">
                <p class="tm_mb2"><b class="tm_primary_color"></b></p>
                <p class="tm_m0"></p>
              </div>
              <div class="tm_right_footer" style="width:60%;">
                <table>
                  <tbody>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Invoice Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($value_payment->total_invoice_two,2); ?></td>
                    </tr>
                 
                    
                     <?php
           $data_dbn = $db->query("SELECT * FROM payment_debit_details WHERE payment_id='$payment_number'");
   if($data_dbn->num_rows > 0){ ?>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Debit Note Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($value_payment->total_debit_note_two,2); ?></td>
                    </tr>
                    <?php } ?>
                    
                    <?php
                     $data_cr = $db->query("SELECT * FROM payment_credit_details WHERE payment_id='$payment_number'");
          if($data_cr->num_rows > 0){ ?>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Credit Note Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold"><?php echo number_format($value_payment->total_credit_note_two,2); ?></td>
                    </tr>
                    <?php } ?>
                  
                    <tr class="tm_border_top tm_border_bottom">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"><?php echo number_format($value_payment->total_payment_three,2); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php
           $data_rm = $db->query("SELECT remark_payment_details FROM payment WHERE id='$payment_number'");
             $datarr = $data_rm->fetch_object();
   if(empty($datarr->remark_payment_details)){ 
 
   ?>
           <div class="tm_padd_15_20 tm_round_border">
            <p class="tm_mb5"><b class="tm_primary_color">REMARK:</b> <?php echo $datarr->remark_payment_details; ?></p>
          </div>
          
          <?php } ?>
          
          
          
          
          
          
          
           <div class="tm_padd_15_20 tm_invoice_head tm_mb10" style="margin-top:30px;">
               
               
            <div class="tm_invoice_left" >
                <p>Please acknowledge receipt<br>Thanking you<br>Your's Faithfully<br><br><br><br>
               For <?php echo $company_name_login; ?><br><br></p>
              
             
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
        <a href="print_payment.php" class="tm_invoice_btn tm_color2">
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