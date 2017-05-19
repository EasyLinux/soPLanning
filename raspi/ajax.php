<?php
/* 
 * This file is called from wall panel display 
 */
define('BASE', '.');
require_once(BASE . '/../config.inc');
require_once(BASE . '/../includes/class_raspi.inc');

/*
 * read soPlanning parameters
 */
$mysqli = new mysqli($cfgHostname, $cfgUsername, $cfgPassword, $cfgDatabase);

// check connection 
if (mysqli_connect_errno()) {
    printf("ERREUR Connection a la base soPlanning: %s\n", mysqli_connect_error());
    exit();
}

// set Display to true or false for user
if( $_POST['action'] == "switchDisplay" )
{
  $SQL = "UPDATE planning_user SET display=".$_POST['Val']
         . " WHERE user_id='".$_POST['Uid']."';";
  $dbResult = $mysqli->query($SQL);
}

