<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
	/** Count 0 = array of all questions of that question type set 
		Count 1 = actual number count of questions of that set 
		Question_type 0 = MC only questions
		Question_type 1 = TF only questions
		Question_type 2 = FI only questions
		Question_type 3 = OE only questions
		Question_type 4 = ALL questions
		
	**/
	
	
	if(isset($_POST['question_type'],$_POST['user_id'],$_POST['count'])){
	
	
	$type_question=$_POST['question_type'];
	$user_idT=$_POST['user_id'];
	$count=$_POST['count'];
	//echo "before";
	if($type_question == '1' && $count == '1'){
		//send back only TF questions count
		
			    $sql6= "select count(quest_id) as count from CS490_questions where MCTF_set = '2'";
				
				
				$query=mysql_query($sql6)or die(mysql_error());
				
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$res1=$w["count"] ;
				
				}
				
				
				echo $res1;
				
				//echo 'test';
	}
	elseif($type_question == '2' && $count == '1'){
		//send back only FI questions count
		
			    $sql8= "select count(quest_id) as count from CS490_questions where MCTF_set = '3'";
				
				
				$query=mysql_query($sql8)or die(mysql_error());
				
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$res1=$w["count"] ;
				
				}
				
				
				echo $res1;
				
				//echo 'test';
	}
	elseif($type_question == '3' && $count == '1'){
		//send back only OE questions count
		
			    $sql9= "select count(quest_id) as count from CS490_questions where MCTF_set = '4'";
				
				
				$query=mysql_query($sql9)or die(mysql_error());
				
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$res1=$w["count"] ;
				
				}
				
				
				echo $res1;
				
				//echo 'test';
	}
	elseif($type_question == '4' && $count == '1'){
		//send back all questions count
		
			    $sql10= "select count(quest_id) as count from CS490_questions";
				
				
				$query=mysql_query($sql10)or die(mysql_error());
				
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$res1=$w["count"] ;
				
				}
				
				
				echo $res1;
				
				//echo 'test';
	}
	elseif($type_question == '0' && $count == '1'){
		//send back only MC questions count
		
			    $sql7= "select count(quest_id) as count from CS490_questions where MCTF_set = '1'";
				
				
				$query=mysql_query($sql7)or die(mysql_error());
				
				//echo $query;
				//echo "Here here is the count of all the TF questions";
				global $res1;
				while  ( $w = mysql_fetch_array ($query) ){
					$res1=$w["count"] ;
				
				}
				
				
				echo $res1;
				
				//echo 'test';
	}
	elseif($type_question == '0' && $count == '0'){
		//send back only MC questions
		
			 $sql= "select quest_id as question_id, question, MCTF_set as type_key, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4, points as points, ans as answer from CS490_questions where MCTF_set='1'";
				
			$result=mysql_query($sql)or die(mysql_error());
	
			$data = array();
			
			$x = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$data[$x] = $row;
				$x=$x+1;
			}
			
			echo json_encode($data);
				
	}
	elseif($type_question == '1' && $count == '0'){
		//send back only TF questions
		
			 $sql= "select quest_id as question_id, question, MCTF_set as type_key, points as points, ans as answer from CS490_questions where MCTF_set='2'";
				
			$result=mysql_query($sql)or die(mysql_error());
	
			$data = array();
			
			$x = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$data[$x] = $row;
				$x=$x+1;
			}
			
			echo json_encode($data);
				
	}
	elseif($type_question == '2' && $count == '0'){
		//send back only FI questions
		
			 $sql= "select quest_id as question_id, question, MCTF_set as type_key, opt1 as ans, points as points from CS490_questions where MCTF_set='3'";
				
			$result=mysql_query($sql)or die(mysql_error());
	
			$data = array();
			
			$x = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$data[$x] = $row;
				$x=$x+1;
			}
			
			echo json_encode($data);
				
	}
	elseif($type_question == '3' && $count == '0'){
		//send back only OE questions
		
			 $sql= "select quest_id as question_id, question, MCTF_set as type_key,  ans as answer from CS490_questions where MCTF_set='4'";
				
			$result=mysql_query($sql)or die(mysql_error());
	
			$data = array();
			
			$x = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$data[$x] = $row;
				//print_r ($data[$x]);
				//echo '<br>';
				$x=$x+1;
			}
			
			echo json_encode($data);
				
	}
	
	elseif($type_question == '4' && $count == '0'){
		//send back ALL questions
		
			 $sql1= "select quest_id as question_id, question, MCTF_set as type_key, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4, points as points, ans as answer from CS490_questions where MCTF_set='1'";
			 $sql2= "select quest_id as question_id, question, MCTF_set as type_key, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4,  points as points, ans as answer from CS490_questions where MCTF_set='2'";
			 $sql3= "select quest_id as question_id, question, MCTF_set as type_key, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4,  points as points, ans as answer from CS490_questions where MCTF_set='3'";
			 
				
			$result1=mysql_query($sql1)or die(mysql_error());
			$result2=mysql_query($sql2)or die(mysql_error());
			$result3=mysql_query($sql3)or die(mysql_error());
	
			$data = array();
	
			global $x;
			global $y;
			$x =0;
			$y=0;
			switch ($y){
				case 0:
				while ($row = mysql_fetch_assoc($result1)) 
				{
					$data[$x] = $row;
					$x=$x+1;	
					$y=$y+1;
				}
				
				
				case 1:
				while ($row = mysql_fetch_assoc($result2)) 
				{
					$data[$x] = $row;
					$x=$x+1;
					$y=$y+1;
				}
				
				
				case 2:
				while ($row = mysql_fetch_assoc($result3)) 
				{
					$data[$x] = $row;
					$x=$x+1;
					$y=$y+1;
				}
				break;
			}
			
	
			echo json_encode($data);
				
	}
	
}

?>