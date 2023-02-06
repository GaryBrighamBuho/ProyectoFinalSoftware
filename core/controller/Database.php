<?php
class Database {

	private $user;
	private $pass;
	private $host;
	private $ddbb;
	public static $db;
	public static $con;
	function Database(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="bdsistemapsicologia";
	}

	function connect(){
		$con = new mysqli("localhost", "root", "", "bdsistemapsicologia");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
