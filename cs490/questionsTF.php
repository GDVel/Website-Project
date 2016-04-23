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
	
//TRUE/FALSE  
	if ($type_question=='0'){
		
		if(isset($_POST['question'], $_POST['ans'], $_POST['points'])){
			
			//insert query
			$sol=$_POST['ans'];
			$question=$_POST['question'];
			$points=$_POST['points'];
			$sql1="insert into CS490_questions (MCTF_set, question, ans, points) VALUES('2','$question', '$sol', '$points')";
			$query=mysql_query($sql1) or die(mysql_error());
			$sql4 ="select quest_id from CS490_questions where question = '$question' and ans ='$sol' and points ='$points'";
			$query2=mysql_query($sql4) or die(mysql_error());
			
			while  ($r = mysql_fetch_array ($query2)){
					$id_value=$r["quest_id"];
				}
				
				echo json_encode($id_value);
		} 		
	}
	

elseif ($type_question =='1'){
	if(isset($_POST['question'], $_POST['ans'], $_POST['points'], $_POST['question_id'])){
				//insert query
				$id=$_POST['question_id'];
				$sol=$_POST['ans'];
				$points=$_POST['points'];
				$question=$_POST['question'];
				
				$sql2="UPDATE CS490_questions SET question ='$question', ans = '$sol', points = '$points' WHERE quest_id ='$id";
				$query=mysql_query($sql2)or die(mysql_error());
				echo "Edited  MC";
		
	}
}

}

?> 