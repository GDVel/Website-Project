<?php

//input from frontend 

$jsonstr = $_POST['name'];
$jsonstr1 = $_POST['pwd'];

//echo json_encode(array('valid' => true));
$data = array("uid"=>"rs334", "password"=>"password");
$njit = array("ucid"=>"ve23", "password"=>"wrong");
$string = http_build_query($data);
$string2 = http_build_query($njit);
//db curl posts

$ch1 = curl_init("https://web.njit.edu/~rs334/cs490/data.php");
$ch2 = curl_init("https://www.njit.edu/cp/login.php");

curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$dbres = curl_exec($ch1);
echo $dbres;
//echo json_encode(array('uid'=>"ve23", 'password'=>"cs490"));
curl_close($ch1);

//njit curl posts

curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $njit);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//echo "build success"; 

$njitres = curl_exec($ch2);
echo $njitres;
curl_close($ch2);


//echo json_encode($output);
echo json_encode(array('ucid'=>"Ve23", 'pwd'=>"wrong"));


?>

