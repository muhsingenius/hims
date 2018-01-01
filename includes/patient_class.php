<?php


	/**
	* 
	*/
	class Patient extends Db_object {


		protected static $db_table = "patients";

		protected static $db_table_fields = array('id', 'patient_no', 'firstname', 'lastname', 'sex', 'dob', 'house_no', 'area', 'location', 'date_of_first_appointment', 'phone', 'contact_person', 'relationship', 'contact_person_phone');

		public $id;
		public $patient_no;
		public $firstname;
		public $lastname;
		public $sex;
		public $dob;
		public $house_no;
		public $area;
		public $location;
		public $date_of_first_appointment;
		public $phone;
		public $contact_person;
		public $relationship;
		public $contact_person_phone;



		public static function find_by_patient_no($patient_no) {

			$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE patient_no=$patient_no LIMIT 1");

			return !empty($the_result_array) ? array_shift($the_result_array) : false; 

		}//end of find by patient number
		
	}/// end of patient class


?>