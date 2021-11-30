<?php
$DEV_MODE="local";

$SLACK_WEB_HOOK_URL="https://hooks.slack.com/services/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";

$SIERRA_API_KEY='Sierra-ApiKey: ba5d2b88-642d-4629-a2ca-30c3dcab34a5';

$SIERRA_GET_AGENT_URL='https://api.sierrainteractivedev.com/agents/find?pageSize=100&officeType=ignore&email=';

$SIERRA_GET_LEAD_URL="https://api.sierrainteractivedev.com/leads/get/";

$SIERRA_HEADER=array(
  $SIERRA_API_KEY,
  'Content-Type: application/json'
);

$LOG_URL_HOSTING="/home/u694294751/domains/crpanadasoft.com/public_html/data.txt";
$LOG_URL_LOCAL="./data.txt";

switch ($DEV_MODE) {
  case "local":
    $LOG_URL = $LOG_URL_LOCAL;
    break;
  case "hosting":
    $LOG_URL = $LOG_URL_HOSTING;
    break;
  default:
    $LOG_URL = $LOG_URL_LOCAL;
}