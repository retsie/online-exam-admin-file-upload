<?php
	session_start();
	include_once('../dao/config.php');
   	$max = ExamDAO::questionNumbers();
    $opt = array(null, 'A', 'B', 'C', 'D' );
    $i = 0;
    $key = $max + 1;
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
	<div>
		<div id = "signin">
			<?php
				 if(isset($_SESSION['email']) == ""){
						header('Location: ../index.php'); 
				 }else{
						echo "Sign in as ".$_SESSION['email'];
				 }
			  ?>
			  <div id = "logout"><a href="../page/logout.php">Logout</a></div>
		</div>
		<?php if($_SESSION['num'] >= $key){
				header('Location: result.php');
		}else{ 
				if($_SESSION['num'] < $key){

					$question = ExamDAO::getQuestion($_SESSION['num']);
					$choices = ExamDAO::getChoices($_SESSION['num']);
					if($question == false || $choices == false){
						$_SESSION['num']++;
						header('Location: index.php');
					}else{
						$_SESSION['recQuest'] .= "~".$question;

			?>
		<hr>
		<div id = "questField">
		<div id = "examQuest">
			<?php echo $question; ?>
		</div>
		<div>
			<form method = "POST" action = "../page/next.php">
				<input type = "hidden" value = "<?= $answers ?>" name = "answer">
			<?php foreach($choices as $id => $choices): $i++ ?>
					<table id = "examAns">
						<tr>
							<td><input type = "radio" value = "<?= $choices ?>" name = "option"></td>
							<td><?= $opt[$i].". "?><?= $choices ?></td>
						</tr>
					</table><br>
			<?php  endforeach ?>
					<button id =  "nextbtn">NEXT</button>
			</form>
		</div>
		</div>
		<?php }
						
					}
				}
?>

		
	</div>
</body>
<footer>Copyright © 2014–2015 Online Exam®</footer>
</html>