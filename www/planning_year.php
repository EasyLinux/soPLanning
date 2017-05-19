<?php
require('./base.inc');
require(BASE . '/../config.inc');
$smarty = new MySmarty();

require BASE . '/../includes/header.inc';
require BASE . '/../includes/class_compute.inc';

$_SESSION['lastURL'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['planningView'] = 'annee';
if( empty($_REQUEST['YearMonth']) )
  $YearMonth = date('Ym');
else 
  $YearMonth = $_REQUEST['YearMonth'];

$Compute = new compute($YearMonth);

$Users = $Compute->listUsers();

$Projets = $Compute->listProjects();


$TabData = array(
    'Title' => "Vue projet annuelle",
    'YearMonth' => $YearMonth,
    'ColWidth'=> array(10,10,180,90,90,90,90,90,90,90,90,90,90,90,90),
    'Users' => $Users,
    "YearMonths" => $Compute->getYearMonths(),
    "Years" => $Compute->getYears(),
    "Months" => $Compute->getMonths(),
    "Projects" => $Projets
  );

$smarty->assign('Debug', print_r($Users,true));

$smarty->assign('TabData', $TabData);

/*
 * Utilisation des ressources 
 * *SN*
 */

$smarty->assign("xajax","");

$Capacity = $smarty->fetch('www_year_capacity.tpl');

$smarty->assign('htmlRecap', $Capacity);

$html = $smarty->fetch('www_year_project_vue.tpl');
$smarty->assign('htmlTableau', $html);

$html = $smarty->display('www_planning_year.tpl');



