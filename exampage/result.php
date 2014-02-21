<?php
	session_start();
	include_once('../dao/config.php');
    include_once('../dao/examDAO.php');
    $max = ExamDAO::questionNumbers();
    $email = $_SESSION['email'];
    if($_SESSION['num'] <= $max){
    	header('Location: index.php');
    }else{
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
	<div>
		<div id = "signin">
			<?php echo "Sign in as ".$email; ?>
			<div id = "logout"><a href="../page/logout.php">Logout</a></div>
		</div>
		<hr>
		<div id = "questField">
		<?php echo "Your Answers:"."<br>";
			$ans = explode("~", $_SESSION['answers']);
				for($i = 1, $j = 0; $i<$max + 1; $i++ ){
					$question = ExamDAO::getQuestion($i);
					$choices = ExamDAO::getChoices($i);
					if($question == false || $choices == false){
						
					}else{
						$j++;
						echo "\n".$i."). ".$question ." ";
						echo " ".$ans[$j]."<br>"; 
					}
				}
	}
		 ?>
	
	<div> 
		<?php 
		      $dt = new DateTime();
			  $date = $dt->format('Y-m-d H:i:s');
			  $score = $_SESSION['score'];
			  echo "Your score is: ".$score."<br>";
			  $userId = ExamDAO::getUserId($email);
			  echo $_SESSION['answers'];
			  $q = $_SESSION['recQuest'];
			  $result = $_SESSION['answers'];
			  if(!empty($userId)){
			  		ExamDAO::examResult($score, $q, $result, $userId, $date);
			  }
		 ?>
	</div>
	</div>
</div>
</body>
</html>