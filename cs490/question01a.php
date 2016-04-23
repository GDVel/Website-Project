<?php

//check if the question type and user id is specified
//echo "start";
if(isset($_POST['question_type'],$_POST['user_id'])){
	echo 'two values are set';
	
	$type_question=$_POST['question_type'];
	$user_idT=$_POST['user_id'];
	echo $user_idT;
	//MULTIPLE CHOICE 	
	if ($type_question == 'mc'){ echo "one";		
		if(isset($_POST['question'], $_POST['option01'], $_POST['option02'], $_POST['option03'], $_POST['option04'], $_POST['ans'])){
				//insert query
				$a=$_POST['option01'];
				$b=$_POST['option02'];
				$c=$_POST['option03'];
				$d=$_POST['option04'];
				$sol=$_POST['ans'];
				echo $question;
				echo $a;
				echo $b;
				echo $c;
				echo $d;
				echo $sol;

				$sql= "insert into CS490_questions ('MCTF_set', 'question', 'opt1', 'opt2', 'opt3', 'opt4', 'ans') VALUES(1,'$type_question', '$a', '$b', '$c', '$d', '$sol')";
				$query=mysql_query($sql);
echo "start";
		}
		else {
			echo "please post the multiple choice entry correctly!";
		}
	}
	echo "succes";
}
	
/**	
	//TRUE/FALSE  
	if ($type_question=='tf'){
		
		if(isset($_POST['question'], $_POST['ans'])){
			//insert query
			
		} else {
			echo "please post the true false entry correctly!";
		}		
	}
	
	//FILL IN THE BLANK  
	if ($type_question=='fb'){
		if(isset($_POST['question'], $_POST['blank01'], $_POST['blank02'], $_POST['blank03'], $_POST['blank04'])){
			//insert query
			
		} else {
			echo "please post the fill in the blank entry correctly!";
		}
	}
	
		//OPEN ENDED
	if ($type_question=='oe'){
		if(isset($_POST['question'], $_POST['ans'])){
			//insert query
			
		} else {
			echo "please post the true false entry correctly!";
		}
	}
	
	echo "success!";
		
}
else {
	echo 'nothing set yet';
}



**/
?>
