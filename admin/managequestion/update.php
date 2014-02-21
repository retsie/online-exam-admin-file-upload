<?php 
	include_once('../../dao/config.php');
   	$letters = array(null, 'A', 'B', 'C', 'D');
    $q = $_POST['question'];
    $id = $_POST['id'];
    $question = AdminDAO::updateQuest($id, $q);
    	for($i = 1; $i<5; $i++){
    		$opt = $_POST['opt'.$i];
    		$is_correct = $_POST['correct'.$i];
    	 	$letter = $letters[$i];
            if(!empty($opt)){
    	 	     $update = AdminDAO::updateChoice($id, $opt, $is_correct, $letter);
                 header('Location: viewquestion.php');
            }else{
                header('Location: edit.php');
            }	
        }
 ?>