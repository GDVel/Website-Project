<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );


if (isset($_POST['user_id'],$_POST['student_id'],$_POST['test_id'], $_POST['exam_release_status'], $_POST['score_release_status'])){
	
	$teacher=$_POST['user_id'];
	$student=$_POST['student_id'];
	$exam=$_POST['test_id'];
	$examRelease=$_POST['exam_release_status'];
	$scoreRelease=$_POST['score_release_status'];
	
	if($examRelease == '0' && $scoreRelease == '0'){
		
		$sql1=" insert into CS490_teacher (teacher_id, student_id, test_id, exam_release_status, score_release_status) values ('$teacher','$student','$exam','$examRelease','$scoreRelease')";
		$query=mysql_query($sql1) or  die(mysql_error());
		echo "Success!";
		
	}
	elseif($examRelease == '1' || $scoreRelease == '1'){
		$sql2="UPDATE CS490_teacher SET exam_release_status ='$examRelease', score_release_status = '$scoreRelease' WHERE test_id ='$exam' and teacher_id = '$teacher' and student_id = '$student'";
		$query=mysql_query($sql2) or  die(mysql_error());
		echo "Updated!";
	}
	
	/**create a seperate file to improve this. for example if the test is release let user know the user kniow that
		they can release the score if it is taken
		or if the test is not taken then to not release the score
	**/	
}





?>