<?php 

require_once('../Model/ValidationModel.php');
require_once('../Model/Model.php');
require_once('Model/PaginationModel.php');
require_once('Model/Pagination.php');
require_once('Model/AccountModel.php');

class EmployeeController {

	// function Get view list employee
	public function getView(){
		if(isset($_GET['role'])){
            $employees 	= $this->getEmpbyCon($_GET['role']);
			$condition  = array(
				'employee.emp_role' => $_GET['role']
			);
			$page 	   	= $this->getPaginationByCon($condition);
		}elseif(isset($_GET['search'])){
			$value = $_GET['search'] ?? '';
			if($value != ''){
				$columns = 'emp_name';
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
				$Model = new AccountModel();
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

		require_once('View/employee.php');
	}
	//End function get view list employee

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
	// function get view add emp
	public function getViewAdd(){
		$deps = $this->selectDepartment();
		require_once('View/add_employee.php');
	}
	//end function get view add emp

	// Functopn select all department
	public function selectDepartment() {

		$model 	= new Model();
		$deps 	= $model->selectAll('department');
		$deps 	= $deps ?? '';

		return $deps;
	}
	// End function select department

	//Get View Edit 
	public function getViewEdit(){
		if(!isset($_GET['id'])){
			header('location: ?controller=Employee');
		}

		$emps = $this->selectEmpWithId($_GET['id']);

		if ($emps == "") {
			# code...
			header('location: ?controller=Employee');
		}

		foreach ($emps as $emp) {
			# code...
			$emp = $emp;
		}

		$deps = $this->selectDepartment();

		require_once('View/edit_employee.php');
	} 
	// End

	//Function add employee
	public function addEmp(){

		if (isset($_POST['add-employee'])) {
			# code...
			$Name 		= $_POST['Name'];
			$Dob 		= $_POST['Dob'] ?? '';
			$Gender 	= $_POST['Gender'] ?? '';
			$Phone 		= $_POST['Phone'];
			$Id_card 	= $_POST['id_card'];
			$Address 	= $_POST['Address'];
			$Role 		= $_POST['Role'];
			$Department = $_POST['department'];

			// Định dạng lại ngày 
			if ($Dob != '') {
				$date_arr   = explode('-', $Dob);
				$Dob        = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$Dob 		= strtotime($Dob);
				$Dob 		= date('Y-m-d', $Dob);
            }

			// Create emp_code
			$model 	= new Model();
			$emp 	= $model->selectAll('employee');
			$emp  	= $emp ?? '';
			if (empty($emp)) {
				// Code
				$emp_code = 'EMP0001';

			} else {

				$emp  		= array_reverse($emp);
				$number 	= substr($emp[0]['emp_code'], 3);
				$number 	= str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);
				$emp_code 	= 'EMP'.$number;
			}

			// Data
			$data = array(
				'emp_code'		=> $emp_code,
				'emp_name' 		=> $Name,
                'emp_id_card'	=> $Id_card,
                'emp_role'      => $Role,
                'emp_dob' 		=> $Dob,
				'emp_address' 	=> $Address,
				'emp_phone' 	=> $Phone,
				'emp_gender' 	=> $Gender,
				'emp_department'=> $Department
			);

			// Variable use to validation data
            $bool = $this->validationDataEmp($data);

            if($bool){

				$_SESSION['data'] = array(
					'name' 		=> $Name,
	                'id_card'	=> $Id_card,
	                'dob' 		=> $Dob,
					'address' 	=> $Address,
					'phone' 	=> $Phone,
					'gender' 	=> $Gender
				);

                header('location: ?controller=Employee&action=getViewAdd');

            } else {
                //Insert data
                $bool = $model->insert('employee', $data);

                if ($bool) {
					$_SESSION['message'] = "Thêm nhân viên thành công";
                    header('location: ?controller=Employee&action=getViewAdd');
                } else {
                    die('error');
                }

            }


		} else {
			header('location: ?controller=Employee');
		}

	}
	//End function add employee

	// Function edit employee
	public function editEmp(){
		if(isset($_POST['edit-employee'])){
			// Lay gia tri
			$code 			= $_POST['code'];
            $Name 			= $_POST['Name'];
			$Dob 			= $_POST['Dob'];
			$Gender 		= $_POST['Gender'] ?? '';
			$Phone 			= $_POST['Phone'];
			$Id_card 		= $_POST['Id_card'];
			$Address 		= $_POST['Address'];
			$old_id_card	= $_POST['old-id-card'];
			$Department 	= $_POST['department'];

			// Định dạng lại ngày sinh
			if ($Dob != '') {
				$dob_arr   	= explode('-', $Dob);
				$Dob        = $dob_arr[2].'-'.$dob_arr[1].'-'.$dob_arr[0];
				$Dob 		= strtotime($Dob);
				$Dob 		= date('Y-m-d', $Dob);
			}


            //Variable use to storage data
            $data = array(
				'emp_name' 		=> $Name,
                'emp_dob' 		=> $Dob,
				'emp_address' 	=> $Address,
				'emp_phone' 	=> $Phone,
				'emp_gender' 	=> $Gender,
				'emp_department'=> $Department
			);
			
			if($Id_card != $old_id_card){
				$data['emp_id_card'] = $Id_card;
			}
            // Variable use to validation data
            $bool = $this->validationDataEmp($data);

            if($bool){
                header("location: ?controller=Employee&action=getViewEdit&id=$code");

            } else {
				// Create condition
				$condition = array(
					'emp_code' => $code
				);

				//Insert data
				$model 	= new Model();
                $bool 	= $model->updateByCondition('employee', $data, $condition);

                if ($bool) {
					$_SESSION['message'] = "Sửa nhân viên thành công";
                    header("location: ?controller=Employee&action=getViewEdit&id=$code");
                } else {
                    die('error');
                }

            }
            
            
        } else {
            header('location: ?controller=Employee&action=getViewAdd');
        }
	}
	// End Function edit employee

	//Function delete Doctor
 	public function deleteEmp(){
		if (!isset($_GET['id'])) {
			header('location: ?controller=Employee');
		}

		$emp_code = $_GET['id'];

		$condition = array(
			'emp_code' => $emp_code
		);

		$model = new Model();
		$bool = $model->deleteByCondition('employee', $condition);

		if ($bool) {
			header('location: ?controller=Employee');
		} else {
			die('error');
		}
	}
	// end function delete doctor


	// Function validate data emp
	public function validationDataEmp($data) {
		$Name 		= $data['emp_name'];
		$Address 	= $data['emp_address'];
		$Phone 		= $data['emp_phone'];
		$Id_card    = $data['emp_id_card'] ?? NULL;
		$Gender 	= $data['emp_gender'];
		$Dob 		= $data['emp_dob'];

		// Variable check validation
		$check = false;
        $validate = new Validation();
        
        //A.1 Bat loi name
       	if ($validate->checkName($Name)){
           	$check = true;
       	}

       	//A.2 Bat loi address
      	if ($validate->checkAddress($Address)){
           	$check = true;
       	}

       	//A.3 Bat loi sđt
       	if ($validate->checkPhone($Phone)){
           	$check = true;
       	}

       	//A.4 Bat loi cmnd
       	if (isset($Id_card)) {
       		# code...
       		if ($validate->checkIdCard($Id_card) || $validate->checkIdCardExits('emp_id_card', 'employee', $Id_card)){
	           	$check = true;
	       	}
       	}

       	//A.6 Bat loi Gioi tinh
       	if($validate->checkGender($Gender)){
           	$check = true;
       	}

       	//A.8 Bat loi ngay thang nam sinh
       	if($validate->checkDate($Dob)){
           	$check = true;
       	}

       	return $check;

	}
	//End function validate

	//Function select patient with id
	public function selectEmpWithId($id){
		$condition  = array(
			'emp_code' => $id 
		);
		$model 		= new Model();
		$pats 		= $model->selectByCondition('employee', $condition);

		return $pats;
	}
	//end function select patient with id

	public function getPagination(){
		$Model = new Model();

		$employees = $Model->selectAll('employee');

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
		$emps 	= $pag->getTablePagination('emp_role', $offset, $limit, $condition);
		return $emps;
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
		$emps 	= $pag->getTablePaginations('emp_role', $offset, $limit);
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
	public function search(){
		if(isset($_POST['search'])){
			$value = $_POST['value'] ?? '';
			header("location: ?controller=Employee&search=$value");
		} else {
			header("location: ?controller=Employee");
		}
	}

}

?>