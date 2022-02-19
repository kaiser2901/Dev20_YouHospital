<?php 

class AccountModel {
    //Selectall
    public function selectAll(){
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$sql 		= "SELECT emp_code, emp_name, emp_id_card, emp_role, emp_dob, account.acc_username, emp_gender, department.dep_name FROM employee
        JOIN account ON employee.emp_id = account.acc_id  
        JOIN department ON employee.emp_department = department.dep_code";
		$statement 	= $conn->query($sql);

		$arr = array();

		while($row = $statement->fetch_assoc()) {
		 	$arr[] = $row;
		}

		$db->dbDis($conn);

		return $arr;
	}
	public function getTablePagination($row, $offset, $limit, $condition){
        $db     = new Database();
        $conn   = $db->dbConnect();


        // Cau lenh thuc thi
        $sql = "SELECT emp_code, emp_name, emp_id_card, emp_role, emp_dob, account.acc_username, emp_gender, department.dep_name FROM employee
                JOIN account ON employee.emp_id = account.acc_id  
                JOIN department ON employee.emp_department = department.dep_code
                WHERE employee.emp_role = '$condition'
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
		$sql 			=  "SELECT emp_code, emp_name, emp_id_card, emp_role, emp_dob, account.acc_username, emp_gender, department.dep_name FROM employee
                            JOIN account ON employee.emp_id = account.acc_id  
                            JOIN department ON employee.emp_department = department.dep_code
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

    public function search($columns, $value, $limit, $offset){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		$sql 		= "SELECT emp_code, emp_name, emp_id_card, emp_role, emp_dob, account.acc_username, emp_gender, department.dep_name FROM employee
                        JOIN account ON employee.emp_id = account.acc_id  
                        JOIN department ON employee.emp_department = department.dep_code
                        WHERE CONCAT_WS('', $columns) LIKE '%$value%' LIMIT ?, ?";
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
    
    public function getTablePaginations($row, $offset, $limit){
        $db     = new Database();
        $conn   = $db->dbConnect();


        // Cau lenh thuc thi
        $sql = "SELECT emp_code, emp_name, emp_id_card, emp_role, emp_dob, account.acc_username, emp_gender, department.dep_name, department.dep_code FROM employee
        JOIN account ON employee.emp_id = account.acc_id  
        JOIN department ON employee.emp_department = department.dep_code ORDER BY $row DESC LIMIT ?, ?";
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