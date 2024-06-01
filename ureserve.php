<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	if(isset($_REQUEST['btnsearch']))
	{
		connect();
		$date=$_REQUEST['date'];
		$ttype=$_REQUEST['traintype'];
		$route=$_REQUEST['route'];
		$as=$_REQUEST['astation'];

		if(empty($date))
			$msg="Please Choose Date";
		else if($ttype=="0")
			$msg="Please Choose Train Type";
		else if(empty($route))
			$msg="Please Choose Route";
		else if(empty($as))
			$msg="Please Choose Arrival Station";
		else
		{
			echo '<script language="javascript">window.location.href="udisplay.php";</script>';
		}
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Sell</title>

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
		require_once("uheader.php");
	?>
	<div id="booking" id="page">
		<div id="content">
				<div class="booking-form" style="padding: 34px 0 49px 0;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
					<form action="udisplay.php" method="POST" enctype="multipart/form-data">
						<div class="form-header">
							<h2>Search Tickets</h2>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" name="date" type="date" required>
									<span class="form-label">Departure Date</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<select class="form-control" name="traintype" required>
								<option value="" label="&nbsp;" selected hidden></option>
								<option value="Special Express">Special Express</option>
								<option value="Express">Express</option>
								<option value="Mail Train">Mail Train</option>
								</select>
							<span class="select-arrow"></span>
							<span class="form-label">Train Type</span>
								</div>
							</div>
						</div>
						<div class="form-group">
						<select class="form-control" name="route" required>
						<option value="" label="&nbsp;" selected hidden></option>
						<?php
						connect();
						$ret="SELECT * FROM trainroute";
						$r_run=mysql_query($ret);
						$r_count=mysql_num_rows($r_run);
						for($i=0;$i<$r_count;$i++)
						{
							$data=mysql_fetch_array($r_run);
							echo "<option value='".$data['Route']."'>".$data['RouteID'].'&nbsp;'.'&nbsp;'.$data['Route']."</option>";
						}
						?>
						</select>
						<span class="select-arrow"></span>
						<span class="form-label">Route</span>
						</div>
						<!-- <div class="form-group">
						<select class="form-control" name="dstation" required>
						<option value="" label="&nbsp;" selected hidden></option>
						<?php 
							$dselect="SELECT * FROM station";
							$det=mysql_query($dselect);
							$count=mysql_num_rows($det);
							for($i=0 ; $i<$count ; $i++)
							{
								$row = mysql_fetch_array($det);
								echo "<option value='".$row['StationName']."'>".$row['StationName']."</option>";
							}
						?>
						</select>
						<span class="select-arrow"></span>
						<span class="form-label">Specify Departure</span>
						</div> -->
						<div class="form-group">
						<select class="form-control" name="astation" required>
						<option value="" label="&nbsp;" selected hidden></option>
						<?php 
							$aselect="SELECT * FROM station";
							$aet=mysql_query($aselect);
							$count=mysql_num_rows($aet);
							for($i=0 ; $i<$count ; $i++)
							{
								$row = mysql_fetch_array($aet);
								echo "<option value='".$row['StationName']."'>".$row['StationName']."</option>";
							}
						?>
						</select>
						<span class="select-arrow"></span>
						<span class="form-label">Specify Arrival</span>
						</div>
						<div class="form-btn">
							<button class="submit-btn" value="search" name="btnsearch">Search Now</button>
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