<?php

	class Session {


		private $signed_in = false;
		public $user_id;
		public $message;
		public $role;
		public $username;
		public $full_name;

		function __construct() {
			session_start();
			$this->check_the_login();
			$this->check_message();

		}/////  __construct

		public function message($msg="") {
			if(!empty($msg)) {
				$_SESSION['message'] = $msg;

			}else {

				return $this->message;
			}
		}/// message


		private function check_message() {

			if(isset($_SESSION['message'])) {
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']); // remove message after page refresh

			}else {

				$this->message = "";
			}
		}// check message


		public function is_signed_in() {

			return $this->signed_in;
		}// is signed in//// this is getter



		public function login($user) {

			if($user) {
				$this->user_id   = $_SESSION['user_id']    = $user->id;  ////id from staff class in staff.php
				$this->role      = $_SESSION['role']       =$user->role;
				$this->username  = $_SESSION['username']   =$user->username;
				$this->full_name = $_SESSION['full_name']  = $user->full_name;

				$this->signed_in = true;
			}
		}/// login



		public function logout() {

			unset($_SESSION['user_id']);
			unset($this->user_id);
			$this->signed_in = false;

		}/// logout


		//check if session user_id is set
		private function check_the_login() {

			if(isset($_SESSION['user_id'])) {

				$this->user_id   = $_SESSION['user_id'];
				$this->role      = $_SESSION['role'];/////////
				$this->username  = $_SESSION['username'];
				$this->full_name = $_SESSION['full_name'];
				$this->signed_in = true;

			}else {

				unset($this->user_id);
				$this->signed_in = false;
			}

		}/////check the login


	}

	$session = new Session();

?>