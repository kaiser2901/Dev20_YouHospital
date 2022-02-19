<?php
require_once '../Model/Model.php';
require_once ('Model/ClinicEmpModel.php');
    class ClinicEmpController{
        //function get view list clinic
	public function getView(){
            $model = new ClinicEmpModel();
            $cli_emp = $model->SelectClinicEmp();
		require_once('View/clinic_emp.php');
	}
	//end function getView
        
        //function get view add
	public function getViewAdd(){
                $model = new Model();
                $cli_roo = $model->selectAll('clinic');
		require_once('View/add_clinic_emp.php');
	}
	//end function getView
        
        //function get view edit
	public function getViewEdit(){
                if(!isset($_GET['id'])){
			header('location: ?controller=ClinicEmp');
		}
                $model2 = new Model();
                $cli_roo = $model2->selectAll('clinic');
                $model = new ClinicEmpModel();
		$clinic = $model->SelectClinicEmpWithID($_GET['id']);

		if ($clinic == "") {
			header('location: ?controller=ClinicEmp');
		}
                
		foreach ($clinic as $cli) {
			$cli = $cli;
		}
		require_once('View/edit_clinic_emp.php');
	}
	//end function getView
        
        public function addClinic_emp(){
            if(isset($_POST['addClinicEmp'])){
                
                $code   = $_POST['clin_emp_code'];
                $cli_id = $_POST['clin_cli_id'];
                $date   = $_POST['clin_date'];
                
                //validation
                $check = false;
                $validate = new ClinicEmpModel();
                
                if($validate->checkCode($code)){
                    $check = true;
                }
                
                if($validate->checkRoom($cli_id)){
                    $check = true;
                }
                
                if($validate->checkDate($date)){
                    $check = true;
                }
                
                if($validate->checkEmpAndDep($code)){
                    $check = true;
                }
                
                var_dump($check);
                if($check){
                    header('Location: ?controller=ClinicEmp&action=getViewAdd');
                }else{
                    $data = array(
                        'clin_emp_code'     => $code,
                        'clin_cli_id'       => $cli_id,
                        'clin_date'         => $date
                    );
                    $model = new Model();
                    $bool = $model->insert('clinic_emp', $data);
                    
                    if($bool){
                        header('Location: ?controller=ClinicEmp&action=getView');
                    }else{
                        header('Location: ?controller=ClinicEmp&action=getViewAdd');
                    }
                }  
            }else{
                header("Location: ?controller=ClinicEmp");
            }
        }
        
        public function editClinic_emp(){
            if(isset($_POST['edit-clinic'])){
                $clin_id        = $_GET['id'];
                $code           = $_POST['clin_emp_code'];
                $cli_dep_code   = $_POST['clin_dep_code'];
                $date           = $_POST['clin_date'];
                var_dump($clin_id);
                //validation
                $check = false;
                $validate = new ClinicEmpModel();
                
                if($validate->checkCode($code) == true){
                    $check = true;
                }
                
                if($validate->checkDate($date)){
                    $check = true;
                }
                
                if($validate->checkEmpAndDep($code)){
                    $check = true;
                }
                
                
                if($check){
                    header("Location:?controller=ClinicEmp&action=getViewEdit&id=$clin_id");
                }else{
                    $data = array(
                        'clin_emp_code'         => $code,
                        'clin_cli_id'           => $cli_dep_code,
                        'clin_date'             => $date
                    );
                    var_dump($data);
                    $condition = array(
                        'clin_id' => $clin_id
                    );
                    $model = new Model();
                    $bool = $model->updateByCondition('clinic_emp', $data, $condition);
                    if($bool){
                        header('Location: ?controller=ClinicEmp&action=getView');
                    }else{
                        header('Location: ?controller=ClinicEmp&action=getViewEdit');
                    }
                }  
            }else{
                header("Location: ?controller=ClinicEmp");
            }
        }

        
    }

?>
