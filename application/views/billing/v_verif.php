<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= validation_errors() ?>
	<?= form_open('payment_verif/aksiCreateVerif')?>
	<center><h2>Verifikasi Data</h2><br>
	<table>
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><?= form_input('kode')?>
			</td>
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