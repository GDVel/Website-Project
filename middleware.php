<?php

//input from frontend 

$jsonstr = $_POST['name'];
$jsonstr1 = $_POST['pwd'];

$data = array("uid"=> $jsonstr, "password"=> $jsonstr1);
$njit = array("user"=> $jsonstr, "pass"=> $jsonstr1, "uuid"=>'0xACA021');
$string = http_build_query($data);
$string2 = http_build_query($njit);



//db curl posts

$ch1 = curl_init("https://web.njit.edu/~rs334/cs490/data.php");


curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$dbres = curl_exec($ch1);


curl_close($ch1);

//njit curl posts

$ch2 = curl_init("https://cp4.njit.edu/cp/home/login");

curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $string2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//echo "build success"; 

$njitres = curl_exec($ch2);

curl_close($ch2);


$meow=!($dbres=="not authenticated");

$res = array('isDB'=> $meow , 'roles'=> $dbres, 'isNJIT'=> false);
echo json_encode($res);

?>

