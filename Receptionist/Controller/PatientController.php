<?php 

require_once('../Model/Model.php');
require_once('../Model/ValidationModel.php');

class PatientController {

	//Function get vieư add
	public function viewAdd() {
		require_once('View/add_patient.php');
	}

    //function get view make appointment
    public function viewMakeAppointment(){
        $model = new Model();
        $deps  = $model->selectAll('department');

        require_once('View/make_appointment.php');
    }

    //function make appointment
    public function makeAppointment(){
        if(isset($_POST['make-appointment'])){
            //Set up data to variable
            $pat_code   = $_POST['pat_code'];
            $dep_code   = $_POST['dep_code'];
            $date       = $_POST['date'] ?? '';
            $status     = 'Chờ khám bệnh';

            // Set Up appointment code
			$model 	    = new Model();
            $appointment 	= $model->selectAll('appointment');
            $appointment    = $appointment ?? '';

            if (empty($appointment)) {
                // Code
                $app_code   	= 'APP0001';

            } else {
                $appointment  	= array_reverse($appointment);
                $number 	    = substr($appointment[0]['app_code'], 3);
                $number 	    = str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);

                $app_code 		= 'APP'.$number;
            }

            // Định dạng lại ngày 
			if ($date != '') {
				$date_arr   = explode('-', $date);
				$date       = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$date 		= strtotime($date);
				$date 		= date('Y-m-d', $date);
            }
            
            //Variable use to storage data
            $data = array(
                'app_code'       => $app_code,
                'app_pat_code'   => $pat_code,
                'app_dep_code'   => $dep_code,
                'app_date'       => $date,
                'app_status'     => $status
            );

            // Variable use to validation data
            $bool = false;

            if($bool){

				$_SESSION['data'] = array(
                    'pat_code'   => $pat_code,
                    'dep_code'   => $dep_code,
                    'date'       => $date
				);

                header('location: ?controller=Patient&action=viewMakeAppointment');

            } else {
                //Insert data
                $bool = $model->insert('appointment', $data);

                if ($bool) {
                    header('location: ?controller=Patient&action=viewMakeAppointment');
                } else {
                    die('error');
                }

            }

        } else {
            header('location: ?controller=Patient&action=viewMakeAppointment');
        }
    }

	//function add patient to table in database
	public function addPatient(){

		if (isset($_POST['add-patient'])) {
		#Get data from user enter

			// Set Up patient code
			$model 	    = new Model();
            $patient 	= $model->selectAll('patient');
            $patient    = $patient ?? '';

            if (empty($patient)) {
                // Code
                $pat_code   	= 'PAT0001';

            } else {
                $patient  	    = array_reverse($patient);
                $number 	    = substr($patient[0]['pat_code'], 3);
                $number 	    = str_pad((int) $number+1, 4 ,"0",STR_PAD_LEFT);

                $pat_code 		= 'PAT'.$number;
            }
            // end set up patient code
            $name 		= $_POST['name'];
            $address    = $_POST['address'];
            $gender     = $_POST['gender'] 	?? '';
            $dob 		= $_POST['dob']		?? '';
            $phone      = $_POST['phone']  	?? '';
            $id_card    = $_POST['id_card'] ?? '';

            //Set up Null
            if (empty($phone)) {
                # code...
                $phone = NULL;
            }
            if (empty($id_card)) {
                # code...
                $id_card = NULL;
            }

            // Định dạng lại ngày sinh
			if ($dob != '') {
				$dob_arr   	= explode('-', $dob);
				$dob        = $dob_arr[2].'-'.$dob_arr[1].'-'.$dob_arr[0];
				$dob 		= strtotime($dob);
				$dob 		= date('Y-m-d', $dob);
			}

			//Variable use to storage data
            $data = array(
                'pat_code'       => $pat_code,
                'pat_id_card'    => $id_card,
                'pat_name'       => $name,
                'pat_dob'        => $dob,
                'pat_gender'     => $gender,
                'pat_address'    => $address,
                'pat_phone'      => $phone
            );

            // Variable use to validation data
            $bool = $this->validationDataPat($data);

            if($bool){

				$_SESSION['data'] = array(
					'id_card'    => $id_card,
					'name'       => $name,
					'dob'        => $dob,
					'gender'     => $gender,
					'address'    => $address,
					'phone'      => $phone
				);

                header('location: ?controller=Patient&action=viewAdd');

            } else {

                $data_acc = array(
                    'acc_username' => $pat_code,
                    'acc_password' => md5(123456789),
                    'acc_role'     => 'Bệnh Nhân'
                );

                $bool = $model->insert('account', $data_acc);

                if ($bool) {
                    //Insert data
                    $condition = array(
                        'acc_username' => $pat_code 
                    );

                    $accounts = $model->selectByCondition('account', $condition);

                    $data['pat_acc_id'] = $accounts[0]['acc_id'];

                    $bool = $model->insert('patient', $data);

                    if ($bool) {
                        header('location: ?controller=Patient&action=viewAdd');
                    } else {
                        $condition = array(
                            'acc_username' => $pat_code
                        );
    
                        $model->deleteByCondition('account', $condition);

                        die('error');
                    }
                } else {
                    header('location: ?controller=Patient&action=viewAdd');
                }
            }

		}
		else {
			header('location: ?controller=Patient&action=viewAdd');
		}
	}


	//Function Validation data Patient
    public function validationDataPat($data){

        $name       = $data['pat_name'];
        $address    = $data['pat_address'];
        $phone      = $data['pat_phone'];
        $id_card    = $data['pat_id_card'];
        $gender     = $data['pat_gender'];
        $dob        = $data['pat_dob'];

        //A. Bat loi
        $check = false; // Variable use to validation
        $validate  = new Validation();
        
        //A.1 Bat loi name
        if ($validate->checkName($name)){
            $check = true;
        }

        //A.2 Bat loi address
        if ($validate->checkAddress($address)){
            $check = true;
        }
        
		//A.3 Bat loi sđt
		if (trim($phone) != '') { 
			if ($validate->checkPhone($phone)){
				$check = true;
			}
		}

		//A.4 Bat loi cmnd
		if (trim($id_card) != '') { 
			if ($validate->checkIdCardExits('pat_id_card', 'patient', $id_card)){
				$check = true;
			}
		}

        //A.6 Bat loi Gioi tinh
        if ($validate->checkGender($gender)){
            $check = true;
        }

        //A.8 Bat loi ngay thang nam sinh
        if ($validate->checkDate($dob)){
            $check = true;
        }

        return $check;       
    }
	// End function validation data patient


}

?>