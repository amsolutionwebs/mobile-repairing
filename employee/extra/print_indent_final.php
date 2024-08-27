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

$data_state = $db->query("SELECT * FROM `state` WHERE state_id='$master_cmp->state'");
$value_state = $data_state->fetch_object();



$data_dea = $db->query("SELECT * FROM `dealer` WHERE id='$dealer_code' AND company_id='$company_login_id'");
$value_dealer2 = $data_dea->fetch_object();


$query_mill = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_mill = $query_mill->fetch_object();


$query_sub_mill = $db->query("SELECT * FROM `submill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
$value_sub_mill = $query_sub_mill->fetch_object();

 $indent_id2 = $_POST['indent_no'];
 $data21 = $db->query("SELECT * FROM `indent` WHERE id='$indent_id2'");
 $value_indent = $data21->fetch_object();                 
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway+Dots&display=swap" rel="stylesheet">
</head>

<body>
  <div class="tm_container" id="htmlContent">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section exportContent">
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
                
              <p class="tm_invoice_date tm_m0"><b class="tm_primary_color">Indent No.: </b><?php echo $value_indent->indent_no; ?><br>
              <b class="tm_primary_color">Date: </b><?php echo date("d-m-Y", strtotime($value_indent->indent_date)); ?></p>
            
            </div>
            
          </div>
          
          
          
            <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">To:<br><?php echo $value_mill->mill_name; ?> <?php echo $value_sub_mill->mill_name; ?></b></p>
              <p>
                                  
<?php echo $value_mill->main_address; ?><?php echo $value_sub_mill->main_address; ?> <br/>
<?php echo $value_mill->city; ?><?php echo $value_sub_mill->city; ?> - <?php echo $value_mill->state; ?><?php echo $value_sub_mill->state; ?> - <?php echo $value_mill->pincode; ?><?php echo $value_sub_mill->pincode; ?>,<br/>

<?php echo $value_mill->phone_off; ?><?php echo $value_sub_mill->phone_off; ?>
<br/>
GST. No.: <?php echo $value_mill->gst_number; ?> <?php echo $value_sub_mill->gst_number; ?>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
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
               
                We hare by  agree to purchase form you the following goods at the prince and on the condition stated bellow subject to usual term of bussines and suppliers
                Jurisdiction.
              </p>
              <b>Description :</b>
            </div>
           
           
         
          <div class="tm_table tm_style1 tm_mb30">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table style="text-align: center;">
                  <thead>
                    <tr>
                     <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">S.No.</th>
                      <th class="tm_width_3 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">SORT NO.</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">GRADE</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">QUANTITY</th>
                       <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg" style="text-align: center;">PRICE</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                     	<?php
                     $sl = 0;
                    $indent_id = $_POST['indent_no'];
                    $data = $db->query("SELECT * FROM indent_plus WHERE indent_id='$indent_id'");
                    while ($value_sort_entry = $data->fetch_object()) {
                    	$indent_plus_id = $value_sort_entry->id;
                    	$sort_ids = $value_sort_entry->sort_id;
                    	$grade_ids = $value_sort_entry->grade_id;
                    	$quantity_indent = $value_sort_entry->quantity;
                    	$price_indent = $value_sort_entry->price;

                   $sl++;
                    
                    $data_sortl = $db->query("SELECT * FROM `sort` WHERE company_id='$company_login_id' AND id='$sort_ids'");
                    $value_sortl = $data_sortl->fetch_object();
                    
                     $data_gradel = $db->query("SELECT * FROM `grade` WHERE company_id='$company_login_id' AND id='$grade_ids'");
                    $value_gradel = $data_gradel->fetch_object();
                    
                    
                      ?>


                    <tr>
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo $sl; ?></td>
                      
                      <td class="tm_width_3" style="padding: 5px 15px;"><?php echo $value_sortl->sort_no; ?></td>
                      <td class="tm_width_1" style="padding: 5px 15px;"><?php echo $value_gradel->grade; ?></td>
                      
                      <td class="tm_width_2" style="text-align:center;padding: 5px 15px;"><?php echo $quantity_indent; ?></td>
                      <td class="tm_width_2" style="padding: 5px 15px;"><?php echo $price_indent; ?></td>
                      
                    
                       
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
        
            <div class="tm_padd_15_20 tm_round_border">
            <p class="tm_mb5"><b class="tm_primary_color">REMARK:</b> <?php echo $value_indent->remark; ?></p>
          
             <br/>
          
            <p class="tm_mb5"><b class="tm_primary_color">DESTINATION:</b> <?php echo $value_indent->destination; ?></p>
           
            <br/>
            
            <p class="tm_mb5"><b class="tm_primary_color">TRANSPORT:</b> <?php echo $value_indent->transporter; ?>.</p>
            
            <br/>
            
            <p class="tm_mb5"><b class="tm_primary_color">DOCUMENT THROW:</b> <?php echo $value_indent->document_through; ?>.</p>
           
            
            
          </div>
          
          
          
          
          
          
          
          
          
           <div class="tm_padd_15_20 tm_invoice_head tm_mb10" style="margin-top:30px;">
            <div class="tm_invoice_left" style="border-top:2px dotted;padding:12px;">
              <p class="tm_mb2"><b class="tm_primary_color">Agent</b></p>
             
            </div>
            <div class="tm_invoice_right tm_text_right" >
              <p class="tm_mb2" style="border-top:2px dotted;padding:12px;display:flex;float:right;"><b class="tm_primary_color">Buyers</b></p>
             
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
         <button id="convertButton" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
           <ion-icon name="home"></ion-icon>
          </span>
          
          <span class="tm_btn_text">Download Test</span>
        </button>
        
         <button onclick="ExportToDoc('exportContent');" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
           <ion-icon name="home"></ion-icon>
          </span>
          
          <span class="tm_btn_text">Download Test+1</span>
        </button>
        
        <a href="print_indent.php" class="tm_invoice_btn tm_color2">
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
   <script>
        function downloadTextFile(filename, text) {
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);

            element.click();

            document.body.removeChild(element);
        }

        document.getElementById('convertButton').addEventListener('click', function () {
            var htmlContent = document.getElementById('htmlContent').innerHTML;
            var textContent = htmlContent.replace(/<[^>]*>/g, ''); // Remove HTML tags

            // Call the downloadTextFile function to create and download the text file
            downloadTextFile('converted-text.txt', textContent);
        });
    </script>
    
    <script>
function ExportToDoc(element, filename = ''){
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";

    var footer = "</body></html>";

    var html = header+document.getElementById(element).innerHTML+footer;

    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.docx':'document.docx';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadLink);
}
</script>
</body>
</html>