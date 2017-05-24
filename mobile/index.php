<?php
require_once('../database.inc');
define('BASE', '.');
require_once('../config.inc');
//require_once('getsql.php');

echo 'Dans mobile';
die();

$mysqli = new mysqli($cfgHostname, $cfgUsername, $cfgPassword, $cfgDatabase);
$smarty = new MySmarty();

$sAction = filter_input(INPUT_POST,"action",FILTER_SANITIZE_SPECIAL_CHARS);
$smarty->assign("erreur",0);
switch($sAction)
{
  case 'logout':
    unset($_SESSION);
    $Page = "login";
    break;
  
  case 'login':
    $Page = "login";
    $sLogin = filter_input(INPUT_POST,"login",FILTER_SANITIZE_SPECIAL_CHARS);
    $sPassw = filter_input(INPUT_POST,"password",FILTER_SANITIZE_EMAIL);
    $smarty->assign("erreur",1);
    if( ($aUser=isValid($mysqli, $sLogin,$sPassw)) )
    {
      $Page = "main";
      $uid = $aUser['uid'];
    }
    break; 
  
  case 'user':
    $uid = filter_input(INPUT_POST,"user",FILTER_SANITIZE_SPECIAL_CHARS);
    $smarty->assign("Datas",getMainDatas($mysqli, $uid));
    $Page = 'weeks';
    break;
  
  default:
    $Page = "main";
    if( !isset($_SESSION['user']) )
      $Page="login";
}

if( $Page == "main" )
  $smarty->assign("Datas",getMainDatas($mysqli, $uid));
$smarty->display("mobile/$Page.tpl");

die();

function getMainDatas($mysqli, $Uid)
{
  $aDatas = array();
  $aDayFrench = ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
  $Sql = "SELECT user_id, nom FROM planning_user";
  $stmt = $mysqli->prepare($Sql);
  $stmt->execute();
  $stmt->bind_result($uid,$name);
  while( $stmt->fetch() )
  {
    $aDatas['Users'][] = ['uid' => $uid, 'name' => $name];
    if( $uid == $Uid )
      $aDatas['name'] = $name;
  }
  $aDatas['uid'] = $Uid;
  $curDay = date('w');
  $startWeek = date('Y-m-d',mktime(0,0,0,date('m'), date('d')-$curDay, date('Y')));
  $Idx=0;
  for( $i=0 ; $i<CONFIG_WALL_DISPLAY_WEEKS ; $i++)
  {
    $firstDay = date('d/m',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+1,substr($startWeek,0,4)));
    $lastDay  = date('d/m',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+5,substr($startWeek,0,4)));
    $weekNum  = date('W',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+5,substr($startWeek,0,4)));
    $Id1      = date('dm',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+1,substr($startWeek,0,4)));
    $Id2      = date('dm',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+5,substr($startWeek,0,4)));
    $aDays = array();
    for($j=1 ; $j<6 ; $j++)
    {
      $wDay = date('d',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+$j,substr($startWeek,0,4)))."$Idx";
      $curDay = date('Y-m-d',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+$j,substr($startWeek,0,4)));
      $sDay = $aDayFrench[$j];
      $Task = getTask($mysqli, $Uid,$curDay);
      $aDays[] = ['wDay' => $wDay,'sDay' => $sDay  ,'Task' => $Task];
      $Idx++;
    }
    $startDay = date('Y-m-d',mktime(0,0,0,substr($startWeek,5,2),substr($startWeek,8,2)+7,substr($startWeek,0,4)));
    $startWeek = $startDay;
    $aDatas['Weeks'][] = ['Title' => "Sem $weekNum"
            . "<span style='color: #1db0dc'> Du $firstDay au $lastDay</span>", 
            "Id" => $Id1.$Id2,'Days' => $aDays];
  }
  return $aDatas ;
}

function isValid($mysqli, $login, $password)
{
  $Sql = getsql($login, $password);
  $stmt = $mysqli->prepare($Sql);
  $stmt->execute();
  $stmt->bind_result($uid,$name);
  if( $stmt->fetch() )
  {
    return ['uid' => $uid, 'name' => $name];
  }
  return false;
}

function getTask($mysqli, $Uid, $curDay)
{
  $Task = "";
  $Note = "";
  $Project = "";
  $Sql = "SELECT Pe.titre, Pe.notes, Pr.nom "
          . "FROM planning_periode AS Pe "
          . "LEFT JOIN planning_projet AS Pr "
          . "ON Pe.projet_id = Pr.projet_id "
          . "WHERE Pe.user_id = '$Uid' "
          . "AND date_debut <= '$curDay' "
          . "AND date_fin >= '$curDay'";
  // !plusieurs lignes possibles

  $stmt = $mysqli->prepare($Sql);
  $stmt->execute();
  $stmt->bind_result($tName, $tNote, $pName);
  if( $stmt->fetch() )
  {
    if( $Project != "" )
    {
      $Project .= "<br/>";
      $Task    .= "<br/>";
      $Note    .= "<br/>";
    }
    $Project .= $pName;
    $Task    .= $tName;
    $Note    .= $tNote;
  }
  unset($stmt);
  $Sql = "SELECT jour FROM planning_user_exception WHERE jour= '$curDay' AND user_id='$Uid'";
  // !plusieurs lignes possibles
  $stmt = $mysqli->prepare($Sql);
  $stmt->execute();
  $stmt->bind_result($jour);
  if( $stmt->fetch() )
  {
    $Project = 'Cong&eacute;';
    $Task    = '';
    $Note    = '';
  }
  $aTask = ['Project' => $Project, 'Task' => $Task, 'Comment' => $Note];
  return $aTask;
}