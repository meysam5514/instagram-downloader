<?php
error_reporting(false);
header('Content-type: application/json;'); 

$urlside=$_GET['url'];
//=========================================

$ch = curl_init();
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://www.instagramsave.com/instagram-story-downloader.php");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_HEADER, false);
$meysam1= curl_exec($ch);
curl_close($ch);    


preg_match_all('#<input type="hidden" name="token" id="token" value="(.*?)">#',$meysam1,$sidepath1);

$data['url'] = "https://www.instagram.com/$urlside";
$data['action'] = "story";
$data['token'] = $sidepath1[1][0];
$data['json'] = "";


$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch1, CURLOPT_URL,"https://www.instagramsave.com/system/action.php");
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,"cookie.txt");
curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch1, CURLOPT_HEADER, false);
$meysam2= curl_exec($ch1);
curl_close($ch1);    

$pp=json_decode($meysam2, true);

for($i=0;$i<=count($pp['medias'])-1;$i++){

$type=$pp['medias'][$i]['type'];
$fileType=$pp['medias'][$i]['fileType'];
$url=$pp['medias'][$i]['url'];
$downloadUrl=$pp['medias'][$i]['downloadUrl'];
$preview=$pp['medias'][$i]['preview'];

$downloadurl1=urldecode($downloadUrl);
$preview1=urldecode($preview);


$downloadurl2=str_replace("https://www.instagramsave.com//dl.php?url=","",$downloadurl1);

$preview2=str_replace("https://www.instagramsave.com//system/stream.php?url=","",$preview1);


$pptpr[]=[
    'type'=>$type,
    'fileType'=>$fileType,
    'url'=>$url,
    'downloadUrl'=>$downloadurl2,
    'preview'=>$preview2];
}

$preview1=urldecode($pp['user']['profilePicUrl']);



$preview2=str_replace("https://www.instagramsave.com//system/stream.php?url=","",$preview1);



$pptpr1[]=[
    'id'=>$pp['user']['id'],
    'username'=>$pp['user']['username'],
    'fullName'=>$pp['user']['fullName'],
    'profilePicUrl'=>$preview2,
    'biography'=>$pp['user']['biography'],
    'followers'=>$pp['user']['followers'],
    'following'=>$pp['user']['following']
];



//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>['user info'=>$pptpr1,'story'=>$pptpr]], 448);
//========================================================= 


