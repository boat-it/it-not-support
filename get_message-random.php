<?php
// URL API LINE
$API_URL = 'https://api.line.me/v2/bot/message';
// ใส่ Channel access token (long-lived)
$ACCESS_TOKEN = 'kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=';
// ใส่ Channel Secret
$CHANNEL_SECRET = 'a1f533a764bf17c9fa17d217ba1efe55';
// Set HEADER
$POST_HEADER = ['Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN];// Get request content
$request = file_get_contents('php://input');// Decode JSON to Array
$request_array = json_decode($request, true);

$message = $arrayJson['events'][0]['message']['text'];#ตัวอย่าง Message Type "Text"
    if(strpos($message,'เลื่อน')!= true){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "OK";
        replyMsg($arrayHeader,$arrayPostData);
    }else{
        die();
        exit();
    }
    #ตัวอย่าง Message Type "Sticker"
    $reply_message = "";
    $reply_token = $event['replyToken'];
    $data = ["replyToken" => $reply_token,"messages" => [$jsonFlex]];

    $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);



function send_reply_message($url, $post_header, $post_body)
{
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
?>
