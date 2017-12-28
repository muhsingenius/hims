<?php
	
	class Role extends Db_object {
		
			protected static $db_table = "user_roles";

			protected static $db_table_fields = array('id', 'role');

		public $id;
		public $role;

	}// end of class
?>