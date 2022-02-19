<?php 
require_once('../Model/ValidationModel.php');
require_once('../Model/Model.php');
require_once('Model/PaginationModel.php');
require_once('Model/Pagination.php');
require_once('Model/MedicineModel.php');

class MedicineController {
	//Function getview Medicine
    public function getView(){
		if(isset($_GET['med_group_code'])){
			$medicines 	= $this->getMedByCon($_GET['med_group_code']);
			$condition  = array(
				'med_group_code' => $_GET['med_group_code']
			);
			$page 	   	= $this->getPaginationByCon($condition);
		}elseif(isset($_GET['search'])){
			$value = $_GET['search'] ?? '';
			if($value != ''){
				$Model = new MedicineModel();
				$columns = 'med_code, med_name, med_type, med_price, med_group';
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
				$limit 		= 10;
				$offset 	= ($page-1) * $limit;
				$search = $Model->search('medicine', $columns, $value, $limit, $offset);
			}
			if(isset($search)){
				$medicines = $search;
				$page 	   = $this->getSearch($value);
			} else {
				$medicines = $search ?? $this->getMed();
				$page 	   = $this->getPagination('medicine');
			}
		}else{
			$medicines 	= $this->getMed();
			$page 	   	= $this->getPagination('medicine');
		}

		$medgroups = $this->selectMedGroup();

        require_once('View/medicine.php');
	}
	
	public function search(){
		if(isset($_POST['search'])){
			$value = $_POST['value'] ?? '';
			header("location: ?controller=Medicine&search=$value");
		} else {
			header("location: ?controller=Medicine");
		}
	}

	//Function getview Add Medicine
    public function getViewAdd(){
		$medgroups = $this->selectMedGroup();
        require_once('View/medicine_add.php');
	}

	//Function getview Add Medicine Group
	public function getViewAddMedGroup(){
		$medgroups = $this->selectMedGroup();
        require_once('View/medicine_group_add.php');
	}

	
	public function getViewEdit(){
		if(!isset($_GET['id'])){
			header('location: ?controller=Medicine');
		}

		$meds = $this->selectMedicineWithId($_GET['id']);

		if ($meds == "") {
			# code...
			header('location: ?controller=Medicine');
		}

		foreach ($meds as $med) {
			# code...
			$med = $med;
		}
		$medgroups = $this->selectMedGroup();
        require_once('View/medicine_edit.php');
    }

	//Function select Medicine by ID
	public function selectMedicineWithId($id){
		$condition  = array(
			'med_code' => $id 
		);
		$model 		= new Model();
		$meds 		= $model->selectByCondition('medicine', $condition);

		return $meds;
	}

	
	//Function select medicine group
	public function selectMedGroup() {

		$model 	= new Model();
		$medgroups 	= $model->selectAll('medicine_group');
		$medgroups 	= $medgroups ?? '';

		return $medgroups;
	}
	
	//Function add medicine
	public function addMedicine() {
		if(isset($_POST['add-medicine'])){

            $name = $_POST['med_name'];
			$type = $_POST['med_type'];
			$tut = $_POST['med_tut']; 
			$num = $_POST['med_num'];
            $price = $_POST['med_price'];
            $med_group = $_POST['med_group'];

			// Create medicine code
			$model 	    = new Model();
			$medicine 	= $model->selectAll('medicine');
			$medicine    = $medicine ?? '';

			if (empty($medicine)) {
				// Code
				$med_code   = 'MED0001';

			} else {
				$medicine  	    = array_reverse($medicine);
				$number 	    = substr($medicine[0]['med_code'], 3);
				$number 	    = str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);

				$med_code 	= 'MED'.$number;
			}

			$data = array(
                'med_code' 	=> $med_code,
                'med_name'  => $name,
				'med_type'  => $type,
				'med_num'	=> $num,
                'med_price' => $price,
				'med_group' => $med_group,
				'med_tut'   => $tut,
 
			);
            
		
			// Variable use to validation data
			$bool = $this->validationMedicine($data);
			if($bool){

				$_SESSION['data'] = array(
					'med_code' 	=> $med_code,
					'med_name'  => $name,
					'med_type'  => $type,
					'med_num'	=> $num,
					'med_price' => $price,
					'med_group' => $med_group,
					'med_tut'   => $tut,
				);

                header('location: ?controller=Medicine&action=getViewAdd');

            } else {
                //Insert data
                $bool = $model->insert('medicine', $data);

                if ($bool) {
					$_SESSION['message'] = "Thêm thuốc thành công";
                    header('location: ?controller=Medicine&action=getViewAdd');
                } else {
                    die('error');
                }

            }

		} else {
			header('location: ?controller=Medicine');        
			
		
		}
	}

	public function addMedGroup(){
		if(isset($_POST['add-medicine-group'])){

			$med_group_name = $_POST['med_group_name'];
			

			
			// Create medicine code
			$model 	    = new Model();
			$medicine_group 	= $model->selectAll('medicine_group');
			$medicine_group    = $medicine_group ?? '';
		   
			if (empty($medicine_group)) {
                // Code
                $med_group_code   = 'MGR0001';

            } else {
                $medicine_group  	    = array_reverse($medicine_group);
                $number 	    = substr($medicine_group[0]['med_group_code'], 3);
                $number 	    = str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);

                $med_group_code 	= 'MGR'.$number;
            }

			$data = array(
				'med_group_code' 				=> $med_group_code,
				'med_group_name'	        	=> $med_group_name

			);


			// Variable use to validation data
			$bool = $this->validationMedicineGroup($data);
			var_dump($bool);
			if($bool){

				$_SESSION['data'] = array(
					'med_group_code' 				=> $med_group_code,
					'med_group_name'	        	=> $med_group_name
	
				);

                header('location: ?controller=Medicine&action=getViewAddMedGroup');

            } else {
                //Insert data
                $bool = $model->insert('medicine_group', $data);

                if ($bool) {
					$_SESSION['message'] = "Thêm nhóm thuốc thành công";
                    header('location: ?controller=Medicine&action=getViewAddMedGroup');
                } else {
                    die('error');
                }

            }

		} else {
			header('location: ?controller=Medicine');        
			
		
		}
		
	}

	// Function edit medicine
	public function editMedicine(){
		if(isset($_POST['edit-medicine'])){
			// Lay gia tri
			$med_code = $_POST['med_code'];
			$name = $_POST['med_name'];
			$type = $_POST['med_type'];
			$num  = $_POST['med_num'];
			$price = $_POST['med_price'];
			$med_group = $_POST['med_group'];
			$tut = $_POST['med_tut'];

            //Variable use to storage data
            $data = array(
				'med_code'				=> $med_code,
				'med_name'	        	=> $name,
				'med_type' 		  		=> $type,
				'med_tut'	        	=> $tut,
				'med_num'				=> $num,
				'med_group'   			=> $med_group,
				'med_price'	        	=> $price


			);

            // Variable use to validation data
			$bool = $this->validationMedicine($data);

            if($bool){
                header("location: ?controller=Medicine&action=getViewEdit&id=$med_code");

            } else {
				// Create condition
				$condition = array(
					'med_code' => $med_code
				);

				//Insert data
				$model 	= new Model();
                $bool 	= $model->updateByCondition('medicine', $data, $condition);

                if ($bool) {
                    header("location: ?controller=Medicine&action=getViewEdit&id=$med_code");
                } else {
                    die('error');
                }

            }
            
            
        } else {
            header("location: ?controller=Medicine&action=getView");
        }
	}

	
	public function getPagination($table){
		$Model = new Model();

		$medicines = $Model->selectAll($table);

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($medicines), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getSearch($value){
		$Model = new Model();
		$columns = 'med_code, med_name, med_type, med_price, med_group';
		$medicines = $Model->search('medicine', $columns, $value);

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($medicines), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getMed(){
		$pag = new PaginationModel();
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		$limit 		= 10;
		$offset 	= ($page-1) * $limit;
		$meds 	= $pag->getTablePagination('med_code', 'medicine', $offset, $limit);
		return $meds;
	}

	public function getPaginationByCon($condition){
		$Model = new MedicineModel();

		$medicines = $Model->selectByCondition($condition);

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($medicines), 
		    'limit' => 10,
		    'full' => false
		];

		$page = new Pagination($config);
		return $page;
	}

	public function getMedByCon($condition){
		$pag = new MedicineModel();
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		$limit 		= 10;
		$offset 	= ($page-1) * $limit;
		$meds 	= $pag->getTablePagination('med_code', $offset, $limit, $condition);
		return $meds;
	}



	

    
	// Function validate data medicine
	public function validationMedicine($data) {
		
		$name 		= $data['med_name'];
		$type 		= $data['med_type'];
		$num		= $data['med_num'];
		$price 		= $data['med_price'];
		$med_group 	= $data['med_group'];

		// Variable check validation
		$check = false;
		$validate = new Validation();

		//A.1 Bat loi medcine name
			if ($validate->checkMedName($name)){
			$check = true;
		}

		//A.2 Bat loi medicine type
		if ($validate->checkMedType($type)){
			$check = true;
		}

		//A.3 Bat loi medicine num
		if ($validate->checkMedNum($num)){
			$check = true;
		}
				

		//A.4 Bat loi medicine price
		if ($validate->checkMedPrice($price)){
			$check = true;
		}

        //A.4 Bat loi medicine group
       	if ($validate->checkMedGroup($med_group)){
           	$check = true;
       	}
       	return $check;
	}

	// Function validate data medicine group
	public function validationMedicineGroup($data) {
		$med_group_name 		= $data['med_group_name'];

		// Variable check validation
		$check = false;
		$validate = new Validation();


		// Bat loi medicine group name
		if ($validate->checkMedGroupName($med_group_name)){
			$check = true;
		}
			return $check;
		}

	
}

?>