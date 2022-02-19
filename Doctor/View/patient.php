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

    
    <?php include_once('include/header.php'); ?>

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
						<!-- Benh Nhan -->
				      	<li class="nav-item dropdown">
				        	<a class="nav-link dropdown-toggle" href="#" role="button" id="navPatientDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bệnh Nhân</a>

				        	<div class="dropdown-menu" aria-labelledby="navPatientDropdown"> <!-- dropdown-menu begin -->
								<a class="dropdown-item" href="?controller=Patient">
									<i class="fas fa-plus"></i> Tra Cứu 
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
            <span>/</span>
            <a href="?controller=Patient" class="active">Danh sách bệnh nhân chờ khám</a>
		</div>
			

    </div> <!-- breadcrumbs finish -->

    <div class="list-patient">

        <div class="title">
            <h4>Danh Sách Bệnh Nhân Chờ Khám Bệnh</h4>
        </div>

        <div class="menu-bar"> <!-- menu-bar begin -->
            <div class="container">
                <div class="form-search">
                    <form>
                        <div class="d-flex">
                            <div class="form-group">
                                <input class="form-control" style="width: 300px;" type="text" placeholder="Nhập từ khóa">
                            </div>
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- menu-bar finish -->

        <div class="data-table-patient"> <!-- slide-bar finish -->

            <div class="container">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Giới Tinh</th>
                                <th>Tuổi</th>
                                <th>Trạng Thái</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 0;
                            foreach($pats as $pat){
                                // Calculate Ages
                                $date 		= new DateTime($pat['pat_dob']);
                                $now 		= new DateTime(date('Y-m-d'));
                                $interval 	= $date->diff($now);
                                $age 		= $interval->y;
                                // Calculate date
                                $date 		= new DateTime($pat['app_date']);
                                $now 		= new DateTime(date('Y-m-d'));
                                $interval 	= $date->diff($now);
                                $day 		= $interval->d;
                                if($day != 0){
                                    continue;
                                }
                                $count++;
                            ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$pat['pat_code']?></td>
                                    <td><b><?=$pat['pat_name']?></b></td>
                                    <td><?=$pat['pat_gender']?></td>
                                    <td><?=$age?></td>
                                    <td><?=$pat['app_status']?></td>
                                    <td>
                                        <a href="#" class="pres"></a>
                                    </td>
                                </tr>
                                <tr class="info-pat">
                                    <td colspan="7">
                                        <div class="divide-tab">
                                            <ul class="d-flex">
                                                <li><a href="#tab-info">Thông tin bệnh nhân</a></li>
                                                <li><a href="#tab-history-checkup">Lịch sử khám bệnh</a></li>
                                                <li><a href="#tab-ls-bill">Danh sách hóa đơn</a></li>
                                            </ul>
                                            <div id="tab-info">
                                                <div class="d-flex">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th>Mã bệnh nhân</th>
                                                            <td><?=$pat['pat_code']?></td>
                                                            <th>Tên bệnh nhân</th>
                                                            <td><?=$pat['pat_name']?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Giới tính</th>
                                                            <td><?=$pat['pat_gender']?></td>
                                                            <th>Tuổi</th>
                                                            <td><?=$age?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Điện thoại</th>
                                                            <td><?=$pat['pat_phone']?></td>
                                                            <th>Địa chỉ</th>
                                                            <td><?=$pat['pat_address']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <a href="#">Khám xong</a>
                                                                <a href="?controller=CheckUp&pat_code=<?=$pat['pat_code']?>">Khám bệnh</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="bar-code">
                                                        <div>
                                                            <img src="../assets/images/logo/mavach.jpg">
                                                            <p class="text-center"><?=$pat['pat_code']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-history-checkup">
                                                <p>Day la tab lich su kham benh</p>
                                            </div>
                                            <div id="tab-ls-bill">
                                                <p>Day la tab danh sach</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div> <!-- slide-bar finish -->

    </div>


    <?php include_once('include/footer.php') ?>


    <!-- Jquery -->
    <script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="../lib/popper/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
    
    <script type="text/javascript">
		$(function() {
            // Open new view
            $('div.data-table-patient table tr td b').click(function(){
                $(this).toggleClass('active');
                $(this).parent().parent().next().slideToggle();
                $(this).parent().parent().next().toggleClass('active');
            });

            $("div.data-table-patient table tr.info-pat div.divide-tab").tabs();
		});
	</script>
</body>
</html>