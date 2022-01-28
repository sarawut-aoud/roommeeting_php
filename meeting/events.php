<?php
header("Content-type:application/json; charset=UTF-8");    
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 
// โค้ดไฟล์ dbconnect.php ดูได้ที่ http://niik.in/que_2398_5642
require_once("dbconnect.php");
$json_data = array();

//echo $_GET['start'].$_GET['end'];
// $sql ="
// SELECT * FROM tbl_event WHERE event_startdate>='".$_GET['start']."'
// AND event_enddate<='".$_GET['end']."'
// ";

$sql ="SELECT * from event 
inner join rooms on event.ro_id = rooms.ro_id
inner join style on event.st_id = style.st_id
inner join member on event.id = member.id
inner join department on member.de_id = department.de_id where event.ev_status = '3'";

$result = $mysqli->query($sql);
if(isset($result) && $result->num_rows>0){
    $json_data = [];
    while($row = $result->fetch_assoc()){

//          $_start_date = $row['ev_startdate'];
//                 $_end_date = false;
//                 $_start_time = false;
//                 $_end_time = false;
//                 $_repeat_day = false;
//                // $_all_day = ($row['event_allday']!=0)?true:false;
//                 if($row['ev_starttime']!="00:00:00"){
//                         $_start_date = $row['ev_startdate']."T".$row['ev_starttime'];
//                         if($row['ev_endtime']!="00:00:00" && ($row['ev_starttime']==$row['event_enddate'] || 
//                             $row['ev_enddate']=="0000-00-00") ){
//                                 $_end_date = $row['ev_startdate']."T".$row['ev_endtime'];
//                     }
//             }
//             if($row['ev_enddate']!="0000-00-00"){
//                     $_end_date = $row['ev_enddate'];
//                     if($row['ev_endtime']!="00:00:00"){
//                             $_end_date = $row['ev_enddate']."T".$row['ev_endtime'];
//                     }else{
//                             $_end_date = date("Y-m-d",strtotime($row['ev_enddate']." +1 day"));
//                     }
//             }
//             if($row['ev_enddate']!="0000-00-00" && $row['ev_enddate']!=$row['ev_startdate'] 
//                 && $row['ev_starttime']!="00:00:00" && $row['ev_endtime']!="00:00:00" ){
//                     $_start_date = $row['ev_startdate'];
//                 $_end_date = $row['ev_enddate'];             
//                 $_start_time = $row['ev_starttime'];
//                 $_end_time = $row['ev_endtime'];     
//                 $_all_day = false;          
//         }

        $row['ev_url'] = "javascript:viewdetail('{$row['ev_id']}');";
        //$arr_eventData = array(
        $s_date =  $row['ev_startdate'];
        $json_data[] = [
            "id" => $row['ev_id'],
            "groupId" => str_replace("-","",$s_date),
            "start" => $row['ev_startdate'],
            "end" => $row['ev_enddate'],
            // "startTime" => $_start_time,
            // "starttime" =>  $row['ev_starttime'],
            // "endtime" => $row['ev_endtime'],
            "title" => $row['ev_title'],
            "url" => $row['ev_url'],
            "textColor" => $row['ev_color'],
            "backgroundColor" => $row['ro_color'],
            "borderColor" => $row['ev_bgcolor'],
            "room" => $row['ro_name'],
            "style" => $row['st_name'],
            "people" => $row['ev_people'],
            "name" => $row['firstname'],
            "lastname" => $row['lastname'],
            "dename" => $row['de_name'],
            "dephone" => $row['de_phone'],
        //);
        //$json_data[] = $arr_eventData;
        ];

    }

}

//print_r($json_data);
if(isset($_GET['events'])){
    echo json_encode($json_data);

}
?>