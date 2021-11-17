<?php
  $file = fopen("data.txt","a+");
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);
  var_dump(date('Y-m-d'));
  fwrite($file, date('Y-m-d H:i:s') ."\n");
  fwrite($file, $requestBody);
  fwrite($file,"\n");
  fwrite($file,"\n");
  var_dump($requestBody);
  var_dump($event);