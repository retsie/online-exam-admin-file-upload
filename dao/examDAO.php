<?php
class ExamDAO{
	public function getUserId($email){
		global $db;
		$sql = "SELECT * FROM users WHERE email = '{$email}'";
		$result = $db->query($sql);
		try{
			if($result){
				while($row = $result->fetch_assoc()){
					return $row['id'];
				}
			
			}else {
				return false;
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function examResult($score, $q, $result, $userId, $date){
		global $db;
		$sql = "INSERT INTO `examresult` (`score`, `questionData`, `anserData`, `date`, `id_fk`) VALUES ('$score', '$q', '$result',  '$date', '$userId')";
			$result = $db->query($sql);	
			try{
				if($result){
					echo "success";
					return $result;
				}else{
					 return false;
				}	
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}

	}

	public function addUser($fname, $mname, $lname, $email, $pass){
	global $db;
	$code = sha1($pass);
	$res = $db->query("SELECT * FROM users WHERE email IN ('$email')");	
	try{
		if($res->num_rows >0){
			echo "Email" ." ". $email ." ". "already taken\n"."";
		}else{
		    $sql = "INSERT INTO `examination`.`users` (`id`, `fname`, 
		    				   	`mname`, `lname`, `email`, `password`) 
		     	  VALUES (NULL, '$fname', '$mname', '$lname', '$email', 
		     	  				'$code')";
				$result = $db->query($sql);
				if($sql){
					echo "success";
					return $result;
				}else{
					echo "failed ";
				}		
			}
		} catch(Exception $e){
				error_log($e->getMessage());
				return false;
		}
	}

	public function logUser($email, $password){
		global $db;
		$sql="SELECT * FROM users WHERE email = '{$email}' AND 
										password = '{$password}'";
		$result = $db->query($sql);
		try{
			if($result->num_rows > 0){
				$_SESSION['email'] = $email;
				echo "<script>alert('login Succesfully');window.location.href='exampage/index.php'</script>'";
			}else{
				echo "email and password not match";
			}	
		} catch(Exception $e){
				error_log($e->getMessage());
				return false;
		}
	}

	public static function getQuestion($id){
		global $db;

			$sql = "SELECT distinct question FROM question_tb WHERE id = '{$id}'";
			$result = $db->query($sql);
			try{
				if($result){
					while($row = $result->fetch_assoc()){
						return $row['question'];
					}
				
				}else {
					return false;
				}
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}	
	}

	public static function getChoices($id){
		global $db;
			$sql = "SELECT  * FROM choices_tb WHERE id_fk = '{$id}'";
			$result = $db->query($sql);
			try{
				if ($result->num_rows > 0){
					$ans = array();
					for ($i = 0; $i < $result->num_rows; $i++) {
						$row = $result->fetch_assoc();
						$ans[$row['id']] = $row['answer'];
					}
					$result->free();
					return $ans;
				}else {
				return false;
				}	
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}
	}

	public static function countCorrect($answer){
		global $db;
		$sql = "SELECT  * FROM choices_tb WHERE answer = '{$answer}' and is_correct = '1'";
		$result = $db->query($sql);
		try{
			if($result->num_rows > 0){
				session_start();
				$_SESSION['score']++ ;
			}else{
				return false;
			}
		} catch(Exception $e){
				error_log($e->getMessage());
				return false;
		}
	}

	public static function compareAnswer($id){
		global $db;
		$sql = "SELECT answer FROM `choices_tb` WHERE `is_correct` = '1' AND `id_fk` = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$ans = array();
				for ($i = 0; $i < $result->num_rows; $i++) {
					$row = $result->fetch_assoc();
					$ans[$row['id']] = $row['answer'];
				}
				$result->free();
				return $ans;
			}else {
			return false;
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}


	public static function questionNumbers() {
		global $db;
		$sql = "SELECT MAX(id) AS id
				FROM question_tb";
		$result = $db->query($sql);
		try{
			if ($result) {
				$row = $result->fetch_assoc();
				return $row['id'];
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function countUser() {
		global $db;
		$sql = "SELECT MAX(id) AS id
				FROM users";
		$result = $db->query($sql);
		try{
			if ($result) {
				$row = $result->fetch_assoc();
				return $row['id'];
			} else {
				return false;
			}
		} catch(Exception $e){
				error_log($e->getMessage());
				return false;
		}
	}

	public static function getUser($id){
		global $db;

			$sql = "SELECT * FROM users WHERE id = '{$id}'";
			$result = $db->query($sql);
			try{
				if($result){
					while($row = $result->fetch_assoc()){
						$_SESSION['fname'] = $row['fname'];
						$_SESSION['mname'] = $row['mname'];
						$_SESSION['lname'] = $row['lname'];
						$_SESSION['emailadd'] = $row['email'];
						$_SESSION['password'] = $row['password'];
						return $result;
					}
				
				}else {
					return false;
				}	
			} catch(Exception $e){
				error_log($e->getMessage());
				return false;
			}
	}
}

?>