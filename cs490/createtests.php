<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	if(isset($_POST['create_test'],$_POST['user_id'])){
	
	
	$create=$_POST['create'];
	$user_idT=$_POST['user_id'];
	
	if($create == 'create_test'){
		if(isset($_POST['test_name'], $_POST['test_description'])){
			$name=$_POST['test_name'];
			$des=$_POST['test_description'];
			//Insert
			$sql="insert into CS490_testInfo (test_name, test_description) VALUES ('$name', '$des')";
			$query=mysql_query($sql)or die(mysql_error());
			
			echo "Please select which questions you would like to include in this quiz";
			$sql2="select distinct quest_id from CS490_questions join CS490_testQuestions.quest_id = CS490_questions.quest_id 
			where (select distinct test_id from CS490_testQuestions join CS490_testQuestions= CS490_testInfo.test_id)";
			
			$query=mysql_query($sq2)or die(mysql_error())
		}
	}
	
	}
	
?>