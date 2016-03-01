<?php

//input from frontend + decode with assigned variables

$jsonstr=$_POST['name'];
$recieve = json_decode($jsonstr, true);


echo json_encode(array('valid' => true)); 

fwrite($myfil, $recieve);

$ucid = $recieve["ucid"];
$password = $recieve["password"];

//array for njit and db
$output = array();
$dba = array("ucid" => $ucid, "password" => $password);
$njit = array("ucid" => $ucid, "password" => $password);

//url for logins

$dburl = " ";
$njiturl = " ";

$ch1 = curl_init();
$ch2 = curl_init();

curl_setopt($ch1, CURLOPT_URL, $dburl);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode());
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

$dbresults = curl_exec($ch1);

curl_close($ch1);

curl_setopt($ch2, CURLOPT_URL, $njiturl);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, json encode());
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

$njitresults = curl_exec($ch2);

curl_close($ch2);

 


?>

