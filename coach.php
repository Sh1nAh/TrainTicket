<!DOCTYPE html>
<html lang="en">
<!-- 
<?php
	require_once("conn.php");
	
	if(isset($_REQUEST['dcid']))
	{
		$delete_cid=$_REQUEST["dcid"];
		connect();
		$query=mysql_query("Delete from coach Where CoachID=".$delete_cid) or die ("Cann't delete");
		if ($query)
		{
			$msg="Successfully Deleted!";
		}
	}
?> -->

<?php
	require_once("conn.php");
	if(isset($_REQUEST['btnsave']))
	{
		connect();
		$coachno=$_REQUEST['txtcoachno'];
		$tid=$_REQUEST['trainid'];
		$coachtype=$_REQUEST['txtcoachtype'];
		if(empty($coachno))
			$msg="Please Fill Coach No.";
		else if(empty($tid))
			$msg="Please Choose Train No.";
		else if(empty($coachtype))
			$msg="Please Fill Coach Type";
		else
		{
			connect();
			$query=mysql_query("Select * From coach where CoachNo='$coachno' and TrainID='$tid'") or die ("Cann't Select Record");
			$num=mysql_num_rows($query);
			if($num>0)
				$msg="This Coach is already exist!";
			else
				$save_query=mysql_query("Insert into coach (CoachNo, TrainID, CoachType) Values ('$coachno', '$tid', '$coachtype')") or die ("Can't Insert Record");
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

	<title>Coach</title>

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
				<div class="booking-form" style="padding: 34px 50px 34px 50px;">
					<div class="booking-bg"></div>
					<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
					?>
	<form action="coach.php" method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Setup Coaches</h2>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtcoachno" placeholder="Coach No.">
			<span class="form-label">Coach No.</span>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="txtcoachtype" placeholder="Coach Type">
			<span class="form-label">Coach Type</span>
		</div>
		<div class="form-group">
			<select class="form-control" name="trainid" required>
				<option value="" label="&nbsp;" selected hidden></option>
				<?php
				connect();
				$tet="SELECT * FROM train";
				$t_run=mysql_query($tet);
				$t_count=mysql_num_rows($t_run);
				for($i=0;$i<$t_count;$i++)
				{
					$tdata=mysql_fetch_array($t_run);
					echo "<option value='".$tdata['TrainID']."'>".$tdata['TrainNo']."</option>";
				}
				?>
			</select>
			<span class="select-arrow"></span>
			<span class="form-label">Train No.</span>
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