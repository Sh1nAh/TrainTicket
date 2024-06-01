<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	if(isset($_REQUEST['dtid']))
	{
		$delete_tid=$_REQUEST["dtid"];
		connect();
		$query=mysql_query("Delete from train Where TrainID=".$delete_tid) or die ("Cann't delete");
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
		$tno=$_REQUEST['trainno'];
		$aid=$_POST['adminid'];
		$rid=$_POST['routeid'];
		$ttype=$_REQUEST['traintype'];
		$dtime=$_REQUEST['txtdtime'];
		$atime=$_REQUEST['txtatime'];
		$stations=$_POST['station'];
		$chkNew="";
		foreach ($stations as $chkNew1)
		{
			$chkNew.=$chkNew1.",";
		}

		if(empty($tno))
			$msg="Please Fill Train No.";
		else if(empty($aid))
			$msg="Please Choose Admin Name";
		else if(empty($rid))
			$msg="Please Choose Route";
		else if(empty($ttype))
			$msg="Please Fill Train Type";
		else if(empty($dtime))
			$msg="Please Fill Departure Time";
		else if(empty($atime))
			$msg="Please Fill Arrival Time";
		else
		{
			connect();
			$query=mysql_query("Select * From train where TrainNo='$tno'") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This Train is already exist!";
			else
				$save_query=mysql_query("Insert into train (TrainNo, AdminID, RouteID, TrainType, DepartureTime, ArrivalTime, Stations) Values ('$tno', '$aid', '$rid', '$ttype', '$dtime', '$atime', '$chkNew')") or die ("Can't Insert Record");
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

	<title>Train</title>

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
				<div class="booking-form" style="padding: 37px 0px 37px 0px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="train.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Setup Train</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<select class="form-control" name="trainno" required>
					<option value="" label="&nbsp;" selected hidden></option>
					<option value="5 UP">5 UP</option>
					<option value="6 DN">6 DN</option>
					<option value="3 UP">3 UP</option>
					<option value="4 DN">4 DN</option>
					<option value="11 UP">11 UP</option>
					<option value="12 DN">12 DN</option>
					<option value="1 UP">1 UP</option>
					<option value="2 DN">2 DN</option>
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
			<input class="form-control" type="text" name="txtdtime" placeholder="Departure Time">
			<span class="form-label">Departure Time</span>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<input class="form-control" type="text" name="txtatime" placeholder="Arrivel Time">
			<span class="form-label">Arrival Time</span>
		</div>
		</div>
		</div>
		<div class="form-group">
			<select class="form-control" name="routeid" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$ret="SELECT * FROM trainroute";
				$r_run=mysql_query($ret);
				$r_count=mysql_num_rows($r_run);
				for($i=0;$i<$r_count;$i++)
				{
					$data=mysql_fetch_array($r_run);
					echo "<option value='".$data['RouteID']."'>".$data['RouteID'].'&nbsp;'.'&nbsp;'.$data['Route']."</option>";
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Route</span>
		</div>
		<div class="form-group">
			<select class="form-control" name="adminid" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$aet="SELECT * FROM admin";
				$a_run=mysql_query($aet);
				$a_count=mysql_num_rows($a_run);
				for($i=0;$i<$a_count;$i++)
				{
					$adata=mysql_fetch_array($a_run);
					echo "<option value='".$adata['AdminID']."'>".$adata['AdminName']."</option>";
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Admin Name</span>
		</div>
		<div class="form-group">
			<h3 style="color: #ffc600; font-weight: 600; font-size: 16px; text-transform: capitalize;">Arrival Stations</h3>
			<?php
			$oet="SELECT * FROM station where RouteID='1'";
			$o_run=mysql_query($oet);
			$o_count=mysql_num_rows($o_run);
			echo "<h2 style='color: red; font-weight: 600; font-size: 16px; text-transform: capitalize;'>Stations for Route 1 (UP)</h3>";
			for($i=0;$i<$o_count;$i++)
			{
				$odata=mysql_fetch_array($o_run);
				echo "<input type='checkbox' name='station[]'  value='".$odata['StationName']."' id='checkbox'>".'&nbsp;'."<font style='color: white; font-weight: 600; font-size: 14px; text-transform: capitalize;'>".$odata['StationName']."</font>".'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;';
			}
			?>
		</div>
		<div class="form-group">
			<?php
			$eet="SELECT * FROM station where RouteID='2'";
			$e_run=mysql_query($eet);
			$e_count=mysql_num_rows($e_run);
			echo "<h2 style='color: red; font-weight: 600; font-size: 16px; text-transform: capitalize;'>Stations for Route 2 (DN)</h3>";
			for($i=0;$i<$e_count;$i++)
			{
				$edata=mysql_fetch_array($e_run);
				echo "<input type='checkbox' name='station[]'  value='".$edata['StationName']."' id='checkbox'>".'&nbsp;'."<font style='color: white; font-weight: 600; font-size: 14px; text-transform: capitalize;'>".$edata['StationName']."</font>".'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;';
			}
			?>
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
	<table border="1px" style="color:#ffc600; font-size:15px; width:100%; line-height:30px;">
			<tr>
				<th><font>Train No.</font></td>
				<th><font>Train Type</td>
				<th><font>Departure Time</td>
				<th><font>Arrival Time</td>
				<th><font>Stations</td>
			</tr>
			<?php
				connect();
				$query=mysql_query("SELECT * FROM train") or die ("Cann't Select");
				while($row=mysql_fetch_array($query))
				{
					$tid=$row["TrainID"];
					$tno=$row["TrainNo"];
					$ttype=$row["TrainType"];
					$dtime=$row["DepartureTime"];
					$atime=$row["ArrivalTime"];
					$stations=$row["Stations"];
			?>
			<tr>
				<td><?php echo $tno; ?></td>
				<td><?php echo $ttype; ?></td>
				<td><?php echo $dtime; ?></td>
				<td><?php echo $atime; ?></td>
				<td><?php echo $stations; ?></td>
				<td>
					<a href="train.php?dtid=<?php echo $tid;?>">Delete</a>
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