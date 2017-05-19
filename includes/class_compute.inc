<?php

/**
 * Description of class_compute
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 */
class compute {
  //put your code here
  private $Year;
  private $Month;
  private $Months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aoùt",
        "Septembre", "Octobre", "Novembre", "Décembre");
  private $dbCnx;
  private $dbResult;
  private $YearMonths;
  private $Holidays;
  
  public function __construct($YearMonth)
  {
  require '../database.inc';
  
  
  $this->Year  = intval(substr($YearMonth,0,4));
  $this->Month = intval(substr($YearMonth,4,2));
  $this->initMonth();
    
  $this->dbCnx  = new mysqli($cfgHostname, $cfgUsername, $cfgPassword,$cfgDatabase); 
  }
  
  private function initMonth()
  {
    $this->YearMonths = array();
    $Month = $this->Month -2;
    $Year  = $this->Year;

    if( $Month < 1 )
    {
      $Month += 10;
      $Year--;
    }
    for( $i=0 ; $i<12 ; $i++)
    {
      if( $Month+$i <= 12)
        $this->YearMonths[] = sprintf("%04d%02d",$Year,$Month+$i);
      else
        $this->YearMonths[] = sprintf("%04d%02d",$Year+1,$Month+$i-12);
    }
  }
  
  public function getYearMonths()
  {
    $Ret = array();
    foreach($this->YearMonths as $YearMonth)
    {
      $Id = $YearMonth;
      $Idx = intval(substr($YearMonth,4,2))-1;
      $Text = sprintf("%s %04d",$this->Months[$Idx],substr($YearMonth,0,4) );
      $Ret[] = array("id" => $Id, "text" => $Text);
    }
    return $Ret;
  }
  
  public function getYears()
  {
    $Ret = array(
        array("Display" => '',"Number" => 0),
        array("Display" => '',"Number" => 0));
    $Year1 = substr($this->YearMonths[0],0,4);
    $Ret[0]["Display"] = $Year1;
    
    foreach( $this->YearMonths as $YearMonth )
    {
      if( substr($YearMonth,0,4) == $Year1 ) 
      { 
        $Ret[0]['Number']++;
      }
      else
      {
        $Ret[1]['Display'] = substr($YearMonth,0,4);
        $Ret[1]['Number']++;
      }
    }
    return $Ret;
  }

  public function getMonths()
  {
    $Ret = array();
    foreach($this->YearMonths as $YearMonth)
    {
      $Ret[] = $this->Months[intval(substr($YearMonth,4,2))-1];
    }
    return $Ret;
  }
  
  public function listUsers()
  {
    $Users = array();
    $SQL = "SELECT user_id, nom, couleur FROM planning_user WHERE visible_planning='oui';";
    $dbResult = $this->dbCnx->query($SQL);
    $Idx=0;
    
    while( ($Record=$dbResult->fetch_array()) != null  )
    {
      $Users[] = array("Name" => $Record["nom"],"Color" => $Record["couleur"], "UserId" => $Record["user_id"],
          "Available" => $this->getAvailable($Record["user_id"]),
          "MaxUse" => $this->getMaxUse($Record["user_id"])
          );
    }
    $Max = count($Users);
    for($i=0 ; $i<$Max ; $i++)
    {
      for($j=0 ; $j<12 ; $j++)
      {
        $Users[$i]['Remain'][$j] = $Users[$i]['Available'][$j] - $Users[$i]['MaxUse'][$j];
        $Users[$i]['Percent'][$j] = intval($Users[$i]['MaxUse'][$j] / $Users[$i]['Available'][$j] * 100) ;
        $Users[$i]['Height'][$j] = 200 - $Users[$i]['Percent'][$j];
      }
      
    }
    return( $Users );
  }
  
  private function getMaxUse($UserId)
  {
    $Ret = array();
    
    foreach($this->YearMonths as $YearMonth)
    {
      $Used = 0;
      $Year  = intval(substr($YearMonth,0,4));
      $Month = intval(substr($YearMonth,4,2));
      $StartDate = sprintf("%04d-%02d-01",$Year,$Month);
      if( $Month == 12 )
        $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
      else
        $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));
      
      $EndDate = sprintf("%04d-%02d-%02d",$Year,$Month,$lastDay);
      
      $SQL  = "SELECT user_id, date_debut, date_fin, statut_tache FROM planning_periode ";
      $SQL .= "  WHERE user_id='$UserId' ";
      $SQL .= "    AND (  (date_debut BETWEEN '$StartDate' AND '$EndDate') ";
      $SQL .= "        OR (date_fin BETWEEN '$StartDate' AND '$EndDate') ";
      $SQL .= "        OR ( date_debut < '$StartDate' AND date_fin > '$EndDate') )";
      $dbResult = $this->dbCnx->query($SQL);

      $Res = array();
      while( ($Record=$dbResult->fetch_array()) != null )
      {
        if( $Record['date_fin'] != null)
        {
          if( $Record['date_debut'] < $StartDate )
              $Record['date_debut'] = $StartDate;
          if( $Record['date_fin'] > $EndDate )
            $Record['date_fin'] = $EndDate;
          $Used += $this->getNbOpenDays($Record['date_debut'], $Record['date_fin'] );
        }
        else
        {
          $Used++;
        }
      }
      $Ret[] = $Used;
    }
    
    return $Ret;
  }
  
  
  private function getAvailable($UserId)
  {
    //$Ret = array(15,17,20,0,0,0,0,0,0,0,0,0);
    $Ret = array();
    foreach( $this->YearMonths as $YearMonth )
    {
      $Year  = intval(substr($YearMonth,0,4));
      $Month = intval(substr($YearMonth,4,2));
      $Holidays   = $this->getHolidays($Year, $Month);
      $Exceptions = $this->getExceptionsDays($UserId, $Year, $Month);
      $Idx = 1;
      $Usable=0;
        
      // Dernier jour du mois
      if( $Month == 12 )
        $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
      else
        $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));
    
      for( $Idx=1 ; $Idx < $lastDay+1 ; $Idx++)
      {
        if( date('N',mktime(0,0,0,$Month,$Idx,$Year)) < 6)
        {
          // Jour de semaine
          if( !in_array($Idx, $Exceptions) )
          {
            // Pas un jour de congé
            if( !in_array(sprintf("$Year-%02d-%02d",$Month,$Idx), $Holidays) )
            {
              // Pas férié
              $Usable++;
            }
          }
        }
      }
      $Ret[] = $Usable;
    }
    return $Ret;
  }
  
  // Fonction permettant de trouver les jours fériés dans un mois
  private function getHolidays($Year, $Month) 
  {	
    $Holidays = array(); // Tableau des jours feriés	
        
    switch($Month)
    {
      case 1: // Janvier
        $Holidays[] = "$Year-01-01"; // Jour de l'an
        break;
      case 5: // Mai
        $Holidays[] = "$Year-05-01"; // Fete du travail
        $Holidays[] = "$Year-05-08"; // Victoire 1945
        break;
      case 7: // Juillet
        $Holidays[] = "$Year-07-14"; // Fete nationale
        break;
      case 8: // Aout
        $Holidays[] = "$Year-08-15"; // Assomption
        break;
      case 11: // Novembre
        $Holidays[] = "$Year-11-01"; // Toussaint
        $Holidays[] = "$Year-11-11"; // Armistice 1918
        break;
      case 12: // Décembre
        $Holidays[] = "$Year-12-25"; // Noël
        break;
    }
    // Cas de Paques Ascension et Pentecote
		$Easter = easter_date($Year);
    if( date('m',$Easter + 86400) == $Month)
      $Holidays[] = date("$Year-m-d", $Easter + 86400); // Paques
    if( date('m',$Easter + (86400*39)) == $Month)
      $Holidays[] = date("$Year-m-d", $Easter + (86400*39)); // Ascension
    if( date('m',$Easter + (86400*50)) == $Month)
  		$Holidays[] = date("$Year-m-d", $Easter + (86400*50)); // Pentecote	    
    return( $Holidays );
  }

  private function getExceptionsDays($UserId, $Year, $Month)
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
    $SQL = "SELECT * FROM planning_user_exception WHERE user_id='".$UserId."' AND jour >= '$Debut' AND jour <= '$Fin' ORDER BY jour;";
    $dbResult = $this->dbCnx->query($SQL);
    $Exceptions = array();
    while( ($Record=$dbResult->fetch_array()) != null )
    {
      $Exceptions[] = $Record['jour'];
      $sExceptions[] = substr($Record['jour'],8,2);
    }
    return $sExceptions;
  }
  
  // Fonction permettant de compter le nombre de jours ouvrés entre deux dates
  private function getNbOpenDays($startDate, $stopDate) 
  {	
    $Holidays = array(); // Tableau des jours feriés	
	
		$Year = intval(substr($startDate,0,4));
    $Month = intval(substr($startDate,5,2));
    $Day1  = intval(substr($startDate,8,2));
    $Day2  = intval(substr($stopDate,8,2));
    
		// Liste des jours feriés
		$Holidays[] = "$Year-01-01"; // Jour de l'an
		$Holidays[] = "$Year-05-01"; // Fete du travail
		$Holidays[] = "$Year-05-08"; // Victoire 1945
		$Holidays[] = "$Year-07-14"; // Fete nationale
		$Holidays[] = "$Year-08-15"; // Assomption
		$Holidays[] = "$Year-11-01"; // Toussaint
		$Holidays[] = "$Year-11-11"; // Armistice 1918
		$Holidays[] = "$Year-12-25"; // Noel
				
		// Récupération de paques. Permet ensuite d'obtenir le jour de l'ascension et celui de la pentecote	
		$Easter = easter_date($Year);
		$Holidays[] = date("Y-m-d", $Easter + 86400); // Paques
		$Holidays[] = date("Y-m-d", $Easter + (86400*39)); // Ascension
		$Holidays[] = date("Y-m-d", $Easter + (86400*50)); // Pentecote	

    $nb_days_open = 0;
    
    if( $Month == 12 )
      $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
    else
      $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));

    
    while( $Day1 <= $Day2 ) 
    {
      // Si le jour suivant n'est ni un dimanche (0) ou un samedi (6), ni un jour férié, on incrémente les jours ouvrés	
      $time = mktime(0,0,0,$Month,$Day1,$Year);
      if (!in_array(date('w', $time), array(0, 6)) && !in_array($startDate, $Holidays)) 
      {
        $nb_days_open++;		
		  }
      $Day1++;
      $startDate = date('Y-m-d',mktime(0, 0, 0, $Month, $Day1, $Year));			
    }		
    return $nb_days_open;
  }

  public function listProjects()
  {
    $Projects = array();
    $SQL = "SELECT projet_id, nom, couleur, charge, livraison, statut FROM planning_projet WHERE statut != 'archive' AND statut != 'abandon';";
    $dbResult = $this->dbCnx->query($SQL);
    $Idx=0;
    
    while( ($Record=$dbResult->fetch_array()) != null  )
    {
      $Projects[] = array(
                "Name" => $Record["nom"],
                "Color" => $Record["couleur"], 
                "Charge" => $Record["charge"],
                "Butoir" => $Record["livraison"],
                "Priority" => 2,
                "Users" => $this->getProjectUsers($Record["projet_id"])
          
          );
    }

    return( $Projects );

  }
  
  private function getProjectUsers($ProjectId)
  {
    $Users = array();
    $SQL  = "SELECT DISTINCT projet_id, planning_periode.user_id, planning_user.user_id, nom, couleur ";
    $SQL .= "FROM planning_periode, planning_user WHERE projet_id='$ProjectId' ";
    $SQL .= "AND planning_periode.user_id = planning_user.user_id;";

    $dbResult = $this->dbCnx->query($SQL);
    $Idx=0;
    
    while( ($Record=$dbResult->fetch_array()) != null  )
    {
      $Users[] = array('userId' => $Record['user_id'], 'Name' => $Record['nom'], 'Color' => $Record['couleur']);
    }
    $Max = count($Users);
    // "Use" => array(5,8,10,0,0,0,0,0,0,0,0,0)
    for($i=0 ; $i<$Max ; $i++)
    {
      foreach($this->YearMonths as $YearMonth)
      {
        $Used = 0;
        $Year  = intval(substr($YearMonth,0,4));
        $Month = intval(substr($YearMonth,4,2));
        $StartDate = sprintf("%04d-%02d-01",$Year,$Month);
        if( $Month == 12 )
          $lastDay = date('d',mktime(0,0,0,1,0,$Year+1));
        else
          $lastDay = date('d',mktime(0,0,0,$Month+1,0,$Year));
      
        $EndDate = sprintf("%04d-%02d-%02d",$Year,$Month,$lastDay);

        $SQL  = "SELECT projet_id, user_id, date_debut, date_fin FROM planning_periode ";
        $SQL .= "  WHERE projet_id='$ProjectId' AND user_id='".$Users[$i]['userId']."' ";
        $SQL .= "    AND (  (date_debut BETWEEN '$StartDate' AND '$EndDate') ";
        $SQL .= "        OR (date_fin BETWEEN '$StartDate' AND '$EndDate') ";
        $SQL .= "        OR ( date_debut < '$StartDate' AND date_fin > '$EndDate') )";
        
        $dbResult2 = $this->dbCnx->query($SQL);
        
        while( ($Record2=$dbResult2->fetch_array()) != null )
        {
          if( $Record2['date_fin'] != null )
          {
            if( $Record2['date_debut'] < $StartDate )
              $Record2['date_debut'] = $StartDate;
            if( $Record2['date_fin'] > $EndDate )
              $Record2['date_fin'] = $EndDate;
            $Used += $this->getNbOpenDays($Record2['date_debut'], $Record2['date_fin'] );
            
          }
          else
          {
            $Used++;
          }
        }
        $Users[$i]['Use'][] = $Used;
        
      }
      
    }

    return( $Users );
  }
}
