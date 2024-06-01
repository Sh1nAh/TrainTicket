<!DOCTYPE html>
<html lang="en">

<?php
	require_once('conn.php');
	if(isset($_REQUEST['btnlogin']))
	{
		connect();
		$name=$_REQUEST['txtname'];
		$password=$_REQUEST['txtpassword'];
		if(empty($name))
		$msg="Please Enter Name";
		else if(empty($password))
		$msg="Please Enter Password";
		else
		{
			$query=mysql_query("Select * from user where username='$name' and password='$password'");
			$num=mysql_num_rows($query);
			if($num>0)
			{
				$_SESSION['uname']=$name;
				echo '<script language="javascript">window.location.href="uhome.php"</script>';
			}
			else
			{
				$msg="Name and Password is invalid, please try again";
			}
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>User Login</title>

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
				<div class="booking-form" style="padding: 45px 50px 45px 50px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="#" method="POST">
		<div class="form-header">
			<h2>Login</h2>
		</div>					
		<div class="form-group">
			<input class="form-control" type="text" name="txtname" placeholder="Name">
			<span class="form-label">Name</span>
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="txtpassword" placeholder="Password (X X X X)">
			<span class="form-label">Password</span>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-btn">
					<button type="reset" name="btncancel" class="submit-btn" style="height: 50px;">Cancel</button>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-btn">
					<button type="submit" name="btnlogin" class="submit-btn" style="height: 50px;">Login</button>
				</div>
			</div>
		</div>
		<div class="form-header" style="padding: 7px 0px 0px 0px;">
			<link><a href="userreg.php"><h4 style="color: #ffc600;">Don't have an account? Click Here to Sign Up!</h4></a></link>
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