<?php
session_start();

if (!$_SESSION['userid']) {
  header("Location: frm_login.php");
} else {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ข้อมูลพนักงาน</title>

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
    include "user_menu.php";
    include "menu_logout.php";
    ?>
    <!-- /.container-fluid -->


    <tr>
      <br>
      <center>
        <h4 class="text-dark" ><i class="fas fa-plus"></i>  เพิ่มข้อมูลพนักงาน</h4>
      </center>
      <form action="addmember_user.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="container text-dark " style="width: 60%; height: auto;">

          <br>
          <tr>
            <th>Username :</th>
            <td>
              <input class="form-control" placeholder="กรุณาใส่ชื่อผู้ใช้" required type="text" name="username" id="username" onkeypress="isInputChar(event)"/></td>
            </tr>
            <br>
            <tr>
              <th>password :</th>
              <td>
                <input class="form-control" placeholder="กรุณาใส่รหัสผ่าน" required type="password" name="password" id="password" onkeypress="isInputChar(event)"/></td>
              </tr>
              <br>
              <div class="form-group">
                <label for="ntitle" class="control-label">คำนำหน้า</label>
                <div>
                  <select name="ntitle" id="ntitle" class="form-control">
                    <option value="" selected="selected">- กรุณาเลือกคำนำหน้า -</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                  </select>
                </div>
              </div>

              <tr>
                <th>ชื่อ :</th>
                <td>
                  <input class="form-control" placeholder="กรุณาใส่ชื่อ" required type="text" name="firstname" id="firstname" onkeypress="isInputChar(event)"/></td>
                </tr>
                <br>
                <tr>
                  <th>นามสกุล :</th>
                  <td>
                    <input class="form-control" placeholder="กรุณาใส่นามสกุล" required type="text" name="lastname" id="lastname" onkeypress="isInputChar(event)"/></td>
                  </tr>
                  <br>
                  <tr>
                    <th>ตำแหน่ง :</th>
                    <td>
                      <input class="form-control" placeholder="กรุณาใส่ตำแหน่ง" required type="text" name="position" id="position" onkeypress="isInputChar(event)"/></td>
                    </tr>
                    <br>
                    <tr>
                      <th>เบอร์โทรศัพท์ :</th>
                      <td>
                        <input class="form-control" placeholder="กรุณาใส่เบอร์โทรศัพท์" required type="text" name="phone" id="phone" onkeypress="isInputChar(event)"/></td>
                      </tr>
                      <br>
                      <tr>
                        <th>แผนก :</th>
                        <td>
                          <select readonly class="form-control" required="required" name="de_id" id="de_id">
                            <!-- <option value="">กรุณาเลือกข้อมูล...</option> -->
                            <?php
                            include ('connect.php');
                            $sql1="SELECT * FROM department WHERE de_id = '".$_SESSION['de_id']."'";
                            $query1 = mysqli_query($con, $sql1);
                            while($rs1=mysqli_fetch_array($query1)){
                              echo"<option value=$rs1[de_id]>$rs1[de_name]</option>";
                            }
                            ?>
                          </select></td>
                        </tr>
                        <br>
                        <tr>
                          <th>ระดับสิทธิ์ :</th>
                          <td>
                            <select readonly class="form-control" required="required" name="sta_id" id="sta_id">
                              <!-- <option value="">กรุณาเลือกข้อมูล...</option> -->
                              <?php
                              include ('connect.php');
                              $sql1="SELECT * FROM status WHERE sta_id = '2'";
                              $query1 = mysqli_query($con, $sql1);
                              while($rs1=mysqli_fetch_array($query1)){
                                echo"<option value=$rs1[sta_id]>$rs1[sta_name]</option>";
                              }
                              ?>
                            </select></td>
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