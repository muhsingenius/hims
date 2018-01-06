<?php
	
	class Lat_tests extends Db_object {
		
			protected static $db_table = "lab_tests";

			protected static $db_table_fields = array('id', 'test_name', 'description', 'test_sample', 'fee');

		public $id;
		public $test_name;
		public $description;
		public $test_sample;
		public $fee;

	}// end of class
?>