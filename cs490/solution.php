<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
//check if the question type and user id is specified

if(isset($_POST['test_q_id'])){
	
	$testquestion=$_POST['test_q_id'];
	
	$sql="select ans as answer,points as points, a.quest_id from CS490_testQuestions as a inner join CS490_questions as b on test_q_id='$testquestion' and a.quest_id=b.quest_id";
		$query=mysql_query($sql) or  die(mysql_error());
		
		$data = array();
		global $x;	
		$x = 0;
	
		while ($row = mysql_fetch_assoc($query)) {
			$data[$x] = $row;
			$x=$x+1;	
		}
		 
		echo json_encode($data);
		
		
	}
	else
	{
		echo "invalid question id";
	}
	
}
	
	
?>