<?php 

require('Model/Model.php');

class LoginController {

	//Function get view home 
	public function getView() {
		require_once('View/login.php');
	}

	// function login
	public function Login(){
		if(isset($_POST['Login'])){
			$Account 	= $_POST['Account'];
			$Password 	= $_POST['Password'];

			if(strlen(trim($Account)) < 1 || strlen(trim($Password)) < 1 ){
				$_SESSION['error-acc'] = "Vui lòng nhập tài khoản hoặc mật khẩu";
				header('location: ?controller=Login');
			} else {
				$model 		= new Model();
				$accs = $model->selectAll('account');
				foreach($accs as $acc){
					if ($acc['acc_username'] == $Account && $acc['acc_password'] == md5($Password)){
						$_SESSION['Login']['acc_id'] 			= $acc['acc_id'];
						$_SESSION['Login']['acc_username'] 		= $acc['acc_username'];
						$_SESSION['Login']['acc_role'] 			= $acc['acc_role'];
					}
				}
			}
			
			if(isset($_SESSION['Login'])){
				switch ($_SESSION['Login']['acc_role']) {
					case 'Bác sĩ':
						# code...
						$_SESSION['Login']['VerifyDoctor'] = 0;
						$model = new Model();
						$condition = array(
							'emp_acc_id' => $_SESSION['Login']['acc_id'] 
						);
						$emp  = $model->selectByCondition('employee', $condition);
						$_SESSION['Login']['emp_name'] 		  = $emp[0]['emp_name'];
						$_SESSION['Login']['emp_department']  = $emp[0]['emp_department'];
						header('location: Doctor/');
						break;
					case 'Y tá':
						# code...
						$_SESSION['Login']['VerifyNurse'] = 0;
						$model = new Model();
						$condition = array(
							'emp_acc_id' => $_SESSION['Login']['acc_id'] 
						);
						$emp  = $model->selectByCondition('employee', $condition);
						$_SESSION['Login']['emp_name'] 		  = $emp[0]['emp_name'];
						$_SESSION['Login']['emp_department']  = $emp[0]['emp_department'];
						header('location: Nurse/');
						break;
					case 'Lễ tân':
						# code...
						$_SESSION['Login']['VerifyReceptionist'] = 0;
						$model = new Model();
						$condition = array(
							'emp_acc_id' => $_SESSION['Login']['acc_id'] 
						);
						$emp  = $model->selectByCondition('employee', $condition);
						$_SESSION['Login']['emp_name'] 		  = $emp[0]['emp_name'];
						$_SESSION['Login']['emp_department']  = $emp[0]['emp_department'];
						header('location: Receptionist/');
						break;
					case 'Bệnh nhân':
						# code...
						$_SESSION['Login']['VerifyPatient'] = 0;
						header('location: Patient/');
						break;
					case 'Admin':
						# code...
						$_SESSION['Login']['VerifyAdmin'] = 0;
						$model = new Model();
						$condition = array(
							'emp_acc_id' => $_SESSION['Login']['acc_id'] 
						);
						$emp  = $model->selectByCondition('employee', $condition);
						$_SESSION['Login']['emp_name'] 		  = $emp[0]['emp_name'];
						$_SESSION['Login']['emp_department']  = $emp[0]['emp_department'];
						header('location: Admin/');
						break;
					default:
						# code...
						break;
				}
			}else{
				$_SESSION['error-acc'] = "Tài khoản hoặc mật khẩu không đúng";
				header('location: ?controller=Login');
			}

		}
	}

	public function Logout() {
		if (isset($_SESSION['Login'])) {
			unset($_SESSION['Login']);
		}
		header('location: ?controller=Login');
	}

}

?>