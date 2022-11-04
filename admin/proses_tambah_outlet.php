<?php
if($_POST){
    $alamat = $_POST ['alamat'];
    $fasilitas = $_POST ['fasilitas'];
    $tlp = $_POST ['tlp'];

    if(empty($alamat)){
        echo"<script>alert('Alamat Cabang tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    }elseif(empty($fasilitas)){
        echo"<script>alert('Fasilitas Cabang tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    }elseif(empty($tlp)){
        echo"<script>alert('Nomor Telpon Cabang tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } else {
        include "../koneksi.php";
        $Insert=mysqli_query($koneksi, "insert into outlet(alamat,fasilitas,tlp) value ('".$alamat."','".$fasilitas."','".$tlp."')") or die (mysqli_error($koneksi));

        if($koneksi){
            echo"<script>alert('Sukses menambahkan outlet');location.href='tampil_outlet.php';</script>";
        } else {
            echo"<script>alert('Gagal menambahkan outlet');location.href='tambah_outlet.php';</script>";
        }
    }
}
?>