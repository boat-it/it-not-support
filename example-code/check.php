<?php
include '../connectstring.php';
date_default_timezone_set("Asia/Bangkok");
print "current_date".$date=date("Y-m-d H:i:s");



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
            "text": "Committee ",
            "size": "lg",
            "align": "center",
            "gravity": "top",
            "weight": "bold",
            "color": "#0032FF"
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
                "text": "(username 1) (id-line)",
                "margin": "sm",
                "align": "start"
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
                "text": "(username 2) (id-line)",
                "margin": "sm",
                "align": "start"
              }
            ]
          }
        ]
      },
      "footer": {
        "type": "box",
        "layout": "horizontal",
        "contents": [
          {
            "type": "button",
            "action": {
              "type": "message",
              "label": "ok",
              "text": "OK"
            },
            "color": "#02FF00",
            "margin": "sm",
            "height": "sm",
            "style": "secondary"
          },
          {
            "type": "button",
            "action": {
              "type": "message",
              "label": "เลื่อน",
              "text": "เลื่อน"
            },
            "color": "#FF0000",
            "margin": "sm",
            "height": "sm",
            "style": "primary"
          },
          {
            "type": "button",
            "action": {
              "type": "uri",
              "label": "ManageMent",
              "uri": "https://it-not-support.herokuapp.com/user_table.php?id=1"
            },
            "color": "#005FFF",
            "margin": "sm",
            "height": "sm",
            "style": "link"
          }
        ]
      }
    }
  }]';
$json_array_php=json_decode($json_array ,true);

print_r($json_array_php);

print "<hr>";
$query2="SELECT * from check_date_time order by current_date ASC";
$stmt2=$dbh->query($query2);
$stmt2->execute();
while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
    print $row['current_date'];
    print "<br>";
}
print "file ok";





?>
