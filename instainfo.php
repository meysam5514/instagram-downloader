<?php
error_reporting(false);
header('Content-type: application/json;');

$typekobs = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://instafinsta.com/insta-dp-viewer");
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,"");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cooki.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cooki.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");

$sidepath1= curl_exec($ch);

preg_match_all('#<input type="hidden" name="_token" value="(.*?)">#',$sidepath1,$side1);

curl_close($ch);

$data['referer']="https://instafinsta.com/insta-dp-viewer";
$data['locale']="en";
$data['_token']=$side1[1][0];
$data['link']="http://instagram.com/$typekobs";

$ch = curl_init();
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL, 'https://instafinsta.com/download');
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_COOKIEJAR,"cooki.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cooki.txt");
//curl_setopt($ch, CURLOPT_HEADER, false);
//curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$meysam1= curl_exec($ch);
curl_close($ch);




preg_match_all('#<p>(.*?)</p>#is',$meysam1,$sidepath5);//1-0 bio

preg_match_all('#<h3>(.*?)</h3>#is',$meysam1,$sidepath3);//name
preg_match_all('#<p class="title">(.*?)</p>#is',$meysam1,$sidepath2);//user

preg_match_all('#<td(.*?)>(.*?)</td>#',$meysam1,$sidepath6);
preg_match_all('#<a href="(.*?)" target="_blank" rel="noopener noreferrer nofollow">#',$meysam1,$sidepath7);
$sidepath4=str_replace(";","&",$sidepath7[1]);

$da =[
'username'=>$sidepath2[1][0],
'full_name'=>$sidepath3[1][0],
'profile_pic_url'=>$sidepath4[1],
'biography'=>$sidepath5[1][0],
'is_private'=>$sidepath6[2][1],
'follower_count'=>$sidepath6[2][0],
'is_Verified'=>$sidepath6[2][2],
'Profile Modified'=>$sidepath6[2][3],
];
//=========================================================
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>$da], 448);
//=========================================================







