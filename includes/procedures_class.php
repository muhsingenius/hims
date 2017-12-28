<?php
	
	class Procedure extends Db_object {
		
			protected static $db_table = "procedures";

			protected static $db_table_fields = array('id', 'procedure_name', 'cost',);

		public $id;
		public $procedure;
		public $procedure_name;
		public $cost;

	}// end of class
?>