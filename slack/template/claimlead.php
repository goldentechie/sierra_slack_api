<?php
function claim_lead_template($data)
{
    return '{
      "blocks": [
        {
          "type": "section",
          "text": {
            "type": "mrkdwn",
            "text": "Last chance guys, #newlead, going once, going twice, #'.$data->lead->id.'"
          }
        },
        {
          "type": "section",
          "text": {
            "type": "mrkdwn",
            "text": "*You have new Contact from*\n<losangeleshomes.com>\n*Price : *$'.$data->lead->price.' \n *City : * '.$data->lead->city.'"
          },
          "accessory": {
            "type": "image",
            "image_url": "'.$data->agent->pictureUrl.'",
            "alt_text": "computer thumbnail"
          }
        },
        {
          "type": "section",
          "text": {
            "type": "mrkdwn",
            "text": "*Stand down everyone, '.$data->agent->name.' beat you to it.*"
          }
        }
      ]
    }';
}