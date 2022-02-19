//CheckupController
<?php 
require_once 'Model/ValidationModel.php';
require_once 'Model/Model.php';
class CheckUpController {

	//Function get view home 
	public function getView() {
		require_once('View/check_up.php');
	}
        public function addCheckUp(){
            if(isset($_POST['addCheckUp'])){
                $name   = $_POST['name'];
                $dob    = $_POST['dob'];
                $phone  = $_POST['phone'];
                $email  = $_POST['email'];
                $date   = $_POST['date'];
                $symptom= $_POST['symptom'] ?? '';
                
                //validation
                $check = false;
                $validation = new Validation();
                $model = new Model();
                if($validation->checkName($name)){
                    $check = true;
                }
                if($validation->checkPhone($phone)){
                    $check = true;
                }
                if($validation->checkEmail($email)){
                    $check = true;
                }
                if($validation->checkDOB($dob)){
                    $check = true;
                }
                if($validation->checkDate($date)){
                    $check = true;
                }
                $data = array(
                    'med_name'  => $name,
                    'med_dob'   => $dob,
                    'med_phone' => $phone,
                    'med_email' => $email,
                    'med_date'  => $date,
                    'med_symptom'=> $symptom
                );
                var_dump($data);
                if($check){
                    $_SESSION['data'] = array(
                    'med_name'  => $name,
                    'med_dob'   => $dob,
                    'med_phone' => $phone,
                    'med_email' => $email,
                    'med_date'  => $date,
                    'med_symptom'=> $symptom
                );
                    header("Location: ?controller=CheckUp");
                }else{
                    $bool = $model->insert('medicalregister', $data);
                    if($bool){
                        $_SESSION['complete']['checkup'] = 'Thành Công';
                    }else{
                        header('Location: ?controller=CheckUp');
                    }
                }
            }
        }
}

?>