<?php
if($_POST){
    $id = $_POST ['id'];
    $alamat = $_POST ['alamat'];
    $fasilitas = $_POST ['fasilitas'];
    $tlp = $_POST ['tlp'];

    if(empty($alamat)){
        echo "<script>alert('Alamat Outlet boleh kosong');location.href='ubah_outlet.php';</script>";
    } elseif(empty($fasilitas)){
        echo "<script>alert('Fasilitas Cabang boleh kosong');location.href='ubah_outlet.php';</script>";
    } elseif(empty($id)){
        echo "<script>alert('Id tidak boleh kosong');location.href='ubah_outlet.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('Nomor Telpon Cabang tidak boleh kosong');location.href='ubah_outlet.php';</script>";
    } else {
        include "../koneksi.php";
       $ubah=mysqli_query($koneksi,"update outlet set alamat='".$alamat."',fasilitas='".$fasilitas."',tlp='".$tlp."' where id = '".$id."' ") or die (mysqli_error($koneksi));
}
if($ubah){
    echo "<script>alert('Sukses ubah data Daftar Cabang');location.href='tampil_outlet.php';</script>";
}else{
    echo "<script>alert('Gagal ubah data  Daftar Cabang');location.href='ubah_outlet.php';</script>";
}
}

?>