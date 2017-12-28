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
		
	}/// end of patient class


?>