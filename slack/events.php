<?php // Slack Web Hook Handler
	require('./apis/sendNewLead.php');
	// when a user claimed the lead on Slack
	// Slack: Receive Claim; receive actoin from slack
	$file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","w");
	$requestBody = file_get_contents('php://input');
	$strData = str_replace ("&","",urldecode ($requestBody));
	$arr = [];
	parse_str($strData, $arr);
	$action = json_decode($arr['payload']);

	// Sierra: Find Lead; find the agent that claimed the lead
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.sierrainteractivedev.com/agents/find?email='.$action->user->username.'&pageSize=100&officeType=ignore',
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

	// Sierra: Claim lead; update the lead data by assign to this agent 

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.sierrainteractivedev.com/leads/2304618',
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
	
	curl_close($curl);

	// Slack: Send Claimed; send a message to slack that notifies this agent claimed this lead
	/* 
	{
		agent: {

		},
		lead: {
			
		}
	}
	*/
	sendNewLead($data);
?>