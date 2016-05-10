<?php

	namespace core;

	class DB {

		private $connection;

		public function __construct(){
			$setting = "mysql:host=localhost;dbname=Blog";
			$this->connection = new \PDO($setting, "root", "");
		}

		public function select($table, $what, $where, $orderColumn, $desc = false, $limit = [0, 30]){
			if($what){
				$values = implode(",", $what);
			}
			else{
				$values = " * ";
			}

			if($where){
				$whereSQL = " WHERE ";
				$and = "";
				$execute = [];
				foreach($where as $key => $val){
					$whereSQL .= " $and `$key` = ?";
					$and = " AND ";
					$execute[]  = $val;
				}
			}

			$request = "SELECT $values FROM `$table` $whereSQL";
			if($orderColumn){
				$order = "ORDER BY `$orderColumn` $desc $limit";
				$request .= $order;
			}
			$query = $this->connection->prepare($request);
			$query->execute($execute);
			$arr = $query->fetchAll(\PDO::FETCH_ASSOC);

			return $arr;
		}

		public function delete($table, $where){
			$whereSQL = " WHERE ";
			$and = "";
			$execute = [];
			foreach($where as $key => $val){
				$whereSQL .= " $and `$key` = ?";
				$and = " AND ";
				$execute[]  = $val;
			}
			$request = "DELETE FROM $table $whereSQL";
			$query = $this->connection->prepare($request);
			$query->execute($execute);
			return $query;
		}

		public function update($table, $where, $what){
			$execute = [];
			$setSQL = " SET ";
			if($what){
				$and = "";
				foreach($what as $key => $values){
					$setSQL .= " $and `$key` = ?";
					$and = ", ";
					$execute[]  = $values;
				}
			}
			else{
				$setSQL .= "*";
			}
			$whereSQL = " WHERE ";
			foreach($where as $key => $val){
				$whereSQL .= " `$key` = ?";
				$execute[]  = $val;
			}
			$request = "UPDATE $table $setSQL $whereSQL";
			$query = $this->connection->prepare($request);
			$query->execute($execute);
			return $query;
		}

		public function insert($table, $what){
			$coma = "";
			$bracket1 = "(";
			$bracket2 = "(";
			$execute = [];
			foreach($what as $key => $val){
				$bracket1 .= " $coma `$key` ";
				$bracket2 .= " $coma ? ";
				$coma = ", ";
				$execute[]  = $val;
			}
			$bracket1 .= ")";
			$bracket2 .= ")";
			$request = "INSERT INTO `$table` $bracket1 VALUES $bracket2";
			$query = $this->connection->prepare($request);
			$query->execute($execute);
			if($query){
				$id = $this->connection->lastInsertId();
				return $id;
			}
		}

		public function send_query($sql, $values){
			$execute = [];
			foreach($values as $val){
				$execute[] = $val;
			}
			$request = $sql;
			$query = $this->connection->prepare($request);
			$query->execute($execute);
			if(is_bool($query) || $query === 1){
				return $query;
			}
			else{
				$arr = $query->fetchAll(\PDO::FETCH_ASSOC);
				return $arr;
			}
		}

	}


