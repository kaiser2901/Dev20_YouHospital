<?php 
require_once('../Model/ValidationModel.php');
require_once('../Model/Model.php');
require_once('Model/checkupInpatientModel.php');
class CheckUpInpatientController {
    

    public function getView(){
        //Get Code Inpatient
        if(isset($_GET['code'])){
            $codeInpatient = $_GET['code'];
        }else{
            header('Location: ?controller=Patient');
        }
        //Get information Inpatient
        $model = new checkupInpatientModel();
        $pat = $model->selectInpatient($codeInpatient);
        var_dump($pat);
        
        //Get all sick
        $all_sicks = $this->selectSick();
        $sicks = '';
        $diagnose = '';
        
        //Get sick name and suggest medicne
        $medicines_suggest = array();
        if(isset($_POST['send_sick_name'])){
            $sick_name = $_POST['sick_name'];
            $sicks = $this->selectSick();
            foreach($sicks as $sick){
                $sick_med_codes = json_decode($sick['sic_med_code'], true)['med_suggest'];
                if($sick_name == $sick['sic_name']){
                    $diagnose = $sick['sic_name'];
                   foreach($sick_med_codes as $sick_med_code){
                       $meds = $this->selectMedicineWithId($sick_med_code);
                       foreach($meds as $med){
                            $medicines_suggest[] = $med;
                       }
                   }
                }
                
            }
        }
        
        // $meds = $this->selectMedicineWithId($med_code);
        require_once 'View/checkupInpatient.php';;
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
    
    //Function select Medicine by ID
	public function selectSick(){
		$model 		= new Model();
		$sicks 		= $model->selectAll('sick');
		return $sicks;
    }
    
    

}

?>