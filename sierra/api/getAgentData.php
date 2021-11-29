<?
function getAgentData ($username) {
  $curl = curl_init();
  curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.sierrainteractivedev.com/agents/find?email='.$username.'&pageSize=100&officeType=ignore',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'Sierra-ApiKey: ba5d2b88-642d-4629-a2ca-30c3dcab34a5'
		),
	));

	$response = curl_exec($curl);
	$agentData = json_decode($response);
	$agent = $agentData->data->agents[0];
	
	curl_close($curl);
  return $agent;
}
