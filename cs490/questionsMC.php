<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
//check if the question type and user id is specified

if(isset($_POST['question_type'],$_POST['user_id'])){
	
	
	$type_question=$_POST['question_type'];
	$user_idT=$_POST['user_id'];
	
	//MULTIPLE CHOICE 	
	if ($type_question == '0'){ 		
		if(isset($_POST['question'], $_POST['option01'], $_POST['option02'], $_POST['option03'], $_POST['option04'], $_POST['ans'], $_POST['points'])){
				//insert query
				$a=$_POST['option01'];
				$b=$_POST['option02'];
				$c=$_POST['option03'];
				$d=$_POST['option04'];
				$sol=$_POST['ans'];
				$points=$_POST['points'];
				$question=$_POST['question'];
				
				$sql= "insert into CS490_questions (MCTF_set, question, opt1, opt2, opt3, opt4, ans, points) VALUES('1','$question', '$a', '$b', '$c', '$d', '$sol', $points)";
				$sql4 ="select quest_id from CS490_questions where question = '$question' and opt1 = '$a' and opt2 ='$b' and opt3 = '$c' and opt4 ='$d' and ans ='$sol' and points ='$points'";
				$query=mysql_query($sql)or die(mysql_error());
				$query2=mysql_query($sql4)or die(mysql_error());
				
				while  ($r = mysql_fetch_array ($query2)){
					$id_value=$r["quest_id"];
				}
				
				echo $id_value;
		}
		
	}
	elseif ($type_question =='1'){
	if(isset($_POST['question'], $_POST['option01'], $_POST['option02'], $_POST['option03'], $_POST['option04'], $_POST['ans'], $_POST['points'], $_POST['question_id'])){
				//insert query
				$id=$_POST['question_id'];
				$a=$_POST['option01'];
				$b=$_POST['option02'];
				$c=$_POST['option03'];
				$d=$_POST['option04'];
				$sol=$_POST['ans'];
				$points=$_POST['points'];
				$question=$_POST['question'];
				
				$sql2="UPDATE CS490_questions SET question ='$question', opt1 ='$a', opt2 = '$b', opt3 = '$c', opt4 = '$d', ans = '$sol', points = '$points' WHERE quest_id ='$id'";
				$query=mysql_query($sql2)or die(mysql_error());
				echo "Edited  MC";
		
	   }
	}
	elseif ($type_question =='2'){
		if(isset($_POST['question_id'])){
				//insert query
				$id=$_POST['question_id'];
				
				$sql3="Delete FROM CS490_questions WHERE quest_id ='$id'";
				$query=mysql_query($sql3)or die(mysql_error());
				echo "deleted";
	}
}

	
		
}

else {
	echo 'nothing set yet';
}




?>
