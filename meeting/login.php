<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" href="./css/sweetalert2.min.css">
    <script src="./js/sweetalert2.min.js"></script>
</head>

<body>

    <?php 

    session_start();

    if (isset($_POST['username'])) {

        include('connect.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        // $passwordenc = md5($password);
        // $passwordenc =  $_POST['password'];

        $query = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['sta_id'] = $row['sta_id'];
            $_SESSION['de_id'] = $row['de_id'];

            if ($_SESSION['sta_id'] == '1') {

             echo "<script>Swal.fire({
                type: 'success',
                title: 'ยินดีต้อนรับเข้าสู่ระบบ',
                showConfirmButton: true,

                }).then(() => { 
                    window.location = 'calendar_admin.php'
                    });

                    </script>"; 
                    exit();

                // header("Location: showstyle.php");
                }

                if ($_SESSION['sta_id'] == '2') {
                    echo "<script>Swal.fire({
                        type: 'success',
                        title: 'ยินดีต้อนรับเข้าสู่ระบบ',
                        showConfirmButton: true,

                        }).then(() => { 
                            window.location = 'calendar_general.php'
                            });

                            </script>"; 
                            exit();

                    // header("Location: showrooms.php");
                        }
                        if ($_SESSION['sta_id'] == '3') {
                            echo "<script>Swal.fire({
                                type: 'success',
                                title: 'ยินดีต้อนรับเข้าสู่ระบบ',
                                showConfirmButton: true,

                                }).then(() => { 
                                    window.location = 'calendar_user.php'
                                    });

                                    </script>"; 
                                    exit();

                    // header("Location: showrooms.php");
                                }
                            } else {
                                echo "<script>Swal.fire({
                                    type: 'error',
                                    title: 'ไม่พบผู้ใช้!!!',
                                    showConfirmButton: true,

                                    }).then(() => { 
                                        window.history.go(-1)
                                        });

                                        </script>";
                                        exit();
                                    }

                                } else {
                                    header("Location: frm_login.php");
                                }
                                ?>
                            </body>
                            </html>