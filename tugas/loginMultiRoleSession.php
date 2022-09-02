<?php
include "koneksi.php";
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "select * from user where username ='$username' and password='$password'";
    $result = mysqli_query($connect,$query);
    $fechResult = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount>0) { 
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['status'] = 'login';
    }

    if ($fechResult['role']=='admin') { 
        echo "<h3>SILAHKAN MASUK KE HALAMAN ADMIN";
        echo "<a href='controller_produk.php'>Admin</a>";
    } 
    elseif ($fechResult['role']=='user') { 
        echo "Anda berhasil login ";
        echo "<a href='userDasboard.php'>User Dasboard</a>";
    }
    else {
    echo "Anda gagal login ";
    echo " <a href='sessionloginForm.html'>Login Form</a>";
    }

    mysqli_close($connect);
?>
