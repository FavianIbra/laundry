<?php
if($_GET['id_member']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($koneksi,"delete from member where id_member='".$_GET['id_member']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus data member');location.href='tampil_member.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus data member');location.href='tampil_member.php';</script>";
    }
}
?>