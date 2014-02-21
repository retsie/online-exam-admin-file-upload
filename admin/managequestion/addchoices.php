<?php 
	include_once('../../dao/config.php');

    $addQ = $_POST['addquest'];
    
    $letters = array(null, 'A', 'B', 'C', 'D');
    $id = $_POST['fk'];
    $res = new AdminDAO();
    $array = array('id' => $id, 'addQ' => $addQ);
    $res->addQuest($array['id'], $array['addQ']);
    for($i = 1; $i<5; $i++){
    	$opt = $_POST['choice'.$i];
    	$is_correct = $_POST['cor'.$i];
    	$letter = $letters[$i];
    	if(!empty($opt)&& !empty($letter)&& !empty($id) && $is_correct != null){
            $arr = array('id' => $id, 'opt' => $opt, 'is_correct' => $is_correct, 'letter' => $letter);
    		$res->addChoices($arr['id'], $arr['opt'], $arr['is_correct'], $arr['letter']);
            header('Location: viewquestion.php');
    	}else{
            echo "<script>alert('failed');window.location.href='add.php'</script>'";
        }
    }

?>