<?php
require_once 'database.inc';

$bMobile = false;
if(strncmp($_SERVER['REMOTE_ADDR'],$myNetwork,strlen($myNetwork)) != 0)
  $bMobile = true;

if( $bMobile )
  header("Location: mobile/index.php");
else
  header("Location: www/index.php");
exit();
