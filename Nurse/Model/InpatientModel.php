<?php

    class InpatientModel{
        public function selectInpatient(){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM inpatient INNER JOIN patient ON patient.pat_code = inpatient.inp_pat_code INNER JOIN department ON inpatient.inp_dep_code = department.dep_code";
            $rs = $con->query($sql);
            $db->dbDis($con);
            return $rs;
        }
        
        public function editInpatient($ipat_code){
            $db = new Database();
            $con = $db->dbConnect();
            $sql = "SELECT * FROM inpatient "
                    . "INNER JOIN patient "
                    . "ON patient.pat_code = inpatient.inp_pat_code "
                    . "INNER JOIN department "
                    . "ON inpatient.inp_dep_code = department.dep_code "
                    . "WHERE inp_ipat_code = '$ipat_code' ";
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
        public function updateByID($table, $data, $id){
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$arr_keys = array_keys($data);

		foreach ($arr_keys as $field) {
			$fields[] = "$field = ?";
		}

		$string	= implode(' , ', $fields);

		// Cau lenh thuc thi
		$sql 		= "UPDATE $table SET $string WHERE inp_ipat_code = ?";
		//Truyền kiểu dữ liệu
		$type 		= str_repeat('s', count($data) + 1);
		$values 	= array_values($data);
		array_push($values, $id);

		//Thực thi câu lệnh sql
		$statement 	= $conn->prepare($sql);
		$statement->bind_param("$type", ...$values);
		$bool = $statement->execute();

		$db->dbDis($conn);
		return $bool;
	}
    }
        
?>
