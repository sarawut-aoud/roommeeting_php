<?php
session_start();
error_reporting(~E_NOTICE); 
header('Content-Type: application/json');
require_once("dbconnect.php");
$sql ="SELECT * from event 
inner join rooms on event.ro_id = rooms.ro_id
inner join style on event.st_id = style.st_id
inner join member on event.id = member.id
inner join department on member.de_id = department.de_id and event.ev_id='$_POST[id]' GROUP BY event_id";

$result = $mysqli->query($sql);
if(isset($result) && $result->num_rows>0){
    while($row = $result->fetch_assoc()){  

      $arr = array("id" => $row['ev_id'],
        "groupId" => str_replace("-","",$s_date),
        "start" => $row['ev_startdate'],
        "end" => $row['ev_enddate'],
        "starttime" =>  $row['ev_starttime'],
        "endtime" => $row['ev_endtime'],
        "title" => $row['ev_title'],
        "url" => $row['ev_url'],
        "textColor" => $row['ev_color'],
        "roomColor" => $row['ro_color'],
        "room" => $row['ro_name'],
        "style" => $row['st_name'],
        "people" => $row['ev_people'],
        "name" => $row['firstname'],
        "lastname" => $row['lastname'],
        "dename" => $row['de_name'],
        "dephone" => $row['de_phone'],);
   // echo  $json;

  //
  }
}

echo json_encode($arr);         

?>