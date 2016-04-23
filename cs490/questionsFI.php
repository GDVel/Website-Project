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
	
	//FILL IN THE BLANK  
	if ($type_question=='0'){
		if(isset($_POST['question'], $_POST['option01'], $_POST['points'])){
			//insert query
			$fillin=$_POST['option01'];
			//$sol=$_POST['ans'];
			$question=$_POST['question'];
			$points=$_POST['points'];
			$sql3="insert into CS490_questions (MCTF_set, question, opt1, points) VALUES('3','$question', '$fillin', $points)";
			$query=mysql_query($sql3) or die(mysql_error());
			
			$sql4 ="select quest_id from CS490_questions where question = '$question' and opt1 ='$fillin' and points ='$points'";
			$query2=mysql_query($sql4) or die(mysql_error());
			
			while  ($r = mysql_fetch_array ($query2)){
					$id_value=$r["quest_id"];
				}
				
				echo $id_value;
		} 		
		} 
	
	
elseif ($type_question =='1'){
	if(isset($_POST['question'], $_POST['points'], $_POST['question_id'])){
				//insert query
				$id=$_POST['question_id'];
				$points=$_POST['points'];
				$question=$_POST['question'];
				$fillin=$_POST['option01'];
				
				$sql2="UPDATE CS490_questions SET question ='$question', opt1 = '$fillin', points = '$points' WHERE quest_id = '$id'";
				$query=mysql_query($sql2)or die(mysql_error());
				echo "Edited  Fill IN";
		
	}
 }
}
?>