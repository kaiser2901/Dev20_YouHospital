<?php 

require_once('../Model/Model.php');
require_once('../Model/ValidationModel.php');
require_once ('Model/InpatientModel.php');
class InPatientController {
    
    //Function get view 
    public function getView(){
        $model = new InpatientModel();
        $pat = $model->selectInpatient();
        require_once ('View/inpatient.php');
        
    }
    
    //Function get vieư add
    public function getViewAdd() {
            $getCode = $_GET['code'];
            $model = new Model();
            $condition = array(
                'pat_code' => $getCode
            );
            $pat = $model->selectByCondition('patient', $condition);
            
            $dep = $model->selectAll('department');
            
            require_once('View/add_inpatient.php');
    }
    
    //Function get view Edit
    public function getViewEdit(){
        $ipat_code = $_GET['code'];
        
        $model  = new InpatientModel();
        $model2 = new Model();
        $pat    = $model->editInpatient($ipat_code);
        $dep    = $model2->selectAll('department');
        require_once ('View/edit_inpatient.php');
    }

    //function make Inpatient
    public function addInpatient(){
        if(isset($_POST['add-inpatient'])){
            //Set up data to variable
            $pat_code   = $_GET['code'];
            $dep_code   = $_POST['dep_code'] ;
            
            //getDate
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_in = date('Y-m-d');
            
            // Set Up Inpatient code
            $model 	    = new Model();
            $inpatient      = $model->selectAll('inpatient');
            $inpatient      = $inpatient ?? '';

            if (empty($inpatient)) {
            // Code
            $ipat_code   	= 'IPAT0001';

            } else {
                $inpatient          = array_reverse($inpatient);
                $number 	    = substr($inpatient[0]['inp_ipat_code'], 4);
                $number 	    = str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);
                $ipat_code 		= 'IPAT'.$number;
            }
            
            
            //Variable use to storage data
            $data = array(
                'inp_ipat_code'     => $ipat_code,
                'inp_pat_code'      => $pat_code,
                'inp_dep_code'      => $dep_code,
                'inp_day_in'        => $date_in
            );

            // Variable use to validation data
            $bool = false;
            
            if($this->validationDataInPat($data)){
                $bool = true;
            }
            
            if($bool){

                header("location: ?controller=InPatient&action=getviewAdd&code=$pat_code");

            } else {
                //Insert data
                $bool = $model->insert('inpatient', $data);

                if ($bool) {
                    header('location: ?controller=InPatient');
                } else {
                    die('error');
                }

            }

        } else {
            header('location: ?controller=Patient&action=getView');
        }
    }
    
    //function make Inpatient
    public function EditInpatient(){
        if(isset($_POST['edit-inpatient'])){
            //Set up data to variable
            $ipat_code       = $_GET['code'];
            $dep_code_old   = $_GET['dep'];
            $dep_code       = $_POST['ipat_dep_code'] ?? $dep_code_old;
            $date_in        = $_POST['ipat_day_in'];
            $date_out       = $_POST['ipat_day_out'] ?? '';
            $taikham        = $_POST['ipat_taikham'] ?? '';
            
            //Variable use to storage data
            if($date_out == ''){
                $date_out = NULL;
            }
            if($taikham == ''){
                $taikham = NULL;
            }
            
            $data = array(
                'inp_dep_code'      => $dep_code,
                'inp_day_in'        => $date_in,
                'inp_day_out'       => $date_out,
                'inp_re_treatment'  => $taikham
            );
            // Variable use to validation data
            $bool = $this->validationDataInPat($data);

            if($bool){

                header("location: ?controller=InPatient&action=getviewEdit&code=$ipat_code");

            } else {
                $model = new Model();
                $condition = array(
                    'inp_ipat_code' => $ipat_code
                );
                //Edit data
                $bool = $model->updateByCondition('inpatient', $data, $condition);
                
                if ($bool) {
                    header('location: ?controller=Inpatient');
                } else {
                    die('Something Wrong');
                }

            }

        } else {
            header('location: ?controller=InPatient&action=getView');
        }
    }
    
	//Function Validation data Patient
    public function validationDataInPat($data){

        $dep       = $data['inp_dep_code'];
        $date_in   = $data['inp_day_in'];
        //A. Bat loi
        $check = false; // Variable use to validation
        $validate  = new Validation();
        
        if($validate->checkDep($dep)){
            $check = true;
        }
        if($validate->checkNullDateIpat($date_in)){
            $check = true;
        }
        return $check;       
    }
	// End function validation data inpatient
        

}

?>