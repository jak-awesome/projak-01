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
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

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
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">My Account</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
									<li class="nav-item"><a class="nav-link" href="order_history.php">Order History</a></li>
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
					<h1>Pemesanan Berhasil</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<div class="row">
			<?php
			include "../../../koneksi.php";
			$id = $_GET['id'];
			$sql = mysqli_query($koneksi,"SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN alamat_pelanggan ON alamat_pelanggan.id_alamat_pelanggan=pesanan.id_alamat_pelanggan WHERE id_pesanan='$id'");
			while($data = mysqli_fetch_array($sql)){
			?>
				<div class="col-lg-12">
					<h1>Detail Pesanan</h1>
				</div>
				<div class="col-lg-12">
					<hr>
				</div>
				<div class="col-lg-6">
					<h4>INV-AC-<?= $data['id_pesanan']; ?></h4>
				</div>
				<div class="col-lg-6">
					<h4><span class="badge badge-pill badge-primary float-right"><?= $data['status']; ?></span></h4>
				</div>
				<div class="col-lg-12">
					<hr>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Nama Penerima</label>
						<input type="text" class="form-control" name="nama_penerima" value="<?= $data['nama_penerima']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>No. Telepon Penerima</label>
						<input type="text" class="form-control" name="no_penerima" value="<?= $data['no_penerima']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-12">
					<hr>
				</div>
				<div class="col-lg-12">
					<h6>Alamat Pengiriman</h6>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Baris Alamat 1</label>
						<input type="text" class="form-control" name="alamat_1" value="<?= $data['alamat_1']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Baris Alamat 2</label>
						<input type="text" class="form-control" name="alamat_2" value="<?= $data['alamat_2']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Desa/Kelurahan</label>
						<input type="text" class="form-control" name="desa_kelurahan" value="<?= $data['desa_kelurahan']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Kecamatan</label>
						<input type="text" class="form-control" name="kecamatan" value="<?= $data['kecamatan']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Kabupaten/Kota</label>
						<input type="text" class="form-control" name="kab_kota" value="<?= $data['kab_kota']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Provinsi</label>
						<input type="text" class="form-control" name="provinsi" value="<?= $data['provinsi']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Kode Pos</label>
						<input type="text" class="form-control" name="kode_pos" value="<?= $data['kode_pos']; ?>" readonly>
					</div>
				</div>
				<div class="col-lg-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th colspan="2">Produk</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
						$subtotal = "0";
						$produk = mysqli_query($koneksi, "SELECT * FROM detail_pesanan INNER JOIN produk ON detail_pesanan.id_produk=produk.id_produk WHERE id_pesanan='$id'");
						while($data_produk = mysqli_fetch_array($produk)){
						$ongkir = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE kota='$data[kab_kota]'");
						$data_ongkir = mysqli_fetch_array($ongkir);

						$total = $data_produk['harga_jual'] * $data_produk['kuantitas'];
						$subtotal += $total;

						$grandtotal = (int)$data_ongkir['biaya'] + (int)$subtotal;
						?>
						<tbody>
							<tr>
								<td><img src="../../../admin/dashboard/karyawan/images/produk/<?= $data_produk['foto_produk']; ?>" width="100px" height="100px"></td>
								<td><?= $data_produk['nama_produk']; ?></td>
								<td><?php echo "Rp. ".number_format($data_produk['harga_jual']) ?></td>
								<td><?= $data_produk['kuantitas']; ?></td>
								<td><?php echo "Rp. ".number_format($total) ?></td>
							</tr>
						</tbody>
						
					<?php } ?>
						<tfoot>
							<tr>
								<th colspan="4" style="text-align: right;">Subtotal</th>
								<th><?php echo "Rp. ".number_format($subtotal) ?></th>
							</tr>
							<tr>
								<th colspan="4" style="text-align: right;">Ongkos Kirim</th>
								<th><?php echo "Rp. ".number_format($data_ongkir['biaya']) ?></th>
							</tr>
							<tr>
								<th colspan="4" style="text-align: right;">Grand Total</th>
								<th><?php echo "Rp. ".number_format($grandtotal) ?></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="col-lg-12">
					<hr>
				</div>
				<?php 
					if($data['status'] == "Belum Dibayar"){
						$tombol1 =   "<a class='btn btn-primary' href='success_order.php?id=$data[id_pesanan]' style='width: 100%;'>Upload Bukti Pembayaran</a>";
					} else {
						$tombol1 = "";
					}
					if($data['status'] == "Belum Dibayar" || $data['status'] == "Menunggu Konfirmasi" || $data['status'] == "Dikemas") {
						$tombol2 = "<a class='btn btn-danger' href='cancel_order.php?id=$data[id_pesanan]' style='width: 100%;'>Batalkan Pesanan</a>";
					} elseif($data['status'] == "Dikirim") {
						$tombol2 = "<a class='btn btn-success' href='review.php?id=$data[id_pesanan]' style='width: 100%;'>Selesaikan Pesanan</a><br><br>
									<a class='btn btn-secondary' href='aju_pengembalian.php?id=$data[id_pesanan]' style='width: 100%;'>Ajukan Pengembalian</a>";
					} else {
						$tombol2 = "";
					}
				?>
				<div class="col-lg-12">
					<br><?= $tombol2 ?><br><br><?= $tombol1 ?>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

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
</body>

</html>