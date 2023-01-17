<?php
error_reporting(false);
header('Content-type: application/json;');
$kobsurl = $_GET['url'];

$data['url']="https://www.instagram.com/".$kobsurl;


$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://storiesig.info/api/convert");
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$meysam1= curl_exec($ch);
curl_close($ch);

$get =json_decode($meysam1,true);


//print_r($get);

for($i=0;$i<=count($get)-1;$i++){

if($get[$i]['url'][0]['type']=='jpg'){
$urltype=$get[$i]['url'][0]['type'];
$urlcaption=$get[$i]['meta']['title'];
$urldown=$get[$i]['url'][0]['url'];    
}elseif($get[$i]['url'][0]['type']=='mp4'){
$urltype=$get[$i]['url'][0]['type'];
$urldown=$get[$i]['sd']['url'];
$urlcaption=$get[$i]['meta']['title'];
}
$da =['post'=>$urldown , 'caption' => $urlcaption , 'type' => $urltype];
$pptpr[]=$da;
}
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$pptpr], 448);













