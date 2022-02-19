<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Employee Panel</title>
	
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
			<a class="active" href="?controller=Insurance">Danh sách BHYT</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->

	<div class="patient"> <!-- speciality begin -->
		
		<div class="title"> <!-- title begin -->
			
			<h4 class="mb-4">Danh Sách Bảo Hiểm Y Tế</h4>

		</div> <!-- title finish -->

		<div class="list-patient"> <!-- list-speciality begin -->
			
			<div class="container">
				<div class="mb-4 float-left">
					<a class="btn btn-success" href="?controller=Insurance&action=getViewAdd"><i class="fas fa-plus"></i> Thêm BHYT</a>
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

					<table class="table table-hover table-bordered">

					  	<thead class="text-center">
					    	<tr>
					    		<th>#</th>
					      		<th>Thẻ BHYT</th>
					      		<th>Ngày hết hạn</th>
					      		<th>Tên bệnh nhân</th>
					      		<th>Hành động</th>
					    	</tr>
					  	</thead>
					  	<tbody>
					  		<?php 
                              $count = 0;
                              $i = 0;
					  		foreach ($inss as $ins) {
					  			# code...
                                $count++;
                                $date   = date_create($ins['ins_date']);
                                $date   = date_format($date, 'd-m-Y');
				  			?>

					    	<tr class="text-center">
					    		<td><?=$count?></td>
					      		<td><?=$ins['ins_code']?></td>
					      		<td><?=$date?></td>
					      		<td><?=$pats[$i]?></td>
					      		<td>
					      			<a href="?controller=Insurance&action=getViewEdit&id=<?=$ins['ins_id']?>"><i class="fas fa-edit" style="color: #42B3E5"></i></a>
					      		</td>
					    	</tr>

                            <?php
                                $i++;
					  		}
					  		?>
					  	</tbody>

					</table>

					<nav class="mt-4 float-right" aria-label="Page navigation example">
                		<?=$page->getPagination()?>
                	</nav>
					
					<div class="clearfix"></div>

				</div>

			</div>

		</div> <!-- list-speciality begin -->

	</div> <!-- speciality finish -->
	


	<?php 

	include('include/footer.php');

	?>


	<!-- Jquery -->
	<script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Popper -->
	<script type="text/javascript" src="../lib/popper/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>