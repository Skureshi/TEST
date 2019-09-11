<?php  
	
	class RelDepartmentSubject extends DB
	{
		
		protected $conn;

		function __construct(DB $db)
		{
			$this->conn = $db;
		}
		
	}

?>