<?php
require_once '../Model/RegistDoctorModel.php';
    class RegistDoctorController{
        public function getView(){
            require_once('View/registdoctor.php');
        }
        public function getViewAdd(){
            require_once('View/add_regist_doctor.php');
        }
        
        public function addRegistDoctor(){
            if(isset($_POST['submit'])){
                $code   = $_POST['cdoc_med_id'];
                $date   = $_POST['cdoc_date'];
                $dep    = $_POST['cdoc_dep_code'];
                $doc    = $_POST['cdoc_emp_code'];
                
                //validate
                $check = false;
                $validate = new ValidateRegistDoctorModel();
                $data = array(
                    'cdoc_med_id'   => $code,
                    'cdoc_date'     => $date,
                    'cdoc_dep_code' => $dep,
                    'cdoc_emp_code' => $doc
                );
                
                if($validate->checkCode($code)){
                    $check = true;
                }
                if($validate->checkDep($dep)){
                    $check = true;
                }
                if($validate->checkDoc($doc)){
                    $check = true;
                }
                if($validate->checkDate($date)){
                    $check = true;
                }
                if($validate->checkDoctorExits($code, $dep, $date)){
                    $check = true;
                }
                if($validate->checkMaxPatient($code, $dep, $date)){
                    $check = true;
                }
                
                if($check){
                    $_SESSION['data'] = array(
                        'med_id'   => $code,
                        'date'     => $date,
                        'dep_code' => $dep,
                        'emp_code' => $doc
                    );
                    header("Location: ?controller=RegistDoctor&action=getViewAdd");
                }else{
                    $model = new Model();
                    $test = $model->insert('checkup_doc', $data);
                    if($test){
                        header("Location: ?controller=RegistDoctor ");
                    }else{
                        die("Không add được");
                    }
                }
            }
        }
        
        
    }

?>