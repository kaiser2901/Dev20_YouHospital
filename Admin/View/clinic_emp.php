<?php
    $pat_code   = $_SESSION['data']['pat_code'] ?? NULL;
    $pat_name   = $_SESSION['data']['pat_name'] ?? NULL;
    $date       = $_SESSION['data']['dob']      ?? NULL;
    $depp       = $_SESSION['data']['dep']      ?? NULL;
?>
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

        <!-- DateTimePicker -->
	<link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.min.css">


	<!-- Font Lato -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
</head>
<body>

    <?php include_once('include/header.php') ?>


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
			<a class="active" href="add_patient.php">Ngày Làm Việc</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->
    

    <div class="add-patient"> <!-- add-patient begin -->
		
		<div class="title"> <!-- title begin -->

			<h4>Quản lý Ngày Làm Việc</h4>
                        <a href="?controller=ClinicEmp&action=getViewAdd">Thêm mới</a>
		</div> <!-- title finish -->
        
        <div class="container">
            <div class="form-add-patient"> <!-- form-add-patient begin -->
                <br/>
                <form id="form-add-patient" method="post" action="">
                    
                    <table width="80%" border="0" class="table table-hover">
                        <tr>
                            <td>Mã Nhân Viên</td>
                            <td>Họ Và Tên</td>
                            <td>Chức Vụ</td>
                            <td>Phòng Khám</td>
                            <td>Ngày Làm Việc</td>
                            <td>Action</td>
                            
                        </tr>
                        <?php   foreach ($cli_emp as $value) {  ?>
                        <tr>
                            <td><?=$value['emp_code']?></td>
                            <td><?=$value['emp_name']?></td>
                            <td><?=$value['emp_role']?></td>
                            <td><?=$value['cli_name']?></td>
                            <td><?=$value['clin_date']?></td>
                            
                            <td><a href="?controller=ClinicEmp&action=getViewEdit&id=<?=$value['clin_id']?>" >Edit</a></td>
                        </tr>
                        <?php } ?>
                        
                    </table>    
                    
                    	

                </form>

            </div> <!-- form-add-patient finish -->
        </div>
  

	</div> <!-- add-patient finish -->


    <?php include_once('include/footer.php'); ?>


    <!-- Jquery -->
    <script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="../lib/popper/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
		$(function() {
			$('#form-add-patient input.dobpicker').datepicker({
				changeMonth: true,
				changeYear: true,
				buttonImageOnly: true,
				dateFormat: 'dd-mm-yy',
				yearRange: '1910:2036'
			});
            $('#form-add-patient select.gender').selectmenu();
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