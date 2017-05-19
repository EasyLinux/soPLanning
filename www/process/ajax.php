<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

switch($_REQUEST['Action'])
{
  case "addException":
    define('BASE', '..');
    require BASE . '/../database.inc';
    
    $dbCnx  = new mysqli($cfgHostname, $cfgUsername, $cfgPassword,$cfgDatabase);
    $sqlDay = substr($_REQUEST["Day"],0,4)."-".substr($_REQUEST["Day"],4,2)
            ."-". substr($_REQUEST["Day"],6,2);
    $Id= time();
    $SQL = "INSERT INTO planning_user_exception SET user_id='" 
            .$_REQUEST["UserId"]. "', jour = '$sqlDay', cobid='$Id';";
    $dbCnx->query($SQL);
    echo "OK";
    break;
  
  case "delException":
    define('BASE', '..');
    require BASE . '/../database.inc';
    $dbCnx  = new mysqli($cfgHostname, $cfgUsername, $cfgPassword,$cfgDatabase);
    $sqlDay = substr($_REQUEST["Day"],0,4)."-".substr($_REQUEST["Day"],4,2)
            ."-". substr($_REQUEST["Day"],6,2);
    $SQL = "DELETE FROM planning_user_exception WHERE user_id='" 
            .$_REQUEST["UserId"]. "' AND jour = '$sqlDay';";
    $dbCnx->query($SQL);
    echo "OK";
    break;
  
  case "updateCalendar":
    define('BASE', '..');
    require_once '../../smarty/libs/Smarty.class.php';
	  require_once '../../smarty/libs/Config_File.class.php';
    require_once "../../includes/minical.inc";
    
    $smarty = new smarty();
    $smarty->compile_dir  = '/var/www/html/smarty/templates_c';
    $smarty->template_dir = '/var/www/html/templates/';
		$smarty->config_dir   = '/var/www/html/templates/languages/';
    $smarty->config_load('fr.txt',null,'global');

    // Ajout Minical
    $smarty->assign('minical',$_REQUEST['YearMonth']);
    $miniCal = new minical(urldecode($_REQUEST["UserId"]));
    $smarty->assign('sMonthYear',
            mb_convert_encoding($miniCal->getTitle($_REQUEST['YearMonth']),
                    "UTF-8","ISO-8859-1") );
    $smarty->assign('miniWeeks',
            $miniCal->getTab(intval(substr($_REQUEST['YearMonth'],0,4)),
                    intval(substr($_REQUEST['YearMonth'],4,2))) );
    
    echo $smarty->fetch('../templates/www_minical.tpl');
    break;

  case "updateUseable":
    define('BASE', '..');
    require_once "../../includes/minical.inc";
    $miniCal = new minical(urldecode($_REQUEST["UserId"]));
    $miniCal->getTab(intval(substr($_REQUEST['YearMonth'],0,4)),
            intval(substr($_REQUEST['YearMonth'],4,2)));
    echo $miniCal->getUsable();
    break;
  
  case "updateExceptionDisplay";
    define('BASE', '..');
    require_once "../../includes/minical.inc";
    $Year = substr($_REQUEST['YearMonth'],0,4);
    $Month = substr($_REQUEST['YearMonth'],4,2);
    $miniCal = new minical(urldecode($_REQUEST["UserId"]));
    echo json_encode($miniCal->getExceptionsDays($Year,$Month));
    break;
  
  default:
    echo "ERROR: ";
    print_r($_REQUEST);
}

