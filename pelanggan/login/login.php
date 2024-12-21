<!doctype html>
<html lang="en">
  <head>
  	<title>Masuk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/style.css">

	</head>

	<?php 
	session_start();
	include "../../koneksi.php"; 

	?>

	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Masuk</h3>
			      		</div>
			      	</div>
							<form action="proses_login.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Nama Pengguna</label>
			      			<input type="text" class="form-control" name="username" placeholder="Masukkan Nama Pengguna" autocomplete="off" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Kata Sandi</label>
		              <input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi" autocomplete="off" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn text-light rounded submit px-3" name="masuk" style="background-color: #ff6c00;">Masuk</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
						</div>
		            </div>
		          </form>
		          <p class="text-center">Belum Punya Akun? <a data-toggle="" href="register.php" style="color: #ff6c00;">Daftar Disini</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

  <?php if(@$_SESSION['sukses_register']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['sukses_register']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_register']); } ?>

	<?php if(@$_SESSION['error_confirmation_password']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['error_confirmation_password']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['error_confirmation_password']); } ?>

	<?php if(@$_SESSION['sukses_ganti_password']){ ?>
        <script>
            swal.fire("Selamat!", "<?php echo $_SESSION['sukses_ganti_password']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_ganti_password']); } ?>

	<?php if(@$_SESSION['gagal_login']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['gagal_login']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal_login']); } ?>

	<?php if(@$_SESSION['password_salah']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['password_salah']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['password_salah']); } ?>

	

	</body>
</html>

