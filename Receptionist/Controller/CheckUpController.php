<?php
require_once '../Model/Model.php';
class CheckUpController {

    public function getView(){
        $model = new Model();
        $med = $model->selectAll('medicalregister');
       
        require_once 'View/checkup.php';
    }
    
}

?>
