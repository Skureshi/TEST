<?php  
	
	class Teacher extends DB
	{
		
		protected $conn;

		function __construct(DB $db)
		{
			$this->conn = $db;
		}
		
	}

?>