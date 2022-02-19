<?php
require_once '../Model/Model.php';
require_once 'Model/ClinicModel.php';
    class ClinicController{
        //function get view list clinic
	public function getView(){
                $model = new ClinicModel();
                $cli = $model->selectClinic();
		require_once('View/clinic.php');
	}
	//end function getView
        
        //function get view add
	public function getViewAdd(){
                $model = new Model();
                $dep = $model->selectAll('department');
		require_once('View/add_clinic.php');
	}
	//end function getView
        
        //function get view edit
	public function getViewEdit(){
                if(!isset($_GET['id'])){
			header('location: ?controller=Clinic');
		}
                $model = new ClinicModel();
		$clinic = $model->selectClinicByID($_GET['id']);

		if ($clinic == "") {
			header('location: ?controller=Clinic');
		}

		foreach ($clinic as $cli) {
			$cli = $cli;
		}
                
                $model2 = new Model();
                $dep = $model2->selectAll('department');
                

		require_once('View/edit_clinic.php');
	}
	//end function getView
        
        //function add clinic
        public function addClinic(){
            if(isset($_POST['add-clinic'])){
                $name   = $_POST['cli_name'];
                $dep    = $_POST['cli_dep'];
                
                //validation
                $check = false;
                $validate = new ClinicModel();
                if($validate->checkName($name)){
                    $check = true;
                }
                
                if($validate->checkDep($dep)){
                    $check = true;
                }
                $data = array(
                        'cli_name'      => $name,
                        'cli_dep_code'  => $dep
                    );
                if($check){
                    $_SESSION['data'] = array(
                        'name'      => $name,
                        'dep'       => $dep
                    );
                    header('Location: ?controller=Clinic&action=getViewAdd');
                }else{
                    
                    $model = new Model();
                    $bool = $model->insert('clinic', $data);
                    if($bool){
                        header('Location: ?controller=Clinic&action=getView');
                    }else{
                        header('Location: ?controller=Clinic&action=getViewAdd');
                    }
                }  
            }
        }
        //End function add clinic
        
        //Function Edit Clinic
        public function editClinic(){
            if(isset($_POST['edit-clinic'])){
                $name   = $_POST['cli_name'];
                $dep    = $_POST['cli_dep'];
                $id     = $_GET['id'];
                
                //validation
                $check = false;
                $validate = new ClinicModel();
                
                if($validate->checkName($name)){
                    $check = true;
                }
                
                if($validate->checkDep($dep)){
                    $check = true;
                }
                
                if($check){
                    header('Location: ?controller=Clinic&action=getViewAdd');
                }else{
                    $data = array(
                        'cli_name'      => $name,
                        'cli_dep_code'  => $dep
                    );
                    $bool = $validate->updateByClinicByID('clinic', $data, $id);
                            
                    if($bool){
                        header('Location: ?controller=Clinic&action=getView');
                    }else{
                        header('Location: ?controller=Clinic&action=getViewEdit');
                    }
                }
            }
        }
        //End function edit Clinic
        
        //Function delete Clinic
//        public function deleteClinic(){
//            if(isset($_GET['code'])){
//                $model = new ClinicModel();
//                $check = $model->deleteByID('Clinic', $_GET['code']);
//                if($check){
//                    header('Location: ?controller=Clinic');
//                }else{
//                    die('Xóa thất bại');
//                }
//            }else{
//                header('Location: ?controller=Clinic');
//            }
//        }
        //End Function delete Clinic
        
    }

?>
