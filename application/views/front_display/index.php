<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="floralwhite">
<center>
<H1>Content Upload</H1>
<?= form_open()?>
<table>
	<tr>
		<td>Content 1</td>
		<td>:</td>
		<td><?=form_dropdown('video',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td>Content 2</td>
		<td>:</td>
		<td><?=form_dropdown('video1',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td>Content 3</td>
		<td>:</td>
		<td><?=form_dropdown('video2',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td>Content 4</td>
		<td>:</td>
		<td><?=form_dropdown('video3',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td>Content 5</td>
		<td>:</td>
		<td><?=form_dropdown('video4',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td>Content 6</td>
		<td>:</td>
		<td><?=form_dropdown('video5',$dropdown_data,NULL)?></td>
	</tr>
	<tr>
		<td><?=form_submit('submit','submit')?></td>
	</tr>
</table>
<?= form_close()?>

</body>
</html>