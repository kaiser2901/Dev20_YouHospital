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
                                        <?php 
                                            foreach($checks as $val){
                                                $date   = date_create($val['che_date']);
                                                $date   = date_format($date, 'd-m-Y');
                                        ?>
                                        <div class="col-md-6">
                                            <div class="one-info">
                                                <a href="?controller=CheckUp&pat_code=<?=$pat_code?>&che_id=<?=$val['che_id']?>" style="color: #1c1c1c; text-decoration: none; display: block; width: 100%;"><?=$date?></a>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
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
                                    <?php 
                                        foreach($medGrs as $medGr){

                                    ?>
                                        <div class="one-info" id="<?=$medGr['med_group_code']?>">
                                            <?=$medGr['med_group_name']?>
                                        </div> 
                                    <?php 
                                        }
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <style>
                            div.list-med div.one-info.active {
                                background-color: #a9fdaf!important;
                                border: 1px solid #5ccc64!important;
                            }
                        </style>
                        <div class="col-md-6">
                            <div class="history-checkup list-med">
                                <div class="title">
                                    Danh sách thuốc
                                </div>
                                <?php 
                                    foreach($medGrs as $medGr){
                                ?>
                                <div class="infos <?=$medGr['med_group_code']?>">
                                    <div class="row">
                                            <?php 
                                                foreach($meds as $med){
                                                    if($med['med_group'] == $medGr['med_group_name']){
                                            ?>
                                            <div class="col-md-6">
                                                <div class="one-info <?php echo $med['med_code'];?>">
                                                    <?php echo $med['med_name'];?>
                                                    <input type="hidden" name="med_tut" value="<?=$med['med_tut']?>">
                                                    <input type="hidden" name="med_num" value="<?=$med['med_num']?>">
                                                    <input type="hidden" name="med_name" value="<?=$med['med_name']?>">
                                                    <input type="hidden" name="med_code" value="<?=$med['med_code']?>">
                                                </div>
                                            </div>    
                                            <?php 
                                                    } 
                                                }
                                            ?>
                                    </div> 
                                </div>
                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                if(!isset($_GET['che_id'])){
                ?>
                <div class="col-md-7">    
                    <div class="prescription">
                        <div class="header-prescription"> <!-- header-prescription begin -->
                            <div class="logo">
                                <img src="../assets/images/logo/header_logo.png">
                                <h6>YouHospital</h6>
                            </div>
                            <div class="center">
                                <p style="margin-bottom: 6px;">Bệnh Viện Đa Khoa Tư Nhân YouHospital</p>
                                <p>Khoa: <?=$dep_name?></p>
                            </div>

                            <div class="right">
                                <img src="../assets/images/logo/mavach.jpg">
                                <h6 class="mt-1">Mã BN: <?=$pat_code?></h6>
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
                                        <span class="pl-3"><b><?=$pat['pat_name']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Tuổi:</h6>
                                        <span class="pl-3"><b><?=$age?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Giới Tính:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_gender']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >CMND/Căn Cước:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_id_card']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Địa Chỉ:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_address']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >Số BHYT:</h6>
                                        <span class="pl-3"><b><?=$ins['ins_code']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Hạn BHYT:</h6>
                                        <?php 
                                            $date   = date_create($ins['ins_date']);
                                            $date   = date_format($date, 'd-m-Y');
                                        ?>
                                        <span class="pl-3"><b><?=$date?></b></span>
                                    </div> 
                                </div>
                                <form method="post" action="?controller=CheckUp&action=add">
                                    <div class="d-flex survival">
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Mạch:</h6>
                                            <input type="text" name="m" placeholder="lần/phút">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Huyết Áp:</h6>
                                            <input type="text" name="ha" placeholder="mm/Hg">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Nhiệt Độ:</h6>
                                            <input type="text" name="nd" placeholder="oC">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Cân Nặng:</h6>
                                            <input type="text" name="cn" placeholder="kg">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <h6 style="display: inline-block" >Chẩn Đoán:</h6>
                                        <input type="text" name="diagnose">
                                    </div>
                                    <style>
                                        div.ls-med.hidden {
                                            display: none!important;
                                        }
                                    </style>
                                    <div class="d-flex ls-med hidden">
                                        <div class="float-left">
                                            <p class="name-med"><span>0</span>. 
                                                <input type="text" name="med_name[]" list="meds" placeholder="Nhập tên thuốc">
                                                <input type="hidden" class="med_code">
                                                <datalist id="meds">
                                                    <?php 
                                                        foreach($meds as $med){
                                                    ?>
                                                    <option value="<?=$med['med_name']?>">
                                                    <?php
                                                        }
                                                    ?>
                                                </datalist>
                                            </p>
                                            <p class="introduction">
                                                <span>Cách Dùng:</span>
                                                <input type="text" name="med_tut[]">
                                            </p>
                                        </div>
                                        <div class="float-right">
                                            <span>Số lượng:</span>
                                            <input type="text" name="med_num[]">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div> 
                                    <div class="d-flex ls-med">
                                        <div class="float-left">
                                            <p class="name-med"><span>1</span>. 
                                                <input type="text" name="med_name[]" list="meds" placeholder="Nhập tên thuốc">
                                                <input type="hidden" class="med_code">
                                                <datalist id="meds">
                                                    <?php 
                                                        foreach($meds as $med){
                                                    ?>
                                                    <option value="<?=$med['med_name']?>">
                                                    <?php
                                                        }
                                                    ?>
                                                </datalist>
                                            </p>
                                            <p class="introduction">
                                                <span>Cách Dùng:</span>
                                                <input type="text" name="med_tut[]">
                                            </p>
                                        </div>
                                        <div class="float-right">
                                            <span>Số lượng:</span>
                                            <input type="text" name="med_num[]">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>  
                                    <div class="d-flex mt-3 ">
                                        <div class="text-right" style="width: 100%; color: #797979;margin-right: 15px;">
                                            <i class="fa fa-plus" style="cursor: pointer; "></i>
                                        </div>
                                    </div>
                                    <div class="d-flex note-sign">
                                        <div class="float-left note w-50">
                                            <h6>Lời dặn:</h6>
                                            <textarea cols="30" rows="10" name="note"></textarea>
                                        </div>
                                        <div class="float-right sign w-50">
                                            <input class="date" type="text" name="date" readonly>
                                            <h6>BÁC SĨ</h6>
                                            <span><?=$_SESSION['Login']['emp_name']?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="hidden" name="pat_code" value="<?=$_GET['pat_code']?>">
                                    <button class="btn btn-primary" type="submit" name="add">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                } else {
                ?>
                <div class="col-md-7">    
                    <div class="prescription">
                        <div class="header-prescription"> <!-- header-prescription begin -->
                            <div class="logo">
                                <img src="../assets/images/logo/header_logo.png">
                                <h6>YouHospital</h6>
                            </div>
                            <div class="center">
                                <p style="margin-bottom: 6px;">Bệnh Viện Đa Khoa Tư Nhân YouHospital</p>
                                <p>Khoa: <?=$dep_name?></p>
                            </div>

                            <div class="right">
                                <img src="../assets/images/logo/mavach.jpg">
                                <h6 class="mt-1">Mã BN: <?=$pat_code?></h6>
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
                                        <span class="pl-3"><b><?=$pat['pat_name']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Tuổi:</h6>
                                        <span class="pl-3"><b><?=$age?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Giới Tính:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_gender']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >CMND/Căn Cước:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_id_card']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Địa Chỉ:</h6>
                                        <span class="pl-3"><b><?=$pat['pat_address']?></b></span>
                                    </div> 
                                </div>
                                <div class="d-flex">
                                    <div class="one-info">
                                        <h6 style="display: inline-block" >Số BHYT:</h6>
                                        <span class="pl-3"><b><?=$ins['ins_code']?></b></span>
                                    </div> 
                                    <div class="one-info ml-5">
                                        <h6 style="display: inline-block" >Hạn BHYT:</h6>
                                        <?php 
                                            $date   = date_create($ins['ins_date']);
                                            $date   = date_format($date, 'd-m-Y');
                                        ?>
                                        <span class="pl-3"><b><?=$date?></b></span>
                                    </div> 
                                </div>
                                <form method="post" action="?controller=CheckUp&action=edit">
                                    <?php 
                                        $vital_sign = json_decode($check['che_vital_sign'], true);
                                    ?>
                                    <div class="d-flex survival">
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Mạch:</h6>
                                            <input type="text" value="<?=$vital_sign['m']?>" name="m" placeholder="lần/phút">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Huyết Áp:</h6>
                                            <input type="text" value="<?=$vital_sign['ha']?>" name="ha" placeholder="mm/Hg">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Nhiệt Độ:</h6>
                                            <input type="text" value="<?=$vital_sign['nd']?>" name="nd" placeholder="oC">
                                        </div>
                                        <div class="one-info">
                                            <h6 style="display: inline-block" >Cân Nặng:</h6>
                                            <input type="text" value="<?=$vital_sign['cn']?>" name="cn" placeholder="kg">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <h6 style="display: inline-block" >Chẩn Đoán:</h6>
                                        <input type="text" value="<?=$check['che_diagnose']?>" name="diagnose">
                                    </div>
                                    <style>
                                        div.ls-med.hidden {
                                            display: none!important;
                                        }
                                    </style>
                                    <div class="d-flex ls-med hidden">
                                        <div class="float-left">
                                            <p class="name-med"><span>0</span>. 
                                                <input type="text" name="med_name[]" list="meds" placeholder="Nhập tên thuốc">
                                                <input type="hidden" class="med_code">
                                                <datalist id="meds">
                                                    <?php 
                                                        foreach($meds as $med){
                                                    ?>
                                                    <option value="<?=$med['med_name']?>">
                                                    <?php
                                                        }
                                                    ?>
                                                </datalist>
                                            </p>
                                            <p class="introduction">
                                                <span>Cách Dùng:</span>
                                                <input type="text" name="med_tut[]">
                                            </p>
                                        </div>
                                        <div class="float-right">
                                            <span>Số lượng:</span>
                                            <input type="text" name="med_num[]">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div> 
                                    <?php 
                                        $med_specs = json_decode($check['che_med_spec'], true);
                                        $count = 0;
                                        foreach($med_specs as $med_spec){
                                            if($med_spec['med_name'] == ''){
                                                continue;
                                            }
                                            $count++;
                                    ?>
                                    <div class="d-flex ls-med">
                                        <div class="float-left">
                                            <p class="name-med"><span><?=$count?></span>. 
                                                <input type="text" name="med_name[]" value="<?=$med_spec['med_name']?>" list="meds" placeholder="Nhập tên thuốc">
                                                <input type="hidden" class="med_code">
                                                <datalist id="meds">
                                                    <?php 
                                                        foreach($meds as $med){
                                                    ?>
                                                    <option value="<?=$med['med_name']?>">
                                                    <?php
                                                        }
                                                    ?>
                                                </datalist>
                                            </p>
                                            <p class="introduction">
                                                <span>Cách Dùng:</span>
                                                <input type="text" value="<?=$med_spec['med_tut']?>" name="med_tut[]">
                                            </p>
                                        </div>
                                        <div class="float-right">
                                            <span>Số lượng:</span>
                                            <input type="text" value="<?=$med_spec['med_num']?>" name="med_num[]">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php } ?>  
                                    <div class="d-flex mt-3 ">
                                        <div class="text-right" style="width: 100%; color: #797979;margin-right: 15px;">
                                            <i class="fa fa-plus" style="cursor: pointer; "></i>
                                        </div>
                                    </div>
                                    <div class="d-flex note-sign">
                                        <div class="float-left note w-50">
                                            <h6>Lời dặn:</h6>
                                            <textarea cols="30" rows="10" name="note"><?=$check['che_note']?></textarea>
                                        </div>
                                        <div class="float-right sign w-50">
                                        <?php 
                                            $date   = date_create($check['che_date']);
                                            $date   = date_format($date, 'd-m-Y');
                                        ?>
                                            <input class="date" type="text" value="<?=$date?>" name="date" readonly>
                                            <h6>BÁC SĨ</h6>
                                            <span><?=$_SESSION['Login']['emp_name']?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="hidden" name="pat_code" value="<?=$_GET['pat_code']?>">
                                    <input type="hidden" name="che_id" value="<?=$_GET['che_id']?>">
                                    <button class="btn btn-primary" type="submit" name="edit">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
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
    <script type="text/javascript" src="../lib/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
		$(function() {
			$('div.checkup input.date').datepicker({
				changeMonth: true,
				changeYear: true,
				buttonImageOnly: true,
				dateFormat: 'dd-mm-yy',
				yearRange: '1910:2036'
			});
		});
	</script>
    <script>
        $(function(){
            $('div.checkup div.medicine-group div.infos div.one-info').click(function(){
                var med_gr_code = $(this).attr('id');
                $('div.checkup div.list-med div.infos').removeClass('active');
                $('div.checkup div.list-med div.infos.'+med_gr_code).addClass('active');
            });
            $('div.checkup div.list-med div.infos div.one-info').click(function(){
                var med_tut     = $(this).children('input[name=med_tut]').val();
                var med_name    = $(this).children('input[name=med_name]').val();
                var med_num     = $(this).children('input[name=med_num]').val();
                var med_code    = $(this).children('input[name=med_code]').val();
                var copy        = $('div.d-flex.ls-med.hidden').clone();
                var count       = parseInt($('div.d-flex.ls-med p.name-med span').last().text());
                var check       = $('div.d-flex.ls-med input[name="med_name[]"]').last().val();
                var bool        = $(this).hasClass('active');
                if(count == 1 && check == ''){
                    $('div.d-flex.ls-med input[name="med_name[]"]').last().val(med_name);
                    $('div.d-flex.ls-med input[name="med_tut[]"]').last().val(med_tut);
                    $('div.d-flex.ls-med input[name="med_num[]"]').last().val(med_num);
                    $('div.d-flex.ls-med input.med_code').last().val(med_code);
                } else if(!bool) {
                    var copy    = $('div.d-flex.ls-med.hidden').clone();
                    var count   = parseInt($('div.d-flex.ls-med p.name-med span').last().text());
                    var num     = count + 1;
                    copy = copy.removeClass('hidden');
                    $('div.d-flex.ls-med').last().after(copy);
                    $('div.d-flex.ls-med p.name-med span').last().text(num);
                    $('div.d-flex.ls-med input[name="med_name[]"]').last().val(med_name);
                    $('div.d-flex.ls-med input[name="med_tut[]"]').last().val(med_tut);
                    $('div.d-flex.ls-med input[name="med_num[]"]').last().val(med_num);
                    $('div.d-flex.ls-med input.med_code').last().val(med_code);
                }
                $(this).addClass('active');
            });
            $('div.d-flex div.text-right i').click(function(){
                var copy    = $('div.d-flex.ls-med.hidden').clone();
                var count   = parseInt($('div.d-flex.ls-med p.name-med span').last().text());
                var num     = count + 1;
                copy = copy.removeClass('hidden');
                $('div.d-flex.ls-med').last().after(copy);
                $('div.d-flex.ls-med p.name-med span').last().text(num);
            });
            $('.main-prescription').on('click', 'i.fas.fa-times', function(events){
                var code = $(this).parent().parent().children('div.float-left').children('p').children('input.med_code').val();
                if(code != ''){
                    $('div.checkup div.list-med div.infos div.one-info.'+code).removeClass('active');
                }
                $(this).parent().parent().remove();
            });
        });
    </script>
</body>
</html>