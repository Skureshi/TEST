<?php 

	/**
	 * Databse connection with PDO
	 */
	class DB
	{
		private $pdo;
		private $stmt;
		
		function __construct()
		{
			try{
				$this->pdo = new PDO(
			        "mysql:host=localhost;dbname=school;charset=utf8", 
			        "root", "root", [
			          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			          PDO::ATTR_EMULATE_PREPARES => false,
			        ]
			    );
			}catch(Exception $e){
				echo 'Connection failed: ' . $e->getMessage();
			}
		}

		/*
			Execute all select queries here
			$sql = Select query to run with binded variables if any
			$bindingVariable = variable value to bind in array format
			example [":var" => $value]
		*/

		function runSelect($sql, $bindingVariable = null){
			$result = false;
			try{
				$this->stmt = $this->pdo->prepare($sql);
				$this->stmt->execute($bindingVariable);
				$result = $this->stmt->fetchAll();
			}catch(Exception $e){
				echo 'Connection failed: ' . $e->getMessage();
			}
			$this->stmt = null;
			return $result;
		}

		/*
			Execute all queries here apart from SELECT
			$sql = query to run(apart from select query) with binded variables if any
			$bindingVariable = variable value to bind in array format
			example [":var" => $value]
		*/

		function queryExecute(string $sql, array $bindingVariable = null){
			try{
				$this->stmt = $this->pdo->prepare($sql);
				$this->stmt->execute($bindingVariable);
			}catch(Exception $e){
				echo 'Connection failed: ' . $e->getMessage();
			}
			$this->stmt = null;
			return true;
		}

		function __destruct(){
			if ($this->stmt!==null) { $this->stmt = null; }
    		if ($this->pdo!==null) { $this->pdo = null; }
		}

	}

?>