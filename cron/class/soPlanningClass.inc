<?php
/**
 * Description of cronClass
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 */
class soPlanningClass {

  private $cfgPlanning = array();

  public function __construct($Host, $User, $Pass, $Base)
  {
    $this->cfgPlanning['Host'] = $Host;
    $this->cfgPlanning['User'] = $User;
    $this->cfgPlanning['Pass'] = $Pass;
    $this->cfgPlanning['Base'] = $Base;
    // Lire les donn�es soPlanning
    $this->cfgPlanning['mysqli'] = new mysqli($this->cfgPlanning['Host'], 
            $this->cfgPlanning['User'], $this->cfgPlanning['Pass'], 
            $this->cfgPlanning['Base']);

    // check connection 
    if (mysqli_connect_errno()) 
    {
      printf("ERREUR Connection � la base soPlanning: %s", 
              mysqli_connect_error());
      return false;
    } 
  }

  public function setDebug($On)
  {
    if( $On == true)
    {
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
    }
    else
    {
      error_reporting(E_ERROR);
      ini_set('display_errors', 0);
    }
  }
  
  /**
   * getDefines
   * 
   * positionne les constantes depuis la table planning_config
   */
  public function getDefines()
  {
    // Chargement des donn�es de config
    $stmt = $this->cfgPlanning['mysqli']->prepare("SELECT cle, valeur FROM planning_config;");
    $stmt->bind_result($cle, $valeur);
    $stmt->execute();
    while( $stmt->fetch())
    {
      define('CONFIG_' . $cle, $valeur);
    }
  }

  /** 
   * Supprimer les jours de congés futurs afin de forcer la synchro
   *
   */
  public function delFutureHolidays()
  {
    $Today = date('Y-m-d');
    $Sql = "DELETE "
            . "FROM planning_user_exception "
            . "WHERE jour > ? AND cobid IS NOT NULL";
    $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stmt->bind_param('s',$Today);
    $stmt->execute();
  }

  /**
   * syncGroups synchroniser les groupes
   * 
   * @param array   $Groups     array avec le nom des groupes � synchroniser
   * @return array              renvoi une array avec pour chaque nom l identifiant associ�
   */
  public function syncGroups($Groups)
  {
    $aGroups = array();
    $sqlFind = "SELECT nom, user_groupe_id FROM planning_user_groupe";
    $stFind = $this->cfgPlanning['mysqli']->prepare($sqlFind);
    $stFind->execute();
    $stFind->bind_result($nom,$id);
    while( $stFind->fetch() )
    {
      $aGroups[$nom] = $id;
    }
    foreach( $Groups as $Grp )
    {
      if( !isset($aGroups[$Grp]) )
      {
        $sqlInsert = "INSERT INTO planning_user_groupe SET nom='$Grp', planning=0";
        $stInsert = $this->cfgPlanning['mysqli']->prepare($sqlInsert);
        $stInsert->execute();
        $aGroups[$Grp] = $stInsert->insert_id;
      }
    }
    return $aGroups;
  }
  
  /**
   * Obtenir la liste des utilisateurs de soPlanning
   * 
   * @return array    Liste des utilisateurs
   */
  function getUserList()
  {
    $aUsers = array();
    $sqlSelect = "SELECT user_id, user_groupe_id, nom, login, email "
            . "FROM planning_user";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($sqlSelect);
    $stSelect->execute();
    $stSelect->bind_result($uid,$gid,$nom,$login,$email);
    while( $stSelect->fetch() )
    {
      $aUsers[$uid] = ['uid'=> $uid, 'gid'=> $gid, 'nom'=> $nom, 
          'login' => $login, 'email' => $email];
    }
    return $aUsers;
  }
  
  /**
   * addUsers ajoute les utilisateurs
   * @param array $Users    array utilisateurs
   */
  public function addUsers($Users)
  {
    $sqlInsert = "INSERT INTO planning_user "
            . "SET user_id=?, user_groupe_id=?, nom=?, login=?,email=?";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($sqlInsert);
    foreach($Users as $Usr)
    {
      $uid = $Usr['uid'];
      $gid = $Usr['gid'];
      $name = $Usr['nom'].' '.$Usr['prenom'];
      $login = explode('@',$Usr['email'])[0];
      $email = $Usr['email'];
      $stSelect->bind_param('sisss', $uid, gid, $name, $login, $email);
      $stSelect->execute();
    }
  }
  
  /**
   * modUsers modifie les utilisateurs
   * @param array $Users    array utilisateurs
   */
  public function modUsers($Users)
  {
    $sqlUpdate = "UPDATE planning_user "
            . "SET user_groupe_id=?, nom=?, login=?, email=? "
            . "WHERE user_id=?";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($sqlUpdate);
    foreach($Users as $Usr)
    {
      $uid = $Usr['uid'];
      $gid = $Usr['gid'];
      $name = $Usr['nom'].' '.$Usr['prenom'];
      $login = explode('@',$Usr['email'])[0];
      $email = $Usr['email'];
      $stSelect->bind_param('issss', $gid, $name, $login, $email, $uid);
      $stSelect->execute();
    }
  }
  
  /**
   * getHolidays, retourne les jours de cong�s
   * @return type
   */
  public function getHolidays()
  {
    $aHolidays = array();
    $Today = date('Y-m-d');
    $Sql = "SELECT cobid, user_id, jour "
            . "FROM planning_user_exception "
            . "WHERE jour > '$Today'";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stSelect->execute();
    $stSelect->bind_result($id, $uid, $jour);
    while( $stSelect->fetch() )
    {
      $aHolidays[] = ['date' => $jour, 'id' => $id, 'uid' => $uid];
    }    
    return $aHolidays;
  }
  
   /* 
   * @param type $aPlanningAction
   */
  public function saveHolidaysChanges($aPlanningAction)
  {
    foreach( $aPlanningAction as $aDo )
    {
      $id  = $aDo['id'];
      $uid = $aDo['uid'];
      $day = $aDo['date'];
      //if( $aDo['action'] == 'insert')
        $Sql = "INSERT INTO planning_user_exception SET cobid='$id', user_id='$uid', jour='$day'";
      //else
      //  $Sql = "UPDATE planning_user_exception SET jour = '$day' WHERE cobid='$id'";
      $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
      $stSelect->execute();
    }
  }
  
  public function updateProjects($aProjects)
  {
    $spPrj = array();
    $Sql = "SELECT projet_id FROM planning_projet";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stSelect->execute();
    $stSelect->bind_result($pid);
    while( $stSelect->fetch() )
    {
      $spPrj[] = $pid;
    }
    foreach($aProjects as $aPrj)
    {
      if( !in_array($aPrj['id'],$spPrj) )
      {
        unset($stmt);
        $id = $aPrj['id'];
        $nom = substr($aPrj['name'],0,30);
        $Sql = "INSERT INTO planning_projet SET projet_id=$id, "
                . "nom='$nom', statut='en_cours', createur_id='sync'";
        $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
        $stmt->execute();
      }
      else 
      {
        unset($stmt);
        $id = $aPrj['id'];
        $nom = substr($aPrj['name'],0,30);
        $Sql = "UPDATE planning_projet SET "
                . "nom='$nom' WHERE projet_id='$id'";
        $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
        $stmt->execute();
        
      }
    }
  }
  
  public function updateTasks($aTasks)
  {
    $spTasks = array();
    $spTasksID = array();
    $Sql = "SELECT periode_id, user_id FROM planning_periode";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stSelect->execute();
    $stSelect->bind_result($tid,$uid);
    while( $stSelect->fetch() )
    {
      $spTasks[] = $tid;
      $spTasksID[] = $tid.$uid;
    }

    foreach($aTasks as $aTsk)
    {
      $tid  = $aTsk['tid'];
      $pid  = $aTsk['prj_id'];
      $uid  = $aTsk['user_id'];
      $sDate = $aTsk['date_debut'];
      $eDate = $aTsk['date_fin'];
      $titre = $aTsk['titre'];
      $desc  = $aTsk['description'];
      $taskid = $tid.$uid;
      // if( !in_array($aTsk['tid'],$spTasks) )
      if( !in_array($taskid,$spTasksID) )
      {
        unset($stmt);

        //$nom = $aPrj['name'];
        $Sql = "INSERT INTO planning_periode SET task_id=?, "
                . "projet_id=?, user_id=?, date_debut=?, "
                . "date_fin=?, titre=?, notes=?, "
                . "statut_tache='a_faire', livrable='non', createur_id='sync'";
        $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
        $stmt->bind_param('sssssss',$taskid,$pid,$uid,$sDate,$eDate,$titre,$desc);
        $stmt->execute();
      }
      else 
      {
        unset($stmt);
        $Sql = "UPDATE planning_periode SET "
                . "projet_id=?, user_id=?, date_debut=?, "
                . "date_fin=?, titre=?, notes=? "
                . "WHERE task_id=?";
        $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
        $stmt->bind_param('sssssss',$pid,$uid,$sDate,$eDate,$titre,$desc,$taskid);
        $stmt->execute();
      }
    }
  // Supprimer les doublons
  $Sql = "DELETE t1 "
	. "FROM planning_periode AS t1, planning_periode AS t2 "
	. "WHERE t1.periode_id > t2.periode_id "
		. "AND t1.user_id = t2.user_id "
		. "AND t1.task_id = t2.task_id "
		. "AND t1.date_debut = t2.date_debut "
		. "AND t1.date_fin = t2.date_fin";
  $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
  $stmt->execute();
  }
}
