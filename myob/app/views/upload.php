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
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
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
		MYOB TEST EXAMPLE
		<?php echo Form::open(array('url' => 'upload/data', 'method' => 'post')) ?>
		<?php echo Form::textarea('csv_data', 'David,Rudd,60050,9%,01 March - 31 March&#13;Ryan,Chen,120000,10%,01 March - 31 March'); ?>
		<?php echo Form::submit('Process CSV!'); ?>
		<?php echo Form::close() ?>
	</div>
</body>
</html>
