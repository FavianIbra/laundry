<?php
if($_POST){
    $jenis = $_POST ['jenis'];
    $harga = $_POST ['harga'];

    if(empty($jenis)){
        echo"<script>alert('Jenis Paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
    }elseif(empty($harga)){
        echo"<script>alert('Harga Paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } else {
        include "../koneksi.php";
        $Insert=mysqli_query($koneksi, "insert into paket(jenis,harga) value ('".$jenis."','".$harga."')") or die (mysqli_error($koneksi));

        if($koneksi){
            echo"<script>alert('Sukses menambahkan data');location.href='tampil_paket.php';</script>";
        } else {
            echo"<script>alert('Gagal menambahkan data');location.href='tambah_paket.php';</script>";
        }
    }
}
?>