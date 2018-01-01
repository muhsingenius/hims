<?php
	
	class Appointment extends Db_object {
		
		protected static $db_table = "appointments";

		protected static $db_table_fields = array('id', 'patient_no', 'appointment_date', 'reason', 'bp', 'weight', 'temperature', 'primary_complain', 'symptoms', 'no_of_days', 'physical_exam', 'diagnosis', 'end_date', 'status');

		public $id;
		public $patient_no;
		public $appointment_date;
		public $reason;
		public $bp;
		public $weight;
		public $temperature;
		public $primary_complain;
		public $symptoms;
		public $no_of_days;
		public $physical_exam;
		public $diagnosis;
		public $end_date;
		public $status;



		/*public static function find_by_patient_no($patient_no) {

			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE patient_no=$patient_no");

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}//end of find by patient_number*/

	}// end of class

?>