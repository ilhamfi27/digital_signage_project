<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center><h3>Data Tersimpan</h3></center>
	<table border="1" align="center">
		<tr>
			<th>Id</th>
			<th>Nama</th>
			<th>Periode</th>
			<th>Action</th>
		</tr>
		<?php 
		
		foreach($detail_payment as $u){ 
		?>
		<tr>
			<td><?php echo $u->id; ?></td>
			<td><?php echo $u->nama; ?></td>
			<td><?php echo $u->metode_pembayaran; ?></td>
			<td>
				<?php echo anchor('billing/create','+ |'); ?>
			    <?php echo anchor('billing/update/'.$u->id,'Edit |'); ?>
                <?php echo anchor('billing/deleteData/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>