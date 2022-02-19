<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>You Hospital</title>
	
	<!-- Boostrap Css -->
	<link rel="stylesheet" href="lib/bootstrap-4.0.0/dist/css/bootstrap.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/logo/favicon.ico" />	

	<!-- My Css -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="lib/fontawesome-free-5.9.0-web/css/all.min.css">

	<!-- Font Lato -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
</head>
<body>
	
	<?php include_once('include/header.php'); ?>

	<div class="navigation"> <!-- navigation begin -->
			
		<div class="container"> <!-- container begin -->

			<nav class="navbar navbar-expand-md navbar-light"> <!-- navbar begin -->

			  	<a class="navbar-brand" href="index.html">
			  		<img src="assets/images/logo/header_logo.png"> YouHospital
			  	</a>

			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>

			  	<div class="collapse navbar-collapse justify-content-center" id="navbarNav"> <!-- collapse navbar-collapse begin -->

				    <ul class="navbar-nav"> <!-- navbar-nav begin -->

				      	<li class="nav-item">
				        	<a class="nav-link" href=".">Trang Chủ</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="?controller=CheckUp">Đăng Ký Khám Bệnh</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="?controller=Doctor">Tìm Bác Sĩ</a>
				      	</li>
				      	<li class="nav-item active">
				        	<a class="nav-link" href="?controller=Login">Đăng Nhập</a>
				      	</li>

				    </ul> <!-- navbar-nav finish -->

			  	</div> <!-- collapse navbar-collapse finish -->

			</nav>	<!-- navbar finish -->

		</div>	<!-- container finish -->

	</div><!-- navigation finish -->

	<div class="breadcrumbs"> <!-- breadcrumbs begin -->
		
		<div class="container">

			<a href="index.html">Trang Chủ</a>
			<span>\</span>
			<a class="active" href="login.html">Đăng Nhập</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->

	<div class="login"> <!-- login begin -->
		
		<div class="title"> <!-- title begin -->
			
			<h4>Đăng Nhập</h4>

		</div> <!-- title finish -->

		<div class="form-login"> <!-- form-login begin -->
			
			<form method="post" action="?controller=Login&action=Login">
				
				<div class="form-group">
					<i class="fas fa-user"></i>
					<input name="Account" class="form-control" type="text" placeholder="Tài khoản">
				</div>
				<div class="form-group">
					<i class="fas fa-lock"></i>
					<input name="Password" class="form-control" type="password" placeholder="Mật khẩu">
					<?php if(isset($_SESSION['error-acc'])){ ?>
						<p style="margin-top: 16px; color: red"><?=$_SESSION['error-acc']?></p>
					<?php } ?>
				</div>
				
				<button name="Login" type="submit" class="btn">Đăng Nhập</button>	
				
				<div class="forgot-pass">
					<a href="#">Quên mật khẩu?</a>
				</div>
				

			</form>

		</div> <!-- form-login finish -->

	</div> <!-- login finish -->
    




    <?php include_once('include/footer.php'); ?>
	
	<!-- Jquery -->
	<script type="text/javascript" src="lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if (isset($_SESSION['error-acc'])) {
	# code...
	unset($_SESSION['error-acc']);
}
?>