<!doctype html>
<html lang="en">
  <head>
  	<title>Daftar</title>
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
			      			<h3 class="mb-4">Daftar</h3>
			      		</div>
			      	</div>
							<form action="add_register.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" class="form-control" placeholder="Masukkan Email" name="email" autocomplete="off" required>
			      		</div>
						  <div class="form-group mb-3">
							<label class="label" for="name">Nama Pengguna</label>
							<input type="text" class="form-control" placeholder="Masukkan Nama Pengguna" name="username" autocomplete="off" required>
						</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Kata Sandi</label>
		              <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="password" autocomplete="off" required>
		            </div>
					<div class="form-group mb-3">
		            	<label class="label" for="password">Konfirmasi Kata Sandi</label>
		              <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="password_confirmation" autocomplete="off" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn text-light rounded submit px-3" style="background-color: #ff6c00;">Daftar</button>
		            </div>
		          </form>
		          <p class="text-center">Sudah Punya Akun? <a data-toggle="" href="login.php" style="color: #ff6c00;">Masuk Disini</a></p>
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

  <?php if(@$_SESSION['error_confirmation_password']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['error_confirmation_password']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['error_confirmation_password']); } ?>

	<?php if(@$_SESSION['error_username']){ ?>
        <script>
            swal.fire("Oh Tidak!", "<?php echo $_SESSION['error_username']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['error_username']); } ?>
	
</body>
</html>

