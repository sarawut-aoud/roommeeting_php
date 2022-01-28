<?php 

// session_start();
// include "connect.php";
// if (!$_SESSION['userid']) {
//   header("Location: frm_login.php");
// } else {

?>
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to top, #1a677a,#000000 );">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon rotate-n-15">
        <!-- <i class="fas fa-laugh-wink"></i> -->
        <br>
        <i class="far fa-calendar-alt"></i>
      </div>
      <div class="sidebar-brand-text mx-3"><br><font size="5" face="TH SarabunPSK">ระบบจองห้องประชุม </font><!-- <sup>2</sup> --></div>
    </a>
    <br> 
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="calendar_user.php">
        <i class="fas fa-home"></i>
        <span><font size="5" face="TH SarabunPSK"><b>หน้าหลัก</b></font></span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
        aria-expanded="true" aria-controls="collapseUtilities1">
        <i class="fas fa-cog"></i>
        <span><font size="5" face="TH SarabunPSK"><b>ตั้งค่า</b></font></span>
      </a>
      <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
      data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> -->
        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
    <!--     <a class="collapse-item" href="showrooms.php"><font size="5" face="TH SarabunPSK"><b>ห้องประชุม</b></font></a>
        <a class="collapse-item" href="showstyle.php"><font size="5" face="TH SarabunPSK"><b>รูปแบบห้อง</b></font></a>
        <a class="collapse-item" href="showequipment.php"><font size="5" face="TH SarabunPSK"><b>อุปกรณ์</b></font></a>
        <a class="collapse-item" href="showdepartment.php"><font size="5" face="TH SarabunPSK"><b>แผนก</b></font></a>
      </div>
    </div>
  </li>
-->
<!-- Heading -->
              <!--   <div class="sidebar-heading">
                    <h6>ข้อมูล</h6>
                </div>
              -->
              <!-- Nav Item - Pages Collapse Menu -->
              
              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
                <span><font size="4" face="TH SarabunPSK">จองห้องประชุม</font></span>
              </div>
              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="reportrooms_us.php">
                  <i class="fas fa-chalkboard-teacher"></i>
                  <span><font size="5" face="TH SarabunPSK"><b>ห้องประชุม</b></font></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="frm_addbooking_user.php">
                    <i class="far fa-calendar-check"></i>
                    <span><font size="5" face="TH SarabunPSK"><b>จองห้องประชุม</b></font></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="showmybooking_user.php">
                      <i class="fas fa-list"></i>
                      <span><font size="5" face="TH SarabunPSK"><b>รายการจองของฉัน</b></font></span></a>
                    </li>

                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                      <span><font size="4" face="TH SarabunPSK">ข้อมูล</font></span>
                    </div>
                    <li class="nav-item">
                      <a class="nav-link" href="showmember_user.php">
                        <i class="fas fa-user-alt"></i>
                        <span><font size="5" face="TH SarabunPSK"><b>สมาชิก</b></font></span></a>
                      </li>
                      <!-- Nav Item - Charts -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="showposition.php">
                        <i class="fas fa-award"></i>
                        <span><font size="5" face="TH SarabunPSK"><b>ตำแหน่ง</b></font></span></a>
                      </li> -->
               <!--        <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="far fa-check-square"></i>
                          <span><font size="5" face="TH SarabunPSK"><b>อนุมัติการจอง</b></font></span></a>
                        </li> -->
                        <li class="nav-item">
                          <a class="nav-link" href="showmybooking_user1.php">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span><font size="5" face="TH SarabunPSK"><b>จัดเตรียมอุปกรณ์</b></font></span>
                            <span id='uun1'></span>  </a>
                          </li>

                          <?php include ('connect.php');
                          $sql1 = "select event.ev_id, event.ev_title, event.ev_startdate, event.ev_status, event.ev_enddate, event.ev_starttime, event.ev_endtime, event.ev_people, event.ev_createdate, rooms.ro_id, rooms.ro_name, member.id
                          from event 
                          inner join rooms on event.ro_id = rooms.ro_id
                          inner join member on event.id = member.id 
                          inner join department on member.de_id = department.de_id 
                          where event.ev_status = '0' and member.de_id = '".$_SESSION['de_id']."' group by ev_title";
                          $query1 = mysqli_query($con, $sql1)
                          or die ("3.ไม่สามารถประมวลผลคำสั่งได้").mysqli_error;
                          $num = mysqli_num_rows($query1) 
                          ?>

                          <li class="nav-item">
                            <a class="nav-link" href="showrequest_user.php">
                              <!-- <i class="far fa-list-alt"></i> --><i class="far fa-check-square"></i>
                              <span><font size="5" face="TH SarabunPSK"><b>รายการที่ต้องอนุมัติ</b></font></span>
                              <?php if($num > 0){ echo'<span class="badge badge-danger">'.$num.'</span>';} ?></a>
                            </li>
 

                          <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                              <i class="fas fa-bars"></i>
                              <span><font size="5" face="TH SarabunPSK"><b>รายงานการจองทั้งหมด</b></font></span></a>
                            </li> -->
                            <hr class="sidebar-divider">



                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                              <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>



                          </ul>
                          <!-- End of Sidebar -->

                          <!-- Content Wrapper -->
                          <div id="content-wrapper" class="d-flex flex-column ">

                            <!-- Main Content -->
                            <div id="content">

                              <!-- Top bar -->
                              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow bg-gradient-info">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none bg-white rounded-circle mr-3">
                                  <i class="fa fa-bars"></i>
                                </button>

                                



                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                  <div class="topbar-divider d-none d-sm-block"></div>

                                  <!-- Nav Item - User Information -->
                                  <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white small"><font size="5" face="TH SarabunPSK"><b>ยินดีต้อนรับ คุณ <?php echo $_SESSION['user']; ?></b></font></span>
                                    <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                  </a>
                                  <!-- Dropdown - User Information -->
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                  aria-labelledby="userDropdown">
                                  <a class="dropdown-item" href="frm_edituser.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    แก้ไขข้อมูลส่วนตัว
                                  </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="ad_logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  ออกจากระบบ
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <?php //} ?>
        <!-- End of Topbar -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>
          $(document).ready(function() {
           cache_clear();

           setInterval(function() {
            cache_clear()
          }, 5000);
         });
          function cache_clear() {

           $.ajax({
            type:"POST",
            url:"events04.php",
            success:function(result){
              // alert(result.ev_status);.
              //<span class="badge badge-danger"></span>
              if (result.ev_status > 0) {
                $("#uun1").html('<span class="badge badge-danger">'+result.ev_status+'</span>');
              }

            }

          })
  // window.location.reload(); use this if you do not remove cache
}

</script>