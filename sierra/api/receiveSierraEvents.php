<?php
function receiveSierraEvents()
{
  $file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","w");
	$requestBody = file_get_contents('php://input');
	// $event = json_decode($requestBody);
	fwrite($file, date('Y-m-d H:i:s') ."\n");
	fwrite($file, $requestBody);
	fwrite($file,"\n");
	fwrite($file,"\n");
  
  $requestBody = file_get_contents('php://input');
  $event = json_decode($requestBody);
  return $event;
}