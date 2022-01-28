<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ข้อมูลการจองห้องประชุม</title>
	<link rel="stylesheet" href="./css/sweetalert2.min.css">
	<script src="./js/sweetalert2.min.js"></script>
</head>

<body>
	<?php
	include ('connect.php');

	$ev_id =$_POST['ev_id'];
	$event_id =$_POST['event_id'];

	$sql = "DELETE FROM event WHERE event_id ='$event_id'";
	$query=  mysqli_query($con, $sql) or die(mysqli_error(conn));

	$sql = "DELETE FROM acces WHERE ev_id ='$ev_id'";
	$query=  mysqli_query($con, $sql) or die(mysqli_error(conn));
	echo "<script>Swal.fire({
		type: 'success',
		title: 'ลบข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,

	}).then(() => { 
		window.location = 'showrequest_admin.php'
	});
</script>";

?>

</body>
</html>
