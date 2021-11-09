<?php

  if (file_exists($json_file)) {
    $get_json = file_get_contents($json_file);
    $json_arr = json_decode($get_json, true);
  } else {
    echo "File $json_file does not exist";
  }
  
?>