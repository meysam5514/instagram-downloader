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
$url= 'https://instaoffline.net/process/';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.394.130 Safari/537.36');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, ['q' => "$urlkobs"]);
    curl_setopt($curl , CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl , CURLOPT_HTTPHEADER);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $kobs= curl_exec($curl);
    curl_close($curl);


preg_match_all('#href=(.*?)>#',$kobs,$change1);

$rep2 = str_replace(["\/"],["/"],$change1[1]);        
 
$rep1 = str_replace('"',null,$rep2);     

$rep = str_replace('\\',null,$rep1);     


for($i=0;$i<=count($rep2)-1;$i++){
$aray[]=$rep[$i];

}
//=========================================================

echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71', 'count'=>$mcount, 'Results' =>['post'=>$aray]], 448);


}











