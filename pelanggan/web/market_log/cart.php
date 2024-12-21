<?php

    include "../../../koneksi.php";

    session_start();

    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = '';
    }
    if(!empty($_GET['produk_id']) && $_GET['act']== 'beli'){
        $cart = unserialize($_SESSION['cart']);
        if($cart == ''){
            $cart = [];
        }
        $pid = $_GET['produk_id'];
        $qty = 1;
        
        if(isset($_GET['update_cart'])){
            if(isset($cart[$pid]))
            	if ($_GET['qty'] >= 1){
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$pid'");
                    $result = mysqli_fetch_array($sql);
                    if($_GET['qty'] > $result['stok_akhir']){
                        $_SESSION['batas_stok'] = "Kuantitas pembelian melebihi batas stok tersedia";
                        header("Location: cart.php");
                    } else {
                        $cart[$pid] = $_GET['qty'];
                    }
	                
                }else{
                    $_SESSION['kuantitas_kosong'] = "Minimal Kuantias adalah 1 ";
                    header("Location: cart.php");
                }
        }elseif(isset($_GET['delete_cart'])){
			if(isset($cart[$pid])){
				unset($cart[$pid]);
			}	
				//$arr = unserialize($str);


			//}else{
				
				//redir($url.'keranjang.php');
			//}
				// foreach($cart as $key => $value){
				  // if ($cart[$key] == $_GET['delete_cart']) 
					  // unset($cart[$key]);
				// }
				// $cart = serialize($cart);
		}else{
        
            if(isset($cart[$pid]))
                $cart[$pid] += $qty;
            else
                $cart[$pid] = $qty;
        }
        $_SESSION['cart'] = serialize($cart);
		header("Location: cart.php");
    }
	//unset($_SESSION['cart']);
	//print_r($_SESSION['cart']);
	
	
?> 	 

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
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Sweet Alert -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<?php
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
						<li class="nav-item active"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="cart.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
            <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col" style="width: 100px;">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $total = 0;
                            $cart = unserialize($_SESSION['cart']);
                            if($cart == ''){
                                $cart = [];
                            }
                            foreach($cart as $pid => $qty){
                                $product = mysqli_fetch_array(mysqli_query($koneksi, "select * from produk WHERE id_produk='$pid'"));
                                if(!empty($product)){
                                    $t = $qty * $product['harga_jual'];
                                    $total += $t;
                        ?>
                            <tr>
                                <td><a href="cart.php?delete_cart=yes&&act=beli&&produk_id=<?php echo $pid; ?>"><i class="ti ti-trash"></i></a></td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../../../admin/dashboard/karyawan/images/produk/<?= $product['foto_produk']; ?>" alt="" style="width: 100px; height: 100px">
                                        </div>
                                        <div class="media-body">
                                            <p><?= $product['nama_produk'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo "Rp. ".number_format($product['harga_jual']) ?></h5>
                                </td>
                                <td>
                                <form action="cart.php" method="GET"> 
                                                <input type="hidden" name="update_cart" value="update">
                                                <input type="hidden" name="act" value="beli">
                                                <input type="hidden" name="produk_id" value="<?= $pid ?>">
                                <input class="form-control" type="number" name="qty" value="<?php echo $qty; ?>" onchange="this.form.submit()">
                                </form>
                                </td>
                                <td>
                                    <h5><?php echo "Rp. ".number_format($t) ?></h5>
                                </td>
                            </tr>
                            <?php } } ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5><?php echo "Rp. ".number_format($total) ?></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="shop.php">Continue Shopping</a>
                                        <?php
                                        if($total == "0"){
                                            $tombol = "";
                                        } else {
                                            $tombol = "<a class='primary-btn' href='checkout.php'>Proceed to checkout</a>";
                                        }
                                        ?>
                                        <?php echo $tombol; ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

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

    <?php if(@$_SESSION['batas_stok']){ ?>
        <script>
            swal.fire("Mohon Maaf", "<?php echo $_SESSION['batas_stok']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['batas_stok']); } ?>

    <?php if(@$_SESSION['kuantitas_kosong']){ ?>
        <script>
            swal.fire("Mohon Maaf", "<?php echo $_SESSION['kuantitas_kosong']; ?>", "warning");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['kuantitas_kosong']); } ?>

</body>

</html>