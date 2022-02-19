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

		</div>
			

	</div> <!-- breadcrumbs finish -->


	<div class="patient"> <!-- patient begin -->
		
		<div class="title mb-5"> <!-- title begin -->
			
			<h4>Danh Sách Thuốc</h4>

		</div> <!-- title finish -->

		<div class="list-medicine"> <!-- list-patient begin -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-med-group">
								<thead class="text-center">
									<tr>
										<th>
											<a href="?controller=Medicine&action=getViewAddMedGroup">
												<div style="height:100%;width:100%">
													<i class="fas fa-plus"> Thêm nhóm thuốc</i>
												</div>
											</a>
										</th>
									</tr>
								</thead> 
					  			<tbody>
									<tr>
										<td class="<?php if(!isset($_GET['med_group_code'])) echo 'active'; ?>">
											<a href="?controller=Medicine">TẤT CẢ</a>
										</td>
									</tr>
									<?php 
										foreach($medgroups as $medgroup){
											if(isset($_GET['med_group_code'])){
												$med_gr_code = $_GET['med_group_code'];
											}
									?>
									<tr>
										<td class="<?php if($med_gr_code == $medgroup['med_group_code']) echo 'active'; ?>">
											<a href="?controller=Medicine&med_group_code=<?=$medgroup['med_group_code']?>">
												<?=$medgroup['med_group_name']?>
											</a>
										</td>
									</tr>
									<?php } ?>
					  			</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-9">
					<div class="add-medicine float-left">
					<a href="?controller=Medicine&action=getViewAdd">
						<i class="fas fa-plus"> Thêm thuốc</i>
					</a>
				</div>
				<div class="form-search float-right">
					<form method="post" action="?controller=Medicine&action=search" class="float-right d-flex">
						<!--end of col-->
						<div class="form-group">
							<input style="border-radius: 0; width: 250px;" name="value" class="form-control" type="search" placeholder="Tìm Kiếm">
						</div>
						<button style="height: 38px; border-radius: 0;" name="search" class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
                <div class="clearfix"></div>
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-data">
								<thead class="text-center">
									<tr>
										<th>Mã thuốc</th>
										<th>Tên thuốc</th>
										<th>Đơn vị tính</th>
										<th>Giá bán</th>
										<th>Mặc định mỗi ngày</th>
										<th>Cách dùng</th> 
										<th>Nhóm thuốc</th>
										<th>Chức năng</th>
									</tr>
								</thead>
							  	<?php 	
									foreach($medicines as $medicine){ 	
								?>
								<tbody>
									<tr class="text-center">
										<td><?=$medicine['med_code']?></td>
										<td><?=$medicine['med_name']?></td>
										<td><?=$medicine['med_type']?></td>
										<td><?=$medicine['med_price']?></td>
										<td><?=$medicine['med_num']?></td>
										<td><?=$medicine['med_tut']?></td>
										<td><?=$medicine['med_group']?></td>
										<td>
											<a href="?controller=Medicine&action=getViewEdit&id=<?=$medicine['med_code']?>"><i class="fas fa-edit" style="color: #42B3E5"></i></a>
										</td>
									</tr>
								</tbody>
								<?php } ?>
							</table>
							<nav class="mt-4 float-right" aria-label="Page navigation example">
								<?=$page->getPagination()?>
							</nav>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

			</div>

		</div> <!-- list-patient finish -->

	</div> <!-- patient finish -->

	
	


	<?php 
		include_once('include/footer.php');
	?>

	<!-- Jquery -->
	<script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Popper -->
	<script type="text/javascript" src="../lib/popper/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>