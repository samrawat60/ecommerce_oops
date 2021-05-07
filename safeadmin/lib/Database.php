<?php  
require_once('config.php');
require_once('Format.php');

/*
echo $_SERVER['SCRIPT_FILENAME'];
echo $_SERVER['HTTP_HOST']; // show domain name or host name
echo $_SERVER['SERVER_NAME']; // show domain name 
*/

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

// echo "{$baseurl}safeadmin/config/config.php'";

class Database{
	private $db_host = DB_HOST;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;
	private $db_name = DB_NAME;

	private $mysqli = "";
	private $result = [];
	private $con    = FALSE;

	public function __construct(){
		$this->connectDB();
	}

	// 
	public function connectDB(){
		if(!$this->con){
			$this->mysqli = new mysqli(
				$this->db_host,
				$this->db_user,
				$this->db_pass,
				$this->db_name,
			);

			$this->con = TRUE;
			// Check Connection 
			if ($this->mysqli->connect_errno > 0) {
				array_push($this->result,$this->mysqli->connect_error);
				return FALSE; // Problem selecting database return FALSE
			}
		}else{
			return TRUE;
		}
	}

	// function to Insert data in DB
	public function insert($tbl, $params=[]){
		if($this->tblExists($tbl)){
			// print_r($params);

			$tbl_columns = implode("`, `", array_keys($params));
			$tbl_values  = implode("', '", $params);

			$sql = "INSERT INTO `$tbl` (`$tbl_columns`) VALUES ('$tbl_values')";
			if($this->mysqli->query($sql)){
				array_push($this->result, $this->mysqli->insert_id);
				return TRUE;
			}else{
				array_push($this->result, $this->mysqli->error);
				return FALSE;
			}
		}else{
			return FALSE;
			
		}

	}

	// function to Update row in DB
	public function update(){

	}

	// function to delete rows from the DB
	public function delete(){

	}
	
	// function to Select data from the DB
	public function select(){

	}

	// Check table is exists or not in our DB
	private function tblExists($tbl){
		$sql = "SHOW TABLES FROM {$this->db_name} LIKE '$tbl'";
		$tblInDb = $this->mysqli->query($sql);
		if($tblInDb){
			if($tblInDb->num_rows == 1){
				return TRUE;
			}else{
				array_push($this->result,$tbl." does not exist in the database.");
				return FALSE;
			}
		}
	}

	public function getResult(){
		$val = $this->result;
		$this->result = [];
		return $val;
	}

	public function __destruct(){
		if($this->con){
			if($this->mysqli->close()){
				$this->con = FALSE;
				return TRUE;
			}
		}else{
			return FALSE;
		}
	}
}
?>