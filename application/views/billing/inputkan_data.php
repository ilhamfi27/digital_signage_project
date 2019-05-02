<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= validation_errors() ?>
	<?= form_open('payment_method/aksiCreate')?>
	<center><h2>Input Data</h2><br>
	<table>
		<tr>
			<td>Periode</td>
			<td>:</td>
			<td><?= form_input('periode')?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><?= form_input('harga')?></td>
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