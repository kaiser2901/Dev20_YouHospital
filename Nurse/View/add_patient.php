<?php

    $name       = $_SESSION['data']['name']    ?? NULL;
    $dob        = $_SESSION['data']['dob']     ?? NULL;
    $gender     = $_SESSION['data']['gender']  ?? NULL;
    $phone      = $_SESSION['data']['phone']   ?? NULL;
    $id_card    = $_SESSION['data']['id_card'] ?? NULL;
    $address    = $_SESSION['data']['address'] ?? NULL;

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

			  	<a class="navbar-brand" href="index.html">
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
				      	<li class="nav-item dropdown active">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navPatientDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bệnh Nhân</a>

				        	<div class="dropdown-menu" aria-labelledby="navPatientDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="add_patient.php">
									<i class="fas fa-plus"></i> Thêm bệnh nhân 
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
			<a class="active" href="add_patient.php">Thêm Bệnh Nhân</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->
    

    <div class="add-patient"> <!-- add-patient begin -->
		
		<div class="title"> <!-- title begin -->

			<h4>Thêm Bệnh Nhân</h4>

		</div> <!-- title finish -->
        
        <div class="container">
            <div class="form-add-patient"> <!-- form-add-patient begin -->
                
                <form id="form-add-patient" method="post" action="?controller=Patient&action=addPatient">
                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Họ và tên</label> <span style="color: red;">*</span>
                            <input class="form-control" type="text" placeholder="Họ và tên" name="name" value="<?=$name?>">
                            <i class="fas fa-user"></i>

                            <?php if(isset($_SESSION['error']['name'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['name'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <?php 
                            if ($dob != '') {
                                # code...
                                $dob = date_create($dob);
                                $dob = date_format($dob, 'd-m-Y');
                            }
                                
                            ?>
                            <label>Ngày sinh</label> <span style="color: red;">*</span>
                            <i class="far fa-calendar-alt"></i>
                            <input class="form-control dobpicker" readonly style="cursor: pointer;" type="text" placeholder="Ngày sinh" name="dob" value="<?=$dob?>">
                            <?php if(isset($_SESSION['error']['date'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['date'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Giới tính</label> <span style="color: red;">*</span>
                            <select class="form-control gender" style="cursor: pointer;" name="gender">
                                <option disabled="disabled" selected="selected">Giới tính</option>
                                <option <?php if($gender == "Nam") echo 'selected' ?>>Nam</option>
                                <option <?php if($gender == "Nữ") echo 'selected' ?>>Nữ</option>
                            </select>
                            <?php if(isset($_SESSION['error']['gender'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['gender'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Địa chỉ</label> <span style="color: red;">*</span>
                            <input class="form-control" type="text" placeholder="Địa chỉ" name="address" value="<?=$address?>">
                            <i class="fas fa-address-card"></i>
                            <?php if(isset($_SESSION['error']['address'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['address']?></p>
                            <?php } ?>
                        </div>  

                        <div class="form-group col-md-6">
                            <label>Số điện thoại</label> 
                            <i class="fa fa-phone" style="transform: rotate(90deg);"></i>
                            <input class="form-control" type="text" placeholder="Điện thoại" name="phone" value="<?=$phone?>">
                            <?php if(isset($_SESSION['error']['phone'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['phone'] ?></p>
                            <?php } ?> 
                        </div>

                        <div class="form-group col-md-6">
                            <label>Chứng minh nhân dân</label>
                            <input class="form-control" type="text" placeholder="CMND" name="id_card"  value="<?=$id_card?>">
                            <i class="fas fa-id-card"></i>
                            <?php if(isset($_SESSION['error']['id_card'])){ ?>
                                <p style="color: red"><?=$_SESSION['error']['id_card']?></p>
                            <?php } ?>
                        </div>

                        
                    </div>    
                    
                    <button type="submit" class="btn" name="add-patient">Thêm Bệnh Nhân</button>	

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