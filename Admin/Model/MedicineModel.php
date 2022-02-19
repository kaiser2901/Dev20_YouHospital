<?php 

class MedicineModel {
	public function getTablePagination($row, $offset, $limit, $condition){
        $db     = new Database();
        $conn   = $db->dbConnect();


        // Cau lenh thuc thi
        $sql = "SELECT * FROM medicine 
                JOIN medicine_group 
                ON med_group = med_group_name
                WHERE med_group_code = '$condition'
                ORDER BY $row DESC 
                LIMIT ?, ?";
        //Thực thi câu lệnh sql
        $statement  = $conn->prepare($sql);
        $statement->bind_param("ii", $offset, $limit);
        $statement->execute();


        $arr = array();
        $results = $statement->get_result();
        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $arr[] = $row;
            }
        }

        $db->dbDis($conn);
        return $arr;
    }

    public function selectByCondition($condition) {
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$data = array_keys($condition);

		foreach ($data as $field) {
			$fields[] = "$field = ?";
		}

		$requirement	= implode(' AND ', $fields);
		//Câu lệnh thực thi 
		$sql 			=  "SELECT * FROM medicine 
                            JOIN medicine_group 
                            ON med_group = med_group_name
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

    public function search($table, $columns, $value, $limit, $offset){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		$sql 		= "SELECT * FROM $table WHERE CONCAT_WS('', $columns) LIKE '%$value%' LIMIT ?, ?";
		//Thực thi câu lệnh sql
        $statement  = $conn->prepare($sql);
        $statement->bind_param("ii", $offset, $limit);
        $statement->execute();


        $arr = array();
        $results = $statement->get_result();
        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
                $arr[] = $row;
            }
        }

        $db->dbDis($conn);
        return $arr;
	}
    

    
}

?>