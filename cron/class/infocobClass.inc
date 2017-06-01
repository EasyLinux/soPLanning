<?php

/*
 * Port utilise : 3050
 */

/**
 * Description of infocobClass
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 */
class infocobClass {
  private $sBase;
  private $sUser;
  private $sPass;
  private $dbCnx;
  private $Equipe;
  private $And;
  private $ConnectOk = true;

  public function __construct()
  {
    $this->sBase = CONFIG_SYNCHRONIZE_SERVER . ":" . CONFIG_SYNCHRONIZE_FILE;
    $this->sUser = CONFIG_SYNCHRONIZE_USER;
    $this->sPass = CONFIG_SYNCHRONIZE_PASS;

    if( !$this->dbCnx=ibase_connect($this->sBase,$this->sUser,$this->sPass) )
    {
      $this->ConnectOk = false;
    }
  }

  public function getConnectOk()
  {
    return $this->ConnectOk;
  }

  public function getUserList($Groups)
  {
    $aInfoCobUsers = array();
    $result = ibase_query( $this->getUsersRequest($Groups) );
    // Pour chaque utilisateur
    while( $aRow = ibase_fetch_assoc($result) )
    {
      $aInfoCobUsers[$aRow['I_CODE']] = ['uid' => $aRow['I_CODE'], 
          'nom' => $aRow['I_NOM'],
          'prenom' => $aRow['I_PRENOM'],
          'login' => explode('@',$aRow['I_EMAIL'])[0],
          'email' => $aRow['I_EMAIL'],
          'groupe' => $aRow['I_FAMILLEINTERLOCUTEUR']];
    }
    return $aInfoCobUsers;
  }

  /**
   * Retrouve les cong� � partir de la date pr�vue
   * @return array    Dates de cong�s
   */
  public function getNonWorkingDays()
  {
    $aHolidays = array();
    $Today = date('Y-m-d');
    $Sql = "SELECT ac_code, ac_typeaction, ac_date_prevu, ac_datefin, ac_interlocuteurcontact"
            . ", i_code, i_nom, i_codecontact, i_prenom"
            . " FROM actions "
            . "JOIN interlocuteurfiche "
            . "ON actions.ac_interlocuteurcontact = interlocuteurfiche.i_code "
            . "WHERE " . $this->Equipe ." ". $this->And ." ac_typeaction='71ATL' "
            . "AND ac_date_prevu > '$Today';";
    $result = ibase_query($Sql);
    while( $aRow = ibase_fetch_assoc($result) )
    {
      $aHolidays[] = ['date' => substr($aRow['AC_DATE_PREVU'],0,10),
          'date_fin' => substr($aRow['AC_DATEFIN'],0,10),
          'id' => $aRow['AC_CODE'], 
          'uid' => $aRow['AC_INTERLOCUTEURCONTACT']];
    }
    return $aHolidays;
  }

  private function getUsersRequest($Groups)
  {
    // Construction requete InfoCob
    $Or = '';
    $this->And = '';
    $this->Equipe = '(';
    
    // Lister les diff�rentes �quipes (FAMILLE)
    foreach($Groups as $Group)
    {
      $this->Equipe .= "$Or i_familleinterlocuteur='$Group'";
      $Or = " OR";
    }
    $this->Equipe .= ')';
    
    if( $this->Equipe != "()")
      $this->And = "AND ";
    else
      $this->Equipe ="";
    // Liste des utilisateurs Infocob dont on suit le planning
    $Sql = "SELECT i_code, i_nom, i_codecontact, i_prenom, i_inactif, i_email, i_familleinterlocuteur "
            . "FROM interlocuteurfiche "
            . "WHERE " . $this->Equipe ."  ". $this->And
            . " i_codecontact='492ATLC' "
            . "AND i_inactif='F';";
    return $Sql;
  }
  
}  
  
