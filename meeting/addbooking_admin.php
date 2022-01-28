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
	$ro_id = $_POST['ro_id'];
	$st_id = $_POST['st_id'];
	$id = $_POST['id'];
	$ev_id = $_POST['ev_id'];
	
	$ev_startdate = $_POST['ev_startdate'];
	$ev_enddate = $_POST['ev_enddate'];
	$ev_starttime = $_POST['ev_starttime'];
	$ev_endtime = $_POST['ev_endtime'];


// ส่วนของ datediff
	$chk = 0;
	$date_diff = dateDiff($ev_startdate,$ev_enddate);
	$num = substr($date_diff, 1);
	$sing = substr($date_diff, 0 ,1); // ส่วนของ datediff
	
	if ($num >= 0 && $sing == "+") {  		// ส่วนของ datediff
		$dateStart = $ev_startdate;					// ส่วนของ datediff

		for ($i = 0; $i <= $num; $i++) {	// ส่วนของ datediff INSERT event_id ตัวแปร $event_id
			// echo $dateStart;
			// echo "<br>";
			// echo "วันที่ ".$dateStart." เวลาเริ่ม ".$ev_starttime." เวลาสิ้นสุด ".$ev_endtime."<br>";
			$sql = "select if (ev_starttime = '00:00:00', '', substr(ev_starttime, 1, 5)) as ev_starttime, 
			if (ev_endtime = '00:00:00', '', substr(ev_endtime, 1, 5)) as ev_endtime  
			from event where ev_startdate = '$dateStart' and ro_id = '$ro_id' and ev_status = '3'";
			$query = mysqli_query($con, $sql) or die (mysqli_error($con)); 


			while ($rs=mysqli_fetch_array($query)){
				// echo "<br>เริ่ม ".$rs['ev_starttime']." สิ้นสุด ".$rs['ev_endtime']."<br>";

				$timestart = $rs['ev_starttime'];
				$timeend = $rs['ev_endtime'];
				// echo $ev_starttime;
				// echo $timestart;

				if ($timestart != "" && $timeend != "") { 
					if (($ev_starttime >= $timestart) && ($ev_starttime <= $timeend)) {
						// echo "a";
						$chk++;
					}elseif (($ev_starttime <= $timestart) && ($ev_starttime <= $timestart && $ev_endtime >= $timeend)){
						// echo "c";
						$chk++;
					}elseif (($ev_starttime <= $timestart) && ($ev_endtime >= $timestart && $ev_endtime <= $timeend)){
						// echo "c";
						$chk++;
					}else {
						if ($ev_starttime == $timestart) {
							// echo "d";
							$chk++;
						}

					}
				}

			}
			// echo "<br>";
			// echo $chk;


			$dateStart = date("Y-m-d", strtotime("+1 day", strtotime($dateStart))); // ส่วนของ datediff
		}
	} // ส่วนของ datediff

	if($chk >0){
		// echo "จองไม่ได้";
		echo "<script>Swal.fire({
			type: 'warning',
			title: 'ไม่สามารถจองห้องได้',
			showConfirmButton: true,

			}).then(() => { 
				window.history.back()
				});
				</script>";
				return; 
			}else{
				// echo "จองได้";

// ส่วนของ group id
				$sql = "select max(event_id) as maxid from event";            
				$query = mysqli_query($con, $sql) or die (mysqli_error($con)); 

				$data = mysqli_fetch_array($query); 							
				$month = date("m"); 											
				$year = substr((date("Y"))+543, 2,2); 							
				$new = $data['maxid']; 

				if ($new == ""){ 												
					$new = ($new + 1); 											
					$event_id = $year.$month."0000".$new;						
				}else {															
					$id_new = substr($new, 0, 4);								

					if ($id_new == $year.$month){								
						$new = ($new + 1);										
						$new = substr($new, 4, 5);								
						$event_id = $year.$month.$new;							
					}else {														
						$event_id = $year.$month."00001";						
					}															
}// ส่วนของ group id	




if ($num >= 0 && $sing == "+") {  		// ส่วนของ datediff
$dateStart = $ev_startdate;					// ส่วนของ datediff
for ($i = 0; $i <= $num; $i++) {	// ส่วนของ datediff INSERT event_id ตัวแปร $event_id

	$sql ="INSERT INTO event(ev_title,ev_people,ro_id,st_id,id,ev_startdate,ev_enddate,ev_starttime,ev_endtime,ev_status,event_id) 
	VALUES ('$ev_title','$ev_people','$ro_id','$st_id','$id','$dateStart','$ev_enddate','$ev_starttime','$ev_endtime','3','$event_id')";
	$query=  mysqli_query($con, $sql) or die(mysqli_error(conn));

// ส่วนของ CheckBox
	$ev_id  = mysqli_insert_id($con);

	for ($x = 1; $x <= $_POST['sunnum']; $x++) {
		$ed =  $_POST['eqid'.$x];
		if(isset($ed)){
			$sql ="INSERT INTO acces(ev_id,eq_id) 
			VALUES ('$ev_id','$ed')";
			$query =  mysqli_query($con, $sql) or die(mysqli_error(conn));
		}	
} // ส่วนของ CheckBox

$dateStart = date("Y-m-d", strtotime("+1 day", strtotime($dateStart))); // ส่วนของ datediff
} // ส่วนของ datediff

} // ส่วนของ datediff


mysqli_close($con);
echo "<script>Swal.fire({
	type: 'success',
	title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
	showConfirmButton: true,

	}).then(() => { 
		window.location = 'calendar_admin.php'
		});

		</script>";
		return;  
	}
	?>

</body>
</html>
