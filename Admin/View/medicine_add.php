<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Doctor Panel</title>
	
	<!-- Boostrap Css -->
	<link rel="stylesheet" href="../lib/bootstrap-4.0.0/dist/css/bootstrap.min.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/images/logo/favicon.ico" />	

	<!-- My Css -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="../lib/fontawesome-free-5.9.0-web/css/all.min.css">

	<!-- DateTimePicker -->
	<link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.min.css">

	<!-- Font Lato -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
</head>
<body>
	
	<?php 
		include_once('include/header.php');
	?>

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
						<!-- Nhan Vien -->
						<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navEmpDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nhân Sự</a>

				        	<div class="dropdown-menu" aria-labelledby="navEmpDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Employee&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm nhân viên
								</a>
								<a class="dropdown-item" href="?controller=Employee">
									<i class="fas fa-list"></i> Danh sách nhân viên
								</a>
							</div> <!-- dropdown-menu finish -->
				      	</li>
						<!-- Thuoc -->
						<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navMedDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thuốc</a>

				        	<div class="dropdown-menu" aria-labelledby="navMedDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Medicine">
									<i class="fas fa-list"></i> Quản lý thuốc
								</a>
							</div> <!-- dropdown-menu finish -->
						</li>
						<!-- Chuyen khoa -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navDepDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chuyên Khoa</a>

				        	<div class="dropdown-menu" aria-labelledby="navDepDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Department&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm chuyên khoa 
								</a>
								<a class="dropdown-item" href="?controller=Department">
									<i class="fas fa-list"></i> Danh sách chuyên khoa 
								</a>
							</div> <!-- dropdown-menu finish -->
						</li>
						<!-- Phòng khám -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" id="navDepDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phòng Khám</a>

							<div class="dropdown-menu" aria-labelledby="navDepDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Clinic&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm phòng khám 
								</a>
								<a class="dropdown-item" href="?controller=Clinic">
									<i class="fas fa-list"></i> Danh sách phòng khám
								</a>
							</div> 
						</li>
						<!-- Phòng khám -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" id="navDepDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lịch</a>

							<div class="dropdown-menu" aria-labelledby="navDepDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=ClinicEmp&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm phòng khám 
								</a>
								<a class="dropdown-item" href="?controller=ClinicEmp">
									<i class="fas fa-list"></i> Danh sách phòng khám
								</a>
							</div> 
						</li>
						<!-- Account -->
						<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navDepDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý tài khoản</a>

				        	<div class="dropdown-menu" aria-labelledby="navDepDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Account&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm tài khoản
								</a>
								<a class="dropdown-item" href="?controller=Account">
									<i class="fas fa-list"></i> Danh sách tài khoản 
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

			<a href=".">Bảng Điều Khiển</a>
			<span>\</span>
			<a href="?controller=Medicine">Danh Sách Thuốc</a>
			<span>\</span>
			<a class="active" href="?controller=Medicine&action=getViewAdd">Thêm Thuốc</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->


	<div class="add-patient add-medicine"> <!-- add-medicine begin -->
		
		<div class="title"> <!-- title begin -->

			<h4>Thêm Thuốc</h4>

		</div> <!-- title finish -->

		<div class="container">
		
			<div class="form-add-patient form-add-medicine"> <!-- form-add-medicine begin -->

				<?php 
					if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-success" role="alert">
					<?=$_SESSION['message']?>
				</div>
				<?php 
					}
				?>

				<form method="post" action="?controller=Medicine&action=addMedicine">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
								<label>Tên thuốc</label> <span style="color: red">*</span>
								<input class="form-control" type="text" name="med_name" placeholder="Tên Thuốc">
								<i class="fas fa-pills"></i>
								<?php if(isset($_SESSION['error']['med_name'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_name'] ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Đơn vị tính</label> <span style="color: red">*</span>
								<input class="form-control" type="text" name="med_type" placeholder="Đơn vị tính">
								<i class="fab fa-pied-piper-hat"></i>
								<?php if(isset($_SESSION['error']['med_type'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_type'] ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Số lượng</label> <span style="color: red">*</span>
								<input class="form-control" type="text" name="med_num" placeholder="Số lượng">
								<i class="fas fa-grip-horizontal"></i>
								<?php if(isset($_SESSION['error']['med_num'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_num'] ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Giá bán</label> <span style="color: red">*</span>
								<input class="form-control" type="text" name="med_price" placeholder="Giá bán">
								<i class="fas fa-dollar-sign"></i>
								<?php if(isset($_SESSION['error']['med_price'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_price'] ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nhóm thuốc</label> <span style="color: red">*</span>
								<select name="med_group" class="form-control med_group" style="cursor: pointer;" >
									<option disabled="disabled" selected="selected">Nhóm thuốc</option>
									<?php 
										foreach ($medgroups as $medgroup) {
											# code...
									?>
									<option value="<?=$medgroup['med_group_name']?>"><?=$medgroup['med_group_code']?>-<?=$medgroup['med_group_name']?></option>
									<?php
										}
									?>
									
								</select>
								<?php if(isset($_SESSION['error']['med_group'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_group'] ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Cách dùng</label>
								<input class="form-control" type="text" name="med_tut" placeholder="Cách dùng">
								<i class="fas fa-question-circle"></i>
								<?php if(isset($_SESSION['error']['med_tut'])){ ?>
									<p style="color: red"><?=$_SESSION['error']['med_tut'] ?></p>
								<?php } ?>
							</div>
						</div>
					</div>

							
					<button type="submit" class="btn" name="add-medicine">Thêm Thuốc</button>	

				</form>

			</div> <!-- form-add-medicine finish -->
		</div>	

	</div> <!-- add-medicine finish -->

	<?php 
		include_once('include/footer.php');
	?>

	<!-- Jquery -->
	<script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Popper -->
	<script type="text/javascript" src="../lib/popper/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
		$(function() {
            $('.form-add-patient select.med_group').selectmenu();
		});
	</script>
</body>
</html>
<?php
if (isset($_SESSION['error']) || isset($_SESSION['data']) || isset($_SESSION['message'])) {
	unset($_SESSION['error']);
	unset($_SESSION['data']);
	unset($_SESSION['message']);
}
?>