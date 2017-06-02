<?php
require_once('../database.inc');
require_once('class/soPlanningClass.inc');
require_once('class/infocobClass.inc');
require_once('class/librePlanClass.inc');

// Determiner si appel depuis Web ou ligne de commande
if( is_null($_SERVER['_']))
{
  //header('Content-Type: text/event-stream');
  //header('Cache-Control: no-cache');

  //define('DATA', 'data: ');
  define('DATA','');
  define('NL',"<br>\n");
  define('BOLD',"<b>");
  define('ENDBOLD',"</b>");
  define('SPACE','&nbsp;&nbsp;&nbsp;&nbsp;');
  define('WWW', true);
}
else
{
  define('DATA','');
  define('NL',"\n");
  define('BOLD',"\033[32m\033[1m"); // Couleur vert
  define('ENDBOLD',"\033[0m");
  define('SPACE','    ');
  define('WWW',false);
}
// Connexion a soPlanning
$oPlanning = new soPlanningClass($cfgHostname,$cfgUsername,$cfgPassword,$cfgDatabase);
// Obtenir les constantes contenues dans la table planning_config
$oPlanning->getDefines();
$oPlanning->setDebug(false);

// Connexion a InfoCob
echo DATA.BOLD."Connection au serveur Infocob".ENDBOLD.NL;
flush();
$oInfoCob = new infocobClass();
if( !$oInfoCob->getConnectOk() )
  {
  echo DATA."ERREUR: Pas de connection au serveur InfoCobob".NL;
  flush();
  die();
  }
echo DATA.SPACE."Connect&eacute;".NL;
flush();

// Les groupes a utiliser
$Groups = explode(',',CONFIG_SYNCHRONIZE_GROUPS);
// Synchroniser les groupes de soPLanning
$aGroups = $oPlanning->syncGroups($Groups);

// Obtenir la liste des utilisateurs d'InfoCob
$aInfoCobUsers = $oInfoCob->getUserList($Groups);

// Ajouter le gid à la liste utilisateur
foreach( $aInfoCobUsers as &$aInfoCobUser )
{
  $aInfoCobUser['gid'] = $aGroups[$aInfoCobUser['groupe']];
}
/* DBG Utilisateurs
$Handle = fopen('InfoUsers.csv','w');
foreach($aInfoCobUsers as $aInfoCobUser)
  fputcsv($Handle,$aInfoCobUser);	
fclose($Handle); */

// Obtenir la liste des congés
$aInfocobHolidays = $oInfoCob->getNonWorkingDays();
/* DBG Congés
$Handle = fopen('InfoHolidays.csv','w');
foreach($aInfocobHolidays as $aInfocobHoliday)
  fputcsv($Handle,$aInfocobHoliday);	
fclose($Handle); */

// Obtenir la liste des utilisateurs soPlanning
$aSoPlanningUsers = $oPlanning->getUserList();

echo BOLD . "Synchronisation utilisateurs" . ENDBOLD . NL;
$aInsert = array();
$iInsert = 0;
$aUpdate = array();
foreach( $aInfoCobUsers as $InfoCobUser)
{
  $uid = $InfoCobUser['uid'];
  if( !isset($aSoPlanningUsers[$InfoCobUser['uid']]) )
  {
    $aInsert[] = $InfoCobUser;
    $iInsert++; 
  }
  else
  {
    $aUpdate[] = $InfoCobUser;
  }
}

if( $iInsert != 0 )
  echo DATA.SPACE."Il y a $iInsert nouveau(x) utilisateur(s)".NL;
else
  echo DATA.SPACE."Pas de nouveau utilisateur".NL;

// Ajout des utilisateurs non présents
$oPlanning->addUsers($aInsert);
// Modification des utilisateurs déjà présents
$oPlanning->modUsers($aUpdate);

echo BOLD . "Synchronisation cong&eacutes" . ENDBOLD . NL;
// Supprimer les congés futurs
$oPlanning->delFutureHolidays();

// Transformer les periodes en jour exceptionnel
$aHolidays = getHolidays($aInfocobHolidays);
/* DBG Congés
$Handle = fopen('soplanningHolidays.csv','w');
foreach($aHolidays as $aHoliday)
  fputcsv($Handle,$aHoliday);	
fclose($Handle); */

// Sauvegarder les conges
$oPlanning->saveHolidaysChanges($aHolidays);
$iDays = count($aHolidays);
echo DATA.SPACE."Il y a $iDays jours de cong&eacute;s pr&eacute;vus".NL;


echo BOLD."Synchronisation librePlan" .ENDBOLD.NL;
$oLibrePlan = new librePlanClass();
if( $oLibrePlan->isConnected() )
  echo SPACE.'Connect&eacute;'.NL;
else
  echo SPACE.'Pb connection &agrave; librePlan'.NL;

$aLibrePlanUsers = $oLibrePlan->getUsers();

foreach($aInfoCobUsers as &$aICU)
{
  if( !isset($aLibrePlanUsers[$aICU['uid']]))
  {
    $nif = $aICU['uid'];
    echo DATA.SPACE."Veuillez creer un participant ayant pour id '$nif'".NL;
  }
  else
  {
    $aICU['update'] = true; 
  }
}
$iNbre = count($aInfoCobUsers);
echo DATA.SPACE."Mise &agrave; jours des participants ($iNbre)".NL;
$oLibrePlan->updateWorkers($aInfoCobUsers);

// Ajouter NOM/prenom
foreach( $aInfocobHolidays as &$aIH)
{
  $aIH['user'] = $aInfoCobUsers[$aIH['uid']]['nom'] . 
          " " . $aInfoCobUsers[$aIH['uid']]['prenom'];
}

// Mettre à jour les projets
$aLPProjects = $oLibrePlan->getProjects();
//error_log("Projets\n".print_r($aLPProjects,true),3,'Cron.log');
$iNbProjs = count($aLPProjects);
echo SPACE."Mise a jour des projets ($iNbProjs)" .NL;
$oPlanning->updateProjects($aLPProjects);
/* DBG Tâches
$Handle = fopen('libreplanProjects.csv','w');
foreach($aLPProjects as $aLPProject)
  fputcsv($Handle,$aLPProject);	
fclose($Handle); */


$aLPTasks = $oLibrePlan->getUsersTasks();
//error_log("Taches\n".print_r($aLPTasks,true),3,'Cron.log');
$iNbTasks = $oLibrePlan->getNbTasks();
echo SPACE."Mise a jour des taches assign&eacute;es ($iNbTasks)" .NL;
/* DBG Tâches
$Handle = fopen('libreplanTasks.csv','w');
foreach($aLPTasks as $aLPTask)
  fputcsv($Handle,$aLPTask);	
fclose($Handle); */
$oPlanning->updateTasks($aLPTasks);

echo BOLD ."Synchronisation termin&eacute;e" .ENDBOLD.NL;
die();


/* NE PAS SUPPRIMER
//Serveur AI = "192.168.110.5:D:/societe/infocob2000/Data/INFOCOB2000.GDB";
//Serveur Docker "172.17.0.19:/var/lib/firebird/2.5/data/INFOCOB2000.GDB";
 */
/**
 * 
 */
function getHolidays($aDays)
{
  $aHolidays = array();
  foreach( $aDays as $aPeriod )
  {
    $id = $aPeriod['id'] . substr($aPeriod['date'],5,2)
            . substr($aPeriod['date'],8,2);
    $uid = $aPeriod['uid'];
    $Start = $aPeriod['date'];
    if( !isset($aPeriod['date_fin']) )
    {
      $aHolidays[] = ['id' => $id,'uid' => $uid,'date' => $Start];
    }
    $End   = $aPeriod['date_fin'];
    while( $Start < $End )
    {
      $id = $aPeriod['id'] . substr($Start,5,2) 
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
