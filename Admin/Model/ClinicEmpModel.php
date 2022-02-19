<?php

    class ClinicEmpModel{
        
        public function checkCode($code){
            if($code == null){
                $_SESSION['error']['code'] = 'Vui lòng chọn bác sĩ.';
                return true;
            }
            return false;
        }
        public function checkDate($date){
            if($date == NULL){
                $_SESSION['error']['date'] = 'Vui lòng chọn ngày trực.';
                return true;
            }
            return false;
        }
        public function checkRoom($room){
            if($room == null){
                $_SESSION['error']['room'] = 'Vui lòng chọn phòng trực.';
                return true;
            }
            return false;
        }
        public function checkClinicExist($code,$room,$date){
            $db = new Database();
            $condition = array(
                'clin_emp_code' => $name,
                'clin_cli_id'   => $room,
                'clin_date'     => $date
            );
            $rs = $model->selectByCondition('clinic_emp', $condition);
            if ($rs->num_rows > 0) {
                    $_SESSION['error']['code'] = 'Bác sĩ này đang trực phòng khác';
                    return true;
            }
            return false;
        }
        public function SelectClinicEmp(){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM employee INNER JOIN clinic_emp ON emp_code = clin_emp_code "
                                        . "INNER JOIN clinic ON clin_cli_id = cli_id "
                                        . "INNER JOIN department ON dep_code = cli_dep_code  ORDER BY clin_date DESC";
            $rs = $con->query($sql);
            $arr_rs = array();
            if($rs->num_rows > 0){
                while($result = $rs->fetch_assoc()){
                    $arr_rs[] = $result;
                }
            }
            $db->dbDis($con);
            return $arr_rs;
        }
        public function SelectClinicEmpWithID($id){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM employee INNER JOIN clinic_emp ON emp_code = clin_emp_code "
                                        . "INNER JOIN clinic ON clin_cli_id = cli_id "
                                        . "INNER JOIN department ON dep_code = cli_dep_code WHERE clin_id = '$id'";
            $rs = $con->query($sql);
            $arr_rs = array();
            foreach ($rs as $value) {
                $arr_rs[] = $value;
            }
            $db->dbDis($con);
            return $arr_rs;
        }
        public function checkEmpAndDep($code){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM employee INNER JOIN department ON emp_department  = dep_code INNER JOIN clinic_emp ON clin_emp_code = emp_code WHERE clin_emp_code = '$code'";
            $rs = $con->query($sql);
            $db->dbDis($con);
            $arr_rs = array();
            if($rs->num_rows > 0){
                return false;
            }
            $_SESSION['error']['name'] = 'Bác Sĩ Không Thuộc Khoa Này.';
            return true;
        }
        
	
    }
    
    

?>
