<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Sarabun&display=swap');

		body {
			font-family: 'Sarabun', 'noto_sans_thairegular', 'noto_sansregular';
			color: #212529;
			background: #dedede;
		}
	</style>
	<meta http-equiv='Content-Type' content='text/html; 
	charset=utf-8' />
</head>
<!-- <script type="text/javascript">
	$(function() {
		setInterval(function() {
			var getData = $.ajax({
				url: "getmessage_farmer.php",
				data: "res=1",
				async: false,
				success: function(getData) {
					$("span#message_farmer").html(getData);
				}
			}).responseText;
		}, 2000);
	});
	$(function() {
		setInterval(function() {
			var getData = $.ajax({
				url: "getmessage_admin_em.php",
				data: "res=1",
				async: false,
				success: function(getData) {
					$("span#message_em").html(getData);
				}
			}).responseText;
		}, 2000);
	});
</script> -->
<body>
	<div id="wrapper">
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(to top, #1a677a,#000000 );"> 
			<!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
				<div class="sidebar-brand-text mx-3">
					<img src="image/pkb_logo2.png" style="height: 110px;padding-top: 20px;">
				</div>
			</a>-->
			<br> 
			<!-- Divider -->
			<!-- <hr class="sidebar-divider d-none d-md-block"> -->

			<!-- Nav Item - Dashboard -->
			<li class="nav-item" style="margin-bottom: -5px;margin-top: -20px;">
				<a class="nav-link" href="">
					<span>หน้าหลัก | ผู้ดูแลระบบ</span></a>
				</li>

				<hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>จองห้องประชุม</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href=""><span>จองห้องประชุม</span></a>
					<a class="nav-link" href="" style="margin-top: -20px;"><span>รายการจองของฉัน</span></a>
				</li>

				<hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>ข้อมูล</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="showemember.php"><span>สมาชิก</span></a>
					<a class="nav-link" href="" style="margin-top: -20px;"><span>ห้องประชุม</span></a>
					<a class="nav-link" href="" style="margin-top: -20px;"><span>รายงานรายการจองทั้งหมด</span></a>
				</li>

				<hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>ตั้งค่า</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="showrooms.php"><span>ห้องประชุม</span></a>
					<a class="nav-link" href="showstyle.php" style="margin-top: -20px;"><span>รูปแบบห้อง</span></a>
					<a class="nav-link" href="showequipment.php" style="margin-top: -20px;"><span>อุปกรณ์</span></a>
					<a class="nav-link" href="showdepartment.php" style="margin-top: -20px;"><span>แผนก</span></a>
				</li>

				<!-- <hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>การอนุมัติ</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="showReq.php"><span>คำขอเปิดร้านค้า</span></a>
					<a class="nav-link" href="showpayment.php" style="margin-top: -20px;"><span>การชำระเงิน</span></a>
					<a class="nav-link" href="showstatement.php" style="margin-top: -20px;"><span>โอนเงินให้เกษตรกร</span></a>
				</li>

				<hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>การขาย</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="showoder.php"><span>การสั่งซื้อ</span></a>
					<a class="nav-link" href="showtrack.php" style="margin-top: -20px;"><span>การจัดส่ง</span></a>
					<a class="nav-link" href="showre_payment.php" style="margin-top: -20px;"><span>รายงานการชำระเงิน</span></a>
					<a class="nav-link" href="reportsale_date.php" style="margin-top: -20px;"><span>รายงานการขายประจำวัน</span></a>
					<a class="nav-link" href="reportsale.php" style="margin-top: -20px;"><span>รายงานการขายระหว่างวัน</span></a>
					<a class="nav-link" href="reportsale_shop.php" style="margin-top: -20px;"><span>รายงานการขายตามร้านค้า</span></a>
					<a class="nav-link" href="reportyear.php" style="margin-top: -20px;"><span>รายงานการขายตามปี</span></a>
					<a class="nav-link" href="showlots.php" style="margin-top: -20px;"><span>รายงานล็อตสินค้า</span></a>
					<a class="nav-link" href="report_poorsale.php" style="margin-top: -20px;"><span>รายงานสินค้าขายไม่ดี</span></a>
					<a class="nav-link" href="report_nonesale.php" style="margin-top: -20px;"><span>รายงานสินค้าที่ขายไม่ได้</span></a>
					<a class="nav-link" href="showresive.php" style="margin-top: -20px;"><span>ติดตามโอนเงินให้เกษตรกร</span></a>
				</li> -->

				<!-- <hr class="sidebar-divider d-none d-md-block">
				<div class="sidebar-heading">
					<storng>แชท</storng>
				</div>
				<li class="nav-item">
					<a class="nav-link" href="chat_farmer.php" style="margin-top: -20px;"><span>พูดคุยกับเกษตรกร</span><span id="message_farmer"></span></a>
            <a class="nav-link" href="chat_employee.php" style="margin-top: -20px;"><span>พูดคุยกับพนักงาน</span><span id="message_em"></span></a>
        </li> -->

        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
        	<button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: #fff;">
    	<div id="content">
    		<nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow" style="
    		background-image: linear-gradient(to right, #15649b, #47b4dd);
    		">
    		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    			<i class="fa fa-bars"></i>
    		</button>
    		<ul class="navbar-nav ml-auto">
    		</body>

    		</html>
