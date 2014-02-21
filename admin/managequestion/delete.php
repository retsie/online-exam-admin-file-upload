<?php 
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
	$id=$_REQUEST['id'];
	if (!empty($id)){
		$delete = AdminDAO::deleteChoice($id);
		$delete1 = AdminDAO::deleteQuestion($id);
		echo "<script>alert('success!');window.location.href='viewquestion.php'</script>'";		
	}else{
		echo "<script>alert('failed');window.location.href='viewquestion.php'</script>'";
	}
 ?>