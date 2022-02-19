<?php 

require_once('../Model/Model.php');
require_once('Model/PatientModel.php');
class PatientController {

    //function get view list patient wating to checkup
    public function getView(){
        $emp = $this->selectEmp();
        if($emp != ''){
            $pats = $this->selectPat($emp['emp_department']);
        } else {
            $pats = array();
        }
        
        require_once('View/patient.php');
    }

    //function select employee login
    public function selectEmp(){
        $model = new Model();
        $condition = array(
            'emp_acc_id' => $_SESSION['Login']['acc_id']
        );
        $emps   = $model->selectByCondition('employee', $condition);

        $emp = '';

        foreach($emps as $emp){
            $emp = $emp;
        }

        return $emp;
    }

    //function select patient department
    public function selectPat($dep_code){
        $model = new PatientModel();
        $condition = array(
            'app_dep_code' => $dep_code,
            'app_status'   => 'Chờ Khám Bệnh'
        );
        $pats = $model->selectPatAppointment($condition);

        return $pats;
    }

}

?>