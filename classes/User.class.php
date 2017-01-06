<?php
class User extends Entity {
	public static $tableName = 'user';
	public static $keyColumn = 'id';
	public $user_name;
	public $user_email;
	public $user_pass;
	public $user_status;
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
		$query = "SELECT * FROM " . self::$tableName . " WHERE user_name = '{$username}' AND user_pass = '{$password}' LIMIT 1";
		
		$result = self::$db->query ( $query );
		
		if ($result->rowCount () < 1) {
			return false;
		}
		
		$user = $result->fetchObject ( User::class );
		
		return $user;
	}
	public static function getByUsername($username) {
		$query = "SELECT * FROM " . self::$tableName . " WHERE user_name = '{$username}' LIMIT 1";
	
		$result = self::$db->query ( $query );
	
		if ($result->rowCount () < 1) {
			return false;
		}
	
		$user = $result->fetchObject ( User::class );
	
		return $user;
	}
	public static function checkMail($user_email) {
		$query = "SELECT * FROM " . self::$tableName . " WHERE user_email = '{$user_email}' LIMIT 1";
	
		$result = self::$db->query ( $query );
	
		if ($result->rowCount () < 1) {
			return false;
		}
	
		$email = $result->fetchObject ( User::class );
	
		return $email;
	}
}
