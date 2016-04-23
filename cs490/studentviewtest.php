<?php


//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	
//check if the question type and user id is specified

if(isset($_POST['user_id'])){
	
	$id_type=$_POST['user_id'];
	
	if ($id_type =='1'){
		
		$sql="select test_name, test_description, a.test_id, score_release_status as release_status from CS490_testInfo as a inner join CS490_teacher as b on a.test_id=b.test_id ";
		$query=mysql_query($sql) or  die(mysql_error());
		
		$data = array();
		global $x;	
		$x = 0;
	
		while ($row = mysql_fetch_assoc($query)) {
			$data[$x] = $row;
			$x=$x+1;	
		}
		 
		echo json_encode($data);
		
		
	}
	else
	{
		echo "user_id false";
	}
	
}
	
	
?>