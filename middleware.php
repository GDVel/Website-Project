<?php

//input from frontend 

$jsonstr = $_POST['name'];
$jsonstr1 = $_POST['pwd'];

//echo json_encode(array('valid' => true));


//db curl posts

$ch1 = curl_init();
$ch2 = curl_init();

curl_setopt($ch1, CURLOPT_URL, "https://web.njit.edu/~rs334/cs490/index.php");
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode(array('username'=>"Ve23",'password'=>"cs490"));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

$dbconresults = curl_exec($ch1);
$output["database"] = $dbconresults;
curl_close($ch1);

//njit curl posts

curl_setopt($ch2, CURLOPT_URL,"https://www.webauth.njit.edu/idp/Authn/UserPassword?");
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode(array('ucid'=>"ve23", 'pass'=>"csstudent"));
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//echo "build success"; 

$njitconresults = curl_exec($ch2);
$output["njit"] = $njitconresults;
curl_close($ch2);


//echo json_encode($output);
echo json_encode(array('UCID'=>"Ve23", 'pwd'=>"cs490"));


?>

