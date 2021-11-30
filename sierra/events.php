<?php // Sierra Web Hook Handler
  require ("./sierra/api/getLeadData.php");
  require ("./sierra/api/receiveSierraEvents.php");
  require ("./slack/apis/sendNewLead.php");
  // record all events to data.txt
  $event = receiveSierraEvents();

  switch($event->eventType)
  {
    case "LeadCreated":
      { 
        // get lead detail from the sierra
        $leadData = getLeadData($event->resourceList[0]);
        // send a message to slack
        sendNewLead($leadData);
      }
    break;
  }