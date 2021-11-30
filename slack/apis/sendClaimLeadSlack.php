<?
include('../../config.php');
require ("../template/claimlead.php");
function sendClaimLeadMessage($data) {
  global $SLACK_WEB_HOOK_URL;
  $curl = curl_init($SLACK_WEB_HOOK_URL);
  curl_setopt_array($curl, array(
    CURLOPT_HTTPHEADER=>array("Content-Type:application/json"),
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>claim_lead_template($data),
    CURLOPT_RETURNTRANSFER=>true
  ));
  echo curl_exec($curl);
  curl_close($curl);
}