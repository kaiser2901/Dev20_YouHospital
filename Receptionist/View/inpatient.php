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
								<a class="dropdown-item" href="?controller=Inpatient&action=getViewAdd">
									<i class="fas fa-plus"></i> Thêm bệnh nhân nội trú 
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
			<a class="active" href="add_patient.php">Bệnh Nhân Nội Trú</a>

		</div>
			

	</div> <!-- breadcrumbs finish -->
    

    <div class="add-patient"> <!-- add-patient begin -->
		
		<div class="title"> <!-- title begin -->

			<h4>Bệnh Nhân nội trú</h4>

		</div> <!-- title finish -->
        
        <div class="container">
            <div class="form-add-patient"> <!-- form-add-patient begin -->
                <br/>
                <form id="form-add-patient" method="post" action="?controller=Inpatient&action=addInpatient">
                    
                    <table width="80%" border="0" class="table table-hover">
                        <tr>
                            <td>Mã Hồ Sơ</td>
                            <td>Mã Bệnh Nhân</td>
                            <td>Họ Và Tên</td>
                            <td>Khoa</td>
                            <td>Ngày Nhập Viện</td>
                            <td>Ngày Xuất Viện</td>
                            <td>Ngày Tái Khám</td>
                            <td>Hành Động</td>
                        </tr>
                        
                        <?php  foreach ($pat as $value) {  ?>
                        <tr>
                            <?php  
                            $Date = $value['inp_day_in'];
                            $value['inp_day_in'] = date("d-m-Y", strtotime($Date));
                            
                            
                            ?>
                            <td><?=$value['inp_ipat_code']?></td>
                            <td><?=$value['inp_pat_code']?></td>
                            <td><?=$value['pat_name']?></td>
                            <td><?=$value['dep_name']?></td>
                            <td><?=$value['inp_day_in']?></td>          <!--ngày nhập viện-->
                            <td><?=$value['inp_day_out']?></td>         <!--ngày xuất viện-->
                            <td><?=$value['inp_re_treatment']?></td>    <!--ngày tái khám-->
                            <td><a href="?controller=Inpatient&action=getViewEdit&code=<?=$value['inp_ipat_code']?>">Edit</a></td>
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