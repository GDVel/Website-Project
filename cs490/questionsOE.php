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
	
if ($type_question=='oe'){
		if(isset($_POST['question'], $_POST['ans'])){
			//insert query
			$sol=$_POST['ans'];
			$question=$_POST['question'];
			$sql4="insert into CS490_questions (MCTF_set, question, opt1, ans) VALUES('4','$question', '$sol')";
			$query=mysql_query($sql4) or die(mysql_error());
			echo "parse through this";
			
		} 
	}
}
else {
	echo 'nothing set yet';
}	
	
