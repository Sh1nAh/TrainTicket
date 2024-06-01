<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	$msg="";
	if(isset($_REQUEST['btnsignup']))
	{
		$name=$_REQUEST['txtname'];
		$gender=$_REQUEST['rdo'];
		$phno=$_REQUEST['txtphno'];
		$password=$_REQUEST['txtpassword'];
		$cpassword=$_REQUEST['txtcpassword'];
		if(empty($name))
			$msg="Please Fill Name";
		else if(empty($phno))
			$msg="Please Fill Ph No.";
		else if(empty($password))
			$msg="Please Fill Password";
		else if(empty($cpassword))
			$msg="Please Fill Confirm Password";
		else if($password!=$cpassword)
			$msg="Please Equal to Two Password";
		else
		{
			connect();
			$query=mysql_query("Select * From user where UserName='$name'");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This name is already exist!";
			else
				$save_query=mysql_query("Insert into user (UserName, Gender, PhNo, Password) Values ('$name', '$gender', '$phno', '$password')") or die ("Can't Insert Record");
			if($save_query)
				$msg='<script language="javascript">window.location.href="ulogin.php"</script>';
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>User Register</title>

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
				<div class="booking-form" style="padding: 34px 0px 34px 0px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="userreg.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>You can Register Here!</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" type="text" name="txtname" placeholder="Name">
					<span class="form-label">Name</span>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group" style="padding: 40px 0px 0px 0px;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rdo" value="Male" checked>&nbsp;&nbsp;<font color="white" size="3px">Male</font>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="rdo" value="Female">&nbsp;&nbsp;<font color="white" size="3px">Female</font>
				</div>
			</div>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtphno" placeholder="Ph No. (09+----)">
			<span class="form-label">Ph No.</span>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" type="password" name="txtpassword" placeholder="Password (X X X X)">
					<span class="form-label">Password</span>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" type="password" name="txtcpassword" placeholder="Confirm Password (X X X X)">
					<span class="form-label">Confrim Password</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-btn">
					<button type="reset" name="btncancel" class="submit-btn" style="height: 50px;">Cancel</button>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-btn">
					<button type="submit" name="btnsignup" class="submit-btn" style="height: 50px;">Sign Up</button>
				</div>
			</div>
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