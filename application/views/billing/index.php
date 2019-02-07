<!DOCTYPE html>
<html>
<head>
	<title>Billing_Digital_Signage</title>
</head>
<body>
	<form method="POST">
		
		<?= form_open('Billing/create'); ?>
		<table>
			<tr>
				<td>First Name</td>
				<td>:</td>
				<td><?= form_input('firstName', "", array('placeholder'=>'FirstName')) ?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>:</td>
				<td><?= form_input('lastName', "", array('placeholder'=>'LastName')) ?></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>:</td>
				<td><?= form_input('phoneNumber', "", array('placeholder'=>'PhoneNumber')) ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= form_input('email', "", array('placeholder'=>'Email')) ?></td>
			</tr>
			<tr>
				<td>Company</td>
				<td>:</td>
				<td><?= form_input('company', "", array('placeholder'=>'Company')) ?></td>
			</tr>
			<tr>
				<td><?= form_submit('submit','Kirim') ?></td>
			</tr>
		</table>
		<?= form_close() ?>
	</form>
</body>
</html>