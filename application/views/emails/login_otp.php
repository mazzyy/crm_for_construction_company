<!DOCTYPE html>
<html>
<head>
	<title>Login OTP</title>
	<style>
		.table_style{
			width: 50%;
			border-spacing: 0px;
			border: 1px solid black;
		}
		.table_style tr{
			border: 1px solid black;
		}
		.table_style th{
			border: 1px solid black;
		}
		.table_style td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="col-lg-12" style="border-radius: 10px; background-color: #f5f5f5; padding: 15px;">
		<h2>Dear <b><?php echo $user['name']; ?>,</b></h2>
		<hr>
		<p style="color: #000">
			Please complete your login process. Enter the 6-digit code on your verification screen now. Your code will be valid for 10 minutes from the time of the generation,
			after that it expires.
		</p>
		<table class="table_style">
			<tr>
				<th bgcolor="#90afd5">Your 6-digit OTP </th>
				<th bgcolor="#dbe5f1"><?= 	$otp['otp_pin'] ?></th>
			</tr>
		</table>
		<br />
		<b>Thanks & Regard's,</b> <br />
		<b><?= $company_info['name']; ?></b><br /><br />
	</div>
</div>
</body>
</html>
