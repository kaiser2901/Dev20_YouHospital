<?php 
	$role 		= $_GET['role'] ?? NULL;
 	$name   	= $_SESSION['data']['name']    ?? NULL;
    $dob    	= $_SESSION['data']['dob']     ?? NULL;
    $gender 	= $_SESSION['data']['gender']  ?? NULL;
    $phone  	= $_SESSION['data']['phone']   ?? NULL;
    $id_card    = $_SESSION['data']['id_card'] ?? NULL;
    $address	= $_SESSION['data']['address'] ?? NULL;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin Panel</title>
	
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

	<!-- DateTimePicker -->
	<link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.min.css">
</head>
<body>

	<?php 

	include('include/header.php');

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
			<a href="?controller=Employee">Danh sách nhân viên</a>
			<span>\</span>
			<a class="active" href="?controller=Employee&action=getViewAdd">Thêm nhân viên</a>
		</div>
			

	</div> <!-- breadcrumbs finish -->

	<div class="add-patient add-employee"> <!-- add-employee begin -->
		
		<div class="title"> <!-- title begin -->

			<h4 class="mb-4">Thêm Nhân Viên</h4>

		</div> <!-- title finish -->
		
		<div class="form-add-patient form-add-employee"> <!-- form-add-employee begin -->
			<div class="container">
				<?php 
					if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-success" role="alert">
					<?=$_SESSION['message']?>
				</div>
				<?php 
					}
				?>
				<form id="form-add-employee" method="post" action="?controller=Employee&action=addEmp">
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Họ và tên</label>
							<input class="form-control" name="Name" type="text" placeholder="Họ và tên" value="<?=$name?>">
							<i class="fas fa-user"></i>
							<?php if(isset($_SESSION['error']['name'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['name'] ?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Ngày sinh</label>
							<?php 
							if ($dob != '') {
								# code...
								$dob = date_create($dob);
								$dob = date_format($dob, 'd/m/Y');
							}
								
							?>
							<i class="far fa-calendar-alt"></i>
							<input class="form-control dob" readonly style="cursor: pointer;" type="text" placeholder="Ngày sinh" name="Dob" value="<?=$dob?>">
							<?php if(isset($_SESSION['error']['date'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['date'] ?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Giới tính</label>
							<select class="form-control gender" style="cursor: pointer;" name="Gender">
								<option disabled="disabled" selected="selected">Giới tính</option>
								<option <?php if($gender == "Nam") echo 'selected' ?>>Nam</option>
								<option <?php if($gender == "Nữ") echo 'selected' ?>>Nữ</option>
							</select>
							<i class="fas fa-chevron-down"></i>
							<?php if(isset($_SESSION['error']['gender'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['gender'] ?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Số điện thoại</label>
							<i class="fa fa-phone" style="transform: rotate(90deg);"></i>
							<input class="form-control" name="Phone" type="text" placeholder="Điện thoại" value="<?=$phone?>">
							<?php if(isset($_SESSION['error']['phone'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['phone'] ?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Chứng minh nhân dân</label>
							<input class="form-control" type="text" placeholder="CMND" name="id_card" value="<?=$id_card?>">
							<i class="fas fa-id-card"></i>
							<?php if(isset($_SESSION['error']['id_card'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['id_card']?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Địa chỉ</label>
							<input class="form-control" type="text" placeholder="Địa chỉ" name="Address" value="<?=$address?>">
							<i class="fas fa-address-card"></i>
							<?php if(isset($_SESSION['error']['address'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['address']?></p>
							<?php } ?>
						</div>
						<div class="form-group col-sm-6">
							<label>Vị trí</label>
							<select class="form-control role" style="cursor: pointer;" name="Role">
								<option disabled="disabled" selected="selected">Vị trí</option>
								<option <?php if($role == 'Bác Sĩ') echo 'selected' ?> value="Bác Sĩ">Bác Sĩ</option>
								<option <?php if($role == 'Y Tá') echo 'selected' ?> value="Y Tá">Y Tá</option>
								<option <?php if($role == 'Admin') echo 'selected' ?> value="Admin">Admin</option>
								<option <?php if($role == 'Lễ Tân') echo 'selected' ?> value="Lễ Tân">Lễ Tân</option>
							</select>
							<i class="fas fa-chevron-down"></i>
						</div>
						<div class="form-group col-sm-6">
							<label>Chuyên khoa</label>
							<select name="department" class="form-control dep" style="cursor: pointer;" >
								<option disabled="disabled" selected="selected">Chuyên khoa</option>
								<?php 
									foreach ($deps as $dep) {
										# code...
								?>
								<option value="<?=$dep['dep_code']?>"><?=$dep['dep_name']?></option>
								<?php
									}
								?>
								
							</select>
							<i class="fas fa-chevron-down"></i>
							<?php if(isset($_SESSION['error']['department'])){ ?>
								<p style="color: red"><?=$_SESSION['error']['department'] ?></p>
							<?php } ?>
						</div>
					</div>
					<style>
						div.add-patient div.form-add-patient form div.form-group span.ui-selectmenu-icon {
							display: none;
						}
					</style>
					
					<button type="submit" class="btn" name="add-employee">Thêm Nhân Viên</button>	

				</form>
			</div>
			

		</div> <!-- form-add-employee finish -->

	</div> <!-- add-employee finish -->
	

	<?php 

	include('include/footer.php');

	?>


	<!-- Jquery -->
	<script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Popper -->
	<script type="text/javascript" src="../lib/popper/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<!-- DateTimepicker -->
	<script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#form-add-employee input.dob').datepicker({
				changeMonth: true,
				changeYear: true,
				buttonImageOnly: true,
				dateFormat: 'dd-mm-yy',
				yearRange: '1910:2036'
			});
            $('#form-add-employee select.gender').selectmenu();
			$('#form-add-employee select.dep').selectmenu();
			$('#form-add-employee select.role').selectmenu();
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
