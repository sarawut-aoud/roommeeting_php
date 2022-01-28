<?php
// $server = "localhost";
// //$user = "s601102064113";
// //$password = "601102064113";
// //$dbname = "db601102064113";
// $user = "root";
// $password = "";
// $dbname = "db_otop";
// $conn = mysql_connect($server,$user,$password);

// if(!$conn)
// 	die("1.ไม่สามารถติดต่อกับ MySQL ได้");

// mysql_select_db($dbname,$conn)
// or die("2.ไม่สามารถเลือกใช้ฐานข้อมูลได้");
// mysql_query("SET character_set_results=utf8");
// mysql_query("SET character_set_client=utf8");
// mysql_query("SET character_set_connection=utf8");
?>

<?php
$con= mysqli_connect("localhost","root","","db_room") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');

// $con_hos= mysqli_connect("192.168.9.7","pbh","pbh@717@677","db_ksh") or die("Error: " . mysqli_error($con_hos));
// mysqli_query($con_hos, "SET NAMES 'utf8' ");
// date_default_timezone_set('Asia/Bangkok');
?>
