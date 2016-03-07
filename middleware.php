<?php

//input from frontend 

$jsonstr = $_POST['name'];
$jsonstr1 = $_POST['pwd'];
//echo json_encode(array('ucid'=>$jsonstr, 'pwd'=>$jsonstr1));
//:exit();
//echo json_encode(array('valid' => true));
$data = array("uid"=> $jsonstr, "password"=> $jsonstr1);
$njit = array("ucid"=>"ve23", "password"=>"redline16k", "uuid"=>'0xACA021');
$string = http_build_query($data);
$string2 = http_build_query($njit);
//$role = array('ucid'=> "student", 'njit'=>"is njit student", 'noauth'=> "0");


//db curl posts

$ch1 = curl_init("https://web.njit.edu/~rs334/cs490/data.php");


curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$dbres = curl_exec($ch1);
$meow=!($dbres=="not authenticated");
//echo $meow;
$res = array('isDB'=> $meow , 'roles'=> $dbres, 'isNJIT'=> false); 
echo json_encode($res);
//echo json_encode(array('uid'=>"ve23", 'password'=>"cs490"));
curl_close($ch1);

//njit curl posts

//$ch2 = curl_init("https://www.njit.edu/cp/login.php");

curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $njit);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//echo "build success"; 

$njitres = curl_exec($ch2);
echo $njitres;
curl_close($ch2);


//echo json_encode($output);
//echo json_encode(array('ucid'=>"Ve23", 'pwd'=>"wrong"));
//echo json_encode($dbres);


?>

