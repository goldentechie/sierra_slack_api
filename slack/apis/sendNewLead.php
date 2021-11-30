<?php
require('./config.php');
require ("./slack/template/newlead.php");
function sendNewLead($leadData) {
  global $SLACK_WEB_HOOK_URL;

  $curl = curl_init($SLACK_WEB_HOOK_URL);

  curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>new_lead_template($leadData),
    CURLOPT_RETURNTRANSFER=>true
  ));
  echo new_lead_template($leadData);
  $response = curl_exec($curl);
  curl_close($curl);
  echo $response;
 
}