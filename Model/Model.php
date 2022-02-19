<?php 

class Model {

	public function selectAll($table){
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$sql 		= "SELECT * FROM $table";
		$statement 	= $conn->query($sql);

		$arr = array();

		while($row = $statement->fetch_assoc()) {
		 	$arr[] = $row;
		}

		$db->dbDis($conn);

		return $arr;
	}

	public function selectByCondition($table, $condition) {
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$data = array_keys($condition);

		foreach ($data as $field) {
			$fields[] = "$field = ?";
		}

		$requirement	= implode(' AND ', $fields);
		//Câu lệnh thực thi 
		$sql 			= "SELECT * FROM $table WHERE $requirement";
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

	public function insert($table, $data){
		
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		//Lấy các fields cần insert và điền dấu ? vào Values
		$fields 		= implode(', ', array_keys($data));
		$questionMark 	= str_repeat('?, ', count($data));
		$questionMark 	= substr($questionMark, 0, -2);
		//Câu lệnh thực thi 
		$sql 			= "INSERT INTO $table ($fields) VALUES ($questionMark)";
		//Truyền kiểu dữ liệu
		$type 			= str_repeat('s', count($data));
		$values 		= array_values($data);
		//Thực thi câu lệnh sql
		$statement 		= $conn->prepare($sql);
		$statement->bind_param("$type", ...$values);
		$bool = $statement->execute();

		$db->dbDis($conn);

		return $bool;
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
		$sql 		= "UPDATE $table SET $string WHERE ID = ?";
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

	public function updateByCondition($table, $data, $condition) {
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$arr_keys = array_keys($data);

		foreach ($arr_keys as $field) {
			$fields[] = "$field = ?";
		}

		$string	= implode(' , ', $fields);

		$requirements = array_keys($condition);

		foreach ($requirements as $requirement) {
			$a[] = "$requirement = ?";
		}

		$requirement	= implode(' AND ', $a);

		// Cau lenh thuc thi
		$sql 				= "UPDATE $table SET $string WHERE $requirement";
		//Truyền kiểu dữ liệu
		$type 				= str_repeat('s', count($data) + count($condition));
		$values 			= array_values($data);
		$valuesCondition 	= array_values($condition);

		array_push($values, ...$valuesCondition);

		//Thực thi câu lệnh sql
		$statement 	= $conn->prepare($sql);
		$statement->bind_param("$type", ...$values);
		$bool = $statement->execute();

		$db->dbDis($conn);
		return $bool;
	}

	public function deleteByID($table, $id){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		// Cau lenh thuc thi
		$sql 		= "DELETE FROM $table WHERE ID = ?";

		//Thực thi câu lệnh sql
		$statement 	= $conn->prepare($sql);
		$statement->bind_param("i", $id);
		$bool = $statement->execute();

		$db->dbDis($conn);
		return $bool;
	}

	public function deleteByCondition($table, $condition){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		$data = array_keys($condition);

		foreach ($data as $field) {
			$fields[] = "$field = ?";
		}

		$requirement	= implode(' AND ', $fields);
		//Câu lệnh thực thi 
		$sql 			= "DELETE FROM $table WHERE $requirement";
		//Truyền kiểu dữ liệu
		$type 			= str_repeat('s', count($condition));
		$values 		= array_values($condition);
		//Thực thi câu lệnh sql
		$statement 		= $conn->prepare($sql);
		$statement->bind_param("$type", ...$values);
		$bool = $statement->execute();

		$db->dbDis($conn);
		return $bool;
	}

	public function search($table, $columns, $value){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		$sql 		= "SELECT * FROM $table WHERE CONCAT_WS('', $columns) LIKE '%$value%'";
		$statement 	= $conn->query($sql);

		$arr = array();

		while($row = $statement->fetch_assoc()) {
		 	$arr[] = $row;
		}

		$db->dbDis($conn);

		return $arr;
	}

	//Huy
	public function selectAllwithJOIN($table1, $table2, $condition){
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$sql 		= "SELECT * FROM $table1 JOIN $table2 ON $condition";
		$statement 	= $conn->query($sql);

		$arr = array();

		while($row = $statement->fetch_assoc()) {
		 	$arr[] = $row;
		}

		$db->dbDis($conn);

		return $arr;
	}
}

?>