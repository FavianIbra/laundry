<?php

    include "../koneksi.php";
    $id_transaksi = $_GET['id_transaksi'];
    $update=mysqli_query($koneksi,"update transaksi set status='Selesai', dibayar='dibayar' where id_transaksi='".$id_transaksi."'") or die (mysqli_error($koneksi));
    header('location:history_transaksi.php');

?>