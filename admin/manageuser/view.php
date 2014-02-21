<?php 
	include_once('../../dao/config.php');
    include_once('../../dao/adminDAO.php');
    $id = $_REQUEST['id'];
    $view = AdminDAO::viewAll($id);
    $viewAns = AdminDAO::viewAns($id);
    $viewQuest = AdminDAO::viewQuest($id);
    $ans = explode("~", $viewAns);
	$q = explode("~", $viewQuest);
   ?>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<div>
			<?php echo $view; ?>
		</div>
		<div>
			<table>
				<tr>
					<td>Question</td>
					<td>Your answers</td>	
				</tr>
				<tr>
					<td width = 200px><?php foreach($q as $data => $q){ echo $q."<br>"; } ?></td>
					<td><?php foreach($ans as $data => $ans){ echo $ans."<br>"; }?></td>
				</tr>
			</table>
		</div>
		<div><a href="viewuser.php">[back]</a></div>
	</div>
</body>
</html>