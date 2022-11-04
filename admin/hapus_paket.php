<?php
if($_GET['id_paket']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($koneksi,"delete from paket where id_paket='".$_GET['id_paket']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus data paket');location.href='tampil_paket.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus data paket');location.href='tampil_paket.php';</script>";
    }
}
?>