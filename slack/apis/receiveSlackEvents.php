<?php
require("./config.php");

function receiveSlackEvents ()
{
	global $LOG_URL;

  // Slack: Receive Claim; receive actoin from slack
	$file = fopen($LOG_URL,"w");
	$requestBody = file_get_contents('php://input');
	fwrite($file, date('Y-m-d H:i:s') ."\n");
	fwrite($file, $requestBody);
	fwrite($file,"\n");
	fwrite($file,"\n");

	$strData = str_replace ("&","",urldecode ($requestBody));
	$arr = [];
	parse_str($strData, $arr);
	$action = json_decode($arr['payload']);

  return $action;
}