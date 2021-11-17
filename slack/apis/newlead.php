<?php
function new_lead_template($lead_data)
{
	return `{
    "blocks": [
        {
            "type": "section",
            "text": {
                "type": "mrkdwn",
                "text": "New Lead was created."
            }
        },
        {
            "type": "section",
            "fields": [
                {
                    "type": "mrkdwn",
                    "text": "*Name:*\nBenjamin Adams"
                },
                {
                    "type": "mrkdwn",
                    "text": "*Email:*\nbendam1207@gmail.com"
                },
                {
                    "type": "mrkdwn",
                    "text": "*Phone Number:*\n(224) 228-2238"
                },
                {
                    "type": "mrkdwn",
                    "text": "*Lead Type:*\nBuyer"
                },
                {
                    "type": "mrkdwn",
                    "text": "*Source:*\nByAgent"
                },
                {
                    "type": "mrkdwn",
                    "text": "*Address:*\n1st Northbrook, IL 60062"
                }
            ]
        },
        {
            "type": "actions",
            "elements": [
                {
                    "type": "button",
                    "text": {
                        "type": "plain_text",
                        "emoji": true,
                        "text": "Approve"
                    },
                    "style": "primary",
                    "value": "click_me_123"
                },
                {
                    "type": "button",
                    "text": {
                        "type": "plain_text",
                        "emoji": true,
                        "text": "Deny"
                    },
                    "style": "danger",
                    "value": "click_me_123"
                }
            ]
        }
    ]
}`;
}