<?php
function new_lead_template($leadData)
{
    return '{
        "blocks": [
          {
            "type": "section",
            "text": {
              "type": "mrkdwn",
              "text": "Last chance guys, #newlead, going once, going twice, #'.$leadData->data->id.'"
            }
          },
          {
            "type": "section",
            "text": {
              "type": "mrkdwn",
              "text": "*You have new Contact from*\n<losangeleshomes.com>\n*Price:* \n*City:* '.$leadData->data->streetAddress.'"
            },
            "accessory": {
              "type": "image",
              "image_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRD2xhgitAer-bNIwOYxcZrQWVZ_9wOr5KGwQ&usqp=CAU",
              "alt_text": "computer thumbnail"
            }
          },
          {
            "type": "actions",
            "elements": [
              {
                "type": "button",
                "text": {
                  "type": "plain_text",
                  "text": "Claim this Lead",
                  "emoji": true
                },
                "value": "click_me_123",
                "action_id": "actionId-0"
              }
            ]
          }
        ]
      }';
}