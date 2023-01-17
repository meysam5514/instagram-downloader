<?php
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//========================================================= 
error_reporting(false);
header('Content-type: application/json;');
$kobsurl = $_GET['url'];
$kobstype = $_GET['type'];
$array_type = ["post","story","postkolli","highlight","info"];
if(!in_array($kobstype, $array_type) or !isset($_GET['url']) or !isset($_GET['type'])) {
echo"Use type And url Parameter (url is the username or post url | type is the type of the media)

Available Type Methods :

post -> for photos and videos and igtv and reels
story -> give username to get user stories
info -> give username to get user info
highlight -> give username to get user HighLights
postkolli -> give username to get last user posts";
}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function Getid($username){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://storiesig.info/api/ig/profile/'.$username);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Authority: storiesig.info';
$headers[] = 'Sec-Ch-Ua: ^^';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'X-Xsrf-Token: eyJpdiI6IitsTkxVS09tcUxKU1JJRnk3bTRPQXc9PSIsInZhbHVlIjoiQTBoVnVJdjdKOUM3YW4yWFJ3SkczbXNmb0VPS2F4MXN5UFwvNUZFWVFWbmVLN2R3UTIyQ1BlNVFPdk5FZlpcL0Z3d0xDTHY5eUFoZWxtZGZHZ2ttVzdDYjA2VGN5aG8zblZ2eWNZSW9MZlJjZitxbFBvVEVFMzgwOWk3Y2RSWDhjSyIsIm1hYyI6IjQ2MTE3NWRlNzFmNGEwMWVlNjZkNjE0MDMyNzQ4OGI2NWYzYjA2MjQ1MzI0ZTI3OWM4ZGI2MTM0YWVkNmNhNTkifQ==';
$headers[] = 'X-Token: null';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36';
$headers[] = 'Sec-Ch-Ua-Platform: ^^Windows^^\"\"';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://storiesig.info/en/';
$headers[] = 'Accept-Language: en-US,en;q=0.9,fa;q=0.8';
$headers[] = 'Cookie: XSRF-TOKEN=eyJpdiI6IitsTkxVS09tcUxKU1JJRnk3bTRPQXc9PSIsInZhbHVlIjoiQTBoVnVJdjdKOUM3YW4yWFJ3SkczbXNmb0VPS2F4MXN5UFwvNUZFWVFWbmVLN2R3UTIyQ1BlNVFPdk5FZlpcL0Z3d0xDTHY5eUFoZWxtZGZHZ2ttVzdDYjA2VGN5aG8zblZ2eWNZSW9MZlJjZitxbFBvVEVFMzgwOWk3Y2RSWDhjSyIsIm1hYyI6IjQ2MTE3NWRlNzFmNGEwMWVlNjZkNjE0MDMyNzQ4OGI2NWYzYjA2MjQ1MzI0ZTI3OWM4ZGI2MTM0YWVkNmNhNTkifQ^%^3D^%^3D; aig_session=eyJpdiI6ImJ3elJ1OUx2Y2VQRU50OVdwQ0xGMnc9PSIsInZhbHVlIjoiWHVIQUlGZEYxeitpMUM4ZFB0ZFE1aEk1Rjh0aDBIUVE5Snhta2pxRHVBbUllUlpWTkY3RFRHeFJhWFExYjhHSjVpRTlQcE1KQWNMdm5JMjFHdXRyMWF0TDRDT1ZXT3lZXC83dmNsYzh3U1l1c3dLOUNxUnhWVUhSbE5LeGNpZGtRIiwibWFjIjoiODMxNjgwNDk3YjZmYzQ3NGJjZTU5ZGI2MTE1NjYyNjMwNmU2ZjBkNzQ4YjU2ZDY4YmQ4NmJjOTlmMDYzYTdhMiJ9; _ga=GA1.2.960632246.1640965380; _gid=GA1.2.575823392.1640965380; __gads=ID=1d66574d3e167173-22ed5e3113cd00d2:T=1640965381:RT=1640965381:S=ALNI_MbjYEguAA_ASe2dQckzFEkK5CG_FA; _gat=1';
$headers[] = 'If-None-Match: W/^^2c0-AALqp0idUyd0BPxAmTT2lIBiKi8^^\"\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);

$x1 = json_decode($result,true);
return $x1['result']['id'];
}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
if($kobstype=='info'){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://storiesig.info/api/ig/profile/'.$kobsurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: storiesig.info';
$headers[] = 'Sec-Ch-Ua: ^^';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'X-Xsrf-Token: eyJpdiI6IitsTkxVS09tcUxKU1JJRnk3bTRPQXc9PSIsInZhbHVlIjoiQTBoVnVJdjdKOUM3YW4yWFJ3SkczbXNmb0VPS2F4MXN5UFwvNUZFWVFWbmVLN2R3UTIyQ1BlNVFPdk5FZlpcL0Z3d0xDTHY5eUFoZWxtZGZHZ2ttVzdDYjA2VGN5aG8zblZ2eWNZSW9MZlJjZitxbFBvVEVFMzgwOWk3Y2RSWDhjSyIsIm1hYyI6IjQ2MTE3NWRlNzFmNGEwMWVlNjZkNjE0MDMyNzQ4OGI2NWYzYjA2MjQ1MzI0ZTI3OWM4ZGI2MTM0YWVkNmNhNTkifQ==';
$headers[] = 'X-Token: null';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36';
$headers[] = 'Sec-Ch-Ua-Platform: ^^Windows^^\"\"';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://storiesig.info/en/';
$headers[] = 'Accept-Language: en-US,en;q=0.9,fa;q=0.8';
$headers[] = 'Cookie: XSRF-TOKEN=eyJpdiI6IitsTkxVS09tcUxKU1JJRnk3bTRPQXc9PSIsInZhbHVlIjoiQTBoVnVJdjdKOUM3YW4yWFJ3SkczbXNmb0VPS2F4MXN5UFwvNUZFWVFWbmVLN2R3UTIyQ1BlNVFPdk5FZlpcL0Z3d0xDTHY5eUFoZWxtZGZHZ2ttVzdDYjA2VGN5aG8zblZ2eWNZSW9MZlJjZitxbFBvVEVFMzgwOWk3Y2RSWDhjSyIsIm1hYyI6IjQ2MTE3NWRlNzFmNGEwMWVlNjZkNjE0MDMyNzQ4OGI2NWYzYjA2MjQ1MzI0ZTI3OWM4ZGI2MTM0YWVkNmNhNTkifQ^%^3D^%^3D; aig_session=eyJpdiI6ImJ3elJ1OUx2Y2VQRU50OVdwQ0xGMnc9PSIsInZhbHVlIjoiWHVIQUlGZEYxeitpMUM4ZFB0ZFE1aEk1Rjh0aDBIUVE5Snhta2pxRHVBbUllUlpWTkY3RFRHeFJhWFExYjhHSjVpRTlQcE1KQWNMdm5JMjFHdXRyMWF0TDRDT1ZXT3lZXC83dmNsYzh3U1l1c3dLOUNxUnhWVUhSbE5LeGNpZGtRIiwibWFjIjoiODMxNjgwNDk3YjZmYzQ3NGJjZTU5ZGI2MTE1NjYyNjMwNmU2ZjBkNzQ4YjU2ZDY4YmQ4NmJjOTlmMDYzYTdhMiJ9; _ga=GA1.2.960632246.1640965380; _gid=GA1.2.575823392.1640965380; __gads=ID=1d66574d3e167173-22ed5e3113cd00d2:T=1640965381:RT=1640965381:S=ALNI_MbjYEguAA_ASe2dQckzFEkK5CG_FA; _gat=1';
$headers[] = 'If-None-Match: W/^^2c0-AALqp0idUyd0BPxAmTT2lIBiKi8^^\"\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$x1 = json_decode($result,true);
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$x1['result']], 448);
}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
if($kobstype=='story'){
$id=getid("$kobsurl");
if($id==null){
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>'wrong id|server problem'], 448);
}else{
$list = json_decode(file_get_contents("https://storiesig.info/api/ig/stories/$id"), true);

if($list['result']==null){
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>'no story|private account|server problem'], 448);
}else{
for($i=0;$i<=count($list['result'])-1;$i++){
$imageurl=$list['result'][$i]['image_versions2']['candidates'][0]['url'];
$videourl =$list['result'][$i]['video_versions'][0]['url'];
if($videourl==null){
$da =['story'=>$imageurl."&dl=1"];
$pptpr[]=$da;
}else{
$da =['story'=>$videourl];
$pptpr[]=$da;
}}
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',count =>count($list['result']) ,  'Results' =>$pptpr], 448);
}}}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
if($kobstype=='postkolli'){
$data['url']="https://www.instagram.com/".$kobsurl;
//=========================================================
$url= "https://storiesig.info/api/convert";
//=========================================================
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch,CURLOPT_NOBODY,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch,CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$kobs= curl_exec($ch);
curl_close($ch);
//=========================================================
$list = json_decode($kobs,true);
for($i=0;$i<=count($list)-1;$i++){

$urltype=$list[$i]['url'][0]['type'];
$urlcaption=$list[$i]['meta']['title'];

if(strpos($list[$i]['url'][0]['url'],'/api/instagram/' ) !== false){
$tt=$list[$i]['url'][0]['url'];
$urldl=urldecode($tt);
preg_match_all('#&uri=(.*?)&filename#',$urldl,$sidepath1);
$urldown=$sidepath1[1][0];
}else{
$urldown=$list[$i]['url'][0]['url'];
}
$da =['post'=>$urldown , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;
}
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',count =>count($list) , 'Results' =>$pptpr], 448);
}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
//========================================================= 
if($kobstype=='post'){
$data['url']=$kobsurl;
//=========================================================
$url= "https://storiesig.info/api/convert";
//=========================================================
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch,CURLOPT_NOBODY,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch,CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$kobs= curl_exec($ch);
curl_close($ch);
//=========================================================
$list = json_decode($kobs,true);
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
}}}
//■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
if($kobstype=='highlight'){
$id=getid("$kobsurl");
if($id==null){
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>'wrong id|server problem'], 448);
}else{
$list = json_decode(file_get_contents("https://storiesig.info/api/ig/highlights/$id"), true);

if($list['result']==null){
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>'no highlight|server problem'], 448);
}else{

for($i=0;$i<=count($list['result'])-1;$i++){

if (count($pptpr)==10){
break;
}
$urlid=$list['result'][$i]['id'];
$pptpr[]=$urlid;
}


foreach ($pptpr as $highid) {

$list1 = json_decode(file_get_contents("https://storiesig.info/api/ig/highlightStories/$highid"), true);
if(4<=count($list1['result'])){
$ccount=4;
}else{
$ccount=count($list1['result']);
}
for($i=0;$i<=$ccount-1;$i++){
$imageurl =$list1['result'][$i]['image_versions2']['candidates'][0]['url'];
$videourl =$list1['result'][$i]['video_versions'][0]['url'];
if($videourl==null){
$da =['highlight'=>$imageurl."&dl=1"];
$pptpr1[]=$da;
}else{
$da =['highlight'=>$videourl];
$pptpr1[]=$da;
}}}


echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',count =>count($pptpr1) ,  'Results' =>$pptpr1], 448);
}}}


