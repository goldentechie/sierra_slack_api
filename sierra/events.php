<?php
echo __DIR__;
  require(__DIR__ ."/eventHandlers/leadCreated.php");

  // record all events to data.txt
  $file = fopen("data.txt","a+");
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);

  switch($event->eventType)
  {
    case "LeadCreated":
      onLeadCreated($event);
      break;
  }