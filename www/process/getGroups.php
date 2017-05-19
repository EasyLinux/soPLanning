<?php
require 'base.inc';
require BASE . '/../config.inc';
require BASE . '/../includes/header.inc';

$mysqli = new mysqli($cfgHostname, $cfgUsername, $cfgPassword, $cfgDatabase);

// check connection 
if (mysqli_connect_errno()) {
    printf("ERREUR Connection: %s\n", mysqli_connect_error());
    exit();
} 

$db_base = CONFIG_SYNCHRONIZE_SERVER . ":" . CONFIG_SYNCHRONIZE_FILE;
$db_user = CONFIG_SYNCHRONIZE_USER;
$db_pass = CONFIG_SYNCHRONIZE_PASS;

$grpAvail = array();
$grpEnabled = explode(",",CONFIG_SYNCHRONIZE_GROUPS);

if ( $db=ibase_connect( $db_base,$db_user,$db_pass) )
{
    $Sql = "SELECT DISTINCT i_familleinterlocuteur "
            . "FROM interlocuteurfiche "
            . "WHERE i_codecontact='492ATLC' "
            . "AND i_inactif='F'";
    $result = ibase_query( $Sql );
    while( $aRow = ibase_fetch_assoc($result) )
    {
      if( !empty($aRow['I_FAMILLEINTERLOCUTEUR']) && 
              !in_array($aRow['I_FAMILLEINTERLOCUTEUR'],$grpEnabled) )
      {
        $grpAvail[]  = $aRow['I_FAMILLEINTERLOCUTEUR'];
      }
    }
    
}
else
{
    echo "ERREUR: (". ibase_errcode().") ".ibase_errmsg();
}


$smarty = new MySmarty();
$smarty->assign('grpAvail', $grpAvail);
$smarty->assign('grpEnabled',$grpEnabled);
$html = $smarty->display('www_choose_group.tpl');
echo $html;

