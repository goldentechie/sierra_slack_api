<?php
  $file = fopen("/home/u694294751/domains/crpanadasoft.com/public_html/data.txt","r");
  echo __DIR__;
  echo "<pre>";
  echo fread($file, 5000);   
  echo "</pre>";