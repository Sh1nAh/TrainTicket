<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	if(isset($_REQUEST['dstid']))
	{
		$delete_stid=$_REQUEST['dstid'];
		connect();
		$query=mysql_query("Delete from station Where StationID=".$delete_stid) or die ("Cann't delete");
		if ($query)
		{
			$msg="Delete Successfully";
		}
	}
?>

<?php
	require_once("conn.php");
	if(isset($_REQUEST['btnsave']))
	{
		$stname=$_REQUEST['txtstationname'];
		$rid=$_POST['routeid'];
		if(empty($stname))
			$msg="Please Fill Station Name";
		else if(empty($rid))
			$msg="Please Choose Route";
		else
		{
			connect();
			$query=mysql_query("Select * From station where RouteID='$rid' and StationName='$stname'") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This Train is already exist!";
			// else
			// 	$save_query=mysql_query("Insert into station (RouteID, StationName) Values ('$rid', '$stname')") or die ("Can't Insert Record");
			if ($rid=1) 
			{
				$save=mysql_query("Insert into station (RouteID, StationName) Values ('$rid', '$stname (UP)')") or die ("Can't Insert Record");
			}
			else
			{
				$save=mysql_query("Insert into station (RouteID, StationName) Values ('$rid', '$stname (DN)')") or die ("Can't Insert Record");
			}	
			if($save)
				$msg="Data Saved!";
		}
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Stations</title>

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
				<div class="booking-form" style="padding: 60px 50px 61px 50px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="station.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Setup Stations</h2>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtstationname" placeholder="Station Name">
			<span class="form-label">Station Name</span>
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
	<table style="color:#ffc600; font-size:15px; width:100%; line-height:30px;">
			<tr>
				<th><font>RouteID</font></td>
				<th><font>Station Name</td>
			</tr>
			<?php
				connect();
				$query=mysql_query("SELECT * FROM station Order by RouteID") or die ("Cann't Select");
				while($row=mysql_fetch_array($query))
				{
					$stid=$row["StationID"];
					$rid=$row["RouteID"];
					$stname=$row["StationName"];
			?>
			<tr>
				<td><?php echo $rid; ?></td>
				<td><?php echo $stname; ?></td>
				<td>
					<a href="station.php?dstid=<?php echo $stid;?>">Delete</a>
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