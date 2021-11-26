<?php
echo "onfunction lead created";
function onLeadCreated($event)
{
  // get Lead data
  $cGetLead = curl_init("https://api.sierrainteractivedev.com/leads/get/".$event->resourceList[0]."?includeSavedSearches=true&includeTags=true&includeActionPlans=true");
  curl_setopt($cGetLead, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Sierra-ApiKey:ba5d2b88-642d-4629-a2ca-30c3dcab34a5"));
  $leadData = curl_exec($cGetLead);
  curl_close($cGetLead);

  // send a message to slack
  require(__DIR__ . '/../../slack/apis/newlead.php');
  
  $cSendSlackMessage = curl_init("https://hooks.slack.com/services/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");
  curl_setopt_array($cSendSlackMessage, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>new_lead_template($leadData),
    CURLOPT_RETURNTRANSFER=>true
  ));
  echo new_lead_template($leadData);
  //var_dump(curl_exec($cSendSlackMessage));
  curl_close($cSendSlackMessage);
}