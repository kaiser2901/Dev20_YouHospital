<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reception Panel</title>
	
	<!-- Boostrap Css -->
	<link rel="stylesheet" href="../lib/bootstrap-4.0.0/dist/css/bootstrap.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/images/logo/favicon.ico" />	

	<!-- My Css -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="../lib/fontawesome-free-5.9.0-web/css/all.min.css">

	<!-- Font Lato -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
</head>
<body>

    
	<?php include_once('include/header.php'); ?>

	<div class="navigation"> <!-- navigation begin -->
		
		<div class="container-fluid"> <!-- container begin -->

			<nav class="navbar navbar-expand-xl navbar-light"> <!-- navbar begin -->

			  	<a class="navbar-brand" href=".">
			  		<img src="../assets/images/logo/header_logo.png"> Trình Điều Khiển
			  	</a>

			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>

			  	<div class="collapse navbar-collapse justify-content-center" id="navbarNav"> <!-- collapse navbar-collapse begin -->

				    <ul class="navbar-nav"> <!-- navbar-nav begin -->

				      	<li class="nav-item active">
				        	<a class="nav-link" href=".">Bảng Điều Khiển</a>
				      	</li>
						<!-- Benh Nhan -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navPatientDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bệnh Nhân</a>

				        	<div class="dropdown-menu" aria-labelledby="navPatientDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Patient&action=viewAdd">
									<i class="fas fa-plus"></i> Thêm bệnh nhân 
								</a>
								<a class="dropdown-item" href="?controller=Patient&action=viewMakeAppointment">
									<i class="fas fa-plus"></i> Đăng ký khám ngoại trú 
								</a>
							</div> <!-- dropdown-menu finish -->
						</li>
						<!-- BHYT -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navInsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BHYT</a>

				        	<div class="dropdown-menu" aria-labelledby="navInsDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Insurance&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm BHYT
								</a>
								<a class="dropdown-item" href="?controller=Insurance">
									<i class="fas fa-plus"></i> Danh sách BHYT 
								</a>
							</div> <!-- dropdown-menu finish -->
				      	</li>
				    </ul> <!-- navbar-nav finish -->

			  	</div> <!-- collapse navbar-collapse finish -->

			</nav>	<!-- navbar finish -->

		</div>	<!-- container finish -->

	</div> <!-- navigation finish -->

	<div class="breadcrumbs"> <!-- breadcrumbs begin -->
		
		<div class="container">

			<a href="." class="active">Bảng Điều Khiển</a>

		</div>
			

    </div> <!-- breadcrumbs finish -->
    

    <div class="statistic"> <!-- statistic begin -->

		<div class="title"> <!-- title begin -->

			<h4>Thống Kê</h4>

		</div> <!-- title finish -->

		<div class="container"> <!-- container begin -->

			<div class="row"> <!-- row begin -->

				<div class="col-xl-3 col-md-6 statistic-patient"> <!-- statistic-patient begin -->
					<div class="row"> <!-- row begin -->
						<div class="col mr-2">
							<h6>Patient (Monthly)</h6>
							<p><i class="fas fa-user-plus"></i> 10</p>
						</div>

						<div class="col-auto">
							<i class="fas fa-user-injured fa-2x"></i>
						</div>
					</div> <!-- row finish -->
				</div> <!-- statistic-patient finish -->

				<div class="col-xl-3 col-md-6 statistic-patient statistic-doctor"> <!-- statistic-doctor begin -->
					<div class="row"> <!-- row begin -->
						<div class="col mr-2">
							<h6>Doctor (Monthly)</h6>
							<p><i class="fas fa-user-plus"></i> 30</p>
						</div>

						<div class="col-auto">
							<i class="fas fa-user-md fa-2x"></i>
						</div>
					</div> <!-- row finish -->
				</div> <!-- statistic-doctor finish -->

				<div class="col-xl-3 col-md-6 statistic-patient statistic-app"> <!-- statistic-patient begin -->
					<div class="row"> <!-- row begin -->
						<div class="col mr-2">
							<h6>Apm (Monthly)</h6>
							<p><i class="fas fa-calendar-plus"></i> 20</p>
						</div>

						<div class="col-auto">
							<i class="fas fa-calendar fa-2x"></i>
						</div>
					</div> <!-- row finish -->
				</div> <!-- statistic-patient finish -->

				<div class="col-xl-3 col-md-6 statistic-patient statistic-emp"> <!-- statistic-patient begin -->
					<div class="row"> <!-- row begin -->
						<div class="col mr-2">
							<h6>EMP (Monthly)</h6>
							<p><i class="fas fa-user-plus"></i> 10</p>
						</div>

						<div class="col-auto">
							<i class="fas fa-user-tie fa-2x"></i>
						</div>
					</div> <!-- row finish -->
				</div> <!-- statistic-patient finish -->

			</div> <!-- row finish -->

		</div><!-- container finish -->
	
	</div> <!-- statistic finish -->


	<?php include_once('include/footer.php') ?>


    <!-- Jquery -->
    <script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="../lib/popper/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>