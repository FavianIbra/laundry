<?php
if($_POST){
    $id_paket = $_POST ['id_paket'];
    $jenis = $_POST ['jenis'];
    $harga = $_POST ['harga'];

    if(empty($jenis)){
        echo"<script>alert('Jenis Paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
    }elseif(empty($harga)){
        echo"<script>alert('Harga Paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } else {
        include "../koneksi.php";
        $ubah=mysqli_query($koneksi,"update paket set jenis='".$jenis."',harga='".$harga."'where id_paket = '".$id_paket."' ") or die (mysqli_error($koneksi));

    }
    if($ubah){
        echo "<script>alert('Sukses ubah data paket');location.href='tampil_paket.php';</script>";
    }else{
        echo "<script>alert('Gagal ubah data member');location.href='ubah_paket.php';</script>";
    }
    }
    
    ?>