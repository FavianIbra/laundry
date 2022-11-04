<?php
if($_GET['id']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($koneksi,"delete from outlet where id='".$_GET['id']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus Outlet');location.href='tampil_outlet.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus Outlet');location.href='tampil_outlet.php';</script>";
    }
}
?>