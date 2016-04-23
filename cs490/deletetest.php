<?php

include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );


if(isset($_POST['test_id'])){
				//insert query
				$id=$_POST['test_id'];
					
				$sql="Delete FROM CS490_testQuestions WHERE test_id ='$id'";
				$query=mysql_query($sql)or die(mysql_error());
				
				$sql2="Delete FROM CS490_teacher WHERE test_id ='$id'";
				$query2=mysql_query($sql2)or die(mysql_error());
				
				$sql3="Delete FROM CS490_testInfo WHERE test_id ='$id'";
				$query3=mysql_query($sql3)or die(mysql_error());
				
				
				/**mysql_query("
								Delete FROM CS490_testQuestions WHERE test_id ='$id';
								Delete FROM CS490_teacher WHERE test_id ='$id';
								Delete FROM CS490_testInfo WHERE test_id ='$id';
				
				");
				**/
				
				echo "test is deleted";
			
			
	}
	
	
	
	
	
	
?>