<?php
session_start();

if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {

  include ('connect.php');
  // $valid_uname = $_SESSION["valid_uname"];
  $ev_id = $_GET['ev_id'];
  $sql = "select event.ev_id, event.ev_title, event.ev_startdate, event.ev_enddate, event.ev_starttime, event.ev_endtime, event.ev_status, event.ev_people, event.ev_createdate, rooms.ro_id, rooms.ro_name, style.st_id, style.st_name, member.id, member.firstname, member.lastname, department.de_id, department.de_name, department.de_phone
  from event 
  inner join rooms on event.ro_id = rooms.ro_id
  inner join style on event.st_id = style.st_id
  inner join member on event.id = member.id
  inner join department on member.de_id = department.de_id where ev_id='$ev_id'";
  $query = mysqli_query($con, $sql)
  or die ("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error; 
  ?>
  <style>
    .inputcolor {
      padding: 0px !important;
    }
  </style>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>รายละเอียดการจองห้องประชุม</title>
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
   include "general_menu.php";
   include "menu_logout.php";
   ?>

   <br>
   <br>
   <div class="col-sm-12">
     <div class="wrap-form">
      <center>
        <h4 class="text-dark" ><i class="far fa-calendar-check"></i>  แบบฟอร์มขออนุญาตใช้ห้องประชุม</h4>
      </center>
      <br>
      <form action="addbooking1.php" method="post" accept-charset="utf-8" align="left"> 

       <?php
       while ($rs=mysqli_fetch_array($query)){
        $status = $rs['ev_status'];
        ?>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >เลขที่ใบขออนุญาต :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[ev_id]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >วันที่ส่งฟอร์ม :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[ev_createdate]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >ชื่อผู้ใช้ห้องประชุม :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[firstname]"; ?> <?php echo "$rs[lastname]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >กลุ่มงาน/ฝ่าย :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[de_name]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >เบอร์ติดต่อสายตรง :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[de_phone]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >หัวข้อเรื่องประชุม :</label>
          <label class="col-sm-4 col-form-label text-dark"><?php echo "$rs[ev_title]"; ?></label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >สถานที่ประชุม :</label>
          <label class="col-sm-3 col-form-label text-dark"><?php echo "$rs[ro_name]"; ?></label>
        </div>
        
<!--       <div class="form-group row">
        <label for="event_name" class="col-sm-3 col-form-label text-right text-dark">ชื่อผู้ใช้ห้องประชุม :</label>
        <div class="col-12 col-sm-7">
          <input type="text" class="form-control" name="event_name"
          autocomplete="off" value="" required>                 
        </div>
      </div>
      <div class="form-group row">
        <label for="event_detail" class="col-sm-3 col-form-label text-right text-dark">สถานที่ประชุม :</label>
        <div class="col-12 col-sm-7">
          <input type="text" class="form-control" name="event_detail"
          autocomplete="off" value="" required>                  
        </div>
      </div> -->
      <div class="form-group row">
        <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >ตั้งแต่ :</label>
        <label class="col-sm-5 col-form-label  text-dark" ><?php echo "$rs[ev_startdate]"; ?> เวลา : <?php echo "$rs[ev_starttime]"; ?> น.</label>                  </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >ถึง :</label>
          <label class="col-sm-5 col-form-label  text-dark" ><?php echo "$rs[ev_enddate]"; ?> เวลา : <?php echo "$rs[ev_endtime]"; ?> น.</label>
        </div>
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >จำนวนคน :</label>
          <label class="col-sm-3 col-form-label text-dark"><?php echo "$rs[ev_people]"; ?> คน</label>
        </div>
        
        <div class="form-group row">
          <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" >รูปแบบการจัดห้อง :</label>
          <label class="col-sm-3 col-form-label text-dark"><?php echo "$rs[st_name]"; ?></label>
        </div>
        <?php
      }

      ?>
      <div class="form-group row">
        <label for="ev_title" class="col-sm-5 col-form-label text-right text-dark" > อุปกรณ์โสตทัศนูปกรณ์ : </label>
        <?php
        $sql1="SELECT * FROM equipment";
        $query1 = mysqli_query($con, $sql1);
        $i=0;
        while ($rs1=mysqli_fetch_array($query1)){
          $i++;
          $sql2="SELECT eq_id FROM  acces where eq_id='$rs1[eq_id]' and ev_id='$ev_id' ";
          $query2 = mysqli_query($con, $sql2);
          $num=mysqli_num_rows($query2);
          $checkbox = '';
          if($num>0){
            $checkbox = 'checked="checked"';
          }
          ?>

          <div class="col-sm-12" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" disabled <?php echo $checkbox ?> name="eqid<?php echo $i ?>" value="<?php echo $rs1['eq_id']; ?>"> <?php echo "$rs1[eq_name]"; ?>
          </div>
          
          <?php
        }
        ?>

        <input type="hidden"  name="sunnum" value="<?php echo $i; ?>">
      </div>
      <div class="form-group row">
        <label for="ev_status" class="col-sm-5 col-form-label text-right text-dark" >สถานะ :</label>
        <label class="col-sm-3 col-form-label text-dark"><?php  if($status=='0'){echo "รออนุมัติจากหัวหน้า";
      } else if($status=='1'){echo "รออนุมัติ";
    } else if($status=='2'){echo "ไม่อนุมัติจากหัวหน้า";
  } else if($status=='3'){echo "อนุมัติ";
} else if($status=='4'){echo "ไม่อนุมัติ";
} else if($status=='5'){echo "ยกเลิก";
}?></label>
</div>
<center>
  <tr>
    <td colspan="2" align="center">
      <input class="btn btn-success btn-sm mb-3" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="   ย้อนกลับ   " />
    </td>
  </center> 
</div>
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
