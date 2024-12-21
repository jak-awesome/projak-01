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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">

	<!-- Sweet Alert -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

	<style>
@charset "UTF-8";

input[type=radio] {
  display: none;
}
input[type=radio]:not(:disabled) ~ .label-radio {
  cursor: pointer;
}
input[type=radio]:disabled ~ .label-radio {
  color: #bcc2bf;
  border-color: #bcc2bf;
  box-shadow: none;
  cursor: not-allowed;
}

.label-radio {
  height: 100%;
  display: block;
  background: white;
  border: 2px solid #ff6c00;
  border-radius: 20px;
  padding: 1rem;
  margin-bottom: 1rem;
  text-align: center;
  box-shadow: 0px 3px 10px -2px rgba(161, 170, 166, 0.5);
  position: relative;
}

input[type=radio]:checked + .label-radio {
  background: #ff6c00;
  color: white;
  box-shadow: 0px 0px 20px #ff6c00;
}
input[type=radio]:checked + .label-radio::after {
  color: #3d3f43;
  font-family: FontAwesome;
  border: 2px solid #ff6c00;
  content: "";
  font-size: 24px;
  position: absolute;
  top: -25px;
  left: 50%;
  transform: translateX(-50%);
  height: 50px;
  width: 50px;
  line-height: 50px;
  text-align: center;
  border-radius: 50%;
  background: white;
  box-shadow: 0px 2px 5px -2px rgba(0, 0, 0, 0.25);
}

input[type=radio]#control_05:checked + .label-radio {
  background: red;
  border-color: red;
}

.p-radio {
  font-weight: 900;
}

@media only screen and (max-width: 700px) {
  section {
    flex-direction: column;
  }
}
	</style>

</head>

<?php
    session_start();
  if (empty($_SESSION["login"])) {
    $_SESSION['kosong_session'] = "Silahkan login terlebih dahulu";
   header("Location:../../login/login.php");
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
									<li class="nav-item active"><a class="nav-link" href="profile.php">Profile</a></li>
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
					<h1>Alvindo Computama Shop</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">My Account<span class="lnr lnr-arrow-right"></span></a>
						<a href="profile.php">Profile</a>
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
				<?php
				include "../../../koneksi.php";
				$id_alamat_pelanggan = $_GET['id'];
				$page = $_GET['page'];
				?>
				<div class="row">
					<div class="col-lg-12">
						<?php
						$sql_1 = mysqli_query($koneksi, "SELECT * FROM alamat_pelanggan INNER JOIN pelanggan ON pelanggan.id_pelanggan=alamat_pelanggan.id_pelanggan WHERE id_alamat_pelanggan='$id_alamat_pelanggan'");
						while($data_1 = mysqli_fetch_array($sql_1)){
						?>
						<form method="post" action="pilih_alamat.php">
							<input type="hidden" name="id_alamat_pelanggan" value="<?= $data_1['id_alamat_pelanggan']; ?>">
							<input type="hidden" name="id_pelanggan" value="<?= $data_1['id_pelanggan']; ?>">
							<input type="hidden" name="page" value="<?= $page; ?>">
							<input type="submit" class="btn btn-success float-right" name="pilih_alamat" value="Jadikan Alamat Utama">
						</form>
						<?php } ?>
					</div>
				</div>
				<hr>
				<?php
					$sql_2 = mysqli_query($koneksi, "SELECT * FROM alamat_pelanggan INNER JOIN pelanggan ON pelanggan.id_pelanggan=alamat_pelanggan.id_pelanggan WHERE id_alamat_pelanggan='$id_alamat_pelanggan'");
					while($data_2 = mysqli_fetch_array($sql_2)){
					?>
				<form action="act_edit_alamat.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6"> 
							<?php
							if($data_2['ket'] == "1"){
								$ket = "(Utama)";
							} elseif($data_2['ket'] == "0"){
								$ket = "";
							}
							?>
							<h3>Detail Alamat <?= $ket; ?></h3>
						</div>
						<div class="col-lg-6">
							<a href="hapus_alamat.php?id=<?php echo $data_2['id_alamat_pelanggan'] ?>" class="btn btn-outline-danger float-right">Hapus Alamat</a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Penerima</label>
								<input type="hidden" name="id_alamat_pelanggan" value="<?= $data_2['id_alamat_pelanggan']; ?>">
								<input type="text" class="form-control" name="nama_penerima" value="<?= $data_2['nama_penerima']; ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>No. Telp Penerima</label>
								<input type="text" class="form-control" name="no_penerima" value="<?= $data_2['no_penerima']; ?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Baris Alamat 1</label>
								<input type="text" class="form-control" name="alamat_1" value="<?= $data_2['alamat_1']; ?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Baris Alamat 2</label>
								<input type="text" class="form-control" name="alamat_2" value="<?= $data_2['alamat_2']; ?>">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Desa/Kelurahan</label>
								<input type="text" class="form-control" name="desa_kelurahan" value="<?= $data_2['desa_kelurahan']; ?>">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Kecamatan</label>
								<input type="text" class="form-control" name="kecamatan" value="<?= $data_2['kecamatan']; ?>">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Kabupaten/Kota</label>
								<input type="text" class="form-control" name="kab_kota" value="<?= $data_2['kab_kota']; ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Provinsi</label>
								<input type="text" class="form-control" name="provinsi" value="<?= $data_2['provinsi']; ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Kode Pos</label>
								<input type="text" class="form-control" name="kode_pos" value="<?= $data_2['kode_pos']; ?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<input type="submit" name="editAlamat" value="Ubah" class="btn btn-outline-warning" style="width: 100%;">
							</div>
						</div>
					</div>
				</form>
				<?php } ?>
			</div>			
		</div>
	</section>
	<!--================End Single Product Area =================-->
	
		<!-- Modal -->
		<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					include "../../../koneksi.php";
					$sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]'");
					while($result = mysqli_fetch_array($sql)){
					?>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data" action="act_edit_profil.php">
						<div class="form-group">
  							<img src="img/profile/<?= $result['foto_pelanggan']?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 25px;">
							<input type="checkbox" name="ubah_gambar" class="form_control" value="true"> Ceklis jika ingin mengubah gambar
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="hidden" name="id_pelanggan" value="<?= $result['id_pelanggan']; ?>">
							<input type="text" class="form-control" name="nama_lengkap" value="<?= $result['nama_lengkap']; ?>">
						</div>
						<div class="form-group">
							<label>Tempat Lahir</label>
							<input type="text" class="form-control" name="tempat_lahir" value="<?= $result['tempat_lahir']; ?>">
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control" name="tanggal_lahir" value="<?= $result['tanggal_lahir']; ?>">
						</div>
						<div class="form-group">
                            <label>Upload Foto</label>
                            <div class="input-group">
                            	<div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" name="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Jenis Kelamin</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki" <?php if($result['jenis_kelamin']=='Laki-laki') echo 'checked'?>>
								<label class="form-check-label" for="inlineRadio1">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" <?php if($result['jenis_kelamin']=='Perempuan') echo 'checked'?>>
								<label class="form-check-label" for="inlineRadio2">Perempuan</label>
							</div>
						</div>
						<div class="form-group">
							<label>No. HP</label>
							<input type="text" class="form-control" name="no_hp" value="<?= $result['no_hp']; ?>">
						</div>
				</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="editProfile">Change</button>
					</div>
					</form>
					<?php
					}
				?>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="editInfoAkunModal" tabindex="-1" aria-labelledby="editInfoAkunModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title" id="editInfoAkunModalLabel">Edit Informasi Akun</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					include "../../../koneksi.php";
					$sql_info_akun = mysqli_query($koneksi, "SELECT * FROM akun_pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]'");
					while($result_info_akun = mysqli_fetch_array($sql_info_akun)){
					?>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data" action="act_edit_akun.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" value="<?= $result_info_akun['username']; ?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="<?= $result_info_akun['email']; ?>">
						</div>
				</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="editInfoAkun">Change</button>
					</div>
					</form>
					<?php
					}
				?>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="addAlamatModal" tabindex="-1" aria-labelledby="addAlamatModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title" id="addAlamatModalLabel">Tambah Alamat</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data" action="act_add_alamat.php">
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<?php
										$sql_add_alamat = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_akun_pelanggan='$_SESSION[id_akun_pelanggan]'");
										$data_add_alamat = mysqli_fetch_array($sql_add_alamat);
										?>
										<label>Nama Penerima</label>
										<input type="hidden" name="id_pelanggan" class="form-control" placeholder="" value="<?= $data_add_alamat['id_pelanggan'] ?>">
										<input type="text" name="nama_penerima" class="form-control" placeholder="" value="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>No. Telepon Penerima</label>
										<input type="text" name="no_penerima" class="form-control" placeholder="" value="">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Baris Alamat 1</label>
										<input type="text" name="alamat_1" class="form-control" placeholder="Cth : Jalan, Rt/rw" value="">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Baris Alamat 2</label>
										<input type="text" name="alamat_2" class="form-control" placeholder="Cth : No. Rumah, Patokan" value="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Desa/Kelurahan</label>
										<input type="text" name="desa_kelurahan" class="form-control" value="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Kecamatan</label>
										<input type="text" name="kecamatan" class="form-control" value="">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Kabupaten/Kota</label>
										<input type="text" name="kab_kota" class="form-control" value="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Provinsi</label>
										<input type="text" name="provinsi" class="form-control" value="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Kode Pos</label>
										<input type="text" name="kode_pos" class="form-control"  value="">
									</div>
								</div>
							</div>
						</div>
				</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="addAlamat">Change</button>
					</div>
					</form>
				</div>
			</div>
		</div>


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

	<?php if(@$_SESSION['berhasil_edit_profil']){ ?>
		<script>
			swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_edit_profil']; ?>", "success");
		</script>
	<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
	<?php unset($_SESSION['berhasil_edit_profil']); } ?>

	<?php if(@$_SESSION['gagal_ekstensi_profil']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_ekstensi_profil']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_ekstensi_profil']); } ?>

    <?php if(@$_SESSION['gagal_edit_profil']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_edit_profil']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_edit_profil']); } ?>

    <?php if(@$_SESSION['gagal_ukuran_profil']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_ukuran_profil']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_ukuran_profil']); } ?>

	<?php if(@$_SESSION['berhasil_edit_info_akun']){ ?>
		<script>
			swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_edit_info_akun']; ?>", "success");
		</script>
	<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
	<?php unset($_SESSION['berhasil_edit_info_akun']); } ?>

	<?php if(@$_SESSION['gagal_edit_info_akun']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_edit_info_akun']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_edit_info_akun']); } ?>

    <?php if(@$_SESSION['password_beda']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['password_beda']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_beda']); } ?>

    <?php if(@$_SESSION['password_berhasil']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['password_berhasil']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_berhasil']); } ?>

    <?php if(@$_SESSION['password_gagal']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['password_gagal']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_gagal']); } ?>

    <?php if(@$_SESSION['password_salah']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['password_salah']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_salah']); } ?>

    <?php if(@$_SESSION['password_tidak_ada']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['password_tidak_ada']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_tidak_ada']); } ?>

    <?php if(@$_SESSION['berhasil_edit_alamat']){ ?>
		<script>
			swal.fire("Selamat!", "<?php echo $_SESSION['berhasil_edit_alamat']; ?>", "success");
		</script>
	<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
	<?php unset($_SESSION['berhasil_edit_alamat']); } ?>

	<?php if(@$_SESSION['gagal_edit_alamat']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_edit_alamat']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_edit_alamat']); } ?>

</body>

</html>