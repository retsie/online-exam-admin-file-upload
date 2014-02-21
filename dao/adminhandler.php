<?php 

	class adminhandler{

		public function __construct() {
			
		}
		public function adminLog($usename, $password) {
			try{
				$result = AdminDAO::adminLog($username, $password);
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

		public function addQuest($id, $question) {
			try{
				$result = AdminDAO::addQuest($id, $question);
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

		public function addChoices($id, $opt, $is_correct, $letter){
			try{
				$result = AdminDAO::addChoices($id, $opt, $is_correct, $letter);
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