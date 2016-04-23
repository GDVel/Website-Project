<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
//check if the question type and user id is specified

if(isset($_POST['test_q_id'], $_POST['chosen_ans'], $_POST['grade_student')){
	
	$testquestion=$_POST['test_q_id'];
	$chosen_ans=$_POST['chosen_ans'];
	$grade_student=$_POST['grade_student'];
	
	$sql1=" insert into CS490_studentgrades (test_q_id, chosen_ans, grade_student) values ('$testquestion','$chosen_ans','$grade_student')";
	$query=mysql_query($sql1) or  die(mysql_error());
		echo "Inserted into studentgrades!";
	
	
	
	
?>