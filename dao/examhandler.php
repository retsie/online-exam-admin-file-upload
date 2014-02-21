<?php 

	class examhandler{

		public function __construct() {
			
		}
		public function addUser($fname, $mname, $lname, $email, $password) {
			try{

				if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $email))){
                        return false;
                }
				$result = ExamDAO::addUser($fname, $mname, $lname, $email, $password);
				if($result !== false){	
					return true;
				}else{
					return false;
				}
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}
		}

		public function logUser($fname, $mname, $lname, $email, $password) {
			try{
				$result = ExamDAO::logUser($email, $password);
				if($result !== false){	
					return true;
				}else{
					return false;
				}
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}
		}

		public function countCorrect($answer) {
			try{
				$result = ExamDAO::countCorrect($answer);
				if($result !== false){	
					return true;
				}else{
					return false;
				}
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}
		}

	}
 ?>