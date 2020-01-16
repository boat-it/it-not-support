<?php
// chanel  && token

if(isset($_POST['json'])=='json'){
$accessToken = "kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
$channelSecret = '0e14c3f144f47fbc2d247184253c0bf6';
$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);
$message = $arrayJson['events'][0]['message']['text'];    
    $json_array = json_decode($_POST['json']);
    if ($message == "test") {
        if (sizeof($arrayJson['events']) > 0) {
            foreach ($arrayJson['events'] as $event) {
                error_log(json_encode($event));
                $reply_message = '';
                $reply_token = $event['replyToken'];
                $data = [
                'replyToken' => $reply_token,
                'messages' =>[$json_array],
            ];
                $API_URL = 'https://api.line.me/v2/bot/message';
                $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
                $send_result = send_reply_message($API_URL.'/reply', $arrayHeader, $post_body);
                echo "Result: ".$send_result."\r\n";
            }
        }
        print "file ok";
    }
}
//  function reply message
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
