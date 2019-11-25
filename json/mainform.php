<?php

$json_array=[
     "type"=> "flex",
     "altText"=> "กรรมการรับเศษกระดาษ",
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
                 "flex"=> "0",
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
                 "flex"=> "0",
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
print_r($json_array);
print "<hr>";
print $json_array;
?>
