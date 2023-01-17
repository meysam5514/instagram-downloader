<?php
error_reporting(false);
header('Content-type: application/json;'); 

$urlside=$_GET['url'];
$typeside=$_GET['type'];

$data['url'] = $urlside;

$array_type = ["post","postkolli"];
if(!in_array($typeside, $array_type) or !isset($_GET['url']) or !isset($_GET['type'])) {
echo"Use type And url Parameter (url is the username or post url | type is the type of the media)

Available Type Methods :

post -> for photos and videos and igtv and reels
postkolli -> give username to get last user posts";
}

if($typeside=='postkolli'){
$data['url']="https://www.instagram.com/".$urlside;
}elseif($typeside=='post'){
$data['url']= $urlside;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://api.videodownloaderpro.net/api/convert");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
//curl_setopt($ch, CURLOPT_HEADER, true);

$meysam1= curl_exec($ch);
curl_close($ch);    


$list = json_decode($meysam1,true);
if($list['url'][0]['type']==null){//chand post

for($i=0;$i<=count($list)-1;$i++){
if($list[$i]['url'][0]['type']=="jpg"){//chand post jpg

$urltype=$list[$i]['url'][0]['type'];
$urlcaption=$list[$i]['meta']['title'];
$urldown=$list[$i]['url'][0]['url'];
$da =['post'=>$urldown , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;

}else{//chand post mp4
$urltype=$list[$i]['url'][0]['type'];
$urlcaption=$list[$i]['meta']['title'];
$urldown=$list[$i]['sd']['url'];
$da =['post'=>$urldown , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;
}}
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$pptpr], 448);

}else{//tak post
if($list['url'][0]['type']=="jpg"){//tak post jpg
$urltype=$list['url'][0]['type'];
$urlcaption=$list['meta']['title'];
$urldown=$list['url'][0]['url'];
$da =['post'=>$urldown , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;

echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$pptpr], 448);
}else{//tak post mp4
$urltype=$list['url'][0]['type'];
$urlcaption=$list['meta']['title'];
$urldown=$list['url'][0]['url'];
$urldl=urldecode($urldown);
preg_match_all('#&uri=(.*?)&filename#',$urldl,$sidepath1);
$da =['post'=>$sidepath1[1][0] , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;

echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$pptpr], 448);
}}







