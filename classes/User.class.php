<?php
class User extends Entity {
	public static $tableName = 'users';
	public static $keyColumn = 'id';
	public $email;
	public $password;
	public $userName;
	//public $user_status;
	public $id;
	
	/**
	 * This method retursn a User object for the given username and password,or
	 * false if not found.
	 *
	 * @param string $username        	
	 * @param string $password        	
	 * @return boolean|User
	 */
	public static function getByUsernameAndPassword($username, $password) {
		$query = "SELECT * FROM " . self::$tableName . " WHERE email = '{$username}' AND password = '{$password}' LIMIT 1";
		
		$result = self::$db->query ( $query );
		
		if ($result->rowCount () < 1) {
			return false;
		}
		
		$user = $result->fetchObject ( User::class );
		
		return $user;
				
	}

	public static  function insert($email,$userName,$password) {
		$tableName = static::$tableName;
		$query = "INSERT INTO ". self::$tableName ." (email,password,userName) VALUES ('{$email}', '{$userName}','{$password}')";
		$stmt = self::$db->prepare ( $query );
		return $stmt->execute ();
		
	
	}
	public static function getUsers(){
		$tableName = static::$tableName;
		$query = self::$db->query ( "SELECT * FROM {$tableName}" );
		$postArr = $query->fetchAll ();
		return $postArr;
		
	}
	public static function deleteUser($id){
		$query = "DELETE FROM".self::$tableName."WHERE '{$id}'";
		$stmt = self::$db->prepare ( $query );
		return $stmt->execute ();
	
	}
}