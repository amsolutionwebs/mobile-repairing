<?php
include 'config/config.php';

$id = $_POST['value'];

$query2 =$db->query("SELECT * FROM invoice WHERE `id`='$id'");

$result = $query2->fetch_object();

$invoice_number = $result->invoice_number;



$query =$db->query("SELECT * FROM debit_note WHERE `status`='unpaid' AND `invoice_number`='$id'");

if($query->num_rows > 0){ 

while($row=mysqli_fetch_array($query))
{
?>

<tr id="TRbodyDebitNote">
		<td width="230">
				<select class="form-control" name="invoice_number_debit_note[]" id="invoice_number_for_debit_note" required>
										<option value="<?php echo $id; ?>"><?php echo $invoice_number; ?></option>
										
									

									</select>
			
		</td>
		
		<td width="230">

			<select class="form-control" name="debit_note_number[]" id="debit_note_number" required>
										<option value="<?php echo $row["id"]; ?>"><?php echo $row["debit_note_number"]; ?></option>
										
									

									</select>

         
        </td>
		
		<td>
			<input type="date" name="debit_note_date[]" class="debit_note_date form-control text-center" id="debit_note_date" placeholder="Debit Note Date" value="<?php echo $row["debit_note_date"]; ?>"> 
		</td>
												
		<td>
			<input type="text" name="debit_note_value[]" class="debit_note_value form-control text-center" placeholder="Total Debit Note Amount" id="debit_note_value" value="<?php echo $row["total_debit_amount"]; ?>" onchange="totalDebitNote(this.value)" required> 
		</td>

		<td class="text-center justify-conent-center" width="20px">
														<button type="button" class="btn btn-filter setclose" style="background: #ea5455;" onclick="DebitNoteTableDelete(this)"> <i class="fas fa-times text-light"></i> </button>
													</td>
    </tr>


<?php
}
  }
?>


