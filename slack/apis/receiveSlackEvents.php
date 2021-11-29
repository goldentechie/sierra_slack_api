<?php
function receiveSlackEvents ()
{
  // Slack: Receive Claim; receive actoin from slack
	$file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","w");
	$requestBody = file_get_contents('php://input');
	$strData = str_replace ("&","",urldecode ($requestBody));
	$arr = [];
	parse_str($strData, $arr);
	$action = json_decode($arr['payload']);

  return $action;
}