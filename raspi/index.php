<?php
/* 
 * This file is called for a wall paner display (we use raspberry pi)
 */
define('BASE', '.');
require_once(BASE . '/../config.inc');
require_once(BASE . '/../includes/class_raspi.inc');

/*
 * Read soPlanning configuration values
 */
$mysqli = new mysqli($cfgHostname, $cfgUsername, $cfgPassword, $cfgDatabase);

// Check connection 
if (mysqli_connect_errno()) {
    printf("ERREUR Connection a la base soPlanning: %s\n", mysqli_connect_error());
    exit();
} 

$smarty = new MySmarty();
$oTable = new raspi();

$aUsers = $oTable->listUsers();
$allUsers = $oTable->listAllUsers();
$aWeekDays = ['Lu','Ma','Me','Je','Ve'];


$aWeeks = $oTable->getLines(CONFIG_WALL_DISPLAY_WEEKS);
$aTasks = $oTable->Tasks;

$iReload = CONFIG_WALL_DISPLAY_REFRESH * 60 * 1000; // refresh display value

// Pass parameters to template
$aCalendar = [
    'Title' => 'Agenda',
    'Users' => $aUsers,
    'allUsers' => $allUsers,
    'nbUsers' => count($aUsers),
    'width' => intval(((1920-60)/count($aUsers))-5),
    'weekDays' => $aWeekDays,
    'Weeks' => $aWeeks,
    'Tasks' => $aTasks,
    'Reload' => $iReload
];

$smarty->assign('aCalendar',$aCalendar);

// Display template
$smarty->display('wall_display.tpl');

