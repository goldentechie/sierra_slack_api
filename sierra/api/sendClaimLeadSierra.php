<?php
require('./config.php');
function sendClaimLeadSierra ($data) {
	global $SIERRA_HEADER;
  $curl = curl_init();
	$agent = $data->agent;
	$lead = $data->lead;
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.sierrainteractivedev.com/leads/'.$lead->data->id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS =>'{
			"assignedTo": {
					"agentUserId": '.$agent->id.',
					"agentUserEmail": "'.$agent->email.'",
					"agentUserPhone": "'.$agent->directPhone.'",
					"agentUserFirstName": "'.$agent->firstName.'",
					"agentUserLastName": "'.$agent->lastName.'",
					"agentSiteId": -1
			}
	}',
		CURLOPT_HTTPHEADER => $SIERRA_HEADER,
	));
	
	$response = curl_exec($curl);
	$result = json_decode($response);
	curl_close($curl);

  return $result;
}