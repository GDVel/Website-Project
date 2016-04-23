<?php

include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
//teacher request
 
 if(isset($_POST['requesting_dashboard_tests'])){
	 
	 
	  $sql1="select test_id as testId, test_name as testName from CS490_testInfo";
	  $x=mysql_query($sql1) or  die(mysql_error());
	  
for($i=0; $array[$i]= mysql_fetch_array($x, MYSQLI_ASSOC); $i++);
		array_pop($array);
		
         //$row=mysqli_fetch_array($x, MYSQLI_ASSOC);
         
         //echo $row;
		 /**$data=array();
		 while (($row= mysql_fetch_array($x, MYSQLI_ASSOC)) !== false){
			 $data[]=$row;
		 }
         echo json_encode($data);
		**/
		
		
		echo json_encode($array);
	  
	  
	  
	  
 }

 



?>