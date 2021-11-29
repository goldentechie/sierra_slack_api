<?php // Sierra Web Hook Handler
  require ("./api/getLeadData.php");
  require ("../slack/apis/sendNewLead.php");
  // record all events to data.txt
  $file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","w");
	$requestBody = file_get_contents('php://input');
	// $event = json_decode($requestBody);
	fwrite($file, date('Y-m-d H:i:s') ."\n");
	fwrite($file, $requestBody);
	fwrite($file,"\n");
	fwrite($file,"\n");
  
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);

  switch($event->eventType)
  {
    case "LeadCreated":
      { 
        // get lead detail from the sierra
        getLeadData($event->resourceList[0]);
        // send a message to slack
        sendNewLead($leadData);
      }
    break;
  }