<?php
  $file = fopen("data.txt","r");
  echo "<pre>";
  while(!feof($file))
  {
      echo fread($file, 100);   
  }
  echo "</pre>";