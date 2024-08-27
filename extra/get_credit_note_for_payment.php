<?php
include 'config/config.php';

$id = $_POST['value'];

$query2 =$db->query("SELECT * FROM invoice WHERE `id`='$id'");

$result = $query2->fetch_object();

$invoice_number = $result->invoice_number;



$query =$db->query("SELECT * FROM credit_note WHERE `status`='unpaid' AND `invoice_number`='$id'");

if($query->num_rows > 0){ 

while($row=mysqli_fetch_array($query))
{
?>

<tr id="TRbodyCreditNote">
		<td width="230">
				<select class="form-control" name="invoice_number_credit_note[]" id="invoice_number_for_debit_note" required>
										<option value="<?php echo $id; ?>"><?php echo $invoice_number; ?></option>
										
									

									</select>
			
		</td>
		
		<td width="230">
				<select class="form-control" name="credit_note_number[]" id="credit_note_number" required>
										<option value="<?php echo $row["id"]; ?>"><?php echo $row["credit_note_number"]; ?></option>
										
									

									</select>
        
        </td>
		
		<td>
			<input type="date" name="credit_note_date[]" class="credit_note_date form-control text-center" id="credit_note_date" placeholder="Credit Note Date" value="<?php echo $row["credit_note_date"]; ?>"> 
		</td>
												
		<td>
			<input type="text" name="total_credit_note_amount[]" class="total_credit_note_amount form-control text-center" placeholder="Total Debit Note Amount" id="total_credit_note_amount" value="<?php echo $row["total_credit_note_amount"]; ?>" onchange="totalCreditNoteAmts(this.value)" required> 
		</td>

		<td class="text-center justify-conent-center" width="20px">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="CreditNoteTableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
													
    </tr>


<?php
}
  }
?>


