<?php

//require_once("../includes/database.php");

class User extends Databaseobject{

	protected static $table_name = "tbl_users";
	protected static $db_fields = array('id', 'username', 'password', 'firstname', 'lastname' );

	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;

	public function fullname() 	{
 		if(isset($this->firstname) && isset($this->lastname)){
 			return $this->firstname." ".$this->lastname;
 		}else{
 			return "";
 		}
 	}

 	public static function authanticate($username="", $password=""){
 		global $database;
 		$username = $database->scape_value($username);
 		$password = $database->scape_value($password);

 		$sql = "SELECT * FROM tbl_users ";
 		$sql .="WHERE username = '{$username}' ";
 		$sql .="AND password = '{$password}' ";
 		$sql .="LIMIT 1";

 		$result_array = self::find_by_sql($sql);
 		return !empty($result_array) ? array_shift($result_array) : false;
 	}

	

	

 	// public function create(){
 	// 	global $database;
 	// 	$sql = "INSERT INTO ".self::table_name." (";
 	// 	$sql .= "username, password, firstname, lastname";
 	// 	$sql .= ") VALUES ( '";
 	// 	$sql .= $database->scape_value($this->username)."', '";
 	// 	$sql .= $database->scape_value($this->password)."', '";
 	// 	$sql .= $database->scape_value($this->firstname)."', '";
 	// 	$sql .= $database->scape_value($this->lastname)."' ) ";
		
		// if($database->query($sql)){
		// 	$this->id = $database->insert_id();
		// 	return true;
		// }else{
		// 	return false;
		// }
 	// }

 	// public function update(){
 	// 	global $database;
 	// 	$sql = "UPDATE ".self::table_name." SET ";
 	// 	$sql .= "username = '".$database->scape_value($this->username)."', ";
 	// 	$sql .= "password = '".$database->scape_value($this->password)."', ";
 	// 	$sql .= "firstname = '".$database->scape_value($this->firstname)."', ";
 	// 	$sql .= "lastname = '".$database->scape_value($this->lastname)."' ";
 	// 	$sql .= "WHERE id = ".$database->scape_value($this->id);

 	// 	$database->query($sql);

 	// 	return ($database->affected_rows() == 1 ) ? true : false ;
 	// }

 	// public function save(){
 	// 	return isset($this->id) ? $this->update() : $this->create() ;
 	// }

 	// public function delete(){
 	// 	global $database;
 	// 	$sql = "DELETE FROM ".self::table_name;
 	// 	$sql .= " WHERE id =".$database->scape_value($this->id);
 	// 	$sql .= " LIMIT 1";
 	// 	$database->query($sql);
 	// 	return ($database->affected_rows() == 1) ? true : false ;
 	// }
}