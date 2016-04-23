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
	
	//MULTIPLE CHOICE 	
	if ($type_question == 'mc'){ 		
		if(isset($_POST['question'], $_POST['option01'], $_POST['option02'], $_POST['option03'], $_POST['option04'], $_POST['ans'])){
				//insert query
				$a=$_POST['option01'];
				$b=$_POST['option02'];
				$c=$_POST['option03'];
				$d=$_POST['option04'];
				$sol=$_POST['ans'];
				$question=$_POST['question'];
				
				$sql= "insert into CS490_questions (MCTF_set, question, opt1, opt2, opt3, opt4, ans) VALUES('1','$question', '$a', '$b', '$c', '$d', '$sol')";
				$query=mysql_query($sql)or die(mysql_error());
				echo "start MC";
		}
		
	}


	

	//TRUE/FALSE  
	if ($type_question=='tf'){
		
		if(isset($_POST['question'], $_POST['ans'])){
			
			//insert query
			$sol=$_POST['ans'];
			$question=$_POST['question'];
			$sql2="insert into CS490_questions (MCTF_set, question, ans) VALUES('2','$question', '$sol')";
			$query=mysql_query($sql2) or die(mysql_error());
			echo "start true/false";
		} 		
	}
	
	


	//FILL IN THE BLANK  
	if ($type_question=='fb'){
		if(isset($_POST['question'], $_POST['option01'], $_POST['ans'])){
			//insert query
			$fillin=$_POST['option01']
			$sol=$_POST['ans'];
			$question=$_POST['question'];
			$sql3="insert into CS490_questions (MCTF_set, question, opt1, ans) VALUES('3','$question', '$fillin' '$sol')";
			$query=mysql_query($sql3) or die(mysql_error());
			echo "blank filled in";
			
		} 
	}
	

	
		//OPEN ENDED
	if ($type_question=='oe'){
		if(isset($_POST['question'], $_POST['ans'])){
			//insert query
			$sol=$_POST['ans'];
			$question=$_POST['question'];
			$sql4="insert into CS490_questions (MCTF_set, question, opt1, ans) VALUES('4','$question', '$sol')";
			$query=mysql_query($sql4) or die(mysql_error());
			echo "parse through this";
			
		} 
	}
	
	
		
}
else {
	echo 'nothing set yet';
}




?>
