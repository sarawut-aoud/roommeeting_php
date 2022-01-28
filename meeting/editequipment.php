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
		
		$eq_id =$_POST['eq_id'];
		$eq_name = $_POST['eq_name'];
		$de_id = $_POST['de_id'];
		if($eq_name && $de_id){
			$sql = "SELECT * FROM equipment  WHERE eq_name = '$eq_name' AND de_id = '$de_id'";
			$query = mysqli_query($con, $sql);
			$total = mysqli_num_rows($query);
	//@ในข้างหน้าปิดerror
			if($total == 0){
				$sql = "UPDATE equipment SET eq_name = '$eq_name' ,de_id = '$de_id' WHERE eq_id ='$eq_id'";
				mysqli_query($con, $sql)
				or die ("3.ไม่สามารถประมวลคำสั่งได้").mysqli_error();
				echo "<script>Swal.fire({
					type: 'success',
					title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
					showConfirmButton: true,

					}).then(() => { 
						window.location = 'showequipment.php'
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