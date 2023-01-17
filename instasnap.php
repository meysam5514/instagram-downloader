<?php
//link story===video va baghie chiza hm dare
error_reporting(false);
header('Content-type: application/json;');

$urlkobs = $_GET['url'];

//=========================================================
$url= 'https://snapinsta.app/action.php';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, ['url'=>"$urlkobs",'action' => 'post']);
    curl_setopt($curl , CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl , CURLOPT_HTTPHEADER);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $kobs= curl_exec($curl);
    curl_close($curl);


preg_match_all('#href="(.*?)"#',$kobs,$change1);

for($i=0;$i<=count($change1[1])-3;$i++){
    
if(strpos($change1[1][$i],'/dl.php?token=' ) !== false){   
$dl= explode("=",$change1[1][$i]);
$link=base64_decode("$dl[1]");
$aray[]=$link;
}else{
$aray[]=$change1[1][$i];
}
}


//=========================================================

echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>['post'=>$aray]], 448);













