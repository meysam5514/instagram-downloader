<?php
error_reporting(false);
header('Content-type: application/json;');
$kobsurl = $_GET['url'];

$ch = curl_init();
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://sidepath.ga/api/insta.php?type=info&url=$kobsurl");
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cooki.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cooki.txt");
$meysam1= curl_exec($ch);
curl_close($ch);

$array = json_decode($meysam1,true); 
$id=$array['Results']['id'];
$username=$array['Results']['username'];
$is_private=$array['Results']['is_private'];
$pic=$array['Results']['profile_pic_url'];
$bio=$array['Results']['biography'];
$name=$array['Results']['full_name'];
$post=$array['Results']['edge_owner_to_timeline_media']['count'];
$followers=$array['Results']['edge_followed_by']['count'];
$following=$array['Results']['edge_follow']['count'];

if($is_private==false){$is_private="no";}else{$is_private="yes";}




$da =['id'=>$id , 'name' => $name, 'username' => $username ,'bio'=>$bio , 'post count' => $post, 'following count' => $following, 'followers count' => $followers, 'pic' => $pic,'is private'=>$is_private];


echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71','Results' =>$da], 448);










