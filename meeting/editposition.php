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

	$po_id =$_POST['po_id'];
	$po_name = $_POST['po_name'];
	if($po_name){
		$sql = "SELECT * FROM position WHERE po_name = '$po_name'";
		$query = mysqli_query($con, $sql);
		$total = mysqli_num_rows($query);
		if($total == 0){
			$sql = "UPDATE position SET po_name = '$po_name' WHERE po_id='$po_id'";
			mysqli_query($con, $sql)
			or die ("3.ไม่สามารถประมวลคำสั่งได้").mysqli_error();
			echo "<script>Swal.fire({
				type: 'success',
				title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
				showConfirmButton: true,

				}).then(() => { 
					window.location = 'showposition.php'
					});

					</script>";
					return; 
				}
				else{
					echo "<script>Swal.fire({
						type: 'warning',
						title: 'กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง',
						showConfirmButton: true,

						}).then(() => { 
							window.history.back()
							});
							</script>";
							return;
						}
					}
					mysqli_close($con);
					?>
				</body>
				</html>


				<!-- timer: 2000 -->