<?php
require "vendor/autoload.php";
$pw = new \PhpOffice\PhpWord\PhpWord();


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

 $indent_id2 = $_GET['indent_no'];
 $data21 = $db->query("SELECT * FROM `indent` WHERE id='$indent_id2'");
 $value_indent = $data21->fetch_object(); 
 
 
 
 $value_indent_no = $value_indent->indent_no;




 
// (B) ADD HTML CONTENT
$section = $pw->addSection();



$html = '

         <div>
              <p style="margin:0cm;font-size:18px;text-align:center;">'.$company_name_login.'</p>
              
              <p style="margin:0cm;font-size:13px;text-align:center;">
               '.$master_cmp->address.','.$master_cmp->city.','.$value_state->state_name.$master_cmp->pincode.'
              </p>
              
               
                <p style="float:right;white-space: pre">
                <b>Indent No.:</b> '.$value_indent->indent_no.'  
                <b>Date:</b>'. date("d-m-Y", strtotime($value_indent->indent_date)).'
                </p>
                
                
            </div>
            
            
             <div style="white-space: pre">
              <p><b>To:</b></p>
              <p><b>'.$value_mill->mill_name . $value_sub_mill->mill_name.'</b></p>
              <p>'.$value_mill->main_address. $value_sub_mill->main_address.'</p>
              <p> '.$value_mill->city.$value_sub_mill->city.' - '.$value_mill->state.$value_sub_mill->state.' - '.$value_mill->pincode.$value_sub_mill->pincode.',</p>
              <p>'.$value_mill->phone_off.$value_sub_mill->phone_off.'</p>
              <p>GST. No.: '.$value_mill->gst_number.$value_sub_mill->gst_number.'</p>
               </div>
             
             
             
            <div>
              <p><b>From:</b></p>
              
              <p><b>'.$value_dealer2->dealer_name.'</b></p>
              <p> '.$value_dealer2->main_address.'</p>
<p>'.$value_dealer2->city.', - '.$value_dealer2->pincode.',</p>

<p> '. $value_dealer2->phone_off.'</p>
<p>
GST. No.: '.$value_dealer2->gst_number.'
              </p>
            </div>
            
            
                <div>
              
              <p>
               
                We hare by  agree to purchase form you the following goods at the prince and on the condition stated bellow subject to usual term of bussines and suppliers
                Jurisdiction.
              </p>
              <b>Description :</b>
            </div>
            
            
            
            
          <div>
            <div>
              <div>
                <table style="text-align: center;">
                  <thead>
                    <tr>
                     <th style="text-align: center;">S.No.</th>
                      <th style="text-align: center;">SORT NO.</th>
                      <th style="text-align: center;">GRADE</th>
                       <th style="text-align: center;">QUANTITY</th>
                       <th style="text-align: center;">PRICE</th>
                    
                    </tr>
                  </thead>
                  <tbody>';
                  
                  
                     $sl = 0;
                    $indent_id = $_GET['indent_no'];
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
                    
                    


                    $html .='<tr>
                      <td style="padding: 5px 15px;">'. $sl .'</td>
                      
                      <td style="padding: 5px 15px;">'.$value_sortl->sort_no.'</td>
                      <td style="padding: 5px 15px;">'. $value_gradel->grade.'</td>
                      
                      <td style="text-align:center;padding: 5px 15px;">'. $quantity_indent .'</td>
                      <td style="padding: 5px 15px;"> '. $price_indent.'</td>
                      
                    
                       
                    </tr>';
                    


               
                        
                    } 
                    
                    
                    
                    
                  $html .= '</tbody>
                </table>
              </div>
            </div>
            <div>
              <div>
                <p><b></b></p>
                <p></p>
              </div>
              <div>
               
              </div>
            </div>
          </div>
            
              
            
            
           
          
          
';
                  


// var_dump($html);
// die();

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
 

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment;filename=\"convert.docx\"");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, "Word2007");
$objWriter->save("php://output");