<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	if(isset($_REQUEST['btnsave']))
	{
		connect();
		$date=$_REQUEST['date'];
		$dtime=$_REQUEST['dtime'];
		$tno=$_REQUEST['trainno'];
		$ttype=$_REQUEST['traintype'];
		$cno=$_REQUEST['coachno'];
		$ctype=$_REQUEST['coachtype'];
		$sno=$_REQUEST['seatno'];
		$dtime=$_REQUEST['dtime'];
		$astation=$_REQUEST['astation'];
		$fare=$_REQUEST['fare'];
		$route=$_REQUEST['route'];
		$status=$_REQUEST['status'];
		if(empty($date))
			$msg="Please Fill Date";
		else if(empty($dtime))
			$msg="Please Fill Departure Time";
		else if(empty($tno))
			$msg="Please Choose Train No.";
		if(empty($ttype))
			$msg="Please Choose Train Type";
		else if(empty($cno))
			$msg="Please Choose Train No.";
		else if(empty($ctype))
			$msg="Please Fill Coach Type";
		if(empty($sno))
			$msg="Please Choose Seat No.";
		if(empty($dtime))
			$msg="Please Choose Departure Time";
		else if(empty($astation))
			$msg="Please Choose Station Name";
		else if(empty($route))
			$msg="Please Choose Route";
		else if(empty($fare))
			$msg="Please Fill fare";
		else if(empty($route))
			$msg="Please Choose Route";
		else if(empty($status))
			$msg="Please Fill Status";
		else
		{
			connect();
			$query=mysql_query("Select * From ticket where SeatID='$sid' and ArrivalStation='$astation'") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This Ticket is already exist!";
			else
				$save_query=mysql_query("Insert into ticket (Date, TrainNo, TrainType, CoachNo, CoachType, SeatNo, DepartureTime, ArrivalStation, Route, Fare, Status)
					 Values ('$date', '$tno', '$ttype', '$cno', '$ctype', '$sno', '$dtime', '$astation', '$route', '$fare', '$status')") or die ("Can't Insert Record");
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

	<title>Ticket</title>

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
	<form action="ticket.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Setup Ticket</h2>
		</div>
		
		<div class="row">
			<div class="col-md-6">
		<div class="form-group">
			<input class="form-control" type="date" name="date" required>
			<span class="form-label">Departure Date</span>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<input class="form-control" type="text" name="dtime" placeholder="Departure Time" required>
			<span class="form-label">Departure Time</span>
		</div>
		</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
		<div class="form-group">
			<select class="form-control" name="trainno" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$tet="SELECT * FROM train";
				$t_run=mysql_query($tet);
				$t_count=mysql_num_rows($t_run);
				for($i=0;$i<$t_count;$i++)
				{
					$tdata=mysql_fetch_array($t_run);
					echo "<option value='".$tdata['TrainNo']."'>".$tdata['TrainNo']."</option>";
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Train No.</span>
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
		
		<div class="row">
			<div class="col-md-6">
		<div class="form-group">
			<select class="form-control" name="coachno" required>
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
					echo "<option value='".$cdata['CoachNo']."'>".'('.$tdata['TrainNo'].')'.'&nbsp;'.'&nbsp;'.$cdata['CoachNo']."</option>";
				}
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Coach No.</span>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<select class="form-control" name="coachtype" required>
			<option value="" label="&nbsp;" selected hidden></option>
			<option value="Ordinary Class">Ordinary Class</option>
			<option value="Upper Class">Upper Class</option>
			<option value="Upper Sleeper">Upper Sleeper</option>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Coach Type</span>
		</div>
		</div>
		</div>					
		
		<div class="row">
			<div class="col-md-6">
		<div class="form-group">
			<select class="form-control" name="seatno" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$set="SELECT * FROM seat";
				$s_run=mysql_query($set);
				$s_count=mysql_num_rows($s_run);
				for($i=0;$i<$s_count;$i++)
				{
					$sdata=mysql_fetch_array($s_run);
					echo "<option value='".$sdata['SeatNo']."'>".$sdata['SeatNo']."</option>";
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Seat No.</span>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<input class="form-control" type="text" name="fare" placeholder="Fare" required>
			<span class="form-label">Fare</span>
		</div>
		</div>
		</div>

		<div class="row">
			<div class="col-md-6">
		<div class="form-group">
			<select class="form-control" name="astation" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php 
				connect();
				$query=mysql_query("Select * from station") or die ("Cann't select.");
				while($row=mysql_fetch_array($query))
				{
					$astation=$row["StationName"];
					echo '<option value="'.$astation.'">'.$astation.'</option>';
				}	
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Arrival Station</span>
		</div>
 		</div>
 		<div class="col-md-6">
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
		</div>
		</div>

		<div class="form-group">
			<input class="form-control" type="text" name="status" placeholder="Status" value="Available">
			<span class="form-label">Status</span>
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