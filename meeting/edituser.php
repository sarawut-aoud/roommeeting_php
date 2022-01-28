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
	include ('connect.php');

	$id =$_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$ntitle =$_POST['ntitle'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$position =$_POST['position'];
	$phone = $_POST['phone'];
	$de_id = $_POST['de_id'];
	$sta_id = $_POST['sta_id'];

	$sql = "UPDATE member SET username = '$username' , password = '$password', ntitle = '$ntitle', firstname = '$firstname', lastname = '$lastname', position = '$position', phone = '$phone', de_id = '$de_id', sta_id = '$sta_id' WHERE id='$id'";
	mysqli_query($con, $sql)
	or die ("3.ไม่สามารถประมวลคำสั่งได้").mysqli_error();
	echo "<script>Swal.fire({
		type: 'success',
		title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,

		}).then(() => { 
			window.location = 'frm_edituser.php'
			});

			</script>";
			return; 

			mysqli_close($con);
			?>
		</body>
		</html>