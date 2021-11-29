<?php
function getUserDataOnSlack($data) {
  $cSendSlackMessage = curl_init("https://hooks.slack.com/services/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");
  curl_setopt_array($cSendSlackMessage, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>claim_lead_template($data),
    CURLOPT_RETURNTRANSFER=>true
  ));
  $userdata = curl_exec($cSendSlackMessage);
  curl_close($cSendSlackMessage);
  return $userdata;
}