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

// Par défaut on se calle sur la date du jour
$iPast=0;
if( isset($_GET["Past"]) )
  $iPast=1;  // Deux mois avant
  
$smarty = new MySmarty();
$oTable = new raspi($iPast);

$aUsers = $oTable->listUsers();
$allUsers = $oTable->listAllUsers();
$aWeekDays = ['Lu','Ma','Me','Je','Ve'];


$aWeeks = $oTable->getLines(CONFIG_WALL_DISPLAY_WEEKS);
$aTasks = $oTable->Tasks;

$iReload = CONFIG_WALL_DISPLAY_REFRESH * 60 * 1000; // recharger la page toutes les x minutes

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
$smarty->assign('iPast',$iPast);

$smarty->display('wall_display.tpl');

