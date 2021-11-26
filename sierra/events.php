<?php

  // record all events to data.txt
  $file = fopen("data.txt","a+");
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);

  switch($event->eventType)
  {
    case "LeadCreated":
      {
       $cGetLead = curl_init("https://api.sierrainteractivedev.com/leads/get/".$event->resourceList[0]."?includeSavedSearches=true&includeTags=true&includeActionPlans=true");

       curl_setopt($cGetLead, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Sierra-ApiKey:ba5d2b88-642d-4629-a2ca-30c3dcab34a5"));
       curl_setopt($cGetLead, CURLOPT_RETURNTRANSFER, true);
        $cleadData = curl_exec($cGetLead);
        $leadData = json_decode($cleadData);
        curl_close($cGetLead);
       
       // send a message to slack  
       $cSendSlackMessage = curl_init("https://hooks.slack.com/services/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");
       curl_setopt_array($cSendSlackMessage, array(
         CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
         CURLOPT_POST=>true,
         CURLOPT_POSTFIELDS=>'{"blocks": [{"type": "section","text": {"type": "mrkdwn","text": "Last chance guys, #newlead, going once, going twice, #'.$leadData->data->id.'"}},{"type": "section","text": {"type": "mrkdwn","text": "*You have new Contact from*\n<losangeleshomes.com>\n*Price:* \n*City:* '.$leadData->data->streetAddress.'"},"accessory": {"type": "image","image_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRD2xhgitAer-bNIwOYxcZrQWVZ_9wOr5KGwQ&usqp=CAU","alt_text": "computer thumbnail"}},{"type": "actions","elements": [{"type": "button","text": {"type": "plain_text","text": "Claim this Lead","emoji": true},"value": "click_me_123","action_id": "actionId-0"}]}]}',
         CURLOPT_RETURNTRANSFER=>true
       ));
       echo curl_exec($cSendSlackMessage);
       curl_close($cSendSlackMessage);
      }
    break;
  }