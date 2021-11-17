<?php
  require(__DIR__ ."/eventHandlers/leadCreated.php");

  // record all events to data.txt
  $file = fopen("data.txt","a+");
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);
  fwrite($file, date('Y-m-d H:i:s') ."\n");
  fwrite($file, $requestBody);
  fwrite($file,"\n");
  fwrite($file,"\n");

  switch($event->eventType)
  {
    case "LeadCreated":
      onLeadCreated($event);
      break;
  }