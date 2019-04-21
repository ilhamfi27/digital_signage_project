<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h3>Update Data</h3>
	</center>
	<?php foreach($payment as $u){ ?>
	<form action="<?php echo base_url(). '/billing/aksiUpdate'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>id</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="id" value="<?php echo $u->id ?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Metode Pembayaran</td>
				<td><input type="text" name="metode" value="<?php echo $u->metode ?>"></td>
			</tr>
			<tr>
				<td>Paket Premium</td>
				<td><input type="text" name="pilih_paket_premium" value="<?php echo $u->pilih_paket_premium ?>"></td>
			</tr><tr>
				<td>Harga</td>
				<td><input type="text" name="harga" value="<?php echo $u->harga ?>"></td>
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

