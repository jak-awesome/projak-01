<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Alvindo Computama</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Sweet Alert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

    
</head>

<?php
    session_start();
  if (empty($_SESSION["login"])) {
    $_SESSION['kosong_session'] = "Silahkan login terlebih dahulu";
   header("Location:../../login/login.php");
  }

  function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	return $pecahkan[$tanggal] ?? null;
}

 ?>




<body>

    <!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><h3>Alvindo <div style="color: #ff6c00;">Computama</div></h3></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">My Account</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
									<li class="nav-item active"><a class="nav-link" href="order_history.php">Order History</a></li>
									<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="chat.php?page=<?= basename($_SERVER['SCRIPT_NAME']); ?>" class="cart"><span class="ti-comments"></span></a></li>
						<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="get" action="shop.php">
					<input type="text" class="form-control" id="search_input" placeholder="Search Product Here" name="search">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Alvindo Computama Shop</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">My Account<span class="lnr lnr-arrow-right"></span></a>
						<a href="order_history.php">Order History</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<section class="section_gap_bottom">
		<div class="product_description_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="belumBayar-tab" data-toggle="tab" href="#belumBayar" role="tab" aria-controls="belumBayar" aria-selected="true">Belum Bayar</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" id="menungguKonfirmasi-tab" data-toggle="tab" href="#menungguKonfirmasi" role="tab" aria-controls="menungguKonfirmasi" aria-selected="false">Menunggu Konfirmasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="dikemas-tab" data-toggle="tab" href="#dikemas" role="tab" aria-controls="dikemas" aria-selected="false">Dikemas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="dikirim-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="dikirim" aria-selected="true">Dikirim</a>
				</li>
                <li class="nav-item">
					<a class="nav-link active" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="true">Selesai</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" id="dibatalkan-tab" data-toggle="tab" href="#dibatalkan" role="tab" aria-controls="dibatalkan" aria-selected="true">Dibatalkan</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" id="pengembalian-tab" data-toggle="tab" href="#pengembalian" role="tab" aria-controls="pengembalian" aria-selected="true">Pengembalian</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="belumBayar" role="tabpanel" aria-labelledby="belumBayar-tab">
					<div class="row">
                    <?php
                        include "../../../koneksi.php";
                        $sql_1 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Belum Dibayar' ORDER BY tanggal_pesan DESC");
                        while($data_1 = mysqli_fetch_array($sql_1)){
                        ?>
                        <div class="col-lg-4">
                        <a href="detail_pesanan.php?id=<?php echo $data_1['id_pesanan']; ?>">
                            <div class="card border-secondary mb-3">
                            <div class="card-header">INV-AC-<?= $data_1['id_pesanan']; ?></div>
                            <div class="card-body text-secondary">
                                <h5 class="card-title">Total : <?= "Rp. ".number_format($data_1['total']); ?></h5>
                            </div>
                            <div class="card-footer border-secondary"><span class="badge badge-pill badge-info"><?= $data_1['status']; ?></span></div>
                            </div>
                        </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
				<div class="tab-pane fade" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab">
					<div class="row">
                        <?php
                        include "../../../koneksi.php";
                        $sql_2 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Dikemas' ORDER BY tanggal_pesan DESC");
                        while($data_2 = mysqli_fetch_array($sql_2)){
                        ?>
                        <div class="col-lg-4">
                        <a href="detail_pesanan.php?id=<?php echo $data_2['id_pesanan']; ?>">
                            <div class="card border-secondary mb-3">
                            <div class="card-header">INV-AC-<?= $data_2['id_pesanan']; ?></div>
                            <div class="card-body text-secondary">
                                <h5 class="card-title">Total : <?= "Rp. ".number_format($data_2['total']); ?></h5>
                            </div>
                            <div class="card-footer border-secondary"><span class="badge badge-pill badge-primary"><?= $data_2['status']; ?></span></div>
                            </div>
                        </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
				<div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                    <div class="row">
                        <?php
                        include "../../../koneksi.php";
                        $sql_3 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Dikirim' ORDER BY tanggal_pesan DESC");
                        while($data_3 = mysqli_fetch_array($sql_3)){
                        ?>
                        <div class='col-lg-4'>
                            <a href='detail_pesanan.php?id=<?php echo $data_3['id_pesanan']; ?>'>
                            <div class='card border-secondary mb-3'>
                            <div class='card-header'>INV-AC-<?= $data_3['id_pesanan']; ?></div>
                            <div class='card-body text-secondary'>
                                <h5 class='card-title'>Total : <?= "Rp. ".number_format($data_3['total']); ?></h5>
                            </div>
                            <div class='card-footer border-secondary'><span class='badge badge-pill badge-warning'><?= $data_3['status'] ?></span></div>
                            </div>
                             </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
                <div class="tab-pane fade show active" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                    <div class="row">
                        <?php
                        include "../../../koneksi.php";
                        $sql_4 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Selesai' ORDER BY tanggal_pesan DESC");
                        while($data_4 = mysqli_fetch_array($sql_4)){
                        ?>
                        <div class='col-lg-4'>
                            <a href='detail_pesanan.php?id=<?php echo $data_4['id_pesanan']; ?>'>
                            <div class='card border-secondary mb-3'>
                            <div class='card-header'>INV-AC-<?= $data_4['id_pesanan']; ?></div>
                            <div class='card-body text-secondary'>
                                <h5 class='card-title'>Total : <?= "Rp. ".number_format($data_4['total']); ?></h5>
                            </div>
                            <div class='card-footer border-secondary'><span class='badge badge-pill badge-success'><?= $data_4['status'] ?></span></div>
                            </div>
                             </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
                <div class="tab-pane fade" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">
                    <div class="row">
                        <?php
                        include "../../../koneksi.php";
                        $sql_5 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Dibatalkan' ORDER BY tanggal_pesan DESC");
                        while($data_5 = mysqli_fetch_array($sql_5)){
                        ?>
                        <div class='col-lg-4'>
                            <a href='detail_pesanan.php?id=<?= $data_5['id_pesanan']; ?>'>
                            <div class='card border-secondary mb-3'>
                            <div class='card-header'>INV-AC-<?= $data_5['id_pesanan']; ?></div>
                            <div class='card-body text-secondary'>
                                <h5 class='card-title'>Total : <?= "Rp. ".number_format($data_5['total']); ?></h5>
                            </div>
                            <div class='card-footer border-secondary'><span class='badge badge-pill badge-danger'><?= $data_5['status'] ?></span></div>
                            </div>
                             </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
                <div class="tab-pane fade" id="pengembalian" role="tabpanel" aria-labelledby="pengembalian-tab">
                    <div class="row">
                        <?php
                        include "../../../koneksi.php";
                        $sql_6 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Pengembalian' ORDER BY tanggal_pesan DESC");
                        while($data_6 = mysqli_fetch_array($sql_6)){
                        ?>
                        <div class='col-lg-4'>
                            <a href='detail_pengembalian.php?id=<?php echo $data_6['id_pesanan']; ?>'>
                            <div class='card border-secondary mb-3'>
                            <div class='card-header'>INV-AC-<?= $data_6['id_pesanan']; ?></div>
                            <div class='card-body text-secondary'>
                                <h5 class='card-title'>Total : <?= "Rp. ".number_format($data_6['total']); ?></h5>
                            </div>
                            <div class='card-footer border-secondary'><span class='badge badge-pill badge-danger'><?= $data_6['status'] ?></span></div>
                            </div>
                             </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
                <div class="tab-pane fade" id="menungguKonfirmasi" role="tabpanel" aria-labelledby="menungguKonfirmasi-tab">
					<div class="row">
                    <?php
                        include "../../../koneksi.php";
                        $sql_7 = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]' AND status='Menunggu Konfirmasi' ORDER BY tanggal_pesan DESC");
                        while($data_7 = mysqli_fetch_array($sql_7)){
                        ?>
                        <div class="col-lg-4">
                        <a href="detail_pesanan.php?id=<?php echo $data_7['id_pesanan']; ?>">
                            <div class="card border-secondary mb-3">
                            <div class="card-header">INV-AC-<?= $data_7['id_pesanan']; ?></div>
                            <div class="card-body text-secondary">
                                <h5 class="card-title">Total : <?= "Rp. ".number_format($data_7['total']); ?></h5>
                            </div>
                            <div class="card-footer border-secondary"><span class="badge badge-pill badge-info"><?= $data_7['status']; ?></span></div>
                            </div>
                        </a>
                        </div>
                        <?php } ?>
                    </div>
				</div>
			</div>

			</div>
		</div>
	</section>
	<!--================End Single Product Area =================-->\

    <!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Alvindo Computama adalah sebuah toko yang menyediakan berbagai macam Laptop, Komputer dan perlengkapannya. Kami juga menyediakan jasa perbaikan 
							laptop, komputer dan lainnya. Lokasi kami berada di Jln. Jendral Sudirman, Kab. Kuningan Jawa Barat.
						</p>
					</div>
				</div>
				<div class="col-lg-7  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Our Location</h6>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.898864286792!2d108.47838318465575!3d-6.982787202972873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f142c39db9663%3A0x22fb93cb74fdda63!2sAlvindo%20Computama!5e0!3m2!1sen!2sid!4v1692880825191!5m2!1sen!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

    <?php if(@$_SESSION['berhasil_ubah_status']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_ubah_status']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['berhasil_ubah_status']); } ?>

    <?php if(@$_SESSION['gagal_ubah_status']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_ubah_status']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_ubah_status']); } ?>

    <?php if(@$_SESSION['berhasil_ubah_status_sukses']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_ubah_status_sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['berhasil_ubah_status_sukses']); } ?>

    <?php if(@$_SESSION['gagal_ubah_status_sukses']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_ubah_status_sukses']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_ubah_status_sukses']); } ?>

    <?php if(@$_SESSION['berhasil_review']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_review']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['berhasil_review']); } ?>

    <?php if(@$_SESSION['gagal_review']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_review']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_review']); } ?>

    <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin batalkan pesanan?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            });
        </script>

</body>

</html>