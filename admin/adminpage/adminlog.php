<?php 
	session_start();
	include_once('../../dao/config.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        $arr = array('username' => $username, 'password' => $password);
        $res = new AdminDAO();
    	$res->adminLog($arr['username'], $arr['password']);
    }else{
    	echo "<script>alert('failed');window.location.href='../index.php'</script>'";
    }


 ?>