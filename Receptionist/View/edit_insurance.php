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
    
    <!-- DateTimePicker -->
	<link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.min.css">

	<!-- Font Lato -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
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

				      	<li class="nav-item">
				        	<a class="nav-link" href=".">Bảng Điều Khiển</a>
				      	</li>
						<!-- Benh Nhan -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navPatientDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bệnh Nhân</a>

				        	<div class="dropdown-menu" aria-labelledby="navPatientDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Patient&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm bệnh nhân 
								</a>
								<a class="dropdown-item" href="?controller=Patient">
									<i class="fas fa-list"></i> Danh Sách bệnh nhân 
								</a>
								<a class="dropdown-item" href="?controller=Patient&action=getViewAddPatDoc">
									<i class="fas fa-plus"></i> Thêm bệnh án 
								</a>
								<a class="dropdown-item" href="?controller=Patient&action=getViewPatDoc">
									<i class="fas fa-list"></i> Danh Sách bệnh án 
								</a>
							</div> <!-- dropdown-menu finish -->
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
								<a class="dropdown-item" href="?controller=Employee&role=1">
									<i class="fas fa-list"></i> Danh sách bác sĩ
								</a>
								<a class="dropdown-item" href="?controller=Employee&role=2">
									<i class="fas fa-list"></i> Danh sách y tá
								</a>
								<a class="dropdown-item" href="?controller=Employee&role=3">
									<i class="fas fa-list"></i> Danh sách nhân viên kế toán
								</a>
								<a class="dropdown-item" href="?controller=Employee&role=4">
									<i class="fas fa-list"></i> Danh sách lễ tân
								</a>
							</div> <!-- dropdown-menu finish -->
				      	</li>
						<!-- Chuyen khoa -->
				      	<li class="nav-item dropdown active">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navEmpDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chuyên Khoa</a>

				        	<div class="dropdown-menu" aria-labelledby="navEmpDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Department&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm chuyên khoa 
								</a>
								<a class="dropdown-item" href="?controller=Department">
									<i class="fas fa-list"></i> Danh sách chuyên khoa 
								</a>
							</div> <!-- dropdown-menu finish -->

				      	</li>
				      	<!-- Chuyen khoa -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navEmpDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phòng</a>

				        	<div class="dropdown-menu" aria-labelledby="navEmpDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Room&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm phòng
								</a>
								<a class="dropdown-item" href="?controller=Room">
									<i class="fas fa-list"></i> Danh sách phòng
								</a>
								<a class="dropdown-item" href="?controller=Room&action=getViewAssign">
									<i class="fas fa-bed"></i> Chỉ định phòng
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
			<a href="?controller=Insurance">Danh Sách BHYT</a>
			<span>\</span>
			<a class="active" href="?controller=Insurance&action=getViewAdd">Thêm BHYT</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->


	<div class="add-patient add-spec"> <!-- add-spec begin -->
		
		<div class="title"> <!-- title begin -->

			<h4 class="mb-4">Thêm Bảo Hiểm Y Tế</h4>

		</div> <!-- title finish -->
		
		<div class="form-add-patient form-add-spec"> <!-- form-add-spec begin -->
			<div class="container">
				<form method="post" action="?controller=Insurance&action=editInsurance">
                    <input type="text" hidden value="<?=$ins['ins_id']?>" name="ins_id">
                    <div class="form-group">
                        <label>Mã Bệnh Nhân</label> <sup style="color: red">*</sup>
                        <input type="text" name="pat_code" value="<?=$ins['ins_pat_code']?>" class="form-control" list="pats">
                        <datalist id="pats">
                            <?php 
                                foreach($pats as $pat){
                            ?>
                            <option value="<?=$pat['pat_code']?>"><?=$pat['pat_name']?></option>
                            <?php
                                }
                            ?>
                        </datalist>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mã thẻ BHYT</label> <sup style="color: red">*</sup>
                                <input class="form-control" name="ins_code" value="<?=$ins['ins_code']?>" type="text" placeholder="Mã thẻ BHYT">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php 
                                    $date   = date_create($ins['ins_date']);
                                    $date   = date_format($date, 'd-m-Y');
                                ?>
                                <label>Ngày hết hạn</label> <sup style="color: red">*</sup>
                                <input class="form-control date" value="<?=$date?>" name="ins_date" style="cursor: pointer" readonly type="text" placeholder="Ngày hết hạn">
                            </div>
                        </div>
                    </div>
					
					<button type="submit" class="btn" name="edit_ins">Thêm BHYT</button>	

				</form>
			</div>

			

		</div> <!-- form-add-spec finish -->

	</div> <!-- add-spec finish -->


	<?php 

	include('include/footer.php');

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
			$('div.form-add-patient form input.date').datepicker({
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

if (isset($_SESSION['error']) || isset($_SESSION['data'])) {
	unset($_SESSION['error']);
	unset($_SESSION['data']);
}

?>
