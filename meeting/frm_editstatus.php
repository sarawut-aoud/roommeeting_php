<?php
session_start();
// if(isset($_SESSION["valid_uname"])&& isset($_SESSION["valid_pwd"])){
// session_start();

if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {
  
  include ('connect.php');
  $sta_id = $_GET['sta_id'];
  $sql = "SELECT * FROM status WHERE sta_id = '$sta_id'"  ;
  $query = mysqli_query($con, $sql)
  or die ("3.ไม่สามารถประมวลคำสั่งได้").mysqli_error();
  $rs = mysqli_fetch_array($query);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ข้อมูลระดับสิทธิ์ในการใช้งาน</title>

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
      <h4 class="text-dark" ><i class="far fa-edit"></i>  แก้ไขข้อมูลระดับสิทธิ์ในการใช้งาน</h4>
    </center>
    <form action="editstatus.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <div class="container text-dark " style="width: 60%; height: auto;">
                <!-- <div id="content-wrapper">
                  <div class="container-fluid"> -->
                    <!-- DataTables Example -->
                    <!-- <div class="card mb-3">
                      <div class="card-header">
                        <i class="far fa-edit"></i>
                    แก้ไขข้อมูลพนักงาน</div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">   -->

                            <br>
                            <tr>
                              <th width="143">ระดับสิทธิ์ :</th>
                              <td width="338">
                                <input onkeypress="isInputChar(event)" class="form-control" required name="sta_name" type="text" id="sta_name" value="<?php echo"$rs[sta_name]"; ?>" /></td>
                              </tr>
                              <br>

                              <center>
                                <tr>
                                  <td colspan="2" align="center">
                                    <input class="btn btn-success mb-3" type="submit" name="btnsave" id="btnsave" value="  บันทึก  " />
                                    <input class="btn btn-danger mb-3" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="  ยกเลิก  " />
                                    <input name="sta_id" type="hidden" id="sta_id" value="<?php echo"$rs[sta_id]"; ?>" />
                                    <!-- <input name="u_pic" type="hidden" id="u_pic" value="<?php //echo"$rs[u_pic]"; ?>" /> -->
                                  </td>
                                </tr>
                              </center>
                              <br>
                            </div>
                          </form>
                        </tr>

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

                  </body>

                  </html>
                <?php } ?>
                