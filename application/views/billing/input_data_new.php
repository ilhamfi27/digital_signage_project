<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= validation_errors() ?>
	<?= form_open('payment_method_new/aksiCreate')?>
	<center><h2>Input Data</h2><br>
	<table>
		<tr>
			<td>Name</td>
			<td>:</td>
			<td><?= form_input('name')?></td>
		</tr>
		<tr>
			<td>Price</td>
			<td>:</td>
			<td><?= form_input('price')?></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td align="right"><?= form_submit('submit','Kirim')?></td>
		</tr>
	</table>
	<?= form_close()?>
</body>
</html>