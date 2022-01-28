<?php
session_start();
// if(isset($_SESSION["valid_uname"])&& isset($_SESSION["valid_pwd"])){
// session_start();
error_reporting(~E_NOTICE);
if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {

  include "connect.php";
  // echo 'ทดสอบค่าตัวแปร'. $_SESSION['userid'] ;
  $valid_uname= $_SESSION["userid"];
  $sql = "select * FROM member INNER JOIN department on member.de_id = department.de_id WHERE member.id = '".$_SESSION['userid']."'";
  $result = mysqli_query($con,$sql)
  or die(mysqli_error($con));
  // echo "ทดสอบค่า".mysqli_num_rows($result);

  $rs = mysqli_fetch_array($result);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>จองห้องประชุม</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">  


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body id="page-top">

    <?php
    include "admin_menu.php";
    include "menu_logout.php";
    ?>
    <!-- /.container-fluid -->


    <tr>
      <br>
      <center>
        <h4 class="text-dark" ><i class="far fa-calendar-check"></i>  แบบฟอร์มขออนุญาติใช้ห้องประชุม</h4>
      </center>
      <form action="addbooking_admin.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <input name="id" type="hidden" id="id" value="<?php echo "$rs[id]"; ?>" />
        <input name="ev_id" type="hidden" id="ev_id" value="<?php echo "$rs[ev_id]"; ?>" />
        <div class="container text-dark " style="width: 60%; height: auto;">
          <br>
          <div>
            <th>หัวข้อเรื่องประชุม :</th>
            <div class="col-12">
              <input class="form-control" placeholder="กรุณากรอกหัวข้อเรื่องประชุม" autocomplete="off" required type="text" name="ev_title" id="ev_title" onkeypress="isInputChar(event)"/></td>
            </div>
          </div>
          <br>
          <div>
            <th>ชื่อผู้ใช้ห้องประชุม :</th>
            <div class="col-12">
              <input onkeypress="isInputChar(event)" class="form-control" readonly="readonly" required name="firstname" type="text" id="firstname" value="<?php echo $rs['lastname'];?>" />
            </div>
          </div>
          <br>
          <div>
            <th>กลุ่มงาน/ฝ่าย/งาน :</th>
            <div class="col-12">
             <input name="de_name" class="form-control" readonly="readonly" required="required" type="text" id="de_name" value="<?php echo $rs['de_name'];?>"/> 
           </div>
         </div>
         <br>
         <div>
          <th>เบอร์โทรติดต่อสายตรง :</th>
          <div class="col-12">
            <input name="de_phone" class="form-control" readonly="readonly" required="required" type="text" id="de_phone" value="<?php echo $rs['de_phone'];?>"/>  
          </div>
        </div>
        <br>
        <div>
          <th>ตั้งแต่ :</th>
          <div class="col-12">ปี - เดือน - วัน
            <div class="input-group date" id="ev_startdate" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="ev_startdate" data-target="#ev_startdate"
              value="" required>           
              <div class="input-group-append" data-target="#ev_startdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
              </div>
            </div>                  
          </div>
        </div>
        <br>
        <div>
          <th>ถึง :</th>
          <div class="col-12">ปี - เดือน - วัน
            <div class="input-group date" id="ev_enddate" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="ev_enddate" data-target="#ev_enddate"
              value="" >           
              <div class="input-group-append" data-target="#ev_enddate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
              </div>
            </div>                        
          </div>
        </div>
        <br>
        <div>
         <th>เวลาเริ่มต้น :</th>
         <div class="col-12">ชั่วโมง : นาที
          <div class="input-group date" id="ev_starttime" data-target-input="nearest">         
            <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="ev_starttime" data-target="#ev_starttime"
            value="" >           
            <div class="input-group-append" data-target="#ev_starttime" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
          </div>                     
        </div>
      </div>
      <br>
      <div>
       <th>เวลาสิ้นสุด :</th>
       <div class="col-12">ชั่วโมง : นาที
        <div class="input-group date" id="ev_endtime" data-target-input="nearest">        
          <input type="text" class="form-control datetimepicker-input" autocomplete="off" name="ev_endtime" data-target="#ev_endtime"
          value="" >           
          <div class="input-group-append" data-target="#ev_endtime" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="far fa-clock"></i></div>
          </div>
        </div>                      
      </div>
    </div>
    <br>
    <tr>
      <th>กลุ่มงาน/ฝ่าย/งาน :</th>
      <td>
       <input name="de_name" class="form-control" readonly="readonly" required="required" type="text" id="de_name" value="<?php echo $rs['de_name'];?>"/> 
     </tr>
     <br>

     <center>
      <tr>
        <td colspan="2" align="center">
          <input class="btn btn-success mb-3" type="submit" name="btnsave" id="btnsave" value="  บันทึก  " />
          <input class="btn btn-danger mb-3" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="  ยกเลิก  " />
        </td>
      </center>
    </tr>
    <br>
  </div>
</form>
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


<script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>    

<script type="text/javascript">
  $(function () {
        // เมื่อเฃือกวันทำซ้ำ วนลูป สร้างชุดข้อมูล
        $(document.body).on("change",".repeatday_chk",function(){
          $("#ev_repeatday").val("");
          var repeatday_chk = [];
          $(".repeatday_chk:checked").each(function(k, ele){
            repeatday_chk.push($(ele).val());
          });
            $("#ev_repeatday").val(repeatday_chk.join(",")); // จะได้ค่าเปน เช่น 1,3,4
          });
        $('#ev_startdate,#ev_enddate').datetimepicker({
          format: 'YYYY-MM-DD'
        });
        $('#ev_starttime,#ev_endtime').datetimepicker({
          format: 'HH:mm'
        });     
        $(".input-group-prepend").find("div").css("cursor","pointer").click(function(){
          $(this).parents(".input-group").find(":text").val("");
        });         
      });
    </script>


  </body>
  </html>
<?php } ?>
