<?php
require("./config.php");
  $file = fopen($LOG_URL,"r");
  echo __DIR__;
  echo "<pre>";
  echo fread($file, 5000);   
  echo "</pre>";