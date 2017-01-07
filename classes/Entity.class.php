<?php
class Entity {
	protected static $db;
	public static function get($id = 1) {
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$className = get_called_class ();
		$q = "SELECT * FROM {$tableName} WHERE {$keyColumn} = {$id}";
		$q = self::$db->query ( $q );
		$obj = $q->fetchObject ( $className );
		return $obj;
	}
	public static function getAll() {
		$tableName = static::$tableName;
		$q = self::$db->query ( "SELECT * FROM {$tableName}" );
		$postArr = $q->fetchAll ();
		return $postArr;
	}
	public static function remove($id) {
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$q = self::$db->query ( "DELETE FROM {$tableName} WHERE {$keyColumn} = {$id}" );
	}
	/*public function insert() {
		$tableName = static::$tableName;
		$q = "INSERT INTO {$tableName} (";
		$vel = '';
		foreach ( $this as $k => $v ) {
			$q .= $k . ",";
			$vel .= "'" . $v . "', ";
		}
		$q = trim ( $q, ', ' );
		$q .= ") VALUES (";
		$q .= $vel;
		$q = trim ( $q, ', ' );
		$q .= ")";
		
		return self::$db->query ( $q );
	}*/
	public static function update($id, $params = null) {
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$qtest = "UPDATE articles SET title='novi naslov', content = 'Novi sadrzaj' WHERE id=1 ";
		$q = "UPDATE {$tableName} SET";
		$keys = array_keys ( $params );
		$values = array_values ( $params );
		foreach ( $keys as $k ) {
			$q .= $k . "= ?, ";
		}
		$q = trim ( $q, ', ' ) . "WHERE {$keyColumn} = ?";
		$stmt = self::$db->prepare ( $q );
		$n = 1;
		foreach ( $values as $v ) {
			$stmt->bindValue ( $n, $v );
			$n ++;
		}
		$stmt->bindValue ( $n, $id );
		$stmt->execute ();
	}
	public static function init() {
		self::$db = Connect::getInstance ();
	}
	
}
Entity::init ();