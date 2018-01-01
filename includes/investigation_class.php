<?php
	
	class Investigation extends Db_object {
		
		protected static $db_table = "investigations";

		protected static $db_table_fields = array('id','date', 'time', 'patient', 'appointment', 'doctor', 'primary_complain', 'symptoms', 'no_of_days', 'physical_exam', 'diagnosis');

		public $id;
		public $date;
		public $time;
		public $patient;
		public $appointment;
		public $doctor;
		public $primary_complain;
		public $symptoms;
		public $no_of_days;
		public $physical_exam;
		public $diagnosis;


		public static function find_by_patient_no($patient_no) {

			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE patient=$patient_no LIMIT 1");

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}//end of find by patient number


	}// end of class

?>