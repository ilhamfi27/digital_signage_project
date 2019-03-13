<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h3>Edit Layout</h3>
	<?php foreach($layout as $s){ ?>
	<form action="<?php echo base_url(). 'index.php/front_display_progres/updatelayout'; ?>" method="post">
		<table border="1">
			<tr>
				<td>Nama Layout<g/td>
				<td>
					<input type="hidden" name="id" value="<?php echo $s->id ?>">
					<input type="text" name="nama_frontDisplay" value="<?php echo $s->nama_frontDisplay ?>">
				</td>
			</tr>
			<tr>
				<td>Deskripsi Layout</td>
				<td><input type="text" name="deskripsi" value="<?php echo $s->deskripsi ?>"></td>
			</tr>
			<tr>
				<td>Gambar Layout</td>
				<td><input type="file" name="gambar" value="<?php echo $s->gambar ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>