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
	
	if($type_question == '4' && $count == '0'){
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
	//throw this into elseif in rtqtest
	
	

	
	
}
?>