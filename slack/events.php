<?php // Slack Web Hook Handler
	require('./apis/sendClaimLead.php');
	require('./../sierra/api/getAgentData.php');
	require('./../sierra/api/sendClaimLead.php');

	// when a user claimed the lead on Slack
	
	// Slack: Receive Claim; receive actoin from slack
	$file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","w");
	$requestBody = file_get_contents('php://input');
	$strData = str_replace ("&","",urldecode ($requestBody));
	$arr = [];
	parse_str($strData, $arr);
	$action = json_decode($arr['payload']);

	// Sierra: Find agent; find the agent that claimed the lead
	$agent = getAgentData($action);
	
	// Sierra: Claim lead; update the lead data by assign to this agent 

	$result = sendClaimLead($agent);

	// Slack: Send Claimed; send a message to slack that notifies this agent claimed this lead
	/* 
	{
		agent: {
			pictureUrl:;
			name:;
		},
		lead: {
			id:;
			price:;
			city:;
		}, 
		
	}
	*/
	$data = json_decode ('{
		"agent" : {
			"pictureUrl" : "'.$agent->photo.'",
			"name" : "'.$agent->firstName.'"
		},
		"lead" : {
			"id" : ,
			"price" : ,
			"city" : 
		}
	}');
	if ($result->success)
		sendClaimLead($data);
?>