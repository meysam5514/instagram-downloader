<?php
/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/
error_reporting(false);
header('Content-type: application/json;');

$sidepath4 = $_GET['url'];


$sidepath3['url']="$sidepath4";
$sidepath3['submit']="";

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$sidepath3);
curl_setopt($ch, CURLOPT_URL,"https://www.downloadgram.app/");
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$meysam1= curl_exec($ch);
curl_close($ch);

preg_match_all('#rel="noopener noreferrer" href="(.*?)"(.*?)>DOWNLOAD</a>#is',$meysam1,$sidepath1);

for($i=0;$i<=count($sidepath1[1])-1;$i++){
$sidepath2[]=$sidepath1[1][$i];
}

//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>['post'=>$sidepath2]], 448);
//========================================================= 

/*

• Channel  » @Sidepath «
• Writer  » @meysam_s71 «

// ===== اگه مادرت برات محترمه منبع رو پاک نکن عزیزم ===== \\
*/



