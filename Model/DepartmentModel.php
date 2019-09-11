<?php  
	
	class Department extends DB
	{
		
		protected $table = 'department';
		protected $conn;

		function __construct(DB $db)
		{
			$this->conn = $db;
		}

		function select()
		{
			$query = "SELECT * FROM $this->table";
			return $this->conn->runSelect($query);
		}
		
	}

?>