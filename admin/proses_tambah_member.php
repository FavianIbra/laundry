<?php
if($_POST){
    $nama = $_POST ['nama'];
    $alamat = $_POST ['alamat'];
    $jenis_kelamin = $_POST ['jenis_kelamin'];
    $telpon = $_POST ['tlp'];

    if(empty($nama)){
        echo"<script>alert('Nama tidak boleh kosong');location.href='tambah_member.php';</script>";
    }elseif(empty($alamat)){
        echo"<script>alert('Alamat tidak boleh kosong');location.href='tambah_member.php';</script>";
    }elseif(empty($jenis_kelamin)){
        echo"<script>alert('Jenis Kelamin tidak boleh kosong');location.href='tambah_member.php';</script>";
    }if(empty($telpon)){
        echo"<script>alert('Nomor Telpon tidak boleh kosong');location.href='tambah_member.php';</script>";
    } else {
        include "../koneksi.php";
        $Insert=mysqli_query($koneksi, "insert into member(nama,alamat,jenis_kelamin,tlp) value ('".$nama."','".$alamat."','".$jenis_kelamin."','".$telpon."')") or die (mysqli_error($koneksi));

        if($koneksi){
            echo"<script>alert('Sukses menambahkan member');location.href='tampil_member.php';</script>";
        } else {
            echo"<script>alert('Gagal menambahkan member');location.href='tambah_member.php';</script>";
        }
    }
}
?>