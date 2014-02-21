<?php 
	session_start();
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
	$count = AdminDAO::countUser(); 
 ?>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
 </head>
 <body>
 	<div>
 		<?php
		 if(isset($_SESSION['admin']) == ""){
						header('Location: ../index.php'); 
				 }else{
						echo "Sign in as ".$_SESSION['admin'];
				 }
				 ?>
				 <a href="../adminpage/logout.php">[logout]</a><br>
				 <a href="../adminpage/main.php">[Main  Page]</a>
 		<?php 
 			for($i = 1; $i <= $count; $i++){ 
		$view = AdminDAO::viewUser($i);
		$viewResult = AdminDAO::viewResult($i);
		if($view == false ){
			continue;
		}else{
			?>
 			<table id = "view" >
 				<tr>
 					<td id = "quest"> <a href = "view.php?id=<?php echo $i; ?>"><?php
							echo $view;
						?>
					</a>
					</td>
					<td width = 100px>
						<a href = "edituser.php?id=<?php echo $i; ?>">edit</a>|
						<a href = "deleteuser.php?id=<?php echo $i; ?>">delete</a>
					</td>
				</tr>
			</table> <?php
		}
	}
 		 ?>
 	</div>
 
 </body>
 </html>