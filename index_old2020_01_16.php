<?php
include 'callAPI.php';
include 'connectstring.php';
    $accessToken = "kT9H2mrXWPMGeaTwwUpqu3RXRTTghlSAHXaPk+jZWC7kW8lI9pkbi8po6wemhLv3wzp7FUnh52sTOYbu+b1pPWMTIkGuqEuKAG2h3oqHFtkc23sSukoDHo6+o2e64a01J00m0JVo4h4wM2jDD+r2bQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $channelSecret = '0e14c3f144f47fbc2d247184253c0bf6';
    $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";//รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];//รับ id ว่ามาจากไหน
   $j=$arrayJson['events'][0]['source'];
   if(isset($arrayJson['events'][0]['source']['userId'])){
      $id = $arrayJson['events'][0]['source']['userId'];
      $id2 = $arrayJson['events'][0]['source']['userId']['user'];
   }
   else if(isset($arrayJson['events'][0]['source']['groupId'])){
      $id = $arrayJson['events'][0]['source']['groupId'];
   }
   else if(isset($arrayJson['events'][0]['source']['room'])){
      $id = $arrayJson['events'][0]['source']['room'];
   }
   if($message == "ID"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      $arrayPostData['messages'][2]['type'] = 'text';
      $arrayPostData['messages'][2]['text'] = "you Id ".var_dump($j).": [$id]:[$id2]";
      try {
          $sql="UPDATE user_table set id_line='$id' where username='yodsapon'";
          $stmt=$dbh->query($sql);
      }catch(Exception $e){
          echo $e->getMessage(),$e->getLine();
      }
      pushMsg($arrayHeader,$arrayPostData);
   }

    function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
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
