<!DOCTYPE html>
<html lang="en">

<?php
	define("PASSWORD","mrmama");
	if(isset($_POST['btnenter']))
	{
		$code=$_POST["txtcode"];
		if(empty($code))
		$msg="Please Enter Code No.";
		else
		{
			if($code==PASSWORD)
			$msg='<script language="javascript">window.location.href="ahome.php"</script>';
			else
			$msg="Please try again!";
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Admin Login</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
	<?php
		require_once("indexheader.php");
	?>
	<div id="booking" id="page">
		<div id="content">
			<div class="booking-form" style="padding: 124px 50px 124px 50px;">
				<div class="booking-bg"></div>
				<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
				?>
					<form action="#" method="POST">
						<div class="form-header">
							<h2>Enter the System</h2>
						</div>					
						<div class="form-group">
							<input class="form-control" type="password" name="txtcode" placeholder="Code (X X X X X X)">
							<span class="form-label">Code</span>
						</div>
						<div class="form-btn">
							<button type="submit" name="btnenter" class="submit-btn">Enter</button>
						</div>
					</form>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>
	<?php
		require_once("footer.php");
	?>
</body>
</html>