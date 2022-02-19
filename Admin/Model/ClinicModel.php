<?php

    class ClinicModel{
        public function checkName($name){
            if($name == ''){
                $_SESSION['error']['name'] = 'Vui lòng nhập tên phòng khám';
                return true;
            }else
            if(strlen(trim($name)) < 2 || strlen(trim($name)) > 40)
            {
                $_SESSION['error']['name'] = 'Vui lòng nhập tên phòng khám';
                return true;
            }
        }
        
        public function checkDep($dep){
            if($dep == NULL){
                $_SESSION['error']['dep'] = 'Vui lòng chọn khoa';
                return true;
            }
            return false;
        }
        public function selectClinic(){
            $db = new Database();
            $conn = $db->dbConnect();
            $sql = "SELECT * FROM clinic INNER JOIN department ON cli_dep_code = dep_code";
            $arr_rs = array();
            $rs = $conn->query($sql);
            if($rs->num_rows > 0){
                while($result = $rs->fetch_assoc()){
                    $arr_rs[] = $result;
                }
            }
            $db->dbDis($conn);
            return $arr_rs;
        }
	public function selectClinicByID($id){
            $db = new Database();
            $conn = $db->dbConnect();
            $sql = "SELECT * FROM clinic INNER JOIN department ON cli_dep_code = dep_code WHERE cli_id = '$id'";
            $arr_rs = array();
            $rs = $conn->query($sql);
            if($rs->num_rows > 0){
                while($result = $rs->fetch_assoc()){
                    $arr_rs[] = $result;
                }
            }
            $db->dbDis($conn);
            return $arr_rs;
        }
        public function updateByClinicByID($table, $data, $id){
		$db 	= new Database();
		$conn 	= $db->dbConnect();

		$arr_keys = array_keys($data);

		foreach ($arr_keys as $field) {
			$fields[] = "$field = ?";
		}

		$string	= implode(' , ', $fields);

		// Cau lenh thuc thi
		$sql 		= "UPDATE $table SET $string WHERE cli_id = ?";
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
        public function deleteByID($table, $id){
		$db 	= new Database();
		$conn 	= $db->dbConnect();
		
		// Cau lenh thuc thi
		$sql 		= "DELETE FROM $table WHERE cli_id = ?";

		//Thực thi câu lệnh sql
		$statement 	= $conn->prepare($sql);
		$statement->bind_param("i", $id);
		$bool = $statement->execute();

		$db->dbDis($conn);
		return $bool;
	}
    }
    
    

?>
