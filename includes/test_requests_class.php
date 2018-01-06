<?php
	
	class Test_request extends Db_object {
		
			protected static $db_table = "test_requests";

			protected static $db_table_fields = array('id', 'date', 'request_time', 'patient', 'appointment', 'doctor', 'test', 'status', 'end_time');

		public $id;
		public $date;
		public $request_time;
		public $patient;
		public $appointment;
		public $doctor;
		public $test;
		public $status;
		public $end_time;

		public static function find_by_patient_no($patient_no) {

			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE patient=$patient_no LIMIT 1");

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}//end of find by patient number

	}// end of class
?>