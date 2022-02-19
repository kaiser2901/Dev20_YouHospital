<?php

if(!isset($_SESSION['Login']['VerifyNurse'])) {
    header('location: ../?controller=Login');
}

?>
<header class="page-header"> <!-- page-header begin -->

    <div class="container"> <!-- container begin -->
    
        <div class="d-flex"> <!-- d-flex begin -->

            <div class="left-header w-50"> <!-- left-header begin -->
                <img src="../assets/images/logo/header_logo.png" alt="png"> <a href=".">Trình Điều Khiển</a>
            </div> <!-- left-header finish -->

            <div class="right-header w-50"> <!--right-header begin -->

                <div class="nav-account dropdown text-right"> <!-- nav-account begin -->

                    <img src="assets/images/avatar/default.png"> 

                    <a class="dropdown-toggle" href="#" role="button" id="navAccountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?=$_SESSION['Login']['emp_name']?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navAccountDropdown"> <!-- dropdown-menu begin -->
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user"></i> Hồ Sơ
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cog"></i> Cài Đặt
                        </a>
                        <a class="dropdown-item" href="../?controller=Login&action=Logout">
                            <i class="fas fa-sign-out-alt"></i> Đăng Xuất
                        </a>
                    </div> <!-- dropdown-menu finish -->

                </div> <!-- nav-account finish -->

            </div> <!-- right-header finish -->

        </div> <!-- d-flex finish -->

    </div> <!-- container finish -->
        
</header> <!-- page-header finish -->