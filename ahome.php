<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Home</title>

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
			<div class="booking-form" style="padding: 0; height: 533px;">
					<div class="booking-bg"></div>
	<form action="#" method="POST" enctype="multipart/form-data" style="margin:0; padding:50px 0 0 0;">
		<table width="100%" height="75px" style="color:#ffc600; font-size:15px;">
			<tr>
				<th>Date</th>
				<th>Train No.</th>
				<th>Train Type</th>
				<th>Departure Time</th>
				<th>Route</th>
			</tr>
			<?php
				connect();
				$query=mysql_query("SELECT * FROM ticket") or die ("Cann't Select");
				if(mysql_num_rows($query)>0)
				{
					while($result=mysql_fetch_array($query))
					{
						$date=$result['Date'];						
						$tno=$result['TrainNo'];
						$ttype=$result['TrainType'];
						$dtime=$result['DepartureTime'];
						$route=$result['Route'];
					}
			?>
			<tr>
				<td><?php echo $date; ?></td>
				<td><?php echo $tno; ?></td>
				<td><?php echo $ttype; ?></td>
				<td><?php echo $dtime; ?></td>
				<td><?php echo $route; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</form>
			</div>
		</div>
	</div>
	<?php
		require_once("footer.php");
	?>
</body>
</html>