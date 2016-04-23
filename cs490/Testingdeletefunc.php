<?php

//delete question from exam
$data=array("test_id"=>"72");

$string = http_build_query($data);
$ch=curl_init("https://web.njit.edu/~ve23/deletetest.php");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$res = curl_exec($ch);
curl_close($ch);


$result1=get_object_vars(json_decode($res));
	
	$dataut=$result1['valid'];
	//$dataId=$result1['testID'];
	
	echo "--->>---".'<br>';
	echo $result1.'<br>';
	echo "--->>---".'<br>';
	echo $res.'<br>';
	echo "------".'<br>';
	echo $dataut.'<br>';
	//echo $dataId.'<br>';

?>