<?php
	include_once('../dao/config.php');
    
 	$fname = $_POST['fname'];
 	$mname = $_POST['mname'];
 	$lname = $_POST['lname'];
 	$email = $_POST['email'];
    $password = $_POST['pass'];
    
		if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($email) && !empty($_POST['pass'])){
			if (strlen($email)>25){
        		echo "Length of email is too long!";
        	} else{
                if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email']))){
                        echo "Please type a valid email address";
                }else{
                    if(strlen ($_POST['pass'])<=25 && strlen ($_POST['pass'])>=6){
                        $arr = array('fname' => $fname,
                                     'mname' => $mname,
                                     'lname' => $lname,
                                     'email' => $email,
                                     'pass' => $password);
                            $res = new ExamDAO();
                            $result = $res->addUser($arr['fname'],
                                                    $arr['mname'],
                                                    $arr['lname'],
                                                    $arr['email'],
                                                    $arr['pass']);
                        
                        echo "success";
                    }else{
                        echo "Password must be between 6 and 25 characters";
                    }
                }  	
            }
		} else{
			echo "complete all field";
		}

	
?>