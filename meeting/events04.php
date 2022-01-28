<?php
session_start();
error_reporting(~E_NOTICE); 
header('Content-Type: application/json');
require_once("dbconnect.php");
$sql ="select *
  from acces 
  INNER JOIN event on event.ev_id = acces.ev_id
  INNER JOIN member on member.id = event.id
  INNER JOIN department on member.de_id = department.de_id
  INNER JOIN rooms on rooms.ro_id = event.ro_id
  INNER JOIN equipment on equipment.eq_id = acces.eq_id
  WHERE event.ev_status = '3' and equipment.de_id ='".$_SESSION['de_id']."' and equipment.eq_id = acces.eq_id  group by event.ev_title";
// $num = '10';

// echo $_SESSION['userid'];

$result = $mysqli->query($sql);
if(isset($result) && $result->num_rows>0){ 


    $query1 = mysqli_num_rows($result);
    // echo $query1;
    while($row = $result->fetch_assoc()){  
        $id = $_SESSION['userid'];
        $ev_id = $row['ev_id'];
        $ev_status = $row['ev_status'];
        if($ev_id && $id ){
            $sql2 = "SELECT * FROM setdevice WHERE ev_id = '$ev_id' && id = '$id' && dv_status  = '$ev_status'";

            $result2 = $mysqli->query($sql2);

            
            $query2 = mysqli_num_rows($result2);
            if ($query2 > 0 ) {
             $query1 =    $query1 - $query2;
         }
     }
     $arr = array(
        // "groupId" => str_replace("-","",$s_date),
        // "start" => $row['ev_startdate'],
        // "end" => $row['ev_enddate'],
        // "starttime" =>  $row['ev_starttime'],
        // "endtime" => $row['ev_endtime'],
        // "title" => $row['ev_title'],
        // "url" => $row['ev_url'],
        // "textColor" => $row['ev_color'],
        // "roomColor" => $row['ro_color'],
        // "room" => $row['ro_name'],
        // "style" => $row['st_name'],
        // "people" => $row['ev_people'],
        // "name" => $row['firstname'],
        // "ev_id" => $row['ev_id'],
        // "userid" => $_SESSION['userid'],
        // "dephone" => 'jjhjhjhj',
        "ev_status" => $query1,);


   // echo  $json;

  //
 }
}

echo json_encode($arr);   
?>