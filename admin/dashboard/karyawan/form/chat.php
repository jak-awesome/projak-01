<?php
include "../../../../koneksi.php";
$v_n_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE stok_akhir='0'");
$jumlah_n_produk = mysqli_num_rows($v_n_produk);
if($jumlah_n_produk > 0){
    $notif_produk = "<span class='badge badge-danger float-right'>".$jumlah_n_produk."</span>";
} else {
    $notif_produk = "";
}

$v_n_pesanan = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE status='Belum Dibayar' OR status='Menunggu Konfirmasi'");
$jumlah_n_pesanan = mysqli_num_rows($v_n_pesanan);
if($jumlah_n_pesanan > 0){
    $notif_pesanan = "<span class='badge badge-danger float-right'>".$jumlah_n_pesanan."</span>";
} else {
    $notif_pesanan = "";
}

$v_n_pembayaran = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE status='Menunggu Konfirmasi'");
$jumlah_n_pembayaran = mysqli_num_rows($v_n_pembayaran);
if($jumlah_n_pembayaran > 0){
    $notif_pembayaran = "<span class='badge badge-danger float-right'>".$jumlah_n_pembayaran."</span>";
} else {
    $notif_pembayaran = "";
}

$v_n_pengiriman = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE status='Dikemas'");
$jumlah_n_pengiriman = mysqli_num_rows($v_n_pengiriman);
if($jumlah_n_pengiriman > 0){
    $notif_pengiriman = "<span class='badge badge-danger float-right'>".$jumlah_n_pengiriman."</span>"; 
} else {
    $notif_pengiriman = "";
}

$v_n_pengembalian = mysqli_query($koneksi,"SELECT * FROM pengembalian WHERE status_pengembalian='Tahap Pengajuan'");
$jumlah_n_pengembalian = mysqli_num_rows($v_n_pengembalian);
if($jumlah_n_pengembalian > 0){
    $notif_pengembalian = "<span class='badge badge-danger float-right'>".$jumlah_n_pengembalian."</span>";
} else {
    $notif_pengembalian = "";
}

$v_n_pesan = mysqli_query($koneksi,"SELECT DISTINCT pelanggan.nama_lengkap,chat.id_akun_pelanggan FROM chat INNER JOIN pelanggan ON chat.id_akun_pelanggan=pelanggan.id_akun_pelanggan WHERE a_read='0' ORDER BY waktu DESC");
$jumlah_n_pesan = mysqli_num_rows($v_n_pesan);
if($jumlah_n_pesan > 0){
    $notif_pesan = "<span class='badge badge-danger float-right'>".$jumlah_n_pesan."</span>";
} else {
    $notif_pesan = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpesanan</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

    <style type="text/css">

        .chat-messages {
            display: flex;
            flex-direction: column;
            height: 470px;
            max-height: 470px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }


        .chat-message-right {
            flex-direction: row-reverse;
        }
    </style>

</head>

<?php
  session_start();
  if (empty($_SESSION["login"])) {
    $_SESSION['kosong_session'] = "Silahkan login terlebih dahulu";
   header("Location:../../../login/index.php");
  }
 ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laptop"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Alvindo Computama</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="../index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data Master
</div>

<li class="nav-item">
    <a class="nav-link" href="../data_kategori.php">
        <i class="fas fa-fw fa-tag"></i>
        <span>Kategori</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../data_merek.php">
        <i class="fas fa-fw fa-copyright"></i>
        <span>Merek</span></a>
 </li>

 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduk" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-laptop"></i>
        <span>Produk</span><?= $notif_produk ?>
    </a>
    <div id="collapseProduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../data_produk.php">Data Produk <?= $notif_produk ?></a>
            <a class="collapse-item" href="../stok_masuk.php">Data Stok Masuk</a>
        </div>
    </div>
</li>

</li>
<li class="nav-item">
    <a class="nav-link" href="../data_ongkir.php">
        <i class="fas fa-fw fa-city"></i>
        <span>Ongkos Kirim</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../data_pelanggan.php ">
        <i class="fas fa-fw fa-users"></i>
        <span>Pelanggan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Transaksi
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembayaran" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-receipt"></i>
        <span>Pemesanan</span><?= $notif_pesanan ?>
    </a>
    <div id="collapsePembayaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../data_pemesanan_masuk.php">Pesanan Masuk <?= $notif_pesanan ?></a>
            <a class="collapse-item" href="../data_pesanan.php">Pesanan</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="../data_pembayaran.php">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Pembayaran</span><?= $notif_pembayaran ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../data_pengiriman.php">
        <i class="fas fa-fw fa-truck"></i>
        <span>Pengiriman</span><?= $notif_pengiriman ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../data_pengembalian.php">
        <i class="fas fa-fw fa-backward"></i>
        <span>Pengembalian</span><?= $notif_pengembalian ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../pos_kasir.php">
        <i class="fas fa-fw fa-user"></i>
        <span>POS (Point Of Sale)</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Lainnya
</div>

<li class="nav-item active">
    <a class="nav-link" href="../data_pesan.php">
        <i class="fas fa-fw fa-comments"></i>
        <span>Pesan</span><?= $notif_pesan ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="../data_review.php">
        <i class="fas fa-fw fa-star"></i>
        <span>Review</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Setting Web</span>
    </a>
    <div id="collapseSetting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../data_slider.php">Slider</a>
            <a class="collapse-item" href="../data_faq.php">FAQ</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->

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

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <?php
                    include "../../../../koneksi.php";
                    $tampil_pp = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$_SESSION[id_akun]'");
                    $data_pp = mysqli_fetch_array($tampil_pp);
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                    <img class="img-profile rounded-circle"
                        src="../img/profile/<?php echo $data_pp['foto']; ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $id_akun_pelanggan = $_GET['id_akun_pelanggan'];
                        $header =  mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_akun_pelanggan='$id_akun_pelanggan'");
                        $row_header = mysqli_fetch_array($header);
                        ?>
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="../../../../pelanggan/web/market_log/img/profile/<?= $row_header['foto_pelanggan']; ?>" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong><?= $row_header['nama_lengkap']; ?></strong>
                                </div>
                            </div>
                        </div>
    
                        <div class="position-relative">
                            <div class="chat-messages p-4">
                                <?php
                                $v_chat = mysqli_query($koneksi, "SELECT * FROM chat INNER JOIN akun ON akun.id_akun=chat.id_akun WHERE pengirim='$id_akun_pelanggan' OR penerima='$id_akun_pelanggan'");
                                while($row_chat = mysqli_fetch_array($v_chat)){
                                    $v_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_akun_pelanggan='$row_chat[id_akun_pelanggan]'");
                                    $data_pelanggan = mysqli_fetch_array($v_pelanggan);

                                    if($row_chat['pengirim'] == $_SESSION['id_akun']){
                                        ?>
                                         <div class="chat-message-right pb-4">
                                    <div>
                                        <img src="../img/profile/<?= $row_chat['foto']; ?>" class="rounded-circle mr-1" alt="<?= $row_chat['username']; ?>" width="40" height="40">
                                        <!-- <div class="text-muted small text-nowrap mt-2"><?= $row_chat['waktu']; ?></div> -->
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                        <div class="font-weight-bold mb-1">You</div>
                                        <?= $row_chat['chat']; ?>
                                    </div>
                                </div>

                                <?php
                                    } else {
                                        ?>
                                <div class="chat-message-left pb-4">
                                    <div>
                                        <img src="../../../../pelanggan/web/market_log/img/profile/<?= $data_pelanggan['foto_pelanggan']; ?>" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                        <div class="font-weight-bold mb-1"><?= $data_pelanggan['nama_lengkap']; ?></div>
                                        <?= $row_chat['chat']; ?>
                                    </div>
                                </div>

                                        <?php
                                    }} ?>
                            </div>
                        </div>

                        <form action="../actions/chat/act_chat.php" method="post">
                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id_akun" value="<?= $_SESSION['id_akun']; ?>">
                                <input type="hidden" class="form-control" name="id_akun_pelanggan" value="<?= $id_akun_pelanggan; ?>">
                                <input type="text" class="form-control" name="message" placeholder="Type your message">
                                <input type="submit" name="send_message" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>


    <?php if(@$_SESSION['gagal_tambah_kategori']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_tambah_kategori']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_tambah_kategori']); } ?>

</body>

</html>