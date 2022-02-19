<?php 

require_once('../Model/Model.php');

class CheckUpController {
    

    public function getView(){
        if(isset($_GET['pat_code'])){
            $pat_code   = $_GET['pat_code'];
            $pat        = $this->PatInfo($pat_code);
            if(isset($_GET['che_id'])){
                $check  = $this->selectCheckUp($_GET['che_id']);
            }
            $checks     = $this->selectCheck($pat_code);
            $ins        = $this->insurance($pat_code);
            $dep_name   = $this->selectDepartment();
            $medGrs     = $this->selectMedGroup();
            $meds       = $this->selectMed();
        } else {
            header('location: ?controller=Patient');
        }

        $date 		= new DateTime($pat['pat_dob']);
        $now 		= new DateTime(date('Y-m-d'));
        $interval 	= $date->diff($now);
        $age 		= $interval->y;

        require_once('View/checkup.php');
    }

    public function PatInfo($pat_code){
        $model = new Model();
        $condition = array(
            'pat_code' => $pat_code
        );
        $pats  = $model->selectByCondition('patient', $condition);

        $arr_val = '';

        foreach($pats as $pat){
            $arr_val = $pat; 
        }

        return $arr_val;
    }

    public function insurance($pat_code){
        $model = new Model();
        $condition = array(
            'ins_pat_code' => $pat_code
        );
        $inss  = $model->selectByCondition('insurance', $condition);

        $arr_val = '';

        foreach($inss as $ins){
            $arr_val = $ins; 
        }

        return $arr_val;
    }
    
    public function selectCheck($pat_code){
        $model = new Model();
        $condition = array(
            'che_pat_code' => $pat_code
        );
        $checks  = $model->selectByCondition('checkup', $condition);
        return $checks;
    }

    public function selectCheckUp($che_id){
        $model = new Model();
        $condition = array(
            'che_id' => $che_id
        );
        $checks  = $model->selectByCondition('checkup', $condition);
        $arr_val = '';

        foreach($checks as $check){
            $arr_val = $check; 
        }

        return $arr_val;
    }

    public function selectDepartment(){
        $model = new Model();
        $condition = array(
            'dep_code' => $_SESSION['Login']['emp_department']
        );
        $deps  = $model->selectByCondition('department', $condition);

        return $deps[0]['dep_name'];

    }

    public function selectMedGroup(){
        $model = new Model();
        $medGr = $model->selectAll('medicine_group');
        return $medGr;
    }

    public function selectMed(){
        $model = new Model();
        $meds = $model->selectAll('medicine');
        return $meds;
    }

    public function add(){
        if(isset($_POST['add'])){
            $m          = $_POST['m'];
            $ha         = $_POST['ha'];
            $nd         = $_POST['nd'];
            $cn         = $_POST['cn'];
            $diagnose   = $_POST['diagnose'];
            $med_name   = $_POST['med_name'];
            $med_num    = $_POST['med_num'];
            $med_tut    = $_POST['med_tut'];
            $note       = $_POST['note'];
            $date       = $_POST['date'];
            $pat_code   = $_POST['pat_code'];
            // Định dạng lại ngày 
			if ($date != '') {
				$date_arr   = explode('-', $date);
				$date       = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$date 		= strtotime($date);
				$date 		= date('Y-m-d', $date);
            }
            $i = 0;
            foreach($med_name as $value){
                $arr_val[] = array(
                    'med_name' => $value,
                    'med_num'  => $med_num[$i],
                    'med_tut'  => $med_tut[$i]
                );
                $i++;
            }

            $med_spec = json_encode($arr_val);

            $vital_sign = array(
                'm'  => $m,
                'ha' => $ha,
                'nd' => $nd,
                'cn' => $cn
            );

            $vital_sign = json_encode($vital_sign);

            $data = array(
                'che_vital_sign' => $vital_sign,
                'che_diagnose'   => $diagnose,
                'che_med_spec'   => $med_spec,
                'che_note'       => $note,
                'che_date'       => $date,
                'che_pat_code'   => $pat_code
            );

            $bool = false;

            if($bool){
                header("location: ?controller=CheckUp&pat_code=$pat_code");
            } else {
                $model  = new Model();
                $bool   = $model->insert('checkup', $data);
                if($bool){
                    header("location: ?controller=CheckUp&pat_code=$pat_code");
                } else {
                    die('chet');
                }
            }


        } else {
            header('location: ?controller=CheckUp');
        }
    }

    public function edit(){
        if(isset($_POST['edit'])){
            $m          = $_POST['m'];
            $ha         = $_POST['ha'];
            $nd         = $_POST['nd'];
            $cn         = $_POST['cn'];
            $diagnose   = $_POST['diagnose'];
            $med_name   = $_POST['med_name'];
            $med_num    = $_POST['med_num'];
            $med_tut    = $_POST['med_tut'];
            $note       = $_POST['note'];
            $date       = $_POST['date'];
            $pat_code   = $_POST['pat_code'];
            $che_id     = $_POST['che_id'];
            // Định dạng lại ngày 
			if ($date != '') {
				$date_arr   = explode('-', $date);
				$date       = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
				$date 		= strtotime($date);
				$date 		= date('Y-m-d', $date);
            }
            $i = 0;
            foreach($med_name as $value){
                $arr_val[] = array(
                    'med_name' => $value,
                    'med_num'  => $med_num[$i],
                    'med_tut'  => $med_tut[$i]
                );
                $i++;
            }

            $med_spec = json_encode($arr_val);

            $vital_sign = array(
                'm'  => $m,
                'ha' => $ha,
                'nd' => $nd,
                'cn' => $cn
            );

            $vital_sign = json_encode($vital_sign);

            $data = array(
                'che_vital_sign' => $vital_sign,
                'che_diagnose'   => $diagnose,
                'che_med_spec'   => $med_spec,
                'che_note'       => $note,
                'che_date'       => $date,
                'che_pat_code'   => $pat_code
            );

            $bool = false;

            if($bool){
                header("location: ?controller=CheckUp&pat_code=$pat_code&che_id=$che_id");
            } else {
                $model  = new Model();
                $condition = array(
                    'che_id' => $che_id
                );
                $bool   = $model->updateByCondition('checkup', $data, $condition);
                if($bool){
                    header("location: ?controller=CheckUp&pat_code=$pat_code&che_id=$che_id");
                } else {
                    die('chet');
                }
            }


        } else {
            header('location: ?controller=CheckUp');
        }
    }

}

?>