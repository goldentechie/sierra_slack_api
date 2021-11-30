<?php
require('./../../config.php');

function getUserDataOnSlack($data) {
  global $SLACK_WEB_HOOK_URL;

  $curl = curl_init($SLACK_WEB_HOOK_URL);
  curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>claim_lead_template($data),
    CURLOPT_RETURNTRANSFER=>true
  ));
  $userdata = curl_exec($curl);
  curl_close($curl);
  return $userdata;
}
