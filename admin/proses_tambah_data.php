<?php
if($_POST){
    $nama = $_POST ['nama'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $role = $_POST ['role'];

    if(empty($nama)){
        echo"<script>alert('Nama tidak boleh kosong');location.href='tambah_data.php';</script>";
    }elseif(empty($username)){
        echo"<script>alert('Username tidak boleh kosong');location.href='tambah_data.php';</script>";
    }elseif(empty($password)){
        echo"<script>alert('Password tidak boleh kosong');location.href='tambah_data.php';</script>";
    }if(empty($role)){
        echo"<script>alert('Role tidak boleh kosong');location.href='tambah_data.php';</script>";
    } else {
        include "../koneksi.php";
        $Insert=mysqli_query($koneksi, "insert into user(nama,username,password,role) value ('".$nama."','".$username."','".md5($password)."','".$role."')") or die (mysqli_error($koneksi));

        if($koneksi){
            echo"<script>alert('Sukses menambahkan data');location.href='tampil_data.php';</script>";
        } else {
            echo"<script>alert('Gagal menambahkan data');location.href='tambah_data.php';</script>";
        }
    }
}
?>