<?php


if(isset($_POST['question_type'],$_POST['user_id'],$_POST['count'])){
	
	
	$type_question=$_POST['question_type'];
	$user_idT=$_POST['user_id'];
	$count=$_POST['count'];
	
	//echo "test 1";
	
	if($type_question == '0' && $count == '0'){
		
		//echo "test 2";
		
			include ("account.php") ;
			( $dbh = mysql_connect ( $hostname, $username, $password ) )
				or    die ( "Unable to connect to MySQL database" );
			mysql_select_db( $project );
	
	
			$sql= "select quest_id as question_id, question, opt1 as option1, opt2 as option2, opt3 as option3, opt4 as option4, ans as answer from CS490_questions where MCTF_set='1'";
				
			$result=mysql_query($sql)or die(mysql_error());
	
			$data = array();
			
			/*
			while ($row = mysql_fetch_assoc($result)) {
				$id = array_shift($row); // Shifts first element
				$data[$id] = $row; 
				//print_r ($data[$id]);
			}
			*/
			$x = 0;
			while ($row = mysql_fetch_assoc($result)) {
				$data[$x] = $row;
				//print_r ($data[$x]);
				//echo '<br>';
				$x=$x+1;
			}
			//array_pop($data);
			//echo count($data);
			//echo $data;
			
			echo json_encode($data);
			
			//echo 12;
	
	}
	
}
	
	
	
	





?>