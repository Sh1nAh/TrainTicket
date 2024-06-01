<!DOCTYPE html>
<html lang="en">
<?php
	require_once("conn.php");

	if(isset($_REQUEST['action']))
	{
		connect();
		$action=$_REQUEST['action'];
		$tid=$_REQUEST['TicketID'];

		if($action==='remove')
		{
			$sqt="UPDATE ticket SET Status='Available' WHERE TicketID='$tid'";
			$num=mysql_query($sqt);
		}
	}

	connect();
	$sql="SELECT * FROM ticket WHERE Status='Soldout'";
	$ret=mysql_query($sql);
	$rcount=mysql_num_rows($ret);
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Shopping Cart</title>

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
			<a href="javascript:history.back()"><font style="color: red; background-color: #1a1b1d; font-weight: 80; padding: 5px 5px; font-size: 16px; border: 0px #ffc600; margin-left: 80%;">Back to Previous Page</font></a>
				<a href="traveller.php?check"><font style="color: red; background-color: #1a1b1d; font-weight: 80; padding: 5px 5px; font-size: 16px; border: 0px #ffc600; margin-left: 80%;">Checkout Now</font></a>
				<div class="booking-form" style="padding: 0 0 223px 0; margin: 0; width: 100%;">
					<div class="booking-bg"></div>
					<form action="cart.php" method="POST" enctype="multipart/form-data" style="margin: 0; width: 150%;">
						<div class="form-header">
							<h2>Shopping Cart</h2>
						</div>
						<table style="color:#ffc600; font-size:15px; margin: 0; width: 110%; line-height:30px;">
						<tr>
						<th>Date</th>
						<th>TicketID</th>
						<th>Train No.</th>
						<th>Train Type</th>
						<th>Coach No.</th>
						<th>Coach Type</th>
						<th>Seat No.</th>
						<th>Departure Time</th>
						<th>Route</th>
						<th>Arrival Station</th>
						<th>Fare</th>
						<th>&nbsp;&nbsp;Action</th>
						</tr>
						<?php
						$total=0;
						for($i=0;$i<$rcount;$i++)
						{
							$data=mysql_fetch_array($ret);
							echo "<tr>";
							echo "<td>".$data['Date']."</td>";
							echo "<td>".$data['TicketID']."</td>";
							echo "<td>".$data['TrainNo']."</td>";
							echo "<td>".$data['TrainType']."</td>";
							echo "<td>".$data['CoachNo']."</td>";
							echo "<td>".$data['CoachType']."</td>";
							echo "<td>".$data['SeatNo']."</td>";
							echo "<td>".$data['DepartureTime']."</td>";
							echo "<td>".$data['ArrivalStation']."</td>";
							echo "<td>".$data['Route']."</td>";
							echo "<td>".$data['Fare']."</td>";
							echo "<td><a href='cart.php?action=remove&TicketID=".$data['TicketID']."'><font style='color: red; background-color: #1a1b1d; font-weight: 50; padding: 5px 5px; font-size: 14px; border: 0px #ffc600;'>Remove</font></a></td>";
							echo "</tr>";
							$fare=$data['Fare'];
							$total+=$fare;
						}

						// $size=count($_SESSION['ShoppingCart']);  
						// for($i=0;$i<$size;$i++)
						// {
						// 	echo "<tr>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['Date']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['TicketID']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['TrainNo']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['TrainType']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['CoachNo']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['CoachType']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['SeatNo']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['DepartureTime']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['ArrivalStation']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['Route']."</td>";
						// 	echo "<td>".$_SESSION['ShoppingCart'][$i]['Fare']."</td>";
						// 	echo "<td><a href='cart.php?action=remove&TicketID=".$_SESSION['ShoppingCart'][$i]['TicketID']."'><font style='color: red; background-color: #1a1b1d; font-weight: 50; padding: 5px 5px; font-size: 14px; border: 0px #ffc600;'>Remove</font></a></td>";
						// 	echo "</tr>";
						// }
						?>
						</table>
						<div class="form-header">
							<h3><font style="color: #ffc600;font-size: 16px;">Total Amount: <?php connect(); echo $total; ?></font></h3>
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