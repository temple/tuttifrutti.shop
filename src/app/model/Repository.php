<?php

namespace model;

class Repository{

	protected $db_connection;

	public function __construct(\PDO $db_connection)
	{
		$this->db_connection = $db_connection;
	}

	public function findAll(string $tablename) : array
	{
		$sql = "SELECT * FROM $tablename";
		$stmt = $this->db_connection->prepare($sql);
		$stmt->execute();
		$result = ((array)$stmt->fetchAll(\PDO::FETCH_ASSOC));
		return $result;
	}

	public function findOne(string $tablename, int $id) : array
	{
		return $this->findBy($tablename, ['id'=>$id]);
	}

	public function findBy(string $tablename, array $criteria = [] ) : array
	{
		$sql = "SELECT * FROM $tablename";
		$flag = false;
		foreach($criteria as $col => $value){
			$sql .= "\n ".($flag ? "AND " : "WHERE ");

			if (is_null($value)){
				$sql .= "$col IS NULL";
			}elseif (is_string($value)){
				$sql .= "$col LIKE '".mysql_real_escape_string($value)."'";
			}elseif (is_numeric($value)){
				$sql .= "$col = $value";
			}elseif (is_bool($value)){
				$sql .= "$col IS ".($value ? "TRUE" : "FALSE");
			}
			$flag = true;
		}

		$stmt = $this->db_connection->prepare($sql);
		$stmt->execute();
		return ((array)$stmt->fetchAll(PDO::FETCH_ASSOC));
	}
}