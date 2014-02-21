<?php 
	include_once('../../dao/config.php');
    $max = AdminDAO::questionNumbers();
    $key = $max + 1;	
 ?>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<div>
			<form method = "POST" action = "addchoices.php">
				Question:<input type = "text" name = "addquest"><br>
				Foreign Key:<input type = "hidden" value = "<?php echo $key; ?>" name = "fk"><br>
				<?php 
				for($i=1; $i<5; $i++){ $choice = "choice".$i; $cor = "cor".$i; ?>
					Choices<?= $i ?>:<input type = "text" name = "<?php echo $choice; ?>">
									 <input type = "radio" value = "0" name = "<?php echo $cor; ?>">
									 <input type = "radio" value = "1" name = "<?php echo $cor; ?>"><br>
			<?php } ?>
							<input type = "submit" value = "add">
			</form>
		</div>
		<div><a href="viewquestion.php">[back]</a></div>
	</div>

</body>
</html>