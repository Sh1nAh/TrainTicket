<!DOCTYPE html>
<html lang="en">

<?php
	require_once("conn.php");
	require_once('AutoID.php');

	// if(isset($_REQUEST['action']))
	// {
	// 	connect();
	// 	$action=$_REQUEST['action'];
	// 	$tid=$_REQUEST['TicketID'];

	// 	if($action==='remove')
	// 	{
	// 		$sqt="UPDATE ticket SET Status='Available' WHERE TicketID='$tid'";
	// 		$num=mysql_query($sqt);
	// 	}
	// }

	if(isset($_REQUEST['btnsave']))
	{
		connect();
		$msg="";

		$rid=AutoID('reserve', 'ReserveID', 'R_', 6);
		$userid=$_REQUEST['uid'];
		$u="SELECT * FROM user where UserName='$userid'";
		$uet=mysql_query($u);
		$uount=mysql_fetch_array($uet);
		$uid=$uount['UserID'];
		
		// $names=$_REQUEST['name'];
		// $genders=$_REQUEST['cbo'];
		// $ages=$_REQUEST['age'];
		// $nrcnos=$_REQUEST['nrcno'];

		$status=$_REQUEST['status'];
		$date=$_REQUEST['date'];
		$qty=$_REQUEST['qty'];
		$tot=$_REQUEST['total'];

		// if(empty($names))
		// 	$msg="Please Fill Name";
		// else if(empty($ages))
		// 	$msg="Please Fill Age";
		// else if(empty($nrcnos))
		// 	$msg="Please Fill NRC No.";
		if(empty($userid))
			$msg="Please Fill User Name";
		else if(empty($date))
			$msg="Please Fill Today Date";
		else if(empty($qty))
			$msg="Please Fill Total Ticket Quantity";
		else
		{
			connect();
			$save_query=mysql_query("Insert into reserve (ReserveID, UserID, Date, TicketQty, TotalAmount, Status) Values ('$rid', '$uid', '$date', '$qty', '$tot', '$status')") or die ("Can't Insert Record");

			if($save_query)
			{
				$sql_start='Insert into rtraveller (TravellerName, Gender, Age, NRCNo) Values';

				$sql_array=array();
				$num=$_POST['traveller'];

				foreach ($_POST['name'] as $row=>$name)
				{
					$n=$name;
					$g=$_POST['cbo'][$row];
					$a=$_POST['age'][$row];
					$nr=$_POST['nrcno'][$row];
					if(empty($n))
					$msg="Please Fill Traveller Name";
					elseif(empty($g))
					$msg="Please Fill Gender";
					elseif(empty($a))
					$msg="Please Fill Age";
					elseif(empty($nr))
					$msg="Please Fill NRC No.";
					else
					$sql_array[]='("' .$n . '", "'.$g.'", "'.$a.'", "'.$nr.'")';

					if(count($sql_array)>= $num)
					{
						$query_single=$sql_start . implode(', ', $sql_array);
						mysql_query($query_single);
						$sql_array=array();
					}
				}
				if(count($sql_array)>0)
				{
					$tr_query=$sql_start . implode(', ', $sql_array);
					mysql_query($tr_query) or die (mysql_error());
				}
				if($sql_start)
	// $msg= "<script>window.alert('Data Saved')";
	echo "<script>alert('Successfully Reserved!');
				location.assign('ureserve.php');
				</script>";
			}
		}
	}
	
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Checkout</title>

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
			<div class="booking-form" style="padding: 34px 0px 34px 0px;">
				<div class="booking-bg"></div>
				<?php
					if(!empty($msg))
					echo "<font color='red' style='font-size:16px;'>".$msg."</font>";
				?>
				<br>
				<table style="color:#ffc600; font-size:15px; margin: 0; width: 110%; line-height:30px;">
		<tr>
		<th>Date</th>
		<th>TicketID</th>
		<th>Train No.</th>
		<th>Coach No.</th>
		<th>Seat No.</th>
		<th>Departure Time</th>
		<th>Arrival Station</th>
		<th>Fare</th>
<!-- 		<th>&nbsp;&nbsp;Action</th> -->
		</tr>
		<?php
			if(isset($_REQUEST['check']))
			{
				connect();
				$sql="SELECT * FROM ticket WHERE Status='Reserved'";
				$ret=mysql_query($sql);
				$rcount=mysql_num_rows($ret);
			}
			$total=0;
			for($i=0;$i<$rcount;$i++)
			{
				$data=mysql_fetch_array($ret);
				echo "<tr>";
				echo "<td>".$data['Date']."</td>";
				echo "<td>".$data['TicketID']."</td>";
				echo "<td>".$data['TrainNo']."</td>";
				echo "<td>".$data['CoachNo']."</td>";
				echo "<td>".$data['SeatNo']."</td>";
				echo "<td>".$data['DepartureTime']."</td>";
				echo "<td>".$data['ArrivalStation']."</td>";
				echo "<td>".$data['Fare']."</td>";
				// echo "<td><a href='reservetraveller.php?action=remove&TicketID=".$data['TicketID']."'><font style='color: red; background-color: #1a1b1d; font-weight: 50; padding: 5px 5px; font-size: 14px; border: 0px #ffc600;'>Remove</font></a></td>";
				echo "</tr>";
				$fare=$data['Fare'];
				$total+=$fare;
			}
			?>
		</table>
		<br>
		<font style="color: #ffc600; font-size: 17px;">Total Amount: <?php echo $total; ?></font>
	<form method="POST" enctype="multipart/form-data">
		<div class="form-header">
			<h2>Checkout Form</h2>
		</div>
				<?php
				connect();
				for($i=0;$i<$rcount;$i++)
				{
					$j=$i+1;
				?>
					<div class='form-group'>
					<input type='hidden' name='traveller' value="<?php echo $j; ?>"><font size='4px' color='red'>Info&nbsp;<?php echo $j; ?></font>
					</div>
					<div class='row'>
					<div class='col-md-6'>
					<div class='form-group'>
					<input class='form-control' type='text' name='name[]' placeholder='Name'>";
					<span class='form-label'>Name</span>
					</div>
					</div>
					<div class='col-md-6'>
					<div class='form-group' style='padding: 40px 0px 0px 0px;'>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='checkbox' name='cbo[]' value='Male'>&nbsp;&nbsp;<font color='white' size='3px'>Male</font>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type='checkbox' name='cbo[]' value='Female'>&nbsp;&nbsp;<font color='white' size='3px'>Female</font>
					</div>
					</div>
					</div>
					<div class='form-group'>
					<input class='form-control' type='text' name='age[]' placeholder='Age'>
					<span class='form-label'>Age</span>
					</div>
					<div class='form-group'>
					<input class='form-control' type='text' name='nrcno[]' placeholder='NRC No.'>
					<span class='form-label'>NRC No.</span>
					</div>
				<?php
				}
				?>
			<div class="form-group">
				<input class="form-control" type="text" name="uid" placeholder="User Name">
				<span class="form-label">User Name</span>
			</div>
			<div class="form-group">
				<input class="form-control" type="date" name="date" placeholder="Today Date">
				<span class="form-label">Date</span>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="qty" value="<?php echo $j; ?>">
				<span class="form-label">Ticket Quantity</span>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="total" value="<?php echo $total; ?>">
				<span class="form-label">Total Fare</span>
			</div>
			<div class="form-group">
				<input class="form-control" type="hidden" name="status" value="Pending">
				<!-- <span class="form-label"></span> -->
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