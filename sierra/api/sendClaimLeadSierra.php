<?
function sendClaimLeadSierra ($data) {
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
		CURLOPT_HTTPHEADER => array(
			'Sierra-ApiKey: ba5d2b88-642d-4629-a2ca-30c3dcab34a5',
			'Content-Type: application/json'
		),
	));
	
	$response = curl_exec($curl);
	$result = json_decode($response);
	curl_close($curl);

  return $result;
}