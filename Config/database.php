<?php 

class Database {

	private $conn;
	private $hostname = 'localhost';
	private $username = 'root';
	private $pass	  = '';
	private $dbName   = 'youhospital';

	public function dbConnect() {
		$this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbName);

		if ($this->conn->connect_error) {
			die('Connect Database failed');
		}

		mysqli_set_charset($this->conn, 'utf8');

		return($this->conn);
	}

	public function dbDis($conn){
		$conn->close();
	}

}

?>