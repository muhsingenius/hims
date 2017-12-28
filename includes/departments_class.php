<?php
	
	class Department extends Db_object {
		
			protected static $db_table = "departments";

			protected static $db_table_fields = array('id', 'department');

		public $id;
		public $department;

	}// end of class
?>