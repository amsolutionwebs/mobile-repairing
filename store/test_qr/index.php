<?php

	require 'barcode.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['clear']))
		{
			if(file_exists('barcode.jpg'))
				unlink('barcode.jpg');
		}else{

			$text = trim($_POST['text']);
			$barcode = new Barcode();
 
			$barcode->generate($text);
		}
	}
?>

<div style="padding: 10px;background-color: #eee;font-size: 14px;font-family: tahoma;text-align: center;max-width: 600px;margin:auto;">
	
	<h3>Barcode Generator App in PHP</h3>
	<form method="post">
		
		<input autocomplete="off" placeholder="Barcode Text" style="padding:5px;;width: 100%;margin-bottom: 10px;" type="text" value="<?=$_POST['text'] ?? ''?>" name="text">
		<br>
		<button style="padding:5px;cursor: pointer;">Generate Barcode</button>
		<button style="padding:5px;cursor: pointer;" name="clear">Clear Barcode</button>
	</form>
	<br>
	<?php if(file_exists('barcode.jpg')):?>
		<img src="barcode.jpg?<?=rand(0,9999)?>" style="border: solid thin #888; width:100%">
	<?php endif?>
</div>