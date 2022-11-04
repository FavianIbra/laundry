<?php
    include "../header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zock Laundry</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            
                            <div class="input-group-append">
                                
                                    
                                </button>
                            </div>
                        </div>
                    </form>

                            <a href="history_transaksi.php">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kembali</span>
                            </a>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Tambah Data -->
                   <body>
                    <div class="container">
                        <h3>History Transaksi </h3>
                        <table class="table table-hover table striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JENIS</th>
                                <th>JUMLAH</th>
                                <th>TGL ORDER</th>
                                <th>PETUGAS KASIR</th>
                                <th>KETERANGAN</th>
                                <th>STATUS</th>
                            </tr>
      </thead>
       <tbody>
        <?php
        include "../koneksi.php";
        $qry_transaksi = mysqli_query($koneksi, "select * from transaksi order by id_transaksi asc");
        $qry_member = mysqli_query($koneksi, "select * from member order by id_member desc");
        $data_member = mysqli_fetch_array($qry_member);
        $qry_paket = mysqli_query($koneksi, "select * from paket order by id_paket desc");
        $data_paket = mysqli_fetch_array($qry_paket);
        $qry_user = mysqli_query($koneksi, "select * from user order by id_user desc");
        $data_user = mysqli_fetch_array($qry_user);
        $no = 0;
        while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
          $no++;
          $qry_member_kembali = mysqli_query($koneksi, "select * from transaksi inner join member on member.id_member = transaksi.id_member where transaksi.id_transaksi = '".$data_transaksi['id_transaksi']."'");
          $data_member_kembali = mysqli_fetch_array($qry_member_kembali);
          $qry_paket_kembali = mysqli_query($koneksi, "select * from transaksi inner join paket on paket.id_paket = transaksi.id_paket where transaksi.id_transaksi = '".$data_transaksi['id_transaksi']."'");
          $data_paket_kembali = mysqli_fetch_array($qry_paket_kembali);
          $qry_user_kembali = mysqli_query($koneksi, "select * from transaksi inner join user on user.id_user = transaksi.id_user where transaksi.id_transaksi = '".$data_transaksi['id_transaksi']."'");
          $data_user_kembali = mysqli_fetch_array($qry_user_kembali);
          $qry_cek_kembali=mysqli_query($koneksi,"select * from transaksi where id_transaksi = '".$data_transaksi['id_transaksi']."'");

           ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $data_member_kembali['nama'] ?></td>
            <td><?= $data_paket_kembali['jenis'] ?></td>
            <td><?= $data_transaksi['qty'] ?></td>
            <td><?= $data_transaksi['tgl'] ?></td>
            <td><?= $data_user_kembali['nama'] ?></td>
            <td><?= $data_transaksi['dibayar'] ?></td>
            <td><?= $data_transaksi['status'] ?></td>
            
        </tr>
        <?php
        }
        ?>
        
       </tbody>
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
       
                    </div>
                   </body>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Tombol Logout Jika Anda Ingin Keluar Dari Website Ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
	  window.print();
	</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>