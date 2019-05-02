<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= validation_errors() ?>
	<?= form_open('billing/aksiCreate')?>
	<center><h2>Input Data</h2><br>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= form_input('nama')?></td>
		</tr>
		<tr>
			<td>Pilih Paket & Harga</td>
			<td>:</td>
			<td>
				<select name="metode_pembayaran">
					<?php foreach($metode as $m): ?>
					<option value="<?= $m->id ?>"><?= $m->periode . " - " . "Rp." .$m->harga ?></option>
					<?php endforeach; ?>
				</select>
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