<?php
include "../../../koneksi.php";
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

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<?php
  session_start();
  if (empty($_SESSION["login"])) {
    $_SESSION['kosong_session'] = "Silahkan login terlebih dahulu";
   header("Location:../../login/index.php");
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
<li class="nav-item active">
    <a class="nav-link" href="index.php">
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
    <a class="nav-link" href="data_kategori.php">
        <i class="fas fa-fw fa-tag"></i>
        <span>Kategori</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="data_merek.php">
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
            <a class="collapse-item" href="data_produk.php">Data Produk <?= $notif_produk ?></a>
            <a class="collapse-item" href="stok_masuk.php">Data Stok Masuk</a>
        </div>
    </div>
</li>

</li>
<li class="nav-item">
    <a class="nav-link" href="data_ongkir.php">
        <i class="fas fa-fw fa-city"></i>
        <span>Ongkos Kirim</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="data_pelanggan.php ">
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
            <a class="collapse-item" href="data_pemesanan_masuk.php">Pesanan Masuk <?= $notif_pesanan ?></a>
            <a class="collapse-item" href="data_pesanan.php">Pesanan</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="data_pembayaran.php">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Pembayaran</span><?= $notif_pembayaran ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="data_pengiriman.php">
        <i class="fas fa-fw fa-truck"></i>
        <span>Pengiriman</span><?= $notif_pengiriman ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="data_pengembalian.php">
        <i class="fas fa-fw fa-backward"></i>
        <span>Pengembalian</span><?= $notif_pengembalian ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="pos_kasir.php">
        <i class="fas fa-fw fa-user"></i>
        <span>POS (Point Of Sale)</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Lainnya
</div>

<li class="nav-item">
    <a class="nav-link" href="data_pesan.php">
        <i class="fas fa-fw fa-comments"></i>
        <span>Pesan</span><?= $notif_pesan ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="data_review.php">
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
            <a class="collapse-item" href="data_slider.php">Slider</a>
            <a class="collapse-item" href="data_faq.php">FAQ</a>
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
                                include "../../../koneksi.php";
                                $tampil_pp = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$_SESSION[id_akun]'");
                                $data_pp = mysqli_fetch_array($tampil_pp);
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/profile/<?php echo $data_pp['foto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Kategori Produk</div>
                                                <?php
                                                    include "../../../koneksi.php";
                                                    $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                    $jumlah_kategori = mysqli_num_rows($query_kategori);
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kategori; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Produk</div>
                                                <?php
                                                    include "../../../koneksi.php";
                                                    $query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                                                    $jumlah_produk = mysqli_num_rows($query_produk);
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_produk; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-laptop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah Pesanan Masuk</div>
                                                <?php
                                                    include "../../../koneksi.php";
                                                    $query_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE status='Belum Dibayar' OR status='Menunggu Konfirmasi'");
                                                    $jumlah_pesanan = mysqli_num_rows($query_pesanan);
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pesanan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-copyright fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Pelanggan Teregistrasi</div>
                                                <?php
                                                    include "../../../koneksi.php";
                                                    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                                    $jumlah_pelanggan = mysqli_num_rows($query_pelanggan);
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pelanggan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <hr>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <?php
                            $produk_terjual = mysqli_query($koneksi, "SELECT * FROM produk");
                            while($row = mysqli_fetch_array($produk_terjual)){
                                $nama_produk[] = $row['nama_produk'];
                                $jumlah_terjual[] = $row['terjual'];
                            }
                            ?>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Produk Terjual</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="terjual"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <?php
                            $status_pesanan = mysqli_query($koneksi, "SELECT DISTINCT status FROM pesanan WHERE status='Pengembalian' OR status='Dibatalkan' OR status='Selesai' OR status='Belum Dibayar'");
                            while($row = mysqli_fetch_array($status_pesanan)){
                                $pesanan_perstatus = mysqli_query($koneksi, "SELECT COUNT(status) AS jumlah FROM pesanan WHERE status='$row[status]'");
                                $row_perstatus = mysqli_fetch_array($pesanan_perstatus);
                                
                                    $nama_status[] = $row['status'];
                                    $jumlah_status[] =  $row_perstatus['jumlah'];
                            }
                            ?>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Status Pesanan Penjualan Online</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="status"></canvas>
                                    </div>
                                </div>
                            </div>
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
                        <span>Copyright &copy; Your Website 2021</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: 'Login Berhasil'
            });
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>


    <script>
        $(document).ready(function() {
    $('table.display').DataTable();
} );
    </script>

    <script>
		var ctx = document.getElementById("terjual").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_produk); ?>,
				datasets: [{
					label: 'Grafik Penjualan',
					data: <?php echo json_encode($jumlah_terjual); ?>,
					backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
					borderWidth: 1
				}]
			},
			options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
		ticks: {
			beginAtZero:true
				}
		}],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    }
  }
		});
	</script>

<script>
		var ctx = document.getElementById("status").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_status); ?>,
				datasets: [{
					label: 'Jumlah Pesanan',
					data: <?php echo json_encode($jumlah_status); ?>,
					backgroundColor: "#D20062",
                    hoverBackgroundColor: "#D20062",
                    borderColor: "#D20062",
					borderWidth: 1
				}]
			},
			options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
		ticks: {
			beginAtZero:true
				}
		}],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    }
  }
		});
	</script>

    <script>
        var ctx = document.getElementById("pemasukkan");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [{
      label: "Pemasukkan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data:  <?php echo json_encode($total); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp. ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
    </script>

</body>

</html>