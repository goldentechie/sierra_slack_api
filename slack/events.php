<?php // Slack Web Hook Handler
	require('./slack/apis/receiveSlackEvents.php');
	require('./sierra/api/getLeadData.php');
	require('./sierra/api/getAgentData.php');

	// when a user claimed the lead on Slack
	$action = receiveSlackEvents();

	// Sierra: Find agent; find the agent that claimed the lead
	$lead = getLeadData($action->message->blocks[2]->elements[0]->value);
	$agent = getAgentData($action->user->username);
	
	// Sierra: Claim lead; update the lead data by assign to this agent 
	$result = sendClaimLeadSierra(json_decode('{"lead":'.json_encode($lead).', "agent": '.json_encode($lead).'}'));

	// Slack: Send Claimed; send a message to slack that notifies this agent claimed this lead
	$data = json_decode ('{
		"agent" : {
			"pictureUrl" : "'.$agent->photo.'",
			"name" : "'.$agent->firstName.'"
		},
		"lead" : {
			"id" : '.$lead->data->id.',
			"price" : '.$lead->data->searchPreference->minPrice.',
			"city" : '.$lead->data->searchPreference->city.'
		}
	}');
	if ($result->success)
		sendClaimLeadMessage($data);
?>