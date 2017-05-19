<?php
require_once('../database.inc');
require_once('class/soPlanningClass.inc');
require_once('class/infocobClass.inc');
require_once('class/librePlanClass.inc');

// Déterminer si appel depuis Web ou ligne de commande
if( is_null($_SERVER['_']))
{
  define('NL',"<br />\n");
  define('BOLD',"<b>");
  define('ENDBOLD',"</b>");
  define('WWW', true);
}
else 
{
  define('NL',"\n");
  define('BOLD',"\033[32m\033[1m"); // Couleur vert
  define('ENDBOLD',"\033[0m");
  define('WWW',false);
}

// Connexion à soPlanning
$oPlanning = new soPlanningClass($cfgHostname,$cfgUsername,$cfgPassword,$cfgDatabase);
// Obtenir les constantes contenues dans la table planning_config
$oPlanning->getDefines();
$oPlanning->setDebug(false);

// Connexion à InfoCob
$oInfoCob = new infocobClass();

// Les groupes à utiliser
$Groups = explode(',',CONFIG_SYNCHRONIZE_GROUPS);
// Synchroniser les groupes de soPLanning
$aGroups = $oPlanning->syncGroups($Groups);

// Obtenir la liste des utilisateurs d'InfoCob
$aInfoCobUsers = $oInfoCob->getUserList($Groups);
// Obtenir la liste des congés
$aInfocobHolidays = $oInfoCob->getNonWorkingDays();
// Ajouter le gid à la liste utilisateur
foreach( $aInfoCobUsers as &$aInfoCobUser )
{
  $aInfoCobUser['gid'] = $aGroups[$aInfoCobUser['groupe']];
}

// Obtenir la liste des utilisateurs soPlanning
$aSoPlanningUsers = $oPlanning->getUserList();

echo BOLD . "Synchronisation utilisateurs" . ENDBOLD . NL;
$aInsert = array();
$aUpdate = array();
foreach( $aInfoCobUsers as $InfoCobUser)
{
  $uid = $InfoCobUser['uid'];
  if( !isset($aSoPlanningUsers[$InfoCobUser['uid']]) )
  {
    $aInsert[] = $InfoCobUser;
  }
  else
  {
    $aUpdate[] = $InfoCobUser;
  }
}

// Ajout des utilisateurs non présents
$oPlanning->addUsers($aInsert);
// Modification des utilisateurs déjà présents
$oPlanning->modUsers($aUpdate);

echo B// TODO : Supprimer les congÃ©s futurs avant synchronisation
OLD . "Synchronisation conges" . ENDBOLD . NL;
$aSoPlanningHolidays = $oPlanning->getHolidays();

// Transformer les périodes en jour exceptionnel
$aHolidays = getHolidays($aInfocobHolidays);

// Positionner les vacances dans soPlanning
$aPlanningAction = $oPlanning->setHolidays($aHolidays, 
        $aSoPlanningHolidays);

$oPlanning->saveHolidaysChanges($aPlanningAction);


echo BOLD."Synchronisation librePlan" .ENDBOLD.NL;
$oLibrePlan = new librePlanClass();

$aLibrePlanUsers = $oLibrePlan->getUsers();

foreach($aInfoCobUsers as &$aICU)
{
  if( !isset($aLibrePlanUsers[$aICU['uid']]))
  {
    $nif = $aICU['uid'];
    echo "Veuillez creer un participant ayant pour id '$nif'".NL;
  }  
  else 
  {
    $aICU['update'] = true; 
  }
}

$oLibrePlan->updateWorkers($aInfoCobUsers);

// Ajouter NOM/prenom
foreach( $aInfocobHolidays as &$aIH)
{
  $aIH['user'] = $aInfoCobUsers[$aIH['uid']]['nom'] . 
          " " . $aInfoCobUsers[$aIH['uid']]['prenom'];
}
// $oLibrePlan->updateCalendars($aInfocobHolidays);

// Mettre à jour les projets
echo "  Mise a jour des projets" .NL;
$aLPProjects = $oLibrePlan->getProjects();
$oPlanning->updateProjects($aLPProjects);

echo "  Mise a jour des taches" .NL;
$aLPTasks = $oLibrePlan->getUsersTasks();
$oPlanning->updateTasks($aLPTasks);

die();


/* NE PAS SUPPRIMER
//Serveur AI = "192.168.110.5:D:/societe/infocob2000/Data/INFOCOB2000.GDB";
//Serveur Docker "172.17.0.19:/var/lib/firebird/2.5/data/INFOCOB2000.GDB";
 */

function getHolidays($aDays)
{
  $aHolidays = array();
  foreach( $aDays as $aPeriod )
  {
    $id = substr($aPeriod['id'],0,-3) . substr($aPeriod['date'],5,2) . 
            substr($aPeriod['date'],8,2);
    $uid = $aPeriod['uid'];
    $Start = $aPeriod['date'];
    if( !isset($aPeriod['date_fin']) )
    {
      $aHolidays[] = ['id' => $id,'uid' => $uid,'date' => $Start];
    }
    $End   = $aPeriod['date_fin'];
    while( $Start < $End )
    {
      $id = substr($aPeriod['id'],0,-3) . substr($Start,5,2) 
                . substr($Start,8,2);
      $aHolidays[] = ['id' => $id,'uid' => $uid,'date' => $Start];
      $Start = nextDay($Start);
    }
  
  }
  return $aHolidays;
}

function nextDay($Start)
{
  $notOk = true;
  while( $notOk )
  {
    $notOk = false;
    $Y = substr($Start,0,4);
    $m = substr($Start,5,2);
    $d = substr($Start,8,2);
    $dDay = mktime(0,0,0,$m,$d+1,$Y);
    $wDay = date('w',$dDay);
    if( $wDay==0 || $wDay==6 )
    {
      $notOk = true; // Jour de weekend, on passe au suivant
      $Start = date('Y-m-d',$dDay);
    }
  }
  return date('Y-m-d',$dDay);
}