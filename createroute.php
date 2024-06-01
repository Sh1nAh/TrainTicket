<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	
	if(isset($_REQUEST['drid']))
	{
		$delete_rid=$_REQUEST["drid"];
		connect();
		$query=mysql_query("Delete from trainroute Where RouteID=".$delete_rid) or die ("Cann't delete");
		if ($query)
		{
			$msg="Successfully Deleted!";
		}
	}
?>

<?php
	require_once("conn.php");
	if(isset($_REQUEST['btnsave']))
	{
		connect();
		$route=$_REQUEST['route'];
		if(empty($date))
			$msg="Please Fill Date";
		else if(empty($route))
			$msg="Please Choose Route";
		else
		{
			connect();
			$query=mysql_query("Select * From trainroute") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num<0)
				$msg="This Route is already exist!";
			else
				$save_query=mysql_query("Insert into trainroute (Route) Values ('$route')") or die ("Can't Insert Record");
			if($save_query)
				$msg="Data Saved!";
		}
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Create Route</title>

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
				<div class="booking-form" style="padding: 80px 50px 79px 50px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
						<form action="createroute.php" method="POST" enctype="multipart/form-data">
							<div class="form-header">
								<h2>Create Route</h2>
							</div>
							<div class="form-group">
								<select class="form-control" name="route" required>
									<option value="" label="&nbsp;" selected hidden></option>
									<option value="Yangon (Mandalay - Yangon)">Yangon (Mandalay - Yangon)</option>
									<option value="Mandalay (Yangon - Mandalay)">Mandalay (Yangon - Mandalay)</option>
								</select>
								<span class="select-arrow"></span>
								<span class="form-label">Route</span>
							</div>
							<div class="form-btn">
								<button type="submit" name="btnsave" class="submit-btn">Save Now</button>
							</div>
						</form>
			<table style="color:#ffc600; font-size:15px; width:100%; line-height:30px;">
			<tr>
				<th><font>RouteID</td>
				<th><font>Route</td>
			</tr>
			<?php
				connect();
				$query=mysql_query("SELECT * FROM trainroute") or die ("Cann't Select");
				while($row=mysql_fetch_array($query))
				{
					$rid=$row["RouteID"];
					$route=$row["Route"];
			?>
			<tr>
				<td><?php echo $rid; ?></td>
				<td><?php echo $route; ?></td>
				<td>
					<a href="createroute.php?drid=<?php echo $rid;?>">Delete</a>
				</td>
			</tr>
			<?php
					}
			?>
		</table>
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