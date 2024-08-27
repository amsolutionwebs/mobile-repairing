<?php

require_once 'config/config.php';
require_once 'config/helper.php';
if (!empty($_SESSION['main_sessin_id'])) {
if ($_SESSION['main_sessin_id'] != session_id() && $_SESSION['logintype'] != 'employee') {
header('Location: index.php');
exit;
}
} else {
header('Location: index.php');
exit;
}

if ($_SESSION['main_sessin_id'] && $_SESSION['store_id']) {
$employee_login_id  = $_SESSION['e_id'];
$store_id = $_SESSION['store_id'];
$data_cmp = $db->query("SELECT * FROM company WHERE id='$company_login_id'");
$master_cmp  = $data_cmp->fetch_object();
$company_name_login = $master_cmp->company_name;
}


$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$store_id = $_SESSION['store_id'];



  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Commission </title>
  <style>
 
  p {
    margin-bottom: 15px;
        font-weight: 100;
        font-size: 13px;
}

p, div {
    margin-top: 0;
    line-height: 1.5em;
}
th {
    font-weight:300;
    border:1px solid black;
    font-size:12px;
}
@page { margin: 12px !important; }
body { margin: 12px !important;}

  table{
    border: 1px groove black;
    padding: 8px 12px;
    font-family: sans-serif;
    border-collapse: collapse;
    color: black;
  }
  
  .table_input {
    padding: 0px;
    margin: 0px;
    padding-top: 6px;
    font-size: 17px;
    text-transform: capitalize;
  }
  
  .td-input {
    margin-left:10px;
    font-weight: 400;
    padding: 6px 12px;
    border: none;
    border-bottom: 1px dotted;
    border-color:black;
  }
  .registration_form
  {
    position: relative;
  }
  .registration_form:before
  {
    content: "";
    position: absolute;
    top:50%;
    left:0;
    background-image: url("dist/img/mh-logo.png");
    background-size: 500px;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    opacity: 0.2;
    z-index: 1;
  }

  .main-content
  {
    z-index: 5;
  }
  tr,td{
    border:1px solid black;
  
  }
  td {
      font-weight:100;
      font-size:11px;
  }
  thead,th {
      font-weight:bold;
  }
  </style>
</head>

<body>
  <div class="container-fluid" style="border:1px solid black;border-top:3px solid black !important;">
    <div class="row">
   <center>
      <table style="width:100%;">
        <tr>
         
          <td style="position:relative; padding:0px;border:none;">
            <div style="text-align:center; font-weight:bold;font-size:26px;padding:5px 14px">
              <h3 style="color:red;padding:0;margin:0;font-size:30px;"><?php echo $company_name_login; ?></h3>
             
     <p style="display:flex;justify-content: center;color:blue;font-size: 12px;">
                <?php echo $master_cmp->address; ?> ,
                <?php echo $master_cmp->city; ?> ,<?php echo $value_state->state_name; ?> <?php echo $master_cmp->pincode; ?> Mobile No. <?php echo $master_cmp->phone_number; ?> <br> 
              
              </p>
              
              </div>
            
          
           
          </td>
          
        </tr>
       
      </table>
    </center>
    
    <div class="registration_form">
      
    <center>
    <table width="100%" class="main-content" style="border-top:none;">
      
             
         <tr><td colspan="4"><center><b style="font-size:15px;">Invoice Commission<br>
         From <?php echo date("d-m-Y", strtotime($start_date)); ?> To <?php echo date("d-m-Y", strtotime($end_date)); ?>
         </b></center></td></tr>

      <tr>
      
        <td colspan="4" style="font-weight: 600;height: 55px; vertical-align: top;padding:8px;"> 
          <b style="font-size:15px;"><?php echo $value_mill->mill_name; ?> <?php echo $value_sub_mill->mill_name; ?></b>
          <p style="font-size:11px;">
                                  
<?php echo $value_mill->main_address; ?><?php echo $value_sub_mill->main_address; ?><br>
<?php echo $value_mill->city; ?><?php echo $value_sub_mill->city; ?> - <?php echo $value_mill->state; ?><?php echo $value_sub_mill->state; ?> - <?php echo $value_mill->pincode; ?><?php echo $value_sub_mill->pincode; ?>,<br/>

<?php echo $value_mill->phone_off; ?><?php echo $value_sub_mill->phone_off; ?>
<br/>
GST. No.: <?php echo $value_mill->gst_number; ?> <?php echo $value_sub_mill->gst_number; ?>
 </p>
          </td>
      
      </tr>
      <!-- name -->


      <!-- tabledata -->
      <table style="width:100%;margin-top: 1px;">
        <thead style="text-align: center;border: 1px;font-weight:bold;">
        <tr>
        
          <th>Invoice No</th>
          <th>Invoice Date</th>
          <th>Dealer Name</th>
          <th>Ex Amount</th>
          <th>D.N</th>
          <th>C.N</th>
          <th>Balance Amount</th>
          <th>Rate %</th>
          <th>Commission</th>
        </tr>
        </thead>
         <tbody style="text-align:center;">
                 <?php
                    $sl = 0;
                   
                    $data = $db->query("SELECT * FROM `invoice` WHERE `company_id`='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
                    while ($value = $data->fetch_object()) { 
                    $id = $value->id;
                    $sl++;
                      ?>
                <tr>
                  
                  
                 
                  <td><?php echo $value->invoice_number; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($value->invoice_date)); ?></td>
                   <td><?php echo $value->dealer_name; ?></td>
                  <td><?php echo number_format($value->total_first,2); ?></td>
                 
                 
                  <td><?php $data_debit = $db->query("SELECT sum(total_debit_amount) as total_debit_amount1 FROM `debit_note` WHERE invoice_number='$value->id'");
$total_debit1 = $data_debit->fetch_object();
echo number_format($total_debit1->total_debit_amount1,2); ?></td>
                  
                  <td><?php $data_credit = $db->query("SELECT sum(total_credit_note_amount) as total_credit_amount1 FROM `credit_note` WHERE invoice_number='$value->id'");
$total_credit1 = $data_credit->fetch_object();
echo number_format($total_credit1->total_credit_amount1,2); ?></td>



                  <td><?php echo number_format($value->total_first+$total_credit1->total_credit_amount1-$total_debit1->total_debit_amount1,2); ?></td>
                  
                  <td><?php 
                
                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                    echo $value_master->commission;

                    ?>

                    <?php 
                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                     echo $value_subm->commission;




                      ?></td>


                      <td>


                        <?php 
                


                  $balance_amount1 = $value->total_first+$total_credit1->total_credit_amount1-$total_debit1->total_debit_amount1;




                   $data_master = $db->query("SELECT * FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                    $comission_value1  = $value_master->commission;

                    $datasubm = $db->query("SELECT * FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();
                    $comission_value2 = $value_subm->commission;


if(empty($comission_value1)){
  echo number_format(($comission_value2/100)*$balance_amount1,2);
}else{
  echo number_format(($comission_value1/100)*$balance_amount1,2);
}

                      ?>




                    </td>
                  
                
              
                </tr>


              <?php } ?>
                
              </tbody>
              
               <thead>
              <tr>
                
                <th rowspan="3" colspan="3" style="text-align:right;">Total Value</th>
                <th >
                 <?php 
$data_ex_invoice = $db->query("SELECT sum(total_first) as total_ex_invoice FROM `invoice` WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id' AND `invoice_date` BETWEEN '$start_date' AND '$end_date'");
$total_exe_invoice = $data_ex_invoice->fetch_object();
echo number_format($total_exe_invoice->total_ex_invoice,2);

?></th>

 <th>
                 <?php 
$data_debit_total = $db->query("SELECT sum(total_debit_amount) as total_db_value FROM `debit_note` WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id'");
$total_dbt = $data_debit_total->fetch_object();
echo number_format($total_dbt->total_db_value,2);

?></th>


 <th>  <?php 

 
$data_credit_total = $db->query("SELECT sum(total_credit_note_amount) as total_credit_value FROM `credit_note` WHERE company_id='$company_login_id' AND `default_mill_code`='$default_mill_id'");
$total_crdt = $data_credit_total->fetch_object();
echo number_format($total_crdt->total_credit_value,2);

?></th>
               
                <th><?php 
                
                   echo number_format($total_exe_invoice->total_ex_invoice+$total_crdt->total_credit_value-$total_dbt->total_db_value,2);


                      ?></th>

                      <th><?php 
                
                   $data_master = $db->query("SELECT sum(commission) as comm FROM `mill` WHERE id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                   $comms1 = $value_master->comm;

                    
                    $datasubm = $db->query("SELECT sum(commission) as comm2 FROM `submill` WHERE status='enable' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                     $comms2 = $value_subm->comm2;

                     if (empty($comms1)) {
                      echo $comms2;
                     
                     }else{
                      echo $comms1;
                     }



                      ?></th>

                 <th > <?php 

$balance_amount_view = $total_exe_invoice->total_ex_invoice+$total_crdt->total_credit_value-$total_dbt->total_db_value;


                   $data_master = $db->query("SELECT commission FROM `mill` WHERE company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_master = $data_master->fetch_object();
                    $commission_view1 = $value_master->commission;

                   
                    $datasubm = $db->query("SELECT commission FROM `submill` WHERE status='enable' AND company_id='$company_login_id' AND id='$default_mill_id'");
                    $value_subm = $datasubm->fetch_object();

                     $commission_view2 =  $value_subm->commission;




                  


if(empty($commission_view1)){
  echo number_format(($commission_view2/100)*$balance_amount_view,2);
}else{
  echo number_format(($commission_view1/100)*$balance_amount_view,2);
}

?></th>
              </tr>
          </thead>
       </table>


      
       
    </table>
  </center>
  </div>

    </div>
  </div>
</body>
</html>