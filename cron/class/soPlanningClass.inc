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
    // Lire les données soPlanning
    $this->cfgPlanning['mysqli'] = new mysqli($this->cfgPlanning['Host'], 
            $this->cfgPlanning['User'], $this->cfgPlanning['Pass'], 
            $this->cfgPlanning['Base']);

    // check connection 
    if (mysqli_connect_errno()) 
    {
      printf("ERREUR Connection a la base soPlanning: %s", 
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
      $stSelect->bind_param('sisss', $uid, $gid, $name, $login, $email);
      $stSelect->execute();
      echo DATA."  -&gt; $uid $name".NL;
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
    $Sql = "INSERT INTO planning_user_exception SET cobid=?, user_id=?, jour=?";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
    foreach( $aPlanningAction as $aDo )
    {
      $stSelect->bind_param('sss', $aDo['id'], $aDo['uid'], $aDo['date']);
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
    $dToday = date('Y-m-d',mktime(0, 0, 0, date("m"), date("d")-7,date("Y")));

    $Sql = "SELECT periode_id, user_id, task_id FROM planning_periode "
           . "WHERE (date_debut >= ? OR date_fin >= ?) AND task_id != ''";
    $stSelect = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stSelect->bind_param('ss',$dToday,$dToday);
    $stSelect->execute();
    $stSelect->bind_result($tid,$uid,$taskid);
    while( $stSelect->fetch() )
    {
      $spTasksID[] = $taskid;
    }
    unset($stSelect);

    foreach($aTasks as $aTask)
    {
      $aLibTasks[] = $aTask['task_id'];
    }

    $aAllTasks = array_unique(array_merge($aLibTasks,$spTasksID));

    // Synchronisation
    foreach($aAllTasks as $theTask)
    {
        if( in_array($theTask,$aLibTasks) )
        {  // Dans librePlan
           if( in_array($theTask,$spTasksID) )
           { // et soPlanning
             $this->updateTask($theTask,$aTasks);
           } else {
             $this->insertTask($theTask,$aTasks);
           }
        }
        else
        {  // Pas dans librePlan
           $this->delTask($theTask);
        }
    }
   
  // Supprimer les doublons
  $Sql = "DELETE t1 "
	. "FROM planning_periode AS t1, planning_periode AS t2 "
	. "WHERE t1.periode_id > t2.periode_id "
		. "AND t1.task_id = t2.task_id "
		. "AND t1.date_debut = t2.date_debut "
		. "AND t1.date_fin = t2.date_fin";
  $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
  $stmt->execute();

  }

  private function delTask($task_id)
  {
    $Sql = "DELETE FROM planning_periode "
                . "WHERE task_id=?";
    $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
    $stmt->bind_param('s',$task_id);
    $stmt->execute();
  }

  private function insertTask($task_id,$aTasks)
  {
    foreach($aTasks as $aTask)
    {
      if($aTask['task_id'] == $task_id)
      {
         $Sql = "INSERT INTO planning_periode SET task_id=?, "
                . "projet_id=?, user_id=?, date_debut=?, "
                . "date_fin=?, titre=?, notes=?, "
                . "statut_tache='a_faire', livrable='non', createur_id='sync'";
         $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
         $stmt->bind_param('sssssss',$aTask['task_id'],
                                     $aTask['prj_id'],
                                     $aTask['user_id'],
                                     $aTask['date_debut'],
                                     $aTask['date_fin'],
                                     $aTask['titre'],
                                     $aTask['description']);
         $stmt->execute();
         $Err =  $this->cfgPlanning['mysqli']->error;
         if( $Err != "" )
         {
           error_log("ERR INSERT ".$aTask['task_id']. " - ".$aTask['prj_id']."\n"
                     , 3,"ErrorCron.log");
         }
      }
    }
  }

  private function updateTask($task_id,$aTasks)
  {
    foreach($aTasks as $aTask)
    {
      if($aTask['task_id'] == $task_id)
      {
        $Sql = "UPDATE planning_periode SET "
                . "projet_id=?, user_id=?, date_debut=?, "
                . "date_fin=?, titre=?, notes=? "
                . "WHERE task_id=?";
        $stmt = $this->cfgPlanning['mysqli']->prepare($Sql);
         $stmt->bind_param('sssssss',$aTask['prj_id'],
                                     $aTask['user_id'],
                                     $aTask['date_debut'],
                                     $aTask['date_fin'],
                                     $aTask['titre'],
                                     $aTask['description'],
                                     $aTask['task_id']);
        $stmt->execute();
         $Err =  $this->cfgPlanning['mysqli']->error;
         if( $Err != "" )
         {
           error_log("ERR UPDATE ".$aTask['task_id']. " - ".$aTask['prj_id']."\n"
                     , 3,"ErrorCron.log");
         }
      }
    }
  }
}
