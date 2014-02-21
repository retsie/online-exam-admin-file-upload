<?php 
	session_start();
	 if(isset($_SESSION['admin']) != null){
						header('Location: main.php'); 
				 }else{
						echo "Login Page";
				 }
 ?>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<div>
		<form method = "POST" action = "adminpage/adminlog.php" id = "logForm">
			Username<input type = "text" placeholder = "Username" name = "username" id = "userlog">
			Password<input type = "password" placeholder = "Password" name = "password" id = "passlog">
			<button id = "loginbtn">[login]</button>
		</form>	
	</div>
	<div id = "warning"></div>
</div>
<script type="text/javascript" src="../assets/js/jquery.1.10.2.js"></script>
<script type="text/javascript" src="../assets/js/log.js"></script>
</body>
</html>