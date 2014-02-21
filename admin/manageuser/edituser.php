<?php 
	session_start();
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
    $id = $_REQUEST['id'];
    $user = AdminDAO::getUser($id);   
 ?>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<div>
			 <form method = "POST" action = "updateuser.php" >
			 	<input type = "hidden" value = "<?= $id ?>" name = "id">
			 	<table>
			 		<tr>
			 			<td>first name:</td>
			 			<td><input type = "text" value = "<?= $_SESSION['fname'] ?>" name = "fname"></td>
			 		</tr>	
			 		<tr>
			 			<td>middle name:</td>
			 			<td><input type = "text" value = "<?= $_SESSION['mname'] ?>" name = "mname"></td>
			 		</tr>
			 		<tr>
			 			<td>last name:</td>
			 			<td><input type = "text" value = "<?= $_SESSION['lname'] ?>" name = "lname"></td>
			 		</tr>
			 		<tr>
			 			<td> email:</td>
			 			<td><input type = "text" value = "<?= $_SESSION['emailadd'] ?>" name = "email"></td>
			 		</tr>
			 		<tr>
			 			<td>password:</td>
			 			<td><input type = "text" value = "<?= $_SESSION['password'] ?>" name = "password"></td>
			 		</tr>
			 		<tr>
			 			<td></td>
			 			<td><input type = "submit" value = "Update"></td>
			 		</tr>
			 	</table>	
			 </form>
		</div>
		<div><a href="viewuser.php">[back]</a></div>
	</div>
</body>
</html>
