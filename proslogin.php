<?php 

include 'koneksi.php';

    $conn = new mysqli("localhost","root","","tes2");
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string(sha1($_POST["password"]));

$result = mysqli_query($koneksi,"SELECT * FROM user where email='$email' and password='$password'");

$cek = mysqli_num_rows($result);

if($cek > 0) {
    session_start();
    $data = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
       header("location:masuk.php");
} else {
    echo "PASSWORD SALAH";
}

?>