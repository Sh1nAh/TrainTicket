<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	$msg="";
	if(isset($_REQUEST['btnsave']))
	{
		$name=$_REQUEST['txtname'];
		$rank=$_REQUEST['txtrank'];
		$phno=$_REQUEST['txtphno'];
		$address=$_REQUEST['txtaddress'];

		if(empty($name))
			$msg="Please Fill Name";
		else if(empty($rank))
			$msg="Please Fill Rank";
		else if(empty($phno))
			$msg="Please Fill PhNo.";
		else if(empty($address))
			$msg="Please Fill Address";
		else
		{
			connect();
			$query=mysql_query("Select * From admin where AdminName='$name'");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This name is already exist!";
			else
				$save_query=mysql_query("Insert into admin (AdminName, Rank, PhNo, Address) Values ('$name', '$rank', '$phno', '$address')") or die ("Can't Insert Record");
			if($save_query)
				$msg="Information Recorded!";
		}
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Admin Register</title>

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
		require_once("aheader.php");
	?>
	<div id="booking" id="page">
		<div id="content">
				<div class="booking-form" style="padding: 34px 0px 34px 0px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="adminreg.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Save Your Information Here!</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" type="text" name="txtname" placeholder="Name">
					<span class="form-label">Name</span>
				</div>
			</div>		
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" type="text" name="txtrank" placeholder="Rank">
					<span class="form-label">Rank</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtphno" placeholder="Ph No. (09+----)">
			<span class="form-label">Ph No.</span>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtaddress" placeholder="City">
			<span class="form-label">Address</span>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-btn">
					<button type="reset" name="btncancel" class="submit-btn" style="height: 50px;">Cancel</button>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-btn">
					<button type="submit" name="btnsave" class="submit-btn" style="height: 50px;">Save</button>
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