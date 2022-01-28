
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ข้อมูลพนักงาน</title>
  <link rel="stylesheet" href="./css/sweetalert2.min.css">
  <script src="./js/sweetalert2.min.js"></script>
</head>

<body>
  <?php
  include ('connect.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $ntitle = $_POST['ntitle'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $position = $_POST['position'];
  $phone = $_POST['phone'];
  $de_id = $_POST['de_id'];
  $sta_id = $_POST['sta_id'];

  if($firstname && $lastname ){
   $sql = "SELECT * FROM member WHERE firstname = '$firstname' && lastname = '$lastname' ";
   $query = mysqli_query($con, $sql);
   $total = mysqli_fetch_array ($query);
   if($total==0){

    $sql ="INSERT INTO member(username, password, ntitle, firstname, lastname, position, phone, de_id, sta_id) VALUES ('$username','$password','$ntitle','$firstname','$lastname','$position','$phone', '$de_id', '$sta_id')";
    $query=  mysqli_query($con, $sql) or die(mysqli_error(conn)); 
          //คำสั่งทดลองเซ็คเงื่อนไขว่าเข้าฐานหรือไม่
          // if($query){echo "ok";} else{echo "error";}

    mysqli_close($con);
    echo "<script>Swal.fire({
     type: 'success',
     title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
     showConfirmButton: true,

     }).then(() => { 
      window.location = 'showmember.php'
      });

      </script>"; 
      return;
    }
    else{
      echo "<script>Swal.fire({
       type: 'warning',
       title: 'กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง',
       showConfirmButton: true,

       }).then(() => { 
        window.history.back()
        });
        </script>";
        return;
      }
    }
    mysqli_close($con);
    ?>
  </body>
  </html>