<?php

//input from frontend + decode with assigned variables

$jsonstr=$_POST['name'];
$recieve = json_decode($jsonstr, true);


echo json_encode(array('valid' => true)); 


$ucid = $recieve["ucid"];
$password = $recieve["password"];

//array for njit and db
$output = array();
$dba = array("ucid" => $ucid, "password" => $password);
$njit = array("ucid" => $ucid, "password" => $password);

//curl posts

$ch1 = curl_init();
$ch2 = curl_init();

curl_setopt($ch1, CURLOPT_URL, "https://web.njit.edu/~rs334/cs490/index.php");
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($dba));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

$dbconresults = curl_exec($ch1);
$output["database"] = $dbconresults;
curl_close($ch1);

//njit curl posts

curl_setopt($ch2, CURLOPT_URL, "https://www.webauth.njit.edu/idp/Authn/UserPassword");
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($njit));
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

$njitconresults = curl_exec($ch2);
$output["njit"] = $njitconresults;
curl_close($ch2);

echo json_encode($output); 


?>

