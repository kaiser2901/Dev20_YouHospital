<?php 
require_once('../Model/ValidationModel.php');
require_once('../Model/Model.php');
require_once('Model/PaginationModel.php');
require_once('Model/Pagination.php');
require_once('Model/AccountModel.php');

class AccountController {

	public function getViewAdd(){
		$emps = $this->selectEmp();
		require_once('View/add_account.php');
	}

	public function selectEmp(){
		$model = new Model();
		$emps  = $model->selectAll('employee');
		return $emps;
	}

	public function addAccount(){
		if(isset($_POST['add_acc'])){
			
			$emp_code = $_POST['emp_code'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$condition = array(
				'emp_code' => $emp_code
			);

			$model = new Model();
			$emps  = $model->selectByCondition('employee', $condition);
			$val = '';
			foreach($emps as $emp){
				$val = $emp['emp_role'];
			}

			$data = array(
				'acc_username' => $username,
				'acc_password' => md5($password),
				'acc_role'     => $val
			);

			$bool = false;
			
			if($bool){
				header('location: ?controller=Account');
			} else {

				$bool = $model->insert('account', $data);

				if($bool){

					$condition = array(
						'acc_username' => $username
					);

					$accs = $model->selectByCondition('account', $condition);
					$val = '';
					foreach($accs as $acc){
						$val = $acc['acc_id'];
					}
					
					$condition_emp = array(
						'emp_code' => $emp_code
					);

					$data = array(
						'emp_acc_id' => $val
					);

					$bool = $model->updateByCondition('employee', $data, $condition_emp);

					if($bool){
						$_SESSION['message'] = 'Thêm tài khoản thành công';
						header('location: ?controller=Account&action=getViewAdd');
					} else {
						die('chet');
					}

				} else {
					header('location: ?controller=Account');
				}

			}
			
		} else {
			header('location: ?controller=Account');
		}
	}

	//Function getview Account
    public function getView(){
        $Model = new AccountModel();
		if(isset($_GET['role'])){
            $employees 	= $this->getEmpbyCon($_GET['role']);
			$condition  = array(
				'employee.emp_role' => $_GET['role']
			);
			$page 	   	= $this->getPaginationByCon($condition);
		}elseif(isset($_GET['search'])){
			$value = $_GET['search'] ?? '';
			if($value != ''){
				$columns = 'emp_code, emp_name, emp_role, acc_username';
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
				$limit 		= 10;
				$offset 	= ($page-1) * $limit;
				$search = $Model->search($columns, $value, $limit, $offset);
			}
			if(isset($search)){
				$employees = $search;
				$page 	   = $this->getSearch($value);
			} else {
				$employees = $search ?? $this->getEmp();
				$page 	   = $this->getPagination();
			}
		}else{
			$employees 	= $this->getEmp();
			$page 	   	= $this->getPagination();
        }
        $model = new Model();

		$empls = array(
			'2' => 'Bác sĩ',
			'3' => 'Y tá',
			'4' => 'Lễ tân'

		);

        require_once('View/account.php');
	}
	
	public function search(){
		if(isset($_POST['search'])){
			$value = $_POST['value'] ?? '';
			header("location: ?controller=Account&search=$value");
		} else {
			header("location: ?controller=Account");
		}
	}

	

	
	public function getPagination(){
		$Model = new AccountModel();

		$employees = $Model->selectAll();

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($employees), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getSearch($value){
		$Model = new AccountModel();
		$columns = 'emp_code, emp_name, emp_role, acc_username';
		

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
        $offset = ($page-1) * $limit;
        $employees = $Model->search($columns, $value, $limit, $offset);
		$config = [
		    'total' => (int)count($employees), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getEmp(){
		$pag = new AccountModel();
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		$limit 		= 10;
		$offset 	= ($page-1) * $limit;
		$emps 	= $pag->getTablePaginations('emp_code', $offset, $limit);
		return $emps;
	}

	public function getPaginationByCon($condition){
		$Model = new AccountModel();

		$employees = $Model->selectByCondition($condition);

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($employees), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getEmpbyCon($condition){
		$pag = new AccountModel();
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		$limit 		= 10;
		$offset 	= ($page-1) * $limit;
		$emps 	= $pag->getTablePagination('dep_code', $offset, $limit, $condition);
		return $emps;
	}
	
}

?>