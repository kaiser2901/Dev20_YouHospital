<?php

    class ValidateRegistDoctorModel{
        public function checkCode($code){
            if($code == null){
                $_SESSION['error']['name'] = 'Vui lòng chọn bệnh nhân.';
                return true;
            }elsE{
                $model = new Model();
                $condition = array(
                    
                );
            }
            return false;
        }
        public function checkDate($date){
            if($date == null){
                $_SESSION['error']['date'] = 'Vui lòng chọn ngày khám.';
                return true;
            }
            return false;
        }
        public function checkDep($dep){
            if($dep == null){
                $_SESSION['error']['dep'] = 'Vui lòng chọn khoa khám.';
                return true;
            }
            return false;
        }
        public function checkDoc($doc){
            if($doc == null){
                $_SESSION['error']['doc'] = 'Vui lòng chọn bác sĩ.';
                return true;
            }
            return false;
        }
        
        
        public function checkDoctorExits($code, $dep, $date) {
            $db = new Database();
            $conn = $db->dbConnect();

            $sql = "SELECT * FROM checkup_doc,employee, clinic, clinic_emp WHERE clin_emp_code = '$code' AND clin_date = '$date' AND cli_dep_code = '$dep'  AND emp_role = '2'";

            $result = $conn->query($sql);

            $db->dbDis($conn);

            if ($result->num_rows = 0) {
                    # code...
                    $_SESSION['error']['name'] = 'Vui lòng chọn bác sĩ khác.';
                    return true;
            }
            return false;
	}
        
        public function checkMaxPatient($code, $dep, $date){
            $db = new Database();
            $conn = $db->dbConnect();

            $sql = "SELECT * FROM checkup_doc WHERE cdoc_emp_code = '$code' AND cdoc_date = '$date' AND cdoc_dep_code = '$dep'  AND emp_role = '2'";

            $result = $conn->query($sql);

            $db->dbDis($conn);

            if ($result->num_rows > 20) {
                    # code...
                    $_SESSION['error']['name'] = 'Bác sĩ này đã có quá nhiều người đặt khám.';
                    return true;
            }
            return false;
        }
        
        
    }

?>