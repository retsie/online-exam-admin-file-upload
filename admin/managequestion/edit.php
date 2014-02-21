<?php 
	session_start();
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
	$id=$_REQUEST['id'];
	$question = AdminDAO::getQuestion($id);
	$choices = AdminDAO::getChoices($id);
	$i = 0;
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div>
 		<div>
 			<form method = "POST" action = "update.php">
 				<input type = "hidden" value = "<?= $id ?>" name = "id">
 				<input type = "text" value = "<?= $question ?>" name = "question"><br>
 				<?php foreach($choices as $value => $choices){ $i++; $correct = "correct".$i;  $opt = "opt".$i; ?>
				<input type = "text" value = "<?= $choices ?>" name = "<?= $opt ?>">
				<input type = "radio" value = "0" name = "<?= $correct ?>">
				<input type = "radio" value = "1" name = "<?= $correct ?>"><br>
			  	<?php	}
			  		?>
				<input type = "submit" value = "Update">
 			</form>
 		</div>	
 		<div><a href="viewquestion.php">[back]</a></div>
 	</div>
 
 </body>
 </html>