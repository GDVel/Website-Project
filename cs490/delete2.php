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
				
				$sql1="select test_q_id from CS490_testQuestions where quest_id='$id'";
				
				$query=mysql_query($sql1)or die(mysql_error());
				
				$sql2="delete from CS490_studentgrades where test_q_id='$query'";
				
				$query2=mysql_query($sql2)or die(mysql_error());
				
				$sql3="delete from CS490_testQuestions where test_q_id='$query'";
				
				$query3=mysql_query($sql3)or die(mysql_error());
				
				$sql4="Delete FROM CS490_testQuestions WHERE quest_id ='$id'";
				
				$query4=mysql_query($sql4)or die(mysql_error());
				
				$sql5="Delete FROM CS490_questions WHERE quest_id ='$id'";
				
				$query5=mysql_query($sql5)or die(mysql_error());
				
				echo $sql3;
				
				//echo "deleted";
				//echo $sql3;
	}
}

	
		
}
	

	
	
	
?>