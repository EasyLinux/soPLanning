<?php

class minical 
{
  private $UserId;
  private $dbCnx;
  private $dbResult;
  private $Exceptions;
  private $Holidays;
  private $Usable=0;
  
  public function __construct($user_id)
  {
    require BASE . '/../database.inc';
    
    $this->UserId = $user_id;
    $this->dbCnx  = new mysqli($cfgHostname, $cfgUsername, $cfgPassword,$cfgDatabase);
  }
  
  public function getTab($Year, $Month)
  {
  /* Les jours sont retournés sous la forme ddWTE
   *    dd  le numéro du jour
   *    W   si le jour est de congé ou -
   *    T   si c'est le jour courant ou -
   *    E   si c'est un jour férié (inamovible) ou -
   */
    $Tab = array();
    $Idx = 1;
    $Today = -1;
    $this->Usable=0;
    
    $this->getExceptionsDays($Year, $Month);
    $this->getHolidays($Year, $Month);
    
    // Si nous sommes le bon mois/année, il faut relever la date du jour
    if( (date('Y')==$Year) && (date('m')==$Month) )
      $Today = date('d');

    // Nombre de jours du mois précédent à afficher dans le calendrier
    $mPrec = date('w',mktime(0,0,0,intval($Month),1,intval($Year)))-1;
    if($mPrec  == -1)
      $mPrec=6;
    
    // Dernier jour du mois
    if( $Month == 12 )
      $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
    else
      $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));
    
    /*
     *  Construction de la première ligne
     */
    $WeN = date('W',mktime(0,0,0,$Month,$Idx,$Year)); // Numéro semaine
    $We = array();
    // Les jours de la semaine avant le début du mois
    for( $wDay=1 ; $wDay < $mPrec+1 ; $wDay++)
    {
      if( $wDay < 6)
        $We[] = "00---"; // Jours du mois précédents vide
      else 
        $We[] = "00W--";
    }
    // Les jours de la semaine du mois en cours
    for( $Idx=1 ; ($Idx+$mPrec) < 8 ; $Idx++)
    {
      // Week-end ou congé ?
      if( (($Idx+$mPrec)> 5) || (in_array(sprintf("$Year-%02d-%02d",$Month,$Idx), $this->Exceptions)) )
        $Sign = "W";
      else
        $Sign = "-";
      if( $Idx == $Today )
        $Sign .= "T";
      else
        $Sign .= "-";
      // Jour Férié ?
      if(in_array(sprintf("$Year-%02d-%02d",$Month,$Idx), $this->Holidays))
        $Sign .= "E";
      else
        $Sign .= "-";
      // Si le jour est ouvrable, on ajoute
      if( $Sign == "---" || $Sign == "-T-")
        $this->Usable++;
      $We[] = sprintf("%02d",$Idx) .$Sign;
    }
    $Tab[] = array("WeN"=>$WeN, "We"=> $We);
    
    /*
     *  Construire les lignes suivantes
     */
    while( $Idx < $lastDay+1 )
    {
      $WeN = date('W',mktime(0,0,0,$Month,$Idx,$Year)); // Numéro semaine
      $We = array();
      for( $i=1 ; $i<8 ; $i++)
      {
        // Week-end ou congé?
        if( (($i)> 5) || (in_array(sprintf("$Year-%02d-%02d",$Month,$Idx), $this->Exceptions)) )
          $Sign = "W";
        else
          $Sign = "-";
        // Date du jour ?
        if( $Idx == $Today )
          $Sign .= "T";
        else
          $Sign .= "-";
        if(in_array(sprintf("$Year-%02d-%02d",$Month,$Idx), $this->Holidays))
          $Sign .= "E";
        else
          $Sign .= "-";
        if( $Idx > $lastDay)
          $We[] = "00".$Sign;
        else
        {
          if( $Sign == "---" || $Sign == "-T-")
            $this->Usable++;
          $We[] = sprintf("%02d",$Idx) .$Sign;
        }
        $Idx++;
      }
      $Tab[] = array("WeN"=>$WeN, "We"=> $We);
    }
    
    return( $Tab );
    
    /*
    return array(
      array("WeN" => 48, "We" => array("00---","00---","00---","01---","02W--", "03W--", "04W--")),
      array("WeN" => 49, "We" => array("05---","06---","07---","08---","09---", "10W--", "11W--")),
      array("WeN" => 50, "We" => array("12---","13---","14---","15---","16---", "17W--", "18W--")),
      array("WeN" => 51, "We" => array("19---","20WT-","21W--","22---","23---", "24W--", "25W-E")),
      array("WeN" => 52, "We" => array("26W--","27W--","28W--","29W--","30W-E", "31W--", "00W--"))
    ); */
  }
  
  public function getTitle($YearMonth)
  {
    $Return = "";
    $Month = "month_".sprintf("%d",substr($YearMonth,4,2));
    $Year = substr($YearMonth,0,4);
    $i18n = fopen("../../templates/languages/fr.txt","r");
    while (($ligne = fgets($i18n, 4096)) !== false) 
    {
      $Var = explode('=',$ligne);
      if( trim($Var[0]) == $Month )
        $Return = trim( explode("\"",$Var[1])[1] );
    }
    fclose($i18n); 
    return($Return. " ". $Year); 
  }
  
  public function getUsable()
  {
    return($this->Usable);
  }

  public function getExceptionsDays($Year, $Month)
  {
    $sExceptions = array();
    // Lire les jours de congés dans la table
    $Debut = sprintf("$Year-%02d-01",$Month);
        // Dernier jour du mois
    if( $Month == 12 )
      $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
    else
      $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));
    $Fin = sprintf("$Year-%02d-%02d",$Month, $lastDay);
    $SQL = "SELECT * FROM planning_user_exception WHERE user_id='".$this->UserId."' AND jour >= '$Debut' AND jour <= '$Fin' ORDER BY jour;";
    $this->dbResult = $this->dbCnx->query($SQL);
    $this->Exceptions = array();
    while( ($Record=$this->dbResult->fetch_array()) != null )
    {
      $this->Exceptions[] = $Record['jour'];
      $sExceptions[] = substr($Record['jour'],8,2);
    }
    //error_log()
    return $sExceptions;
  }
  
  // Fonction permettant de trouver les jours fériés dans un mois
  public function getHolidays($Year, $Month) // $date_start, $date_stop) 
  {	
    $this->Holidays = array(); // Tableau des jours feriés	
    
    switch($Month)
    {
      case 1: // Janvier
        $this->Holidays[] = "$Year-01-01"; // Jour de l'an
        break;
      case 5: // Mai
        $this->Holidays[] = "$Year-05-01"; // Fete du travail
        $this->Holidays[] = "$Year-05-08"; // Victoire 1945
        break;
      case 7: // Juillet
        $this->Holidays[] = "$Year-07-14"; // Fete nationale
        break;
      case 8: // Aout
        $this->Holidays[] = "$Year-08-15"; // Assomption
        break;
      case 11: // Novembre
        $this->Holidays[] = "$Year-11-01"; // Toussaint
        $this->Holidays[] = "$Year-11-11"; // Armistice 1918
        break;
      case 12: // Décembre
        $this->Holidays[] = "$Year-12-25"; // Noël
        break;
    }
    // Cas de Paques Ascension et Pentecote
		$Easter = easter_date($Year);
    if( date('m',$Easter + 86400) == $Month)
      $this->Holidays[] = date("$Year-m-d", $Easter + 86400); // Paques
    if( date('m',$Easter + (86400*39)) == $Month)
      $this->Holidays[] = date("$Year-m-d", $Easter + (86400*39)); // Ascension
    if( date('m',$Easter + (86400*50)) == $Month)
  		$this->Holidays[] = date("$Year-m-d", $Easter + (86400*50)); // Pentecote	
  }
 
  
}


