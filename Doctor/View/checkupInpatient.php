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
									<i class="fas fa-plus"></i> Danh sách bệnh nhân chờ khám bệnh
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

			<a href="." class="active">Bảng Điều Khiển</a>

		</div>
			

    </div> <!-- breadcrumbs finish -->
    

    <div class="checkup">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="history-checkup">
                                <div class="title">
                                    Quá trình điều trị
                                </div>
                                <div class="infos">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="one-info">
                                                03-08-2019
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="disease-progression">
                                <div class="title">
                                    Diễn tiến bệnh
                                </div>
                                <div class="infos">
                                    <div class="one-info">
                                        <p>Gặp khó khăn trong việc tìm kiếm tên hoặc từ ngữ, nghiêm trọng đủ để gia đình hoặc người thân chú ý</p>
                                        <div class="text-right date">
                                            <span class="text-right">03-08-2019</span>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="medicine-group">
                                <div class="title">
                                    Các nhóm thuốc
                                </div>
                                <div class="infos">
                                    <div class="one-info">
                                        VITAMINE & THUỐC BỔ
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="history-checkup list-med">
                                <div class="title">
                                    Danh sách thuốc
                                </div>
                                <div class="infos">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="one-info">
                                                A-Z FORKID
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">    
                    <div class="prescription">
                        <div class="header-prescription"> <!-- header-prescription begin -->
                            <div class="logo">
                                <img src="../assets/images/logo/header_logo.png">
                                <h6>YouHospital</h6>
                            </div>
                            <div class="center">
                                <p>Bệnh Viện Đa Khoa Tư Nhân YouHospital</p>
                                <p>Khoa: <?=$pat[0]['dep_name']?></p>
                            </div>

                            <div class="right">
                                <img src="../assets/images/logo/mavach.jpg">
                                <h6 class="mt-1">Mã BN: <?=$pat[0]['inp_pat_code']?></h6>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                        <div class="main-prescription">
                            <div class="title">
                                <h4>Đơn Thuốc</h4>
                            </div>
                            <div class="information">
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >Họ Tên:</h6>
                                        <span class="pl-3"><b><?=$pat[0]['pat_name']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Ngày Tháng Năm Sinh:</h6>
                                        <span class="pl-3"><b><?=$pat[0]['pat_dob']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Giới Tính:</h6>
                                        <span class="pl-3"><b><?=$pat[0]['pat_gender']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >CMND/Căn Cước:</h6>
                                        <span class="pl-3"><b><?=$pat[0]['emp_id_card']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Địa Chỉ:</h6>
                                        <span class="pl-3"><b><?=$pat[0]['emp_address']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >Số BHYT:</h6>
                                        <span class="pl-3"><b>GD-4-7463-234-21-2</b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Hạn BHYT:</h6>
                                        <span class="pl-3"><b>23/12/2019</b></span>
                                    </div> 
                                </div>
                                <form method="post" action="">
                                    <div class="d-flex survival">
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Mạch:</h6>
                                            <input type="text" placeholder="lần/phút">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Huyết Áp:</h6>
                                            <input type="text" placeholder="mm/Hg">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Nhiệt Độ:</h6>
                                            <input type="text" placeholder="oC">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Cân Nặng:</h6>
                                            <input type="text" placeholder="kg">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <h6 style="display: inline-block" >Chẩn Đoán:</h6>
                                        <input name="sick_name" list="sick_name" type="text" value="<?=$diagnose?>">
                                        <datalist id="sick_name">
                                        <?php 
                                            foreach ($all_sicks as $all_sick) {
                                                # code...
                                        ?>
                                        <option value="<?=$all_sick['sic_name']?>"><?=$all_sick['sic_name']?></option>
                                        <?php
                                            }
                                        ?>
                                        <button type="submit" name="send_sick_name">OK</button>
                                        <?php
                                            // var_dump($sicks);
                                        ?>
                                    </div>
                                    <?php $arr_donthuoc = array(); ?>
                                    <!-- Thuốc khuyên dùng, số lượng, cách dùng -->
                                    <?php $n=1 ; foreach($medicines_suggest as $medicine_suggest){?>
                                    <div class="d-flex ls-med">
                                        <div class="float-left">
                                            <p class="name-med"><span><?=$n.". "?></span><?=$arr_donthuoc[$n]['name']=$medicine_suggest['med_name']?></p>
                                            <p class="introduction">
                                                <span>Cách Dùng:</span>
                                                <input type="text" value="<?=$arr_donthuoc[$n]['tut']= $medicine_suggest['med_tut']?>">
                                            </p>
                                        </div>
                                        <div class="float-right">
                                            <span>Số lượng:</span>
                                            <input type="text" value="<?=$arr_donthuoc[$n]['num'] = $medicine_suggest['med_num']?>">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>  
                                    <?php $n++; } var_dump($arr_donthuoc); ?>
                                    <div class="d-flex note-sign">
                                        <div class="float-left note w-50">
                                            <h6>Lời dặn:</h6>
                                            <textarea cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="float-right sign w-50">
                                            <input type="text">
                                            <h6>BÁC SĨ</h6>
                                            <span>Chế Gia Huy</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <?php include_once('include/footer.php') ?>


    <!-- Jquery -->
    <script type="text/javascript" src="../lib/jquery/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="../lib/popper/popper.min.js"></script>
    <!-- Bootstrap JS -->
	<script type="text/javascript" src="../lib/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>