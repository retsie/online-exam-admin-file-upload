<?php 
	session_start();

 ?>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
 </head>
 <body>
 	<div>
 		<div>
 				<?php
		 if(isset($_SESSION['admin']) == ""){
						header('Location: ../index.php'); 
				 }else{
						echo "Sign in as ".$_SESSION['admin'];
				 }
				 ?>
				 <a href="logout.php">[logout]</a>
 		</div>
 		<div ><a href="../managequestion/viewquestion.php" id = "viewquestion">view question</a></div>
 		<div ><a href="../manageuser/viewuser.php" id = "viewuser">view user</a></div>
 		<div>
 			<form action="upload_file.php" method="post" enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
 		</div>
 	</div>
 </body>
 </html>