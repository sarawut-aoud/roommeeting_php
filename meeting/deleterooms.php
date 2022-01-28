<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<link rel="stylesheet" href="./css/sweetalert2.min.css">
	<script src="./js/sweetalert2.min.js"></script>
</head>

<body>
	<?php
	include ('connect.php');

	$ro_id =$_POST['ro_id'];
	$sql = "DELETE FROM rooms WHERE ro_id='$ro_id'";
	mysqli_query($con, $sql)
	or die ("3.ไม่สามารถประมวลคำสั่งได้").mysqli_error();
	echo "<script>Swal.fire({
		type: 'success',
		title: 'ลบข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,

		}).then(() => { 
			window.location = 'showrooms.php'
			});
			</script>";

			?>

		</body>
		</html>
		