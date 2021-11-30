<?
require('../../config.php');
function getLeadData ($id) {
  global $SIERRA_GET_LEAD_URL;
	global $SIERRA_HEADER;
  $cGetLead = curl_init($SIERRA_GET_LEAD_URL.$id);

  curl_setopt($cGetLead, CURLOPT_HTTPHEADER, $SIERRA_HEADER);
  curl_setopt($cGetLead, CURLOPT_RETURNTRANSFER, true);
  $cleadData = curl_exec($cGetLead);
  $leadData = json_decode($cleadData);
  curl_close($cGetLead);
  return $cGetLead;
}