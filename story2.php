<?php
error_reporting(false);
header('Content-type: application/json;'); 

$urlside=$_GET['url'];

$ch1 = curl_init();
//curl_setopt($ch1, CURLOPT_POST, true);
//curl_setopt($ch1, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch1, CURLOPT_URL,"https://sidepath.ir/apim/insta.php?type=info&url=$urlside");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch1, CURLOPT_HEADER, false);
$meysam2= curl_exec($ch1);
curl_close($ch1);    
$json1=json_decode($meysam2,true);
$id=$json1['Results']['id'];

$ch = curl_init();
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://instasupersave.com/api/ig/stories/$id");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_HEADER, false);
$meysam1= curl_exec($ch);
curl_close($ch);    

$json=json_decode($meysam1,true);

print_r($json);



//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>$json['result']], 448);
//========================================================= 



