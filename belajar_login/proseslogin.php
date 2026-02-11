<?php
    $usernamedb = "admin";
    $passwordb = "admin123";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['katasandi'];
        echo "Username : $username <br>";
        // echo "Password : $password <br>";
        echo "Password Enkripsi : ".md5($password)."<br>";

        if (($username == $usernamedb) && (md5($password) == md5($passwordb))){
            header("Location: berhasil_login.php");
            exit();
        } else {
            echo "<script>alert('Username atau password Anda salah. Silakan coba lagi!')</script>";
            echo "<script>window.location.replace('index.html')</script>";
            exit();
        }
    }
    
?>