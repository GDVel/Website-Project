<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
	if(isset($_POST['question_type'],$_POST['user_id'],$_POST['count'])){
	
	
	$type_question=$_POST['question_type'];
	$user_idT=$_POST['user_id'];
	$count=$_POST['count'];
	

	/** Count 0 = array of all questions of that question type set 
		Count 1 = actual number count of questions of that set 
		Question_type 0 = MC only questions
		Question_type 1 = TF only questions
		Question_type 2 = FI only questions
		Question_type 3 = OE only questions
		Question_type 4 = ALL questions
		
	**/
	/**
	if ($type_question == '0' && $count == '0'){ 		
		//send back only MC questions 
				
				$sql= "Select * from CS490_questions Where MCTF_set = '1'";
				$query=mysql_query($sql)or die(mysql_error());
				echo $query;
				//echo "Here are all the MC questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
		}
		
		
	
		
	elseif($type_question == '1' && $count == '0'){
		//send back only TF questions
		
			    $sql2= "Select * from CS490_questions Where MCTF_set = '2'";
				$query=mysql_query($sq2)or die(mysql_error());
				echo $query;
				//echo "Here are all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
		}
		
	
	
	elseif($type_question == '2' && $count == '0'){
		//send back only FI questions
		
			    $sql3= "Select * from CS490_questions Where MCTF_set = '3'";
				$query=mysql_query($sql3)or die(mysql_error());
				echo $query;
				//echo "Here are all the FI questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
	
	elseif($type_question == '3' && $count == '0'){
		//send back only OE questions
		
			    $sql4= "Select * from CS490_questions Where MCTF_set = '4'";
				$query=mysql_query($sq4)or die(mysql_error());
				echo $query;
				//echo "Here are all the OE questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
	
	elseif($type_question == '4' && $count == '0'){
		//send back all questions
		
			    $sql5= "Select * from CS490_questions";
				$query=mysql_query($sq5)or die(mysql_error());
				echo $query;
				//echo "Here are all the  questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
//--------------------------------------------------------------------------------------------------

	elseif($type_question == '0' && $count == '1'){ 		
		//send back only MC questions 
				
				$sql10= "select count(quest_id) from CS490_questions where MCTF_set = '1'";
				$query=mysql_query($sql10)or die(mysql_error());
				echo $query;
				//echo "Here is the count of all the MC questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
		
	}
	**/
		
	if($type_question == '1' && $count == '1'){
		//send back only TF questions
		
			    $sql6= "select count(quest_id) as count from CS490_questions where MCTF_set = '2'";
				$query=mysql_query($sq6)or die(mysql_error());
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$resl=$w["count"] ;
				
				}
				echo $sql6;
	}
	/**
	elseif($type_question == '2' && $count == '1'){
		//send back only FI questions
		
			    $sql7= "select count(quest_id) from CS490_questions where MCTF_set = '3'";
				$query=mysql_query($sql7)or die(mysql_error());
				echo $query;
				//echo "Here is the count of all the FI questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
	
	elseif($type_question == '3' && $count == '1'){
		//send back only OE questions
		
			    $sql8= "select count(quest_id) from CS490_questions where MCTF_set = '4'";
				$query=mysql_query($sq8)or die(mysql_error());
				echo $query;
				//echo "Here is the count of all the OE questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
	
	elseif($type_question == '4' && $count == '1'){
		//send back all questions
		
			    $sql9= "select count(quest_id) from CS490_questions ";
				$query=mysql_query($sq9)or die(mysql_error());
				echo $query;
				//echo "Here is the count of all the  questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
				$resl=$w["count"] ;
				echo $res1;
				}
	}
	
	**/
}

		
		


?>
