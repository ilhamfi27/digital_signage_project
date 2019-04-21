<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?= validation_errors() ?>
	<?= form_open_multipart('front_display_progres/inputlayout')?>
	<center><h2>Form Layout</h2><br>
	<table>
		<tr>
			<td>Id Layout</td>
			<td>:</td>
			<td><?= form_input('id')?></td>
		</tr>
		<tr>
			<td>Nama Layout</td>
			<td>:</td>
			<td><?= form_input('nama_frontDisplay')?></td>
		</tr>
		<tr>
			<td>Deskripsi Layout</td>
			<td>:</td>
			<td><?= form_input('deskripsi')?></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" name="gambar" /></td>
		</tr>
		<tr>
			<td><?= form_submit('ok','simpan')?></td>
		</tr>
	</table>
	<?= form_close()?>
</body>
</html>