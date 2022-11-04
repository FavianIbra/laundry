<?php
if($_POST){
    $id_user = $_POST ['id_user'];
    $nama = $_POST ['nama'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $role = $_POST ['role'];

    if(empty($nama)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='ubah_data.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_data.php';</script>";
    } elseif(empty($id_user)){
        echo "<script>alert('Id tidak boleh kosong');location.href='ubah_data.php';</script>";
    } elseif(empty($role)){
        echo "<script>alert('Role tidak boleh kosong');location.href='ubah_data.php';</script>";
    } else {
        include "../koneksi.php";
       $ubah=mysqli_query($koneksi,"update user set nama='".$nama."',username='".$username."',password='".md5($password)."',role='".$role."' where id_user = '".$id_user."' ") or die (mysqli_error($koneksi));
}
if($ubah){
    echo "<script>alert('Sukses ubah data user');location.href='tampil_data.php';</script>";
}else{
    echo "<script>alert('Sagal ubah data user');location.href='ubah_data.php';</script>";
}
}

?>