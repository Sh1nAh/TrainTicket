<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");

	if(isset($_REQUEST['action']))
	{
		connect();
		$action=$_REQUEST['action'];
		$tid=$_REQUEST['TicketID'];

		if($action=='add')
		{
			$sql="UPDATE ticket SET Status='Reserved' WHERE TicketID='$tid'";
			$ret=mysql_query($sql);
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
			<a href="javascript:history.back()"><font style="color: red; background-color: #1a1b1d; font-weight: 80; padding: 5px 5px; font-size: 16px; border: 0px #ffc600; margin-left: 80%;">Back to Previous Page</font></a>
			<a href="reservecart.php"><font style="color: red; background-color: #1a1b1d; font-weight: 80; padding: 5px 5px; font-size: 16px; border: 0px #ffc600; margin-left: 80%;">Shopping Cart</font></a>
				<div class="booking-form" style="padding: 0px 0 315px 0; margin: 0; width: 100%;">
					<div class="booking-bg"></div>
					<form action="display.php" method="POST" enctype="multipart/form-data" style="margin: 0; width: 150%;">
						<div class="form-header">
							<h2>Tickets</h2>
						</div>
						<table style="color:#ffc600; font-size:15px; margin: 0; width: 110%; line-height:30px;">
			<tr>
				<th>Date</th>
				<th>Train No.</th>
				<th>Train Type</th>
				<th>Coach No.</th>
				<th>Coach Type</th>
				<th>Seat No.</th>
				<th>Departure Time</th>
				<th>Route</th>
				<th>Arrival Station</th>
				<th>Fare</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php
				connect();
				if(isset($_REQUEST['btnsearch']))
				{
				$date=$_POST['date'];
				$ttype=$_POST['traintype'];
				$astation=$_POST['astation'];
				$route=$_POST['route'];

				$date=htmlspecialchars($date);
				$ttype=htmlspecialchars($ttype);
				$astation=htmlspecialchars($astation);
				$route=htmlspecialchars($route);

				$query=mysql_query("SELECT * FROM ticket where Status='Available' AND Date='$date' OR TrainType='$ttype' OR ArrivalStation='$astation' OR Route='$route'") or die ("Cann't Select");
				if(mysql_num_rows($query)>0)
				{
					while($result=mysql_fetch_array($query))
					{
						$TicketID=$result['TicketID'];
						$d=$result['Date'];						
						$tno=$result['TrainNo'];
						$tt=$result['TrainType'];
						$cno=$result['CoachNo'];
						$ctype=$result['CoachType'];
						$sno=$result['SeatNo'];
						$dtime=$result['DepartureTime'];
						$as=$result['ArrivalStation'];
						$r=$result['Route'];
						$fare=$result['Fare'];
						$status=$result['Status'];
				?>
				<td><?php echo $d; ?></td>
				<td><?php echo $tno; ?></td>
				<td><?php echo $tt; ?></td>
				<td><?php echo $cno; ?></td>
				<td><?php echo $ctype; ?></td>
				<td><?php echo $sno; ?></td>
				<td><?php echo $dtime; ?></td>
				<td><?php echo $as; ?></td>
				<td><?php echo $r; ?></td>
				<td><?php echo $fare; ?></td>
				<td><?php echo $status; ?></td>
				<td>
					<!-- <a href="cart.php?action=add&TicketID='$tid'"> -->
					<a href="udisplay.php?action=add&TicketID=<?php echo $TicketID; ?>"><font style="color: red; background-color: #1a1b1d; font-weight: 50; padding: 5px 5px; font-size: 14px; border: 0px #ffc600;">Add</font></a>
				</td>
			</tr>
			<?php
				}
			}
			else
				{
					$msg="</br>No Result!";
				}
			
		}
			elseif(!isset($_REQUEST['btnsearch']))
			{
				$sql="SELECT * FROM ticket WHERE Status='Available'";
				$ret=mysql_query($sql);
				// $rcount=mysql_num_rows($ret);
				if(mysql_num_rows($ret)>0)
				{
					while($result=mysql_fetch_array($ret))
					{
						$TicketID=$result['TicketID'];
						$d=$result['Date'];						
						$tno=$result['TrainNo'];
						$tt=$result['TrainType'];
						$cno=$result['CoachNo'];
						$ctype=$result['CoachType'];
						$sno=$result['SeatNo'];
						$dtime=$result['DepartureTime'];
						$as=$result['ArrivalStation'];
						$r=$result['Route'];
						$fare=$result['Fare'];
						$status=$result['Status'];
				?>
				<td><?php echo $d; ?></td>
				<td><?php echo $tno; ?></td>
				<td><?php echo $tt; ?></td>
				<td><?php echo $cno; ?></td>
				<td><?php echo $ctype; ?></td>
				<td><?php echo $sno; ?></td>
				<td><?php echo $dtime; ?></td>
				<td><?php echo $as; ?></td>
				<td><?php echo $r; ?></td>
				<td><?php echo $fare; ?></td>
				<td><?php echo $status; ?></td>
				<td>
					<!-- <a href="cart.php?action=add&TicketID='$tid'"> -->
					<a href="udisplay.php?action=add&TicketID=<?php echo $TicketID; ?>"><font style="color: red; background-color: #1a1b1d; font-weight: 50; padding: 5px 5px; font-size: 14px; border: 0px #ffc600;">Add</font></a>
				</td>
			</tr>
			<?php
				}
			}
		}
			?>
		</table>
			<?php
			if(!empty($msg))
			echo "<font color='red' style='font-size:25px;'>".$msg."</font>";
			?>
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