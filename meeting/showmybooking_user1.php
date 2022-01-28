<?php
session_start();

if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {


  include ('connect.php');
  // $valid_uname = $_SESSION["valid_uname"];
  $sql = "select *
  from acces 
  INNER JOIN event on event.ev_id = acces.ev_id
  INNER JOIN member on member.id = event.id
  INNER JOIN department on member.de_id = department.de_id
  INNER JOIN rooms on rooms.ro_id = event.ro_id
  INNER JOIN equipment on equipment.eq_id = acces.eq_id
  WHERE event.ev_status = '3' and equipment.de_id ='".$_SESSION['de_id']."' and equipment.eq_id = acces.eq_id  group by event.event_id";
  $query = mysqli_query($con, $sql)
  or die ("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error; 
 // mysqli_close($con); 
  ?>
  <style>
    .inputcolor {
      padding: 0px !important;
    }
  </style>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>แจ้งเตือนรายการจองของฉัน</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <?php
    include "user_menu.php";
    include "menu_logout.php";
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><font size="6" face="TH SarabunPSK"> จัดเตรียมอุปกรณ์ </font><!-- <a href="frm_addbooking_general.php"><span class="btn btn-primary btn-md  fa fas-plus float-right "><i class="far fa-calendar-check"> จองห้องประชุม</i></a> --></h6>
           <input name="id" type="hidden" id="id" value="<?php echo "$rs[id]"; ?>" />
         </div>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>วันที่</th>
                  <th>สถานที่ประชุม</th>
                  <th>หัวข้อเรื่องประชุม</th>
                  <th>ตั้งแต่</th>
                  <th>ถึง</th>
                  <th>สถานะ</th>
                  <!--   <th>อุปกรณ์</th> -->
                  <th>รายละเอียด</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ลำดับ</th>
                  <th>วันที่</th>
                  <th>สถานที่ประชุม</th>
                  <th>หัวข้อเรื่องประชุม</th>
                  <th>ตั้งแต่</th>
                  <th>ถึง</th>
                  <th>สถานะ</th>
                  <!--        <th>อุปกรณ์</th> -->
                  <th>รายละเอียด</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                while ($rs=mysqli_fetch_array($query)){

                  $id = $_SESSION['userid'];
                  $ev_id = $rs['ev_id'];
                  $ev_status = $rs['ev_status'];
                  if($ev_id){
                    $sql2 = "SELECT * FROM setdevice WHERE ev_id = '$ev_id' && id = '$id' && dv_status = '$ev_status'";
                    $result = mysqli_query($con,$sql2) or die(mysqli_error($con));
                    $total = mysqli_fetch_array ($result);

                    if($total==0){
                      $sql2 = "DELETE FROM setdevice WHERE ev_id ='$ev_id'";
                      $rs2 =  mysqli_query($con, $sql2) or die(mysqli_error(conn)); 

                      $sql1 ="INSERT INTO setdevice(id,ev_id,dv_status)VALUES ('$_SESSION[userid]','$rs[ev_id]','$rs[ev_status]')";
                      $rs1 =  mysqli_query($con, $sql1) or die(mysqli_error(conn)); 
                    }
                  }
                  ?>
                  <tr>
                    <td  align="center" bgcolor="#F8F8FF"><?php echo "$rs[ev_id]"; ?></td>
                    <td align="left" width="90" bgcolor="#F8F8FF" ><?php echo "$rs[ev_createdate]"; ?></td>
                    <td align="left" width="140" bgcolor="#F8F8FF" ><?php echo "$rs[ro_name]"; ?></td>
                    <td align="left" width="280" bgcolor="#F8F8FF"><?php echo "$rs[ev_title]"; ?><?php echo "</a>"; ?></td>
                    <td align="left"   bgcolor="#F8F8FF" ><?php echo "$rs[ev_startdate]"; ?> เวลา <?php echo "$rs[ev_starttime]"; ?> น.</td>
                    <td align="left" bgcolor="#F8F8FF" ><?php echo "$rs[ev_enddate]"; ?> เวลา <?php echo "$rs[ev_endtime]"; ?> น.</td>
                    <td align="center" bgcolor="#F8F8FF" ><?php  if($rs['ev_status']=='0'){echo "รออนุมัติจากหัวหน้า";
                  } else if($rs['ev_status']=='1'){echo "รออนุมัติ";
                } else if($rs['ev_status']=='2'){echo "ไม่อนุมัติจากหัวหน้า";
              } else if($rs['ev_status']=='3'){echo "อนุมัติ";
            } else if($rs['ev_status']=='4'){echo "ไม่อนุมัติ";
          } else if($rs['ev_status']=='5'){echo "ยกเลิก";
        }?></td>
        <!--  <td  align="center" bgcolor="#F8F8FF"><?php echo "$rs[eq_name]"; ?></td> -->
        <td align="center" bgcolor="#F8F8FF"><div align="center">
         <?php echo "<a href=\"detailbooking_user1.php?ev_id=$rs[ev_id]\">"; ?><span  class="btn btn-info btn-sm " > 
          <i class="far fa-file-alt">  รายละเอียด  </i></span></a></div></td>

        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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
                          <!-- <?php
                          //include "ad_menu_logout.php";
                          ?> -->

                          <!-- Bootstrap core JavaScript-->
                          <script src="vendor/jquery/jquery.min.js"></script>
                          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                          <!-- Core plugin JavaScript-->
                          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                          <!-- Custom scripts for all pages-->
                          <script src="js/sb-admin-2.min.js"></script>

                          <!-- Page level plugins -->
                          <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                          <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                          <!-- Page level custom scripts -->
                          <script src="js/demo/datatables-demo.js"></script>

                        </body>

                        </html>
                        <?php } ?>