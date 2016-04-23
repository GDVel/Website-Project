<?php

/*
data needed by Dakota
testId  -> test id
testName -> test name
dsc -> desc
questNums -> # of questions
testScore -> testScore

*/

//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
if (isset($_POST['user_id'])){
	
	$id_teach=$_POST['user_id'];

	//get mc added in the test
	$sql1="select distinct a.test_id as testId, test_name as testName, test_description as dsc, count(c.quest_id) as questNums, sum(points) as testScore, score_release_status as score_status
from CS490_testInfo as a
left outer join CS490_testQuestions as b
on a.test_id=b.test_id
left outer join CS490_questions as c
on b.quest_id=c.quest_id
left outer join CS490_teacher as d
on a.test_id=d.test_id
group by a.test_id";

	$result1=mysql_query($sql1)or die(mysql_error());

	
	$data = array();
	
	global $x;	
	$x = 0;
	
	while ($row = mysql_fetch_assoc($result1)) {
		$data[$x] = $row;
		$x=$x+1;	
	}
	
	echo json_encode($data);

}
?>