<?php
	session_start();
	include_once('../dao/config.php');
    include_once('../dao/examDAO.php');
 	$_SESSION['next'] = 1;
 	$_SESSION['answers'] = "";
 	$_SESSION['score'] = null;
 	$_SESSION['points'] = 0;
 	$_SESSION['num'] = 1;
 	$_SESSION['recQuest'] = null;
 	$email = mysql_real_escape_string($_POST['userlog']);
 	$password = mysql_real_escape_string(sha1($_POST['passlog']));

	if((!empty($email))&&(!empty($password))){
		$arr = array('email' => $email, 'password' => $password);
		$res = new ExamDAO();
        $result = $res->logUser($arr['email'], $arr['password']);
		
	}else{
		echo "failed to login -from php";
	}
	
?>