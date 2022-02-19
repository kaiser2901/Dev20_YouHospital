//checkup.php
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
    
    <!-- DateTimePicker -->
	<link rel="stylesheet" href="lib/jquery-ui/jquery-ui.min.css">

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
				      	<li class="nav-item active">
				        	<a class="nav-link" href="?controller=CheckUp">Đăng Ký Khám Bệnh</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="?controller=Doctor">Tìm Bác Sĩ</a>
				      	</li>
				      	<li class="nav-item ">
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
			<a class="active" href="make_appointment.html">Đăng Ký Khám</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->

	<div class="dang-ky-kham"> <!-- dang-ky-kham beogn -->
		
		<div class="title"> <!-- title beign -->
			
			<h3>
				ĐĂNG KÝ KHÁM VÀ TƯ VẤN TẠI YouHospital
			</h3>
			<p>
				Vui lòng để lại thông tin và nhu cầu của quý khách. Chúng tôi sẽ liên hệ trong thời gian sớm nhất.
			</p>

		</div> <!-- title finish -->

		<div class="form-dang-ky"> <!-- form-dang-ky beign -->
			
			<form id="dang-ky-kham" action="?controller=CheckUp&action=addCheckUp" method="post" autocomplete="off"> <!-- dang-ky-kham begin -->

				<div class="form-group">
					<i class="fas fa-user"></i>
					<input class="form-control" name="name" type="text" placeholder="Họ và tên">
                                        <?php if(isset($_SESSION['error']['name'])){?>
                                            <p style="color: red"><?=$_SESSION['error']['name'] ?></p>
                                        <?php }?>
                                        
				</div>

				<div class="form-group">
					<i class="far fa-calendar-alt"></i>
					<input class="form-control dobpicker" name="dob" readonly style="cursor: pointer;" type="text" placeholder="Ngày sinh">
                                        <?php if(isset($_SESSION['error']['dob'])){?>
                                            <p style="color: red"><?=$_SESSION['error']['dob'] ?></p>
                                        <?php }?>
				</div>

				<div class="form-group">
					<i class="fa fa-phone" style="transform: rotate(90deg);"></i>
					<input class="form-control" name="phone" type="text" placeholder="Điện Thoại">
                                        <?php if(isset($_SESSION['error']['phone'])){?>
                                            <p style="color: red"><?=$_SESSION['error']['phone'] ?></p>
                                        <?php }?>
				</div>

				<div class="form-group">
					<i class="far fa-envelope"></i>
					<input class="form-control" type="email" name="email" placeholder="Email">
                                        <?php if(isset($_SESSION['error']['email'])){?>
                                            <p style="color: red"><?=$_SESSION['error']['email'] ?></p>
                                        <?php }?>
				</div>
				
				<div class="form-group">
                                        <i class="far fa-calendar-alt"></i>
                                        <input class="form-control datepicker" name="date" readonly style="cursor: pointer;" type="text" placeholder="Ngày khám bệnh">
                                        <?php if(isset($_SESSION['error']['date'])){?>
                                            <p style="color: red"><?=$_SESSION['error']['date'] ?></p>
                                        <?php }?>
				</div>
					
				<div class="form-group">
					<textarea name="symptom" class="form-control" placeholder="Nhu cầu khám bệnh (không bắt buộc)"></textarea>
                                        
				</div>

				<button type="submit" class="btn" name="addCheckUp">Gửi đi <i class="fas fa-check"></i></button>


			</form> <!-- dang-ky-kham finish -->

		</div> <!-- form-dang-ky finish -->

	</div> <!-- dang-ky-kham finish -->

    <?php include_once('include/footer.php'); ?>
	
	<!-- Jquery -->
	<script type="text/javascript" src="lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap JS -->
    <script type="text/javascript" src="lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- DateTimepicker -->
	<script type="text/javascript" src="lib/jquery-ui/jquery-ui.min.js"></script>
	<!-- Input date and dob  -->
	<script type="text/javascript">
		$(function() {
			$('#dang-ky-kham input.dobpicker').datepicker({
				changeMonth: true,
				changeYear: true,
				buttonImageOnly: true,
				dateFormat: 'dd-mm-yy',
				yearRange: '1910:2036'
			});
            $('#dang-ky-kham input.datepicker').datepicker({
				changeMonth: true,
				changeYear: true,
				buttonImageOnly: true,
				dateFormat: 'dd-mm-yy',
				yearRange: '1910:2036'
			});
		});
	</script>
</body>
</html>
<?php
if (isset($_SESSION['error']) || isset($_SESSION['data']) || isset($_SESSION['complete']) ) {
    unset($_SESSION['error']);
    unset($_SESSION['data']);
    unset($_SESSION['complete']);
    
}
?>