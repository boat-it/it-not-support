<?php
$accessToken = "kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$accessToken}";
$message = $arrayJson['events'][0]['message']['text']; // ข้อความจาก line

if(isset($arrayJson['events'][0]['source']['userId'])){
    $id = $arrayJson['events'][0]['source']['userId'];
}
else if(isset($arrayJson['events'][0]['source']['groupId'])){
    $id = $arrayJson['events'][0]['source']['groupId'];
}
else if(isset($arrayJson['events'][0]['source']['room'])){
    $id = $arrayJson['events'][0]['source']['room'];
}
if($message == "Request-id"){
    $arrayPostData['to'] = $id;
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "Testing OK [$id]";
    $arrayPostData['messages'][1]['type'] = "sticker";
    $arrayPostData['messages'][1]['packageId'] = "2";
    $arrayPostData['messages'][1]['stickerId'] = "34";
    pushMsg($arrayHeader,$arrayPostData);
}
?>