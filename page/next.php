<?php 	
	session_start();
	include_once('../dao/config.php');
    $ans = $_POST['option'];
    
    if(!empty($ans)){
    $_SESSION['answers'] .= "~".$_POST['option'];
    $arr = array('answer' => $ans);
    	$res = new ExamDAO();
        $result = $res->countCorrect($arr['answer']);
    	$_SESSION['next']++;
        $_SESSION['num']++;
    	header('Location: ../exampage/index.php');
    }
    else{
    	header('Location: ../exampage/index.php');
    }

?>