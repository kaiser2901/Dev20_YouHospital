<?php 

class Validation {

	public function checkName($name) {
		if (strlen(trim($name)) < 1) {
			# code...
			$_SESSION['error']['name'] = 'Họ và Tên không được để trống.';
			return true;
		}
		return false;
	}

	public function checkNameExits($row, $table, $name){
		$db = new Database();
		$conn = $db->dbConnect();

		$sql = "SELECT $row FROM $table WHERE $row = '$name'";

		$result = $conn->query($sql);

		$db->dbDis($conn);

		if ($result->num_rows > 0) {
			# code...
			$_SESSION['error']['name'] = 'Tên đã tồn tại.';
			return true;
		}
		return false;
	}

	public function checkPhone($phone) {
		$pattern = '/^[0][1-9][0-9]{7,10}$/';
		if (!preg_match($pattern, $phone)) {
			# code...
			$_SESSION['error']['phone'] = 'Vui lòng nhập số điện thoại của bạn (8-12 số).';
			return true;
		}
		return false;
	}

	public function checkEmail($email) {
		if (strlen(trim($email)) < 1) {
			# code...
			$_SESSION['error']['email'] = 'Email không được để trống.';
			return true;
		}
		return false;
	}

	public function checkEmailExits($row, $table, $email) {
		$db = new Database();
		$conn = $db->dbConnect();

		$sql = "SELECT $row FROM $table WHERE $row = '$email'";

		$result = $conn->query($sql);

		$db->dbDis($conn);

		if ($result->num_rows > 0) {
			# code...
			$_SESSION['error']['email'] = 'Địa chỉ email đã tồn tại.';
			return true;
		}
		return false;
	}

	public function checkPassword($password) {
		$pattern = "/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/";
		if (!preg_match($pattern, $password)) {
			# code...
			$_SESSION['error']['password'] = '
				<i class="fas fa-info-circle"></i> Use 8-16 characters. <br>
           		<i class="fas fa-info-circle"></i> Use at least one character and one alphabetic character. <br>
           		<i class="fas fa-info-circle"></i> Don\'t use any special characters.
			';
			return true;
		}
		return false;
	}

	public function checkRePassword($repassword) {
		if (strlen(trim($repassword)) < 8) {
			# code...
			$_SESSION['error']['repassword'] = 'RePassword must use at least eight characters.';
			return true;
		}
		return false;
	}
        
	public function checkDate($date){
		if(strlen(trim($date)) < 1){
			$_SESSION['error']['date'] = 'Vui lòng chọn ngày';
			return true;
		}
		return false;
	}

	public function checkAddress($address){
		if(strlen(trim($address)) < 1){
			$_SESSION['error']['address'] = 'Địa chỉ không được để trống';
			return true;
		}
		return false;
	}

	public function checkIdCard($id_card){
		$pattern = '/^[0-9]{9,12}$/';
		if(strlen(trim($id_card)) < 1){
			$_SESSION['error']['id_card'] = 'Chứng minh nhân dân không được để trống';
			return true;
		}
		if(!preg_match($pattern, $id_card)){
			$_SESSION['error']['id_card'] = 'Chứng minh nhân dân không đúng';
			return true;
		}
		return false;
	}

	public function checkIdCardExits($row, $table, $id_card){
		$db = new Database();
		$conn = $db->dbConnect();

		$sql = "SELECT $row FROM $table WHERE $row = '$id_card'";

		$result = $conn->query($sql);

		$db->dbDis($conn);

		if ($result->num_rows > 0) {
			# code...
			$_SESSION['error']['id_card'] = 'Chứng minh nhân dân đã tồn tại.';
			return true;
		}
		return false;
	}

	public function checkGender($gender){
		if(strlen(trim($gender)) < 1){
			$_SESSION['error']['gender'] = 'Vui lòng chọn giới tính';
			return true;
		}
		return false;
	}

	public function checkRole($role){
		if(strlen(trim($role)) < 1){
			$_SESSION['error']['role'] = 'Vui lòng chọn vị trí';
			return true;
		}
		return false;
	}

	// Validate Document
	public function checkPatCodeExistDoc($row, $table, $pat_code){
		if(strlen(trim($pat_code)) <1){
			$_SESSION['error']['pat_code_doc'] = 'Vui lòng nhập mã bệnh nhân.';
			return true;
		}else{
			$db = new Database();
			$conn = $db->dbConnect();

			$sql = "SELECT $row FROM $table WHERE $row = '$pat_code'";

			$result = $conn->query($sql);

			$db->dbDis($conn);

			if ($result->num_rows == 0) {
				# code...
				$_SESSION['error']['pat_code_doc'] = 'Mã bệnh nhân không tồn tại.';
				return true;
			}
		}
		return false;
	}

	
	public function checkSubclinicalDoc($subclinical) {
		if (strlen(trim($subclinical)) < 1) {
			# code...
			$_SESSION['error']['subclinical'] = 'Vui lòng nhập cận lâm sàng.';
			return true;
		}
		return false;
	}

	public function checkVitalSignDoc($checkup_vital_sign) {
		$cvs = json_decode($checkup_vital_sign, true);
		$c = false;
		if (($cvs['ha']) < 1) {
			# code...
			$_SESSION['error']['ha'] = 'Vui lòng nhập huyết áp.';
			$c = true;
		}
		if (($cvs['m']) < 1) {
			# code...
			$_SESSION['error']['m'] = 'Vui lòng nhập ';
			$c = true;
		}
		if (($cvs['t']) < 1) {
			# code...
			$_SESSION['error']['t'] = 'Vui lòng nhiệt độ ';
			$c = true;
		}
		if (($cvs['cn']) < 1) {
			# code...
			$_SESSION['error']['cn'] = 'Vui lòng nhiệt độ ';
			$c = true;
		}

		if($c){
			return true;
		}
		return false;
	}

	public function checkDiagnosisDoc($diagnosis) {
		if (strlen(trim($diagnosis)) < 1) {
			# code...
			$_SESSION['error']['diagnosis'] = 'Vui lòng nhập chẩn đoán.';
			return true;
		}
		return false;
	}
	
	//Validate prescription
	public function checkCheckUpCodePre($row, $table, $check_up_code){
		if(strlen(trim($check_up_code)) <1){
			$_SESSION['error']['check_up_code'] = 'Vui lòng nhập mã hồ sơ KB';
			return true;
		}else{
			$db = new Database();
			$conn = $db->dbConnect();

			$sql = "SELECT $row FROM $table WHERE $row = '$check_up_code'";

			$result = $conn->query($sql);

			$db->dbDis($conn);

			if ($result->num_rows == 0) {
				# code...
				$_SESSION['error']['check_up_code'] = 'Mã hồ sơ không tồn tại';
				return true;
			}
		}
		return false;
	}

	public function checkMedicineCodePre($row, $table, $medicine_code){
		$med_code = json_decode($medicine_code, true);
		foreach($med_code as $mc){
			if(strlen(trim($mc)) <1){
				$_SESSION['error']['med_code'] = 'Vui lòng nhập mã thuốc.';
				return true;
			}else{
				$db = new Database();
				$conn = $db->dbConnect();
	
				$sql = "SELECT $row FROM $table WHERE $row = '$mc'";
	
				$result = $conn->query($sql);
	
				$db->dbDis($conn);
	
				if ($result->num_rows == 0) {
					# code...
					$_SESSION['error']['med_code'] = 'Mã thuốc không tồn tại.';
					return true;
				}
			}
			
		}
		return false;
	}

	// Medicine validate
	public function checkMedType($checkMedType) {
		if (strlen(trim($checkMedType)) < 1) {
			# code...
			$_SESSION['error']['med_type'] = 'Tên loại thuốc không được để trống.';
			return true;
		}
		return false;
	}

	public function checkMedName($med_name) {
		if (strlen(trim($med_name)) < 1) {
			# code...
			$_SESSION['error']['med_name'] = 'Tên thuốc không được để trống.';
			return true;
		}
		return false;
	}

	public function checkMedGroup($med_group){
		if(strlen(trim($med_group)) < 1){
			$_SESSION['error']['med_group'] = 'Vui lòng chọn nhóm thuốc';
			return true;
		}
		return false;
	}


	public function checkMedPrice($price){
		$pattern = '/^[0-9]{2,10}$/';
		if(strlen(trim($price)) < 1){
			$_SESSION['error']['med_price'] = 'Giá tiền không được để trống';
			return true;
		}
		if(!preg_match($pattern, $price)){
			$_SESSION['error']['med_price'] = 'Giá tiền không hợp lệ';
			return true;
		}
		return false;
	}

	public function checkMedNum($num){
		$pattern = '/^[0-9]{1,10}$/';
		if(strlen(trim($num)) < 1){
			$_SESSION['error']['med_num'] = 'Số lượng không được để trống';
			return true;
		}
		if(!preg_match($pattern, $num)){
			$_SESSION['error']['med_num'] = 'Số lượng không hợp lệ';
			return true;
		}
		return false;
	}

	// Medicine group validate


	public function checkMedGroupName($med_group_name) {
		if (strlen(trim($med_group_name)) < 1) {
			# code...
			$_SESSION['error']['med_group_name'] = 'Vui lòng nhập tên nhóm thuốc.';
			return true;
		}
		return false;
	}

	public function checkDOB($date){
		if(strlen(trim($date)) < 1){
			$_SESSION['error']['dob'] = 'Vui lòng chọn ngày';
			return true;
		}
		return false;
	}
}

?>