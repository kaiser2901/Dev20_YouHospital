<?php 

require_once('../Model/Model.php');
require_once('Model/PaginationModel.php');
require_once('Model/Pagination.php');

class InsuranceController {

	public function getView(){
		$inss 		= $this->getPat();
		$page 		= $this->getPagination();
		foreach($inss as $ins) {
			$pat	= $this->selectPatByCondition($ins['ins_pat_code']);
			$pats[] = $pat['pat_name'];
		}
		require_once('View/insurance.php');
	}

	public function getViewEdit(){
		if(isset($_GET['id'])){
			$model = new Model();
			$condition = array (
				'ins_id'	=> $_GET['id']
			);
			$inss = $model->selectByCondition('insurance', $condition);

			foreach($inss as $ins){
				$ins = $ins;
			}

			require_once('View/edit_insurance.php');

		} else {
			header('location: ?controler=Insurance');
		}
	}

	//function get View
	public function getViewAdd(){
		$pats = $this->selectPat();
		require_once('View/add_insurance.php');
	}

	public function addInsurance(){
		if(isset($_POST['add_ins'])){
			$pat_code = $_POST['pat_code'];
			$ins_code = $_POST['ins_code'];
			$ins_date = $_POST['ins_date'] ?? '';

			// Định dạng lại ngày 
			if ($ins_date != '') {
				$date_arr   	= explode('-', $ins_date);
				$ins_date       = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$ins_date 		= strtotime($ins_date);
				$ins_date 		= date('Y-m-d', $ins_date);
            }

			$data = array(
				'ins_code'		=> $ins_code,
				'ins_pat_code' 	=> $pat_code,
				'ins_date'		=> $ins_date
			);

			$bool = false;
			
			if($bool){

				$_SESSION['data'] = array(
					'ins_code'		=> $ins_code,
					'ins_pat_code' 	=> $pat_code,
					'ins_date'		=> $ins_date
				);

				header('location: ?controller=Insurance&action=getViewAdd');

			} else {

				$model 	= new Model();				
				$bool 	= $model->insert('insurance', $data);
				
				if ($bool) {
                    header('location: ?controller=Insurance&action=getViewAdd');
                } else {
                    die('error');
                }

			}

		} else {
			header('location: ?controller=Insurance&action=getViewAdd');
		}
	}

	public function editInsurance(){
		if(isset($_POST['edit_ins'])){
			$ins_id   = $_POST['ins_id'];
			$pat_code = $_POST['pat_code'];
			$ins_code = $_POST['ins_code'];
			$ins_date = $_POST['ins_date'] ?? '';

			// Định dạng lại ngày 
			if ($ins_date != '') {
				$date_arr   	= explode('-', $ins_date);
				$ins_date       = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$ins_date 		= strtotime($ins_date);
				$ins_date 		= date('Y-m-d', $ins_date);
            }

			$data = array(
				'ins_code'		=> $ins_code,
				'ins_pat_code' 	=> $pat_code,
				'ins_date'		=> $ins_date
			);

			$bool = false;
			
			if($bool){

				$_SESSION['data'] = array(
					'ins_code'		=> $ins_code,
					'ins_pat_code' 	=> $pat_code,
					'ins_date'		=> $ins_date
				);

				header('location: ?controller=Insurance&action=getViewEdit&id='.$ins_id);

			} else {

				$model 	= new Model();				
				$condition = array(
					'ins_id' => $ins_id
				);
				$bool   = $model->updateByCondition('insurance', $data, $condition);
				
				if ($bool) {
                    header('location: ?controller=Insurance');
                } else {
                    die('error');
                }

			}

		} else {
			header('location: ?controller=Insurance');
		}
	}

	public function selectPat(){
		$model = new Model();
		$pats  = $model->selectAll('patient');
		return $pats;
	}

	public function selectPatByCondition($pat_code){
		$model 		= new Model();
		$condition 	= array(
			'pat_code' => $pat_code
		);

		$pats = $model->selectByCondition('patient', $condition);
		
		$arr_val = '';
		
		foreach($pats as $pat){
			$arr_val = $pat;
		}

		return $arr_val;
	}

	public function getPagination(){
		$Model = new Model();

		$inss = $Model->selectAll('insurance');

		if (isset($_GET['page'])) {
		    $page = $_GET['page'];
		} else {
		    $page = 1;
		}
		$limit = 10;
		$offset = ($page-1) * $limit;

		$config = [
		    'total' => (int)count($inss), 
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
		$deps 	= $pag->getTablePagination('ins_id', 'insurance', $offset, $limit);
		return $deps;
	}
}

?>