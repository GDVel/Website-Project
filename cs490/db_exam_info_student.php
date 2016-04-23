<?php

//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
if (isset($_POST['user_id'],$_POST['exam_id'])){
	
	$id_teach=$_POST['user_id'];
	$exam_id=$_POST['exam_id'];
	
	
	$sql4="select test_q_id, test_id, a.quest_id, MCTF_set as type_key, question, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4, points from CS490_testQuestions as a 
inner join CS490_questions as b
on a.quest_id=b.quest_id
and a.test_id='$exam_id'
and b.MCTF_set in ('1','2','3')
order by test_q_id";

	$result4=mysql_query($sql4)or die(mysql_error());
	
	$data = array();
	
	global $x;	
	$x = 0;
	
	while ($row = mysql_fetch_assoc($result4)) {
		$data[$x] = $row;
		$x=$x+1;	
	}
	
	echo json_encode($data);

}
?>