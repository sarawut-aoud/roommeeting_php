<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>จองห้องประชุม</title>
	<link rel="stylesheet" href="./css/sweetalert2.min.css">
	<script src="./js/sweetalert2.min.js"></script>
</head>

<body>
	<?php error_reporting(~E_NOTICE);
	include "connect.php";
	include "datenum.php"; //เรียก function datediff
	$ev_title = $_POST['ev_title'];
	$ev_people = $_POST['ev_people'];
	$ro_id = $_POST['room_id'];
	$st_id = $_POST['st_id'];
	$id = $_POST['id'];
	$ev_id = $_POST['ev_id'];
	$event_id = $_POST['event_id'];
	$ev_status = $_POST['ev_status'];
	if($ev_status == '3'){
		$status_yes = 3;
		$status_no = 4;
	}elseif($ev_status == '5'){
		$status_yes = 5;
		$status_no = 1;
	}elseif($ev_status == '4'){
		$status_yes = 4;
		$status_no = 1;
	}elseif($ev_status == '1'){
		$status_yes = 1;
		$status_no = 1;
	}elseif($ev_status == '0'){
		$status_yes = 0;
		$status_no = 1;
	}
	// echo $ev_status.''.$status_yes.''.$status_no;

	$ev_startdate = $_POST['ev_startdate'];
	$ev_enddate = $_POST['ev_enddate'];
	$ev_starttime = $_POST['ev_starttime'];
	$ev_endtime = $_POST['ev_endtime'];


	$sql = "UPDATE event SET ev_status = '$status_yes' WHERE event_id='$event_id'";
	$query = mysqli_query($con, $sql) or die (mysqli_error($con)); 

	if ($query) {

			// ส่วนของ datediff
		$chk = 0;
		$date_diff = dateDiff($ev_startdate,$ev_enddate);
		$num = substr($date_diff, 1);
		$sing = substr($date_diff, 0 ,1); // ส่วนของ datediff

		// echo $date_diff;
		// echo '<br>';
		// echo $ev_startdate;
		// echo '<br>';
		// echo $ev_enddate;
		// echo '<br>';

	if ($num >= 0 && $sing == "+") {  		// ส่วนของ datediff
		$dateStart = $ev_startdate;	
		// echo '<br>';				// ส่วนของ datediff

		for ($i = 0; $i <= $num; $i++) {	// ส่วนของ datediff INSERT event_id ตัวแปร $event_id
			// echo 'ทดสอค่าวน for '.$dateStart;
			// echo '<br>';
			
			$sql1 = "SELECT ev_id, event_id, substr(ev_starttime, 1, 5) as ev_starttime, substr(ev_endtime, 1,5) as ev_endtime FROM event WHERE event_id != '$event_id' and ro_id = '$ro_id' and ev_startdate = '$dateStart' and ev_status != '3'";
			$query1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

			while ($rs = mysqli_fetch_array($query1)) {
				// echo "ทดสอบค่า while loop ".$rs['ev_id']." ".$rs['ev_starttime'];
				// echo '<br>';
				// echo $ev_starttime;
				// echo '<br>';
				if ($rs['ev_starttime'] == $ev_starttime) {
					// echo "case1";
					$sql = "UPDATE event SET ev_status = '$status_no' WHERE event_id = '".$rs['event_id']."' ";
					$query = mysqli_query($con, $sql) or die (mysqli_error($con)); 
				}elseif (($rs['ev_starttime'] >= $ev_starttime) && ($rs['ev_starttime'] <= $ev_endtime)){
					// echo "case2";
					$sql = "UPDATE event SET ev_status = '$status_no' WHERE event_id = '".$rs['event_id']."' ";
					$query = mysqli_query($con, $sql) or die (mysqli_error($con));
				}elseif (($rs['ev_starttime'] <= $ev_starttime) && ($rs['ev_starttime'] <= $ev_starttime && $rs['ev_endtime'] >= $ev_endtime)){
					// echo "case3";
					$sql = "UPDATE event SET ev_status = '$status_no' WHERE event_id = '".$rs['event_id']."' ";
					$query = mysqli_query($con, $sql) or die (mysqli_error($con));
				}elseif (($rs['ev_starttime'] <= $ev_starttime) && ($rs['ev_endtime'] >= $ev_starttime && $rs['ev_endtime'] <= $ev_endtime)){
					// echo "case4";
					$sql = "UPDATE event SET ev_status = '$status_no' WHERE event_id = '".$rs['event_id']."' ";
					$query = mysqli_query($con, $sql) or die (mysqli_error($con));
				}
			}

			$dateStart = date("Y-m-d", strtotime("+1 day", strtotime($dateStart))); // ส่วนของ datediff
		}
	} // ส่วนของ datediff

	echo "<script>Swal.fire({
		type: 'success',
		title: 'จัดการข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,

		}).then(() => { 
			window.location = 'showrequest_admin.php'
			});

			</script>";
			return;  
		}

		?>

	</body>
	</html>