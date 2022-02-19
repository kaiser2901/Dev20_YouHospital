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
                        <li class="nav-item active">
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

			<a href=".">Trang Chủ</a>
			<span>\</span>
			<a class="active" href="find_doctor.html">Bác Sĩ</a>

            <h3 style="font-weight: 700; margin-top: 10px;">Danh Sách Bác Sĩ</h3>

		</div>
			
        
	</div> <!-- breadcrumbs finish -->

    <div class="list-doctors">

        <div class="container">

            <div class="search-doctor">

                <div class="form-search">
                    
                    <form action="">

                        <div class="d-flex">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tìm theo tên">
                                <label for="btn-search"><i class="fas fa-search"></i></label>
                            </div>

                            <div class="form-group">
                                <select>
                                    <option disabled selected><i class="fa fa-stethoscope"></i> Chuyên khoa</option>
                                    <option>Nhi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select>
                                    <option disabled selected><i class="fa fa-stethoscope"></i> Vị trí</option>
                                    <option>Bác sĩ</option>
                                </select>
                            </div>

                            <button class="btn" id="btn-search">Tìm kiếm</button>
                        </div>
        
                    </form>
        
                </div>
        
            </div>

            <div class="one-doctor">

                <div class="row">

                    <div class="col-sm-2 avatar">

                        <a href="Doctor/assets/images/avatar/doctor_001.jpeg" style="background-image: url('Doctor/assets/images/avatar/doctor_001.jpeg')" ></a>

                    </div>

                    <div class="col-sm-10 personal">

                        <h2>
                            <a href="#">Bác sĩ Nguyễn Nhật Minh</a>
                        </h2>

                        <div class="float-left w-50">
                            <div class="graduation pl-4 pt-1">
                                <i class="fa fa-graduation-cap"></i>
                                <a>Tiến sĩ, Bác sĩ</a>
                            </div>
                            <div class="department pl-4 pt-1">
                                <i class="fa fa-stethoscope"></i>
                                <a>Nhi, Thần Kinh, Tim mạch</a>
                            </div>
                            <div class="company pl-4 pt-1">
                                <i class="far fa-hospital"></i>
                                <a>Đơn nguyên Kỹ thuật cao Điều trị bại não và Tự kỷ - Bệnh viện Đa khoa Quốc tế, Viện nghiên cứu Tế bào gốc và Công nghệ gen</a>
                            </div>
                        </div>
                        <div class="float-right w-50">
                            <div class="desc">
                                <p>
                                    Giáo sư. Tiến sĩ. Nguyễn Thanh Liêm là chuyên gia đầu ngành trong lĩnh vực ngoại nhi của Việt Nam và thế giới. Bác sĩ là người tiên phong nghiên cứu và ứng dụng thành
                                    ... <a href="#">Xem thêm >></a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="one-doctor">

                    <div class="row">
    
                        <div class="col-sm-2 avatar">
    
                            <a href="Doctor/assets/images/avatar/doctor_001.jpeg" style="background-image: url('Doctor/assets/images/avatar/doctor_001.jpeg')" ></a>
    
                        </div>
    
                        <div class="col-sm-10 personal">
    
                            <h2>
                                <a href="#">Bác sĩ Nguyễn Nhật Minh</a>
                            </h2>
    
                            <div class="float-left w-50">
                                <div class="graduation pl-4 pt-1">
                                    <i class="fa fa-graduation-cap"></i>
                                    <a>Tiến sĩ, Bác sĩ</a>
                                </div>
                                <div class="department pl-4 pt-1">
                                    <i class="fa fa-stethoscope"></i>
                                    <a>Nhi, Thần Kinh, Tim mạch</a>
                                </div>
                                <div class="company pl-4 pt-1">
                                    <i class="far fa-hospital"></i>
                                    <a>Đơn nguyên Kỹ thuật cao Điều trị bại não và Tự kỷ - Bệnh viện Đa khoa Quốc tế, Viện nghiên cứu Tế bào gốc và Công nghệ gen</a>
                                </div>
                            </div>
                            <div class="float-right w-50">
                                <div class="desc">
                                    <p>
                                        Giáo sư. Tiến sĩ. Nguyễn Thanh Liêm là chuyên gia đầu ngành trong lĩnh vực ngoại nhi của Việt Nam và thế giới. Bác sĩ là người tiên phong nghiên cứu và ứng dụng thành
                                        ... <a href="#">Xem thêm >></a>
                                    </p>
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                </div>

                <div class="one-doctor">

                        <div class="row">
        
                            <div class="col-sm-2 avatar">
        
                                <a href="Doctor/assets/images/avatar/doctor_001.jpeg" style="background-image: url('Doctor/assets/images/avatar/doctor_001.jpeg')" ></a>
        
                            </div>
        
                            <div class="col-sm-10 personal">
        
                                <h2>
                                    <a href="#">Bác sĩ Nguyễn Nhật Minh</a>
                                </h2>
        
                                <div class="float-left w-50">
                                    <div class="graduation pl-4 pt-1">
                                        <i class="fa fa-graduation-cap"></i>
                                        <a>Tiến sĩ, Bác sĩ</a>
                                    </div>
                                    <div class="department pl-4 pt-1">
                                        <i class="fa fa-stethoscope"></i>
                                        <a>Nhi, Thần Kinh, Tim mạch</a>
                                    </div>
                                    <div class="company pl-4 pt-1">
                                        <i class="far fa-hospital"></i>
                                        <a>Đơn nguyên Kỹ thuật cao Điều trị bại não và Tự kỷ - Bệnh viện Đa khoa Quốc tế, Viện nghiên cứu Tế bào gốc và Công nghệ gen</a>
                                    </div>
                                </div>
                                <div class="float-right w-50">
                                    <div class="desc">
                                        <p>
                                            Giáo sư. Tiến sĩ. Nguyễn Thanh Liêm là chuyên gia đầu ngành trong lĩnh vực ngoại nhi của Việt Nam và thế giới. Bác sĩ là người tiên phong nghiên cứu và ứng dụng thành
                                            ... <a href="#">Xem thêm >></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
                    </div>

        </div>

    </div>
    
	<?php include_once('include/footer.php'); ?>
	
	<!-- Jquery -->
	<script type="text/javascript" src="lib/jquery/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>