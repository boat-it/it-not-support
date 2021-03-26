let post_from_php = $.post(json_array);
let  username1 = JSON.parse(this.username1)
let  username2 = JSON.parse(this.username2)
let  idlineuser1 = JSON.parse(this.idlineuser1)
let  idlineuser2 = JSON.parse(this.idlineuser2)
let  statususer2 = JSON.parse(this.statususer1)
let  statususer2 = JSON.parse(this.statususer2)
let  cycle_committee = JSON.parse(this.cycle_committee)
let json_array={
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
            "text": "กรรมการรับเศษ("+ cycle_committee +")",
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
                "text": "("+ username1 +") ("+ idlineuser1 +")",
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
                "text": "("+ username2 +") ("+ idlineuser2 +")",
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
  }

  console.log(json_array);
  alert(json_array);