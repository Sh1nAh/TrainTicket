<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	if(isset($_REQUEST['action']))
	{
		connect();
		$action=$_REQUEST['action'];
		$tid=$_REQUEST['tid'];

		if($action=='confirm')
		{
			$sql="UPDATE ticket SET Status='Soldout' WHERE TicketId='$tid'";
			$ret=mysql_query($sql);
			$ssql="UPDATE reserve SET Status='Confirmed' WHERE Status='Pending'";
			$sret=mysql_query($ssql);
		}
		elseif($action=='cancel')
		{
			$sql="UPDATE ticket SET Status='Available'	WHERE TicketID='$tid'";
			$ret=mysql_query($sql);
			$ssql="UPDATE reserve SET Status='Cancelled' WHERE Status='Pending'";
			$sret=mysql_query($ssql);
		}
	}

connect();
$msql="SELECT * FROM ticket WHERE Status='Reserved'";
$mret=mysql_query($msql);
$mrcount=mysql_num_rows($mret);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Manage Reserve</title>

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
			<table width="100%" height="35px" style="color:#ffc600; font-size:15px;">
			<tr>
				<th>ReserveID</td>
				<th>User Name</td>
				<th>Date</td>
				<th>Ticket Quantity</td>
				<th>Total Amount</td>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
			</tr>
			<?php
			connect();
			for($i=0;$i<$mrcount;$i++)
			{
				$mdata=mysql_fetch_array($mret);
				$rsql="SELECT * FROM reserve WHERE Status='Pending'";
				$rret=mysql_query($rsql);
				$rrcount=mysql_num_rows($rret);
				$rdata=mysql_fetch_array($rret);

				$uid=$rdata['UserID'];
				$u=mysql_query("SELECT * FROM user where UserID='$uid'");
				$name=mysql_fetch_array($u);
				$uname=$name['UserName'];

				echo "<tr>";
				echo "<td>".$rdata['ReserveID']."</td>";
				echo "<td>".$uname."</td>";
				echo "<td>".$rdata['Date']."</td>";
				echo "<td>".$rdata['TicketQty']."</td>";
				echo "<td>".$rdata['TotalAmount']."</td>";
				echo "<td><a href='managereserve.php?action=confirm&tid=".$mdata['TicketID']."'>Confirm</a>
				&nbsp;&nbsp;&nbsp;
				<a href='managereserve.php?action=cancel&tid=".$mdata['TicketID']."'>Cancel</a></td>";
				echo "</tr>";
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