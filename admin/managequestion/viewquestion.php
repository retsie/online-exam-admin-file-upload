<?php
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
    session_start();
    $max = AdminDAO::questionNumbers();

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
		</div>
		<div> 
			<a href="../adminpage/logout.php">[logout]</a>
		</div>
		<div> 
			<a href="../adminpage/main.php">[Main  Page]</a>
		</div>
		<div>
			<a href="add.php">[add question]</a>
		</div>
		<div>
				 
				 <?php

		 for($i = 1; $i<=$max +1; $i++ ){ 
		 		$j = 0;
				$question = AdminDAO::getQuestion($i);
				$choices = AdminDAO::getChoices($i);
				if($question == false || $choices == false){
					continue;
				}
				else{
		?>
				<table id = "view">
				<tr>
					<td>Question:</td>
					<td id = "quest"> <?= $question ?></td>
					<td><?= $i ?><a href="edit.php?id=<?php echo $i; ?>">edit</a>|<a href="delete.php?id=<?php echo $i; ?>"  onclick="return confirm('Are you sure?');">Delete</a></td>
				</tr>
					<?php
					foreach($choices as $value => $choices){ $j++;
					?>
				<tr>
				<td><?php echo "option"." ".$j; ?></td>	
					<td><?= $choices ?></td> 
					<td></td>	
				</tr>
					<?php
			  		}
			  		?>
			  	<tr>
			  		<td></td><td></td>
			  	</tr>
			</table>
			<?php

				}
			}
			?>		 
		</div> 
	</div>
</body>
</html>