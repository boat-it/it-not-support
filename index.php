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
$jsonFlex=[ 
"type" => "flex", 
"altText" => "Flex Message", 
"contents" => [ 
"type" => "bubble", 
"direction" => "rtl", 
"header" => [ 
"type" => "box", 
"layout" => "vertical", 
"contents" => [ 
                    [ 
                    "type" => "text", 
                    "text" => "แจ้งงาน IT-support", 
                    "margin" => "xl", 
                    "size" => "md", 
                    "align" => "center", 
                    "gravity" => "center", 
                    "weight" => "bold", 
                    "color" => "#005FFF" 
                    ] 
] 
], 
"body" => [ 
"type" => "box", 
"layout" => "vertical", 
"contents" => [ 
[ 
"type" => "spacer", 
"size" => "xs" 
], 
[ 
"type" => "box", 
"layout" => "vertical", 
"contents" => [ 
[ 
"type" => "filler" 
], 
[ 
"type" => "box", 
"layout" => "horizontal", 
"contents" => [ 
[ 
"type" => "text", 
"text" => "ขอ Reset Password เนื่องจาก รหัสผ่าน ของ nannapat หมดอายุ", 
"margin" => "none", 
"align" => "end", 
"wrap" => true 
], 
[ 
"type" => "text", 
"text" => "Detail",
"flex" => 0, 
"align" => "end", 
"weight" => "bold" 
] 
] 
], 
[ 
"type" => "box", 
"layout" => "horizontal", 
"contents" => [ 
[ 
"type" => "text", 
"text" => "ห้องบัญชี เครื่องชั่ง", 
"align" => "end", 
"gravity" => "top", 
"color" => "#545454", 
"wrap" => true 
], 
[ 
"type" => "text", 
"text" => "Location", 
"flex" => 0, 
"align" => "end", 
"gravity" => "top", 
"weight" => "bold" 
] 
] 
], 
[ 
"type" => "box", 
"layout" => "horizontal", 
"spacing" => "none", 
"contents" => [ 
[ 
"type" => "text", 
"text" => "nannapat", 
"flex" => 1, 
"align" => "end" 
], 
[ 
"type" => "text", 
"text" => "Username", 
"flex" => 0, 
"size" => "sm", 
"align" => "end", 
"weight" => "bold", 
"wrap" => false 
] 
] 
] 
] 
] 
] 
], 
"footer" => [ 
"type" => "box", 
"layout" => "horizontal", 
"contents" => [ 
[ 
"type" => "text", 
"text" => "192.168.5.6", 
"align" => "center", 
"gravity" => "center" 
], 
[ 
"type" => "button", 
"action" => [ 
"type" => "uri", 
"label" => "ติดตามงาน", 
"uri" => "http=>//192.168.5.10/dailyreportpm1" 
], 
"flex" => 0, 
"color" => "#089AFF", 
"margin" => "none", 
"height" => "md", 
"style" => "link", 
"gravity" => "center" 
] 
] 
] 
] 
];
    
          $reply_message = "";
          $reply_token = $event['replyToken'];
          $data = ["replyToken" => $reply_token,"messages" => 'TEST'];

          $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);


print_r($post_body);

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
