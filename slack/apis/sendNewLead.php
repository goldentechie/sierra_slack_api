<?
require ("../template/newlead.php");
function sendNewLead($leadData) {
  $cSendSlackMessage = curl_init("https://hooks.slack.com/services/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");
  curl_setopt_array($cSendSlackMessage, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>new_lead_template($leadData),
    CURLOPT_RETURNTRANSFER=>true
  ));
  echo curl_exec($cSendSlackMessage);
  curl_close($cSendSlackMessage);
}