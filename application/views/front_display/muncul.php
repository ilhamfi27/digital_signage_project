<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h2>View</h2><br>

		<table border="1">
			<tr>
				<td>Id</td>
				<td>Nama Layout</td>
				<td>Deskripsi</td>
				<td>Gambar</td>
				<td>Aksi</td>
			</tr>
			<?php foreach ($layout as $s) {?>
			<tr>
				<td><?php echo $s->id; ?></td>
				<td><?php echo $s->nama_frontDisplay; ?></td>
				<td><?php echo $s->deskripsi; ?></td>
				<td><?php echo $s->gambar; ?></td>
				<td>
					<?php echo anchor('front_display_progres/editlayout/'.$s->id,'Update')?> ||
					<?php echo anchor('front_display_progres/hapuslayout/'.$s->id,'Hapus')?>
				</td>
			</tr>
			<?php }?>
		</table>
		<?php echo anchor('front_display_progres/input','Tambah'); ?>
</body>
</html>