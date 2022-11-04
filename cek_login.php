<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password']; 
$login = mysqli_query($koneksi,"select * from user where username='".$username."' and password='".md5($password)."' ");
$cek =mysqli_num_rows($login);
if($cek > 0){
    $data =mysqli_fetch_assoc($login);
    if($data['role']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        $_SESSION['status_login']=true;
        header("location:admin/halaman_admin.php");
    } else if($data['role']=="kasir"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "kasir";
        $_SESSION['status_login']=true;
        header("location:kasir/halaman_kasir.php");
    } else if($data['role']=="owner"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "owner";
        $_SESSION['status_login']=true;
        header("location:owner/halaman_owner.php");
    } else {
        echo "<script>alert('Username dan Password tidak benar');location.href='login_salin.php';</script>";
    }
} else {
    echo "<script>alert('Username dan Password tidak benar');location.href='login_salin.php';</script>";
}
?>