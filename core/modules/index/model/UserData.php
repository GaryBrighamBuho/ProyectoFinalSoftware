<?php
class UserData {
	public $name;
	public $lastname;
	public $username;
	public $password;
	public $is_active;
	public $created_at;
	public $tipo;
	public $email;
	public $id;

	public static $tablename = "user";

	public function UserData(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "0";
		$this->email = "";
		$this->tipo = 0;
		$this->created_at = 'NOW()';
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name, lastname, username, password, email, is_active, tipo, created_at) ";
		$sql .= "value ('$this->name', '$this->lastname', '$this->username', '$this->password', '$this->email' , $this->is_active, $this->tipo, NOW())";
		echo $sql;
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name='$this->name',lastname='$this->lastname',username='$this->username',password='$this->password',is_active=$this->is_active,tipo=$this->tipo where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getPacientById($id){
		$sql = "SELECT TP.id FROM user TU inner join pacient TP WHERE TU.name = TP.name and TU.lastname = TP.lastname and TU.id = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
	public static function getMedicById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$sql = "SELECT TM.id FROM user TU inner join medic TM WHERE TU.name = TM.name and TU.lastname = TM.lastname and TU.id = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>