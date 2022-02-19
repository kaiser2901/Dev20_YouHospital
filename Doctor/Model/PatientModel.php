<?php 

class PatientModel {

    public function selectPatAppointment($condition){
        $db 	= new Database();
		$conn 	= $db->dbConnect();

		$data = array_keys($condition);

		foreach ($data as $field) {
			$fields[] = "$field = ?";
		}

		$requirement	= implode(' AND ', $fields);
		//Câu lệnh thực thi 
		$sql 			=  "SELECT *, pat.* FROM appointment 
                            INNER JOIN patient pat
                                ON app_pat_code = pat_code
                            WHERE $requirement";
		//Truyền kiểu dữ liệu
		$type 			= str_repeat('s', count($condition));
		$values 		= array_values($condition);
		//Thực thi câu lệnh sql
		$statement 		= $conn->prepare($sql);
		$statement->bind_param("$type", ...$values);
		$statement->execute();

		$results = $statement->get_result();
		if ($results->num_rows > 0) {
			while($row = $results->fetch_assoc()) {
			 	$arr[] = $row;
			}
		} else {
			$arr = array();
		}
		
		$db->dbDis($conn);

		return $arr;
    }

}

?>