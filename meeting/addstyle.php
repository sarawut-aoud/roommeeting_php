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
		$st_name = $_POST['st_name'];
		
	// $fileupload =$_FILES['photo']['tmp_name'];
	// $fileupload_name = uniqid().'_'.$_FILES['photo']['name'];
	//เงื่อนไขดักค่าซ้ำ&
		if($st_name){
			$sql = "SELECT * FROM style WHERE st_name = '$st_name' ";
			$query = mysqli_query($con, $sql);
			$total = mysqli_fetch_array ($query);
			if($total==0){

			//เซ็ครูปภาพ
			// if($fileupload !=""){
			// 	copy($fileupload,"./picture/".$fileupload_name);
				//เงื่อนไข INSERT INTO ตารางที่1-----
				//if เงื่อนไขเพิ่มข้อมูลแแบบ--มีรูปภาพ
			// 	$sql ="INSERT INTO user(u_name,u_sur,u_add,u_zip,u_tell,u_line,u_pic)VALUES ('$u_name','$u_sur','$u_add','$u_zip','$u_tell','$u_line','$fileupload_name')";
			// }
			//else เงื่อนไขเพิ่มข้อมูลแแบบ--ไม่มีรูปภาพ
			// else{
				$sql ="INSERT INTO style(st_name)VALUES ('$st_name')";
			// }
			//เก็บข้อมูลลงฐาน INSERT INTO ตารางที่1-----
				$query=  mysqli_query($con, $sql) or die(mysqli_error(conn)); 
			//จับ aotonumber
			// $u_id = mysql_insert_id() ;
			//-------

			//คำสั่งทดลองเซ็คเงื่อนไขว่าเข้าฐานหรือไม่
			//if($query){echo "ok";} else{echo "error";}
			//เงื่อนไข INSERT INTO ตารางที่2-----
			// $sql ="INSERT INTO employee(u_id,e_username,e_password,e_num)VALUES ('$u_id','$e_username','$e_password','$e_num')";
			// //เก็บข้อมูลลงฐาน INSERT INTO ตารางที่2-----
			// $query=  mysql_query($sql,$conn) or die(mysql_error(conn));


			// or die("3. ไม่สามารถประมวลผลคำสั่งได้");
				mysqli_close($con);
				echo "<script>Swal.fire({
					type: 'success',
					title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
					showConfirmButton: true,
					
					}).then(() => { 
						window.location = 'showstyle.php'
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
					