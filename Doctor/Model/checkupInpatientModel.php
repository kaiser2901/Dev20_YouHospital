<?php

    class checkupInpatientModel{
        public function selectInpatient($code){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM inpatient INNER JOIN patient ON inp_pat_code = pat_code INNER JOIN department ON dep_code = inp_dep_code INNER JOIN employee ON dep_code = emp_department WHERE inp_ipat_code ='$code' ";

            $result = $con->query($sql);
            $arr_value = array();
            if($result->num_rows > 0){
                while($rs = $result->fetch_assoc()){
                    $arr_value[] = $rs;
                }
            }
            var_dump($arr_value);
            $db->dbDis($con);
            return $arr_value;
        }
    }

?>
