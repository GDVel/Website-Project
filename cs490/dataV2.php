<?php
if(isset($_POST['uid'],$_POST['password'])){
	$username1=$_POST['uid'];
	$pwd1=$_POST['password'];
	
	//echo $username;
	//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	//echo $username;
	$sql="SELECT count(*) as valid
	FROM CS490_usersLogin
	WHERE username = '$username1' 
	AND password = PASSWORD('$pwd1')";
	
	//echo $username;
	$sql2="select user_type from CS490_userType 
	where id_type = (select id_type from CS490_usersLogin where username='$username1')";
	
	$sql3="select id from CS490_usersLogin where username = '$username1' and password = PASSWORD('$pwd1')";
	
	//echo $sql2;

	$userVal="not authenticated";
	$t=mysql_query($sql) or  die(mysql_error());
	//check if the uid and pwd combination is valid	
	while  ($r = mysql_fetch_array ($t)){
		
		if ($r["valid"] == 1){
			//echo   $r["valid"];
			$u=mysql_query($sql2) or  die(mysql_error());
			$i=mysql_query($sql3) or  die(mysql_error());
		}
		
		//retrieve user type based on uid and pwd given
		global $userVal;
		global $idVal;
		
		while  ( $w = mysql_fetch_array ($u) ){
			//echo   $w["user_type"];
			$userVal=$w["user_type"] ;
		}
		
		while  ( $x = mysql_fetch_array ($i) ){
			$idVal=$x["id"] ;
		}
		
	}
	
	$datasend=array("userTyp"=>$userVal,"userId"=>$idVal);
	
	
	echo json_encode($datasend);
	
	//echo $idVal;
	//echo $datasend;
	
	/*
	
	$chan=curl_init("https://web.njit.edu/~rs334/cs490/beta/rimi/draft11.php");
	$datasend=array("userTyp"=>$userVal,"userId"=>$idVal);
	$string = http_build_query($datasend);
	
	curl_setopt($chan,CURLOPT_POST, true);
	curl_setopt($chan,CURLOPT_POSTFIELDS,$string);
	curl_setopt($chan,CURLOPT_RETURNTRANSFER,true);
	//echo curl_exec($ch);
	$result = curl_exec($chan);
	curl_close($chan);
	
	*/

}
?>
