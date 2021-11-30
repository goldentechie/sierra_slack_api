<?php
require('./config.php');
function getAgentData ($username) {
	global $SIERRA_GET_AGENT_URL;
	global $SIERRA_HEADER;

  $curl = curl_init();
  curl_setopt_array($curl, array(
		CURLOPT_URL => $SIERRA_GET_AGENT_URL.$username,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => $SIERRA_HEADER
	));

	$response = curl_exec($curl);
	$agentData = json_decode($response);
	$agent = $agentData->data->agents[0];
	
	curl_close($curl);
  return $agent;
}
