<?php
if($_POST){
    session_start();    
    $id_member=$_POST['id_member'];
    $id_paket=$_POST['id_paket'];
    $jumlah=$_POST['qty'];
    $tgl = date('Y-m-d');
    $lama_proses=4;
    $batas_waktu=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_proses),date('Y')));
    $status=$_POST['status'];
    $dibayar=$_POST['dibayar'];
    $id_user=$_POST['id_user'];
    $total=$_POST['total'];

    if(empty($id_member)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($id_paket)){
        echo "<script>alert('Paket tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($status)){
        echo "<script>alert('status tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($jumlah)){
        echo "<script>alert('Jumlah tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif (empty($dibayar)){
        echo "<script>alert('Status Pembayaran tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }else{
        include "../koneksi.php";
        
        $insert=mysqli_query($koneksi,"insert into transaksi (id_member, id_paket, qty, tgl, batas_waktu, status, dibayar, id_user)value ('".$id_member."','".$id_paket."','".$jumlah."','".$tgl."','".$batas_waktu."','".$status."','".$dibayar."','".$id_user."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Successfully added transaction');location.href='history_transaksi.php';</script>";
        } else {
            echo "<script>alert('Failed added transaction');location.href='transaksi.php';</script>";
        }
}
}
?>