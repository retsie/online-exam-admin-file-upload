<?php
class AdminDAO{
	public function adminLog($username, $password){
		global $db;
	
		$sql="SELECT * FROM admin WHERE username = '{$username}' AND 
										password = '{$password}'";
		$result = $db->query($sql);
		try{
			if($result->num_rows > 0){
				$_SESSION['admin'] = $username;
				echo "<script>alert('login Succesfully');window.location.href='../admin/adminpage/main.php'</script>'";
			}else{
				echo "invalid!";
				return false;
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function deleteChoice($id){
		global $db;
		$sql = $db->query("DELETE FROM choices_tb where `id_fk` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function deleteQuestion($id){
		global $db;
		$sql = $db->query("DELETE FROM question_tb where `id` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}
			else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function updateChoice($id, $opt, $is_correct, $letter){
		global $db;
		$sql = $db->query("UPDATE `examination`.`choices_tb` 
							SET `answer` = '{$opt}', `is_correct` = '{$is_correct}'
							WHERE `id_fk` = '$id' AND `letter` = '$letter'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
	public function updateQuest($id, $question){	
		global $db;
		$sql = $db->query("UPDATE `examination`.`question_tb` 
							SET `question` = '{$question}'
							WHERE `id` ='{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function updateUser($id, $fname, $mname, $lname, $mail, $password){	
		global $db;
		$sql = $db->query("UPDATE `users` SET `fname` = '{$fname}', 
											  `mname` = '{$mname}', 
											  `lname` = '{$lname}', 
											  `email` = '{$mail}', 
											  `password` = '{$password}'
				WHERE `id` ='{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
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

	public function addQuest($id, $question){
		global $db;
			$sql = "INSERT INTO `examination`.`question_tb` (`id`, `question`) VALUES ('$id', '$question')";
			$result = $db->query($sql);	
		try{
			if($sql){
				echo "success";
				return $result;
			}else{
				echo "failed ";
			}	
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}
	public function addChoices($id, $opt, $is_correct, $letter){
		global $db;
			$sql = "INSERT INTO `examination`.`choices_tb` (`id`, `answer`, `letter`, `is_correct`, id_fk) 
					VALUES (null, '$opt', '$letter', '$is_correct', '$id')";
			$result = $db->query($sql);	
		try{
			if($result){
				echo "success";
				return $result;
			}else{
				echo "failed ";
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

	public static function viewUser($id) {
		global $db;
		$sql = "SELECT * FROM users WHERE id = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return $row['fname']." ".$row['mname']." ".$row['lname']."<br>".$row['email']."<br>";
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function viewResult($id) {
		global $db;
		$sql = "SELECT * FROM examresult WHERE id_fk = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return $row['score'];
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function viewAll($id) {
		global $db;
		$sql = "SELECT * FROM users u JOIN examresult e ON ( u.id = e.id_fk ) WHERE u.id = '{$id}'";
		
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				  return "<table>
				  			<tr>
				  				<td width = 200px>date:</td><td>".$row['date']."</td>
				  			</tr>
				  			<tr>
				  				<td>first name:</td><td>".$row['fname']."</td>
				  			</tr>
				  			<tr>
				  				<td>middle name:</td><td>".$row['mname']."</td>
				  			</tr>
				  			<tr>
				  				<td>last name:</td><td>".$row['lname']."</td>
				  			</tr>
				  			<tr>
				  				<td>email:</td><td>".$row['email']."</td>
				  			</tr>
				  			<tr>
				  				<td>score:</td><td>".$row['score']."</td>
				  			</tr>
				  		</table><br><br>";	
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function viewAns($id) {
		global $db;
		$sql = "SELECT * FROM examresult WHERE id_fk = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return $row['AnserData'];
			} else {
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public static function viewQuest($id) {
		global $db;
		$sql = "SELECT * FROM examresult WHERE id_fk = '{$id}'";
		$result = $db->query($sql);
		try{
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return $row['questionData'];

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

	public function deleteExamResult($id){
		global $db;
		$sql = $db->query("DELETE FROM examresult where `id_fk` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

	public function deleteUser($id){
		global $db;
		$sql = $db->query("DELETE FROM users where `id` = '{$id}'");
		$result = $db->query($sql);
		try{
			if($result){
				return $result;
			}
			else{
				return false;
			}
		} catch(Exception $e){
			error_log($e->getMessage());
			return false;
		}
	}

}

?>