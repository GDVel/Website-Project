<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );


if (isset($_POST['user_id'],$_POST['quest_id'],$_POST['exam_id'], $_POST['type_question'])){
	
	$user=$_POST['user_id'];
	$exam=$_POST['exam_id'];
	$quest=$_POST['quest_id'];
	$type=$_POST['type_question'];
	
	if($type == '0'){
	
		$sql1="insert into CS490_testQuestions (test_id, quest_id) values ('$exam', '$quest')";
		$query=mysql_query($sql1) or  die(mysql_error());
		echo "Added!";
	}
	
}	
if (isset($_POST['id_exam_ques'], $_POST['type_question'])){
	
	
	$type=$_POST['type_question'];
	$unique=$_POST['id_exam_ques'];
	
	if($type == '1'){
		
		$sql2="Delete FROM CS490_testQuestions WHERE test_q_id ='$unique'";
		$query=mysql_query($sql2) or  die(mysql_error());
		echo "Deleted!";
		
		
	}

}




?>