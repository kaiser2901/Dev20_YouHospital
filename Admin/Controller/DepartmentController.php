<?php 

require_once('../Model/Model.php');
require_once('../Model/ValidationModel.php');
require_once('Model/PaginationModel.php');
require_once('Model/Pagination.php');

class DepartmentController {

	//Get View List Specialites
	public function getView(){
		$deps 		= $this->getPat();
		$page 		= $this->getPagination();

		require_once('View/department.php');
	}

	//Get View Edit 
	public function getViewEdit(){
		if(!isset($_GET['id'])){
			header('location: ?controller=Department');
		}

		$deps = $this->selectDepartmentWithId($_GET['id']);

		if ($deps == "") {
			# code...
			header('location: ?controller=Department');
		}

		foreach ($deps as $dep) {
			# code...
			$dep = $dep;
		}

		require_once('View/edit_department.php');
	} 

	//Get View Add Speciality
	public function getViewAdd(){
		require_once('View/add_department.php');
	}

	// Function Add Speciality
	public function addDepartment(){

		if (isset($_POST['add_dep'])) {
			# code...
			$dep_name 	= trim($_POST['dep_name']);
			$dep_des 	= trim($_POST['dep_des']);

			//
			$model 	= new Model();
			$deps 	= $model->selectAll('department');
			$deps  	= $deps ?? '';

			// Create spec_code
			if (empty($deps)) {
				// Code
				$dep_code = 'DEP0001';

			} else {

				$deps  		= array_reverse($deps);
				$number 	= substr($deps[0]['dep_code'], 3);
				$number 	= str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);

				$dep_code 	= 'DEP'.$number;
			}

			// Variable use to  validation
			$bool = false; 

			$validate = new Validation();

			if ($validate->checkNameExits('dep_name', 'department', $dep_name) || $validate->checkName($dep_name)) {
				# code...
				$bool = true;
			}

			if($bool) {
				# code...
				header('location: ?controller=Department&action=getViewAdd');
			} else {

				// Variable use to insert data
				$data = array(
					'dep_code' 			=> $dep_code,
					'dep_name'	 		=> $dep_name,
					'dep_description'	=> $dep_des
				);

				$bool = $model->insert('department', $data);

				if ($bool) {
					# code...
					header('location: ?controller=Department&action=getViewAdd');
				} else {
					die('Chet queo');
				}

			}



		} else {
			header('location: ?controller=Department&action=getViewAdd');
		}

	}
	// End  Function Add Speciality

	public function editDepartment(){
		if (isset($_POST['edit_dep'])) {
			# code...
			$dep_code   	= $_POST['dep_code'];
			$dep_name 		= trim($_POST['dep_name']);
			$dep_old_name 	= trim($_POST['dep_old_name']);
			$dep_des 		= trim($_POST['dep_des']);


			// Variable use to  validation
			$bool = false; 

			if ($dep_old_name != $dep_name) {
				# code...
				$validate = new Validation();

				if ($validate->checkNameExits('dep_name', 'department', $dep_name) || $validate->checkName($dep_name)) {
					# code...
					$bool = true;
				}
			}
				

			if($bool) {
				# code...
				header("location: ?controller=Department&action=getViewEdit&id=$dep_code");
			} else {

				// Variable use to insert data
				$data = array(
					'dep_name'	 		=> $dep_name,
					'dep_description'	=> $dep_des
				);

				$condition = array(
					'dep_code' => $dep_code
				);

				$model 	= new Model();

				$bool 	= $model->updateByCondition('department', $data, $condition);

				if ($bool) {
					# code...
					header("location: ?controller=Department&action=getViewEdit&id=$dep_code");
				} else {
					die('Chet queo');
				}

			}



		} else {
			header("location: ?controller=Department&action=getViewEdit&id=$dep_code");
		}
	}


	public function selectDepartmentWithId($id){
		$condition  = array(
			'dep_code' => $id 
		);
		$model 		= new Model();
		$deps 		= $model->selectByCondition('department', $condition);

		return $deps;
	}

	public function deleteDepartment(){
		if (!isset($_GET['id'])) {
			header('location: ?controller=Department');
		}

		$code = $_GET['id'];

		$condition = array(
			'dep_code' => $code
		);

		$model = new Model();
		$bool = $model->deleteByCondition('department', $condition);

		if ($bool) {
			header('location: ?controller=Department');
		} else {
			die('error');
		}
	}

	public function getPagination(){
		$Model = new Model();

		$deps = $Model->selectAll('department');

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($deps), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getPat(){
		$pag = new PaginationModel();
		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit 		= 10;
		$offset 	= ($page-1) * $limit;
		$deps 	= $pag->getTablePagination('dep_code', 'department', $offset, $limit);
		return $deps;
	}

}

?>