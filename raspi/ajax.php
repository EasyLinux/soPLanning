<?php
/* 
 * This file is called for a wall paner display (we use raspberry pi)
 */
define('BASE', '.');
require_once(BASE . '/../config.inc');
require_once(BASE . '/../includes/class_raspi.inc');

/*
 * Configuration de soPlanning
 */
// Lire les donnees soPlanning
$mysqli = new mysqli($cfgHostname, $cfgUsername, $cfgPassword, $cfgDatabase);

// check connection 
if (mysqli_connect_errno()) {
    printf("ERREUR Connection a la base soPlanning: %s\n", mysqli_connect_error());
    exit();
}

if( $_POST['action'] == "switchDisplay" )
{
  $SQL = "UPDATE planning_user SET display=".$_POST['Val']
         . " WHERE user_id='".$_POST['Uid']."';";
  $dbResult = $mysqli->query($SQL);
}

