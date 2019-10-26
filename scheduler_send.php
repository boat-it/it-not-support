<?php
include 'callAPI.php';
include 'connectstring.php';

    $accessToken = "kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $channelSecret = '0e14c3f144f47fbc2d247184253c0bf6';

    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);

    $arrayHeader = ['Content-Type: application/json','Authorization: Bearer'.$accessToken];
    // $arrayHeader = array();
    // $arrayHeader[] = "Content-Type: application/json";
    // $arrayHeader[] = "Authorization: Bearer {$accessToken}";

    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];#ตัวอย่าง Message Type "Text"

    if (isset($arrayJson['events'][0]['source']['userId'])) {
        $id = $arrayJson['events'][0]['source']['userId'];
    } elseif (isset($arrayJson['events'][0]['source']['groupId'])) {
        $id = $arrayJson['events'][0]['source']['groupId'];
    } elseif (isset($arrayJson['events'][0]['source']['room'])) {
        $id = $arrayJson['events'][0]['source']['room'];
    }
    //  USER ID LINE
    $userId = $arrayJson['originalDetectIntentRequest']['payload']['data']['source']['userId'];
    // 
    // flex message
    $rand_id=rand(01, 04); //random user from database
    $get_data = callAPI('GET', 'https://it-not-support.herokuapp.com/user_table.php?id='.$rand_id, false);
    $response = json_decode($get_data, true);

    $json_array='[{
      "type": "flex",
      "altText": "Flex Message",
      "contents": {
        "type": "bubble",
        "direction": "ltr",
        "header": {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "text",
              "text": "กรรมการรับเศษ(รอบเช้า)",
              "size": "lg",
              "align": "center",
              "gravity": "top",
              "weight": "bold",
              "color": "#FFFFFF",
              "wrap": true
            }
          ]
        },
        "body": {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "box",
              "layout": "horizontal",
              "contents": [
                {
                  "type": "text",
                  "text": "1.-",
                  "flex": 0,
                  "align": "center",
                  "weight": "bold"
                },
                {
                  "type": "text",
                  "text": "useridline(username) @(line)",
                  "margin": "sm",
                  "align": "start",
                  "wrap": true
                }
              ]
            },
            {
              "type": "box",
              "layout": "horizontal",
              "contents": [
                {
                  "type": "text",
                  "text": "2.-",
                  "flex": 0,
                  "weight": "bold"
                },
                {
                  "type": "text",
                  "text": "idformDB(idline) @'.print_r($userId).' ",
                  "margin": "sm",
                  "align": "start",
                  "wrap": true
                }
              ]
            }
          ]
        },
        "footer": {
          "type": "box",
          "layout": "horizontal",
          "flex": 7,
          "spacing": "sm",
          "margin": "xs",
          "contents": [
            {
              "type": "box",
              "layout": "vertical",
              "flex": 0,
              "contents": [
                {
                  "type": "spacer"
                }
              ]
            },
            {
              "type": "box",
              "layout": "vertical",
              "flex": 0,
              "contents": [
                {
                  "type": "spacer",
                  "size": "xs"
                }
              ]
            },
            {
              "type": "box",
              "layout": "vertical",
              "contents": [
                {
                  "type": "spacer"
                }
              ]
            },
            {
              "type": "box",
              "layout": "vertical",
              "flex": 0,
              "contents": [
                {
                  "type": "button",
                  "action": {
                    "type": "uri",
                    "label": "Manage",
                    "uri": "https://it-not-support.herokuapp.com/user_table.php?id=1"
                  },
                  "color": "#E8F3FF",
                  "margin": "sm",
                  "height": "sm",
                  "style": "secondary"
                }
              ]
            }
          ]
        },
        "styles": {
          "header": {
            "backgroundColor": "#2CA9FF"
          }
        }
      }
    }]';

  $jsonFlex=json_decode($json_array, true);
  
  print_r($json_array);
    if ($message == "Testing") {
        if (sizeof($arrayJson['events']) > 0) {
            foreach ($arrayJson['events'] as $event) {
                error_log(json_encode($event));
                $reply_message = '';
                $reply_token = $event['replyToken'];
                $data = [
                'replyToken' => $reply_token,
                'messages' => $jsonFlex
            ];
                print_r($data);
                $API_URL = 'https://api.line.me/v2/bot/message';
                $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
                $send_result = send_reply_message($API_URL.'/reply', $arrayHeader, $post_body);
                echo "Result: ".$send_result."\r\n";
            }
        }
    }
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














// ฟังชั่น ตอบกลับ
    // function replyMsg($arrayHeader, $arrayPostData)
    // {
    //     $strUrl = "https://api.line.me/v2/bot/message/reply";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $strUrl);
    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     $result = curl_exec($ch);
    //     curl_close($ch);
    // }   exit;
// push message
// function pushMsg($arrayHeader, $arrayPostData)
// {
//     $strUrl = "https://api.line.me/v2/bot/message/push";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $strUrl);
//     curl_setopt($ch, CURLOPT_HEADER, false);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     $result = curl_exec($ch);
//     curl_close($ch);
// }exit;
?>
</body>
</html>