<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:left;
			color: #999;
		}

		.welcome {
			width: 650px;
			height: 400px;
			margin-left: 50px;
			margin-top: 50px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="welcome">
		<h3>
		DATA PROCESSED
		</h3>
		<table width="100%">
			<tr>
				<td>First Name</td><td>Last Name</td><td>Period</td><td>Gross Income</td><td>Income Tax</td><td>Net Income</td><td>Super</td>
			</tr>
			<?php foreach($data as $_d){?>
			<tr>
				<td><?php echo $_d['first_name'] ?></td>
				<td><?php echo $_d['last_name'] ?></td>
				<td><?php echo $_d['period'] ?></td>
				<td>$<?php echo $_d['gross_income'] ?></td>
				<td>$<?php echo $_d['income_tax'] ?></td>
				<td>$<?php echo $_d['net_income'] ?></td>
				<td>$<?php echo $_d['super'] ?></td>
			</tr>
			<?php  } ?>
			</table>
			<table width="100%">
			<tr>
				<td>CSV Export</td>
			</tr>
			<tr>
				<td>
				<?php foreach($data as $_d){?>
				<?php echo $_d['first_name'] ?>,
				<?php echo $_d['last_name'] ?>,
				<?php echo $_d['period']?>,
				<?php echo $_d['gross_income'] ?>,
				<?php echo $_d['income_tax'] ?>,
				<?php echo $_d['net_income'] ?>,
				<?php echo $_d['super'] ?><br/>
				<?php  } ?>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
