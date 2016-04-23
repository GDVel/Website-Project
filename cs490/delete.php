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
	
if ($type_question =='2'){
		if(isset($_POST['question_id'])){
				//insert query
				$id=$_POST['question_id'];
				
				$sql3="Delete FROM CS490_questions WHERE quest_id ='$id'";
				$query=mysql_query($sql3)or die(mysql_error());
				echo "deleted";
	}
}

	
		
}
	

	
	
	
?>