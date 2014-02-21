<?php 
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $mail = $_POST['email'];
    $password = sha1($_POST['password']);

    if(!empty($fname)&& !empty($mname)&& !empty($lname)&& !empty($mail)&& !empty($password)){
    	AdminDAO::updateUser($id, $fname, $mname, $lname, $mail, $password);
    	header('Location: viewuser.php');

    }
    else{
    	echo "<script>alert('failed');window.location.href='edituser.php'</script>'";
    }
 ?>