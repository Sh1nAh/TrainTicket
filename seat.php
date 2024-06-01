<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	
	if(isset($_REQUEST['dseid']))
	{
		$delete_seid=$_REQUEST["dseid"];
		connect();
		$query=mysql_query("Delete from seat Where SeatID=".$delete_seid) or die ("Cann't delete");
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
		$cid=$_REQUEST['coachid'];
		$seatno=$_REQUEST['txtseatno'];
		$seattype=$_REQUEST['seattype'];
		if(empty($seatno))
			$msg="Please Fill Seat No.";
		else if(empty($seattype))
			$msg="Please Fill Seat Type";
		else
		{
			connect();
			$query=mysql_query("Select * From seat where SeatNo='$seatno'") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This Seat is already exist!";
			else
				$save_query=mysql_query("Insert into seat (CoachID, SeatNo, SeatType) Values ('$cid', '$seatno', '$seattype')") or die ("Can't Insert Record");
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

	<title>Seat</title>

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
				<div class="booking-form" style="padding: 34px 0 34px 0;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="seat.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Setup Seats</h2>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtseatno" placeholder="Seat No.">
			<span class="form-label">Seat No.</span>
		</div>
		<div class="form-group">
			<select class="form-control" name="seattype" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<option value="Ordinary Class">Ordinary Class</option>
				<option value="Upper Class">Upper Class</option>
				<option value="Upper Sleeper">Upper Sleeper</option>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Seat Type</span>
		</div>
				<div class="form-group">
			<select class="form-control" name="coachid" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$tet="SELECT * FROM train";
				$t_run=mysql_query($tet);
				$t_count=mysql_num_rows($t_run);
				for($i=0;$i<$t_count;$i++)
				{
				$tdata=mysql_fetch_array($t_run);
				$cet="SELECT * FROM coach";
				$c_run=mysql_query($cet);
				$c_count=mysql_num_rows($c_run);
				for($j=0;$j<$c_count;$j++)
				{
					$cdata=mysql_fetch_array($c_run);
					echo "<option value='".$cdata['CoachID']."'>".'('.$tdata['TrainNo'].')'.'&nbsp;'.'&nbsp;'.$cdata['CoachNo']."</option>";
				}
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Coach No.</span>
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