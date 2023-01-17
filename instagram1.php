<?php
error_reporting(false);
header('Content-type: application/json;');
$urlkobs = $_GET['url'];

if (!isset($urlkobs)) {

//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>"send url parameter"], 448);
//========================================================= 
}else{
    

//=========================================================
$data['link']="$urlkobs";
$data['submit']="DOWNLOAD";
//=========================================================
$url= 'https://www.w3toys.com/reels/?';
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

preg_match_all('#rel="noopener noreferrer" href="(.*?)"#is',$kobs,$post1);


for($i=0;$i<=count($post1[1])-1;$i++){
$aray[]=$post1[1][$i];

}
//=========================================================

echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>['post'=>$aray]], 448);




}




