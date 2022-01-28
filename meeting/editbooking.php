<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ข้อมูลพนักงาน</title>
	<link rel="stylesheet" href="./css/sweetalert2.min.css">
	<script src="./js/sweetalert2.min.js"></script>
</head>

<body>
	<?php
	error_reporting(~E_NOTICE);
	include ('connect.php');

	$ev_title = $_POST['ev_title'];
	$ev_people = $_POST['ev_people'];
	$ro_id = $_POST['ro_id'];
	$st_id = $_POST['st_id'];
	$id = $_POST['id'];
	$ev_id = $_POST['ev_id'];
	
	$ev_startdate = $_POST['ev_startdate'];
	$ev_enddate = $_POST['ev_enddate'];
	$ev_starttime = $_POST['ev_starttime'];
	$ev_endtime = $_POST['ev_endtime'];

	$sql = "UPDATE event SET ev_title = '$ev_title' , ev_people = '$ev_people', ro_id = '$ro_id', st_id = '$st_id', id = '$id', ev_startdate = '$ev_startdate', ev_enddate = '$ev_enddate', ev_starttime = '$ev_starttime', ev_endtime = '$ev_endtime' WHERE ev_id='$ev_id'";
	$query=  mysqli_query($con, $sql) or die(mysqli_error(conn));

	$sql = "DELETE FROM acces WHERE ev_id ='$ev_id'";
	$query=  mysqli_query($con, $sql) or die(mysqli_error(conn));

	for ($x = 1; $x <= $_POST['sunnum']; $x++) {
		$ed =  $_POST['eqid'.$x];
		
		if(isset($ed)){
			$sql ="INSERT INTO acces(ev_id,eq_id) 
			VALUES ('$ev_id','$ed')";
			$query =  mysqli_query($con, $sql) or die(mysqli_error(conn));


		}	



	}


	echo "<script>Swal.fire({
		type: 'success',
		title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,

		}).then(() => { 
			window.location = 'showbooking.php'
			});

			</script>";
			return; 

			mysqli_close($con);
			?>
		</body>
		</html>