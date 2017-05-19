<?php
$aAgents = ["ipod","iphone","ipad","android","palm"];
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

$bMobile = false;
$bRaspi = false;
foreach( $aAgents as $sAgent )
{
  if( strpos($aAgent,$userAgent) > 0)
          $bMobile = true;
}

// Test 
//$bRaspi = true;
if( $bMobile )
  header("Location: mobile/index.php");
else
{
  if( $bRaspi )
    header("Location: raspi/index.php");
  else 
    header("Location: www/index.php");
}
exit();
