<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<?php
session_start();

if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {


  include ('connect.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link href='<?=$fullcalendar_path?>/core/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <!--   ส่วนที่เพิ่มเข้ามาใหม่-->    
    <link href='<?=$fullcalendar_path?>/timegrid/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/list/main.css' rel='stylesheet' />

    <script src='<?=$fullcalendar_path?>/core/main.js'></script>
    <script src='<?=$fullcalendar_path?>/daygrid/main.js'></script>
    <!--   ส่วนที่เพิ่มเข้ามาใหม่-->
    <script src='<?=$fullcalendar_path?>/core/locales/th.js'></script>
    <script src='<?=$fullcalendar_path?>/timegrid/main.js'></script>
    <script src='<?=$fullcalendar_path?>/interaction/main.js'></script>
    <script src='<?=$fullcalendar_path?>/list/main.js'></script>    

    <style type="text/css">
      body {
        margin: 0 auto;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
      }

      #calendar {
        max-width: 900px;
        margin: 0 auto;
        background-color: #F0FFFF; //เพิ่มแถวนี้เข้าไปเป็นสี BG
      }

    </style>



  </head>

  <body id="page-top">

    <?php
    include "admin_menu.php";
    include "menu_logout.php";
    ?>
    <div class="container">
      <h4 class="text-center alert  text-dark  p-3" >ตารางการใช้ห้องประชุม โรงพยาบาลเพชรบูรณ์</h4>
      <p align="center">
        <a href="frm_addbooking.php" class="btn btn-info btn-lg "><i class="far fa-calendar-check"></i> ขอใช้ห้องประชุม</a>
      </p>  

      <div id='calendar'></div>

      <!-- Modal -->
      <div class="modal fade " id="calendarmodal" tabindex="-1" role="dialog"  > <!--กำหนด id ให้กับ modal-->
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="calendarmodal-title">Modal title</h5> <!--กำหนด id ให้ส่วนหัวข้อ-->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <br>
            <div class="col-lg-9">
              <div class="form-group row">
                <b class="col-lg-6" >สถานที่ประชุม :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-detail"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">ชื่อผู้ขอใช้ห้องประชุม:</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-name"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">นามสกุล:</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-lastname"></div>            
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">กลุ่มงาน/ฝ่าย/แผนก :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-dename"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">เบอร์ติดต่อสายตรง :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-dephone"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">วันที่เริ่ม :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-start"></div>           
                </div>
              </div>
              
              <div class="form-group row">
                <b class="col-lg-6">ถึงวันที่ :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-end"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">เวลาเริ่ม :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-starttime"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">ถึงเวลา :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-endtime"></div>           
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">จำนวนคน :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-people"></div>            
                </div>
              </div>
              <div class="form-group row">
                <b class="col-lg-6">รูปแบบการจัดห้อง :</b>
                <div class="col-lg-6">      
                  <div id="calendarmodal-style"></div>           
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
      var calendar; // สร้างตัวแปรไว้ด้านนอก เพื่อให้สามารถอ้างอิงแบบ global ได้
      $(function(){
          // กำหนด element ที่จะแสดงปฏิทิน
          var calendarEl = $("#calendar")[0];

          // กำหนดการตั้งค่า
          calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction','dayGrid', 'timeGrid', 'list' ], // plugin ที่เราจะใช้งาน
            defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
            now: '<?php echo date('Y-m-d');?>',
            editable: true,
            header: {
              left: 'prev,next today',
              center : 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },  
            views: {
              timelineThreeDays: {
                type: 'timeline',
                duration: { days: 3 }
              }
            },
            events: { // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
              url: 'events.php?events',
              textColor: 'white',
              error: function() {
                console.log('no');
              },
              success: function() {
               console.log('ok');
             }

           },              
            eventLimit: true, // allow "more" link when too many events
            locale: 'th',    // กำหนดให้แสดงภาษาไทย
            firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
            showNonCurrentDates: false, // แสดงที่ของเดือนอื่นหรือไม่
            eventTimeFormat: { // รูปแบบการแสดงของเวลา เช่น '14:30' 
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false
          }
        });
          
         // แสดงปฏิทิน 
         calendar.render();  

       });
     </script> 
     <script type="text/javascript">
      function viewdetail(id){
        console.log(id);
          // ก่อนที่ modal จะแสดง
          $('#calendarmodal').on('show.bs.modal', function (e) {
                var event = calendar.getEventById(id) // ดึงข้อมูล ผ่าน api
                var event1 = $('#id').val(calendar);
                console.log(event);
                console.log(event.title);
                console.log(event.start);
                console.log(event.end);
                // alert(event);
                //alert(event1);
                $("#calendarmodal-title").html(event.title);
                $("#calendarmodal-detail").html(event.extendedProps.room);
                $("#calendarmodal-style").html(event.extendedProps.style);
                //$("#calendarmodal-detail").html(event.extendedProps.detail);
                $("#calendarmodal-start").html(event.start);
                $("#calendarmodal-end").html(event.end);
                $("#calendarmodal-starttime").html(event.extendedProps.starttime);
                $("#calendarmodal-endtime").html(event.extendedProps.endtime);
                $("#calendarmodal-people").html(event.extendedProps.people);
                $("#calendarmodal-name").html(event.extendedProps.name);
                $("#calendarmodal-lastname").html(event.extendedProps.lastname);
                $("#calendarmodal-dename").html(event.extendedProps.dename);
                $("#calendarmodal-dephone").html(event.extendedProps.dephone);
                
                // ข้อมูลเพิ่มเติมจะเรียกผ่าน extendedProps
              });              
            $("#calendarmodal").modal();// แสดง modal
          }
        </script>

        <br>

        <?php
        include "foot1.php";
        ?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

  </body>

  </html>
<?php } ?>
