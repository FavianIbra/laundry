<?php
if($_POST){
    $id_member = $_POST ['id_member'];
    $nama = $_POST ['nama'];
    $alamat = $_POST ['alamat'];
    $jenis_kelamin = $_POST ['jenis_kelamin'];
    $tlp = $_POST ['tlp'];

    if(empty($nama)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('Alamat tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($id_member)){
        echo "<script>alert('Id tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($jenis_kelamin)){
        echo "<script>alert('Jenis Kelamin tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($tlp)){
        echo "<script>alert('Nomor Telpon tidak boleh kosong');location.href='ubah_member.php';</script>";
    } else {
        include "../koneksi.php";
       $ubah=mysqli_query($koneksi,"update member set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',tlp='".$tlp."' where id_member = '".$id_member."' ") or die (mysqli_error($koneksi));
}
if($ubah){
    echo "<script>alert('Sukses ubah data member');location.href='tampil_member.php';</script>";
}else{
    echo "<script>alert('Gagal ubah data member');location.href='ubah_member.php';</script>";
}
}

?>