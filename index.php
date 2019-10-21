<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link src='stylesheet' href='library/css/bootstrap.min.css'>
    <link src='stylesheet' href='library/css/jquery.3.4.1.min.css'>
    <script src="library/js/bootstrap.min.js"></script>
    <script src="library/js/jquery.3.4.1.min.js"></script>
    <title>user table committee</title>
</head>
<body>
<?php
include 'callAPI.php';
    $accessToken = "kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);

    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    // test get data
    // print $get_data = callAPI('GET', 'https://it-not-support.herokuapp.com/user_table.php?username=yodsapon'.$user['username']['yodsapon'],false);
    // $response = json_decode($get_data, true);
    // $errors = $response['response']['errors'];
    // $data = $response['response']['data'][0];
    // // 
    // Requert-id
    if($message=="Requert-id"){
        
    }
    if($message == "จ้า" || $message == "ครับ" || $message == "ค่ะ" || $message=='Request'){
        $rand_id=rand(01,04);
        $rand_sex=rand(01,02);
        $rand_department=rand(01,04);
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $get_data = callAPI('GET', 'https://it-not-support.herokuapp.com/user_table.php?id='.$rand_id,false);
        $response = json_decode($get_data, true);
        $errors = $response['response']['errors'];
        $data = $response['response']['data'][0];
        $arrayPostData['messages'][0]['text'] = "callAPI:$get_data";
        replyMsg($arrayHeader,$arrayPostData);
    }
    // 
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    // test show group
    if(isset($arrayJson['events'][0]['source']['userId'])){
        $id = $arrayJson['events'][0]['source']['userId'];
    }
    else if(isset($arrayJson['events'][0]['source']['groupId'])){
        $id = $arrayJson['events'][0]['source']['groupId'];
    }
    else if(isset($arrayJson['events'][0]['source']['room'])){
        $id = $arrayJson['events'][0]['source']['room'];
    }
    // flex message 
    $json_array=[
        "type"=> "flex",
        "altText"=> "Flex Message",
        "contents"=> [
          "type"=> "bubble",
          "direction"=> "ltr",
          "header"=> [
            "type"=> "box",
            "layout"=> "vertical",
            "contents"=> [
              [
                "type"=> "text",
                "text"=> "กรรมการรับเศษประจำวัน",
                "size"=> "lg",
                "align"=> "center",
                "gravity"=> "top",
                "weight"=> "bold",
                "color"=> "#0032FF"
              ]
            ]
          ],
          "body"=> [
            "type"=> "box",
            "layout"=> "vertical",
            "contents"=> [
              [
                "type"=> "box",
                "layout"=> "horizontal",
                "contents"=> [
                  [
                    "type"=> "text",
                    "text"=> "1.-",
                    "flex"=> 0,
                    "align"=> "center",
                    "weight"=> "bold"
                  ],
                  [
                    "type"=> "text",
                    "text"=> "(username 1) (id-line)",
                    "margin"=> "sm",
                    "align"=> "start"
                  ]
                ]
              ],
              [
                "type"=> "box",
                "layout"=> "horizontal",
                "contents"=> [
                  [
                    "type"=> "text",
                    "text"=> "2.-",
                    "flex"=> 0,
                    "weight"=> "bold"
                  ],
                  [
                    "type"=> "text",
                    "text"=> "(username 2) (id-line)",
                    "margin"=> "sm",
                    "align"=> "start"
                  ]
                ]
              ]
            ]
          ],
          "footer"=> [
            "type"=> "box",
            "layout"=> "horizontal",
            "contents"=> [
              [
                "type"=> "button",
                "action"=> [
                  "type"=> "uri",
                  "label"=> "Button",
                  "uri"=> "https=>//linecorp.com"
                ]
              ]
            ]
          ]
        ]
                ];
    // 
    if($message == "Testing"){
        $arrayPostData['to'] = $id;
        $arrayPostData['messages'][0]['type'] = "flex";
        $arrayPostData['messages'][0]['text'] = $json_array[];
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "2";
        $arrayPostData['messages'][1]['stickerId'] = "34";
        pushMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);

        // ฟังชั่น ตอบกลับ 
    }
    function replyMsg($arrayHeader,$arrayPostData){ 
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }   exit;
// push message 
function pushMsg($arrayHeader,$arrayPostData){
    $strUrl = "https://api.line.me/v2/bot/message/push";$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
}exit;
?>
</body>
</html>