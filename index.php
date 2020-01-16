<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<?php
include 'connectstring.php'; // postgres connect

?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
$(document).ready(function () {
let json={
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
              "text": "(username 1) (id-line)",
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
              "text": "(username 2) (id-line)",
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
          "layout": "horizontal",
          "flex": 10,
          "margin": "sm",
          "contents": [
            {
              "type": "button",
              "action": {
                "type": "uri",
                "label": "Manage",
                "uri": "line://app/101"
              },
              "flex": 0,
              "color": "#E8F3FF",
              "margin": "sm",
              "height": "sm",
              "style": "secondary"
            },
            {
              "type": "button",
              "action": {
                "type": "postback",
                "label": "ok",
                "text": "ok",
                "data": "TRUE"
              },
              "flex": 0,
              "color": "#2090FD",
              "margin": "sm",
              "height": "sm",
              "style": "primary"
            },
            {
              "type": "button",
              "action": {
                "type": "postback",
                "label": "เลื่อน",
                "text": "pass",
                "data": "false"
              },
              "flex": 0,
              "color": "#FF3535",
              "margin": "xs",
              "height": "sm",
              "style": "primary"
            }
          ]
        }
      ]
    },
    "styles": {
      "header": {
        "backgroundColor": "#00416E"
      }
    }
  }
};

let js_data = JSON.stringify(json);
    $.ajax({
        type: "post",
        url: "php/response.php",
        data: {js_data},
        success: function (response) {
            console.log('ok');
        }
    });
});
  </script>
  </body>
</html>