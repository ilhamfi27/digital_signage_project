<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h3>Edit Content</h3>
	<?php foreach($content as $s){ ?>
	<form action="<?php echo base_url(). 'index.php/front_display/updatecontent'; ?>" method="post">
		<table border="1">
			<tr>
				<td>Subject</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $s->id ?>">
					<input type="text" name="subject" value="<?php echo $s->subject ?>">
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $s->description ?>"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image" value="<?php echo $s->image ?>"></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><input type="text" name="date" value="<?php echo $s->date ?>"></td>
			</tr>
			<tr>
				<td>Category</td>
				<td><input type="text" name="category" value="<?php echo $s->category ?>"></td>
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