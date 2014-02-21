<?php 
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
	$id=$_REQUEST['id'];
	if (!empty($id)){
		$delete = AdminDAO::deleteUser($id);
		$delete1 = AdminDAO::deleteExamResult($id);
		echo "<script>alert('success!');window.location.href='viewuser.php'</script>'";		
	}else{
		echo "<script>alert('failed');window.location.href='viewuser.php'</script>'";
	}
 ?>