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
					<a class="navbar-brand logo_h" href="index.html"><h3>Alvindo <div style="color: #ff6c00;">Computama</div></h3></a>
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
							<li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
							<li class="nav-item"><a class="nav-link" href="../../login/login.php">Login</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
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
					<h1>Contact and Help</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Contact</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
		<iframe id="mapBox" class="mapBox" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.898864286792!2d108.47838318465575!3d-6.982787202972873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f142c39db9663%3A0x22fb93cb74fdda63!2sAlvindo%20Computama!5e0!3m2!1sen!2sid!4v1692880825191!5m2!1sen!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>Kuningan, Jawa Barat</h6>
							<p>Jalan Jend. Sudirman No. 20</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">081xxxxxxxxxx</a></h6>
							<p>Setiap Hari pada Jam Kerja</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">alvindo@gmail.com</a></h6>
							<p>Kirim Pesanmu kepada kami</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<center><h2>Frequently Asked and Question (FAQ)</h2></center>
					<hr>
					<div id="accordion">
						<?php 
						include "../../../koneksi.php";
						$sql = mysqli_query($koneksi, "SELECT * FROM faq ORDER BY id_faq ASC");
						while($data = mysqli_fetch_array($sql)){
						?>
						<div class="card">
							<div class="card-header" id="heading<?= $data['id_faq'] ?>">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $data['id_faq'] ?>" aria-expanded="true" aria-controls="collapse<?= $data['id_faq'] ?>">
								<?= $data['tanya']; ?>
								</button>
							</h5>
							</div>

							<div id="collapse<?= $data['id_faq'] ?>" class="collapse" aria-labelledby="heading<?= $data['id_faq'] ?>" data-parent="#accordion">
							<div class="card-body">
								<?= $data['jawab']; ?>
							</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

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