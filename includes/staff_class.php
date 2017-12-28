<?php

	class Staff extends Db_object {


		protected static $db_table = "staff";

		protected static $db_table_fields = array('full_name', 'sex', 'department', 'will_sign_in', 'username', 'password', 'role');
		public $id;
		public $full_name;
		public $sex;
		public $department;
		public $will_sign_in;
		public $username;
		public $password;
		public $role;

		

		public static function verify_staff($username, $password) {

			global $database;

			$username = $database->escape_string($username);
			$password = $database->escape_string($password);

			$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
			$sql .= "username = '{$username}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";

			$the_result_array = self::find_by_query($sql);

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}/// end of verify_user


		

	}//end of class

?>