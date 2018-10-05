<?php
define('HOLICOLOR','FF8484');
/**
 * Description of class_raspi
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 */
class raspi {
  //put your code here
  private $Year;
  private $Month;
  private $Start;
  private $dbCnx;
  private $dbResult;
  private $stmt;
  private $aDays = array();
  private $aUsers = array();   // Utilisateurs visibles
  private $allUsers = array(); // Tous les utilisateurs
  public  $Tasks = array();    // Les taches

  public function __construct($iPast)
  {
  require '../database.inc';

  if( $iPast == 1 )
  { 
  	if( date('m') < 3)
  	{
  		// Janvier ou février  -> Décompter un an
      $this->Year  = date('Y')-1;
      $this->Month = 9 + date('m');
      $this->Start = date('W');
  	}
  	else
  	{
      $this->Year  = date('Y');
      $this->Month = date('m')-2;
      $this->Start = date('W');
  	}
  }
  else
  {
    $this->Year  = date('Y');
    $this->Month = date('m');
    $this->Start = date('W');
  }

  $this->dbCnx  = new mysqli($cfgHostname, $cfgUsername, $cfgPassword,$cfgDatabase);
  }

  public function listUsers()
  {
    $Users = array();
    $SQL = "SELECT user_id, nom, display FROM planning_user "
            . "WHERE visible_planning='oui' ORDER BY nom;";
    $dbResult = $this->dbCnx->query($SQL);

    while( ($Record=$dbResult->fetch_array()) != null  )
    {
      $this->allUsers[] = ['Name' => $Record["nom"], 'id' => $Record['user_id'], 'display' => $Record['display']];
      if( $Record['display'] == 1 )
      { // utilisateur visible
        $this->aUsers[] = $Record['user_id'];
        $Users[] = ['Name' => $Record["nom"], 'id' => $Record['user_id'], 'display' => $Record['display']];
      }
    }

    return( $Users );
  }

  public function listAllUsers()
  {
    return $this->allUsers;
  }

  public function getLines($iNbWeeks)
  {
    $Done = false;
    $NonWorkingDays = $this->getNonWorkingDays($iNbWeeks);
    $holiDays = $this->getHoliDays();
    $Return = array();  // Array a renvoyer
    $SQL  = "SELECT user_id, nom, couleur, titre, periode_id, notes "
          . "FROM planning_periode "
          . "LEFT JOIN planning_projet "
          . "ON planning_periode.projet_id = planning_projet.projet_id "
          . "WHERE ? >= date_debut "
          . "AND ? <= date_fin "
          . "AND user_id = ?";

    $this->stmt = $this->dbCnx->prepare($SQL);
    $this->stmt->bind_result($user_id, $nom, $couleur, $titre, $tid, $notes);
    // Calcul du lundi de la semaine dernière
    $Start = date('d')-date('w')-6;
    // Parcourir <$iNbWeeks> semaines
    for( $w=0 ; $w<$iNbWeeks ; $w++)
    {
      $aLines = array();
      // Parcours les jours de la semaine
      for($d=0 ; $d<7 ; $d++)
      {

        $TheDay = mktime(0,0,0,$this->Month, $Start, $this->Year);
        if( date('w', $TheDay) != 0 && date('w', $TheDay) != 6 )
        {
          // Pour chaque jour de semaine
          $TheWeek = date('W',$TheDay);
          // Mémoriser le lundi
          if( date('w', $TheDay) == 1)
            $firstDay = date('d/m',$TheDay);

          // Detail des jours par utilisateur (remplit a vide)
          $aLine = array();
          $sDate = date('Y-m-d',$TheDay);

          foreach($this->aUsers as $sUsrId)
          {
            $Color = "";
            $Project = "";
            $Titre = "";
            $Pid = "";
            $Done = false;
            if( in_array($sDate, $holiDays) )
            {
              $Color = HOLICOLOR;
              $Project = "F&eacute;ri&eacute;";
              $Done = true;
            }
            if( in_array($sDate, $NonWorkingDays[$sUsrId]) && !$Done)
            {
              $Project = 'Cong&eacute;';
              $Color = HOLICOLOR;
              $Done = true;
            }
            if( !$Done )
            {
              $this->stmt->bind_param('sss',$sDate,$sDate,$sUsrId);
              $this->stmt->execute();
              // Lecture dans la base si correspondance
              if($this->stmt->fetch())
              {
                // Remplace projet et couleur
                $notes = str_replace("\n","",$notes);
                $this->Tasks[$tid] = ['Color' => $couleur,
                                      'Project' => nl2br($nom),
                                      'Titre' => nl2br($titre),
                                      'pid' => $tid,
                                      'Notes' => $notes];
                do 
                {
                  if( $Project == "" )
                    $Project .= "<br/>";
                  $Project .= $nom;
                  $Color = $couleur;
                  $Titre = $titre;
                  $Pid   = $tid;
                } while ($this->stmt->fetch());
              }
            }

            $aLine[] = ['Color'   => $Color, 
                        'Project' => $Project, 
                        'Titre'   => $Titre,
                        'pid'     => $Pid,                   
                        'uid'     => $sUsrId];
          }

          $aLines[] = $aLine;
        }
        $Start++;
      }
      // On stocke la semaine
      $Return[] = ['Num' => $TheWeek,
                   'firstDay' => $firstDay,
                   'Details' => $aLines ];
    }
  return( $Return );
  }

  public function getNonWorkingDays($iNbWeeks)
  {
    $Return = array();  // Array a renvoyer
    $SQL  = "SELECT user_id, jour " // date_debut, date_fin,
          . "FROM planning_user_exception "
          . "WHERE jour >= ? AND jour <= ? "
          . "AND user_id = ?";

    $this->stmt = $this->dbCnx->prepare($SQL);

    // Calcul du lundi de cette semaine
    $iStart = date('d')-date('w')+1;
    $dStart = date('Y-m-d',mktime(0,0,0,$this->Month, $iStart, $this->Year));
    $iEnd = $iStart + 7 * ($iNbWeeks+1);
    $dEnd = date('Y-m-d',mktime(0,0,0,$this->Month, $iEnd, $this->Year));
    // Lecture dans la base si correspondance
    foreach($this->aUsers as $iUser)
    {
      $this->stmt->bind_param('ssi',$dStart,$dEnd,$iUser);
      $this->stmt->bind_result($user_id, $jour);
      $this->stmt->execute();
      $Return[$iUser] =  array();
      while( $this->stmt->fetch() )
      {
        $Return[$iUser][] = $jour;
      }
    }
  return( $Return );
  }

  private function getHoliDays($year = null)
  {
    if ($year === null)
      $year = intval(strftime('%Y'));

  $easterDate = easter_date($year);
  $easterDay = date('j', $easterDate);
  $easterMonth = date('n', $easterDate);
  $easterYear = date('Y', $easterDate);

  $easterDate1 = easter_date($year+1);
  $easterDay1 = date('j', $easterDate1);
  $easterMonth1 = date('n', $easterDate1);
  $easterYear1 = date('Y', $easterDate1);

  $holidays = array(
                // Jours feries fixes
                date('Y-m-d',mktime(0, 0, 0, 1, 1, $year)),// 1er janvier
                date('Y-m-d',mktime(0, 0, 0, 5, 1, $year)),// Fete du travail
                date('Y-m-d',mktime(0, 0, 0, 5, 8, $year)),// Victoire des allies
                date('Y-m-d',mktime(0, 0, 0, 7, 14, $year)),// Fete nationale
                date('Y-m-d',mktime(0, 0, 0, 8, 15, $year)),// Assomption
                date('Y-m-d',mktime(0, 0, 0, 11, 1, $year)),// Toussaint
                date('Y-m-d',mktime(0, 0, 0, 11, 11, $year)),// Armistice
                date('Y-m-d',mktime(0, 0, 0, 12, 25, $year)),// Noel
                date('Y-m-d',mktime(0, 0, 0, 1, 1, $year+1)),// 1er janvier
                date('Y-m-d',mktime(0, 0, 0, 5, 1, $year+1)),// Fete du travail
                date('Y-m-d',mktime(0, 0, 0, 5, 8, $year+1)),// Victoire des allies
                date('Y-m-d',mktime(0, 0, 0, 7, 14, $year+1)),// Fete nationale
                date('Y-m-d',mktime(0, 0, 0, 8, 15, $year+1)),// Assomption
                date('Y-m-d',mktime(0, 0, 0, 11, 1, $year+1)),// Toussaint
                date('Y-m-d',mktime(0, 0, 0, 11, 11, $year+1)),// Armistice
                date('Y-m-d',mktime(0, 0, 0, 12, 25, $year+1)),// Noel

                // Jour feries qui dependent de paques
                date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)),// Lundi de paques
                date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),// Ascension
                date('Y-m-d',mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)), // Pentecote
                // Jour feries qui dependent de paques
                date('Y-m-d',mktime(0, 0, 0, $easterMonth1, $easterDay1 + 1, $easterYear1)),// Lundi de paques
                date('Y-m-d',mktime(0, 0, 0, $easterMonth1, $easterDay1 + 39, $easterYear1)),// Ascension
                date('Y-m-d',mktime(0, 0, 0, $easterMonth1, $easterDay1 + 50, $easterYear1)), // Pentecote
        );

  sort($holidays);
  return $holidays;
  }

}
