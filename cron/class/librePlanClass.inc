<?php


/**
 * Description of librePlanClass
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 */
class librePlanClass {
  
  private $mysqli;
  private $Uids=array();
  private $Tasks=array();
  private $Projects=array();
  private $iNbTasks; 		// Nombre de taches
  private $bConnect;
  
  public function __construct()
  {
    $this->mysqli = new mysqli(CONFIG_LIBREPLAN_SERVER, CONFIG_LIBREPLAN_USER, 
            CONFIG_LIBREPLAN_PASS, CONFIG_LIBREPLAN_FILE);
    // check connection 
    $this->bConnect = true;
    if (mysqli_connect_errno()) 
    {
      printf("ERREUR Connection à la base librePlan: %s", 
              mysqli_connect_error());
      $this->bConnect=false;
    } 
    $this->getTasks();
  }

  public function isConnected()
  {
    return $this->bConnect;
  }

  public function getUsers()
  {
    // Recherche des identifiants
    $aUsers = array();
    $Sql = "SELECT worker_id, nif, first_name, surname FROM worker";
    $stmt = $this->mysqli->prepare($Sql);
    $stmt->execute();
    $stmt->bind_result($uid,$nif,$given,$name);
    while( $stmt->fetch())
    {
      $aUsers[$nif] = ['id' => $uid, 'nif' => $nif, 
          'given' => $given, 'name' => $name];
      $this->Uids[$uid] = ['uid' => $uid, 'nif' => $nif];
    }
    return( $aUsers );
  }
  
  public function updateWorkers($aInfoCobUsers)
  {
    foreach( $aInfoCobUsers as $aICU )
    {
      $fname = $aICU['prenom'];
      $name = $aICU['nom'];
      $nif = $aICU['uid'];
      $Sql = "UPDATE worker set first_name='$fname', surname='$name' "
              . "WHERE nif='$nif'";
      $stmt = $this->mysqli->prepare($Sql);
      $stmt->execute();
    }    
  }
  
  public function updateCalendars($InfoCals)
  {
    $Xml = "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>\n"
            . "<base-calendar-list xmlns=\"http://rest.ws.libreplan.org\">\n";
    foreach($InfoCals as $aIC)
    {
      $User = iconv("ISO-8859-1","UTF-8",$aIC['user']);
      $Nif = $aIC['uid'];
      $Xml .=   "<base-calendar name=\"$User\" code=\"$Nif\" "
              . "parent=\"CALENDAR0001\">\n"
              . "  <calendar-exception-list>";

    }
  }

  public function getUsersTasks()
  {
    $DayTasks=array();
    $toDay = date('Y-m-d');
    $Sql = "SELECT Da.day, W.first_name, W.surname, W.nif, "
            . "Te.id, Te.name, "
            . "Te.parent, Oe.description "
            . "FROM day_assignment AS Da "
            . "JOIN worker AS W ON W.worker_id = Da.resource_id "
            . "LEFT JOIN specific_day_assignments_container AS Sdac "
            . "ON Sdac.id = Da.specific_container_id "
            . "LEFT JOIN resource_allocation AS Ra "
            . "ON Ra.id = Sdac.resource_allocation_id "
            . "LEFT JOIN task_element AS Te ON Te.id = Ra.task "
            . "LEFT JOIN order_element AS Oe ON Oe.name = Te.name "
            . "WHERE nif LIKE '%ATL' AND day >= '$toDay' "
            . "ORDER BY W.nif, Te.name, Da.day";
    $stmt = $this->mysqli->prepare($Sql);
    $stmt->execute();
    $stmt->bind_result($day, $name, $surname, $nif, $tid, $tname, $parent, $tdesc);

    $this->iNbTasks = 0;
    $told = 0;
    $Idx=0;
    while( $stmt->fetch())
    {
      if( $told == $tid )
      {
        // Meme tache 
        $DayTasks[$Idx-1]['date_fin'] = $day;
        $this->iNbTasks++;
      }
      else 
      {
        $told  = $tid;
        $DayTasks[$Idx]['tid'] = $tid;
        $DayTasks[$Idx]['user_id'] = $nif;
        $DayTasks[$Idx]['task_id'] = $tid.$nif;
        $DayTasks[$Idx]['date_debut'] = $day;
        $DayTasks[$Idx]['date_fin'] = $day;
        $DayTasks[$Idx]['titre'] = str_replace("'","&apos;",$tname);
        $prjId = $this->getParent($tid);
        $DayTasks[$Idx]['prj_id'] = $prjId;
        $sPrjName = str_replace("'","&apos;",$this->Tasks[$prjId]['name']);
        $DayTasks[$Idx]['prj_name'] = $sPrjName;
        $Desc = str_replace("\n","",nl2br($tdesc));
        $DayTasks[$Idx]['description'] = str_replace("'","&apos;",$Desc);
        $Idx++;
        $this->iNbTasks++;
      }
    }
    return $DayTasks;
  }

  public function getNbTasks()
  {
    return $this->iNbTasks;
  }

  private function getParent($id)
  {
    $search = $id;
    while( $this->Tasks[$search]['parent'] != 0 )
      $search = $this->Tasks[$search]['parent'];

    $prjId = $search; 
    return $prjId;
  }
  
  private function getTasks()
  {
    $toDay = date('Y-m-d');
    $Sql = "SELECT id, name, parent FROM task_element WHERE start_date >= '$toDay'";

    $stmt = $this->mysqli->prepare($Sql);
    $stmt->execute();
    $stmt->bind_result($id, $name, $parent);
    while($stmt->fetch())
    {
      $this->Tasks[$id] = ['id'=>$id, 'name' => str_replace("'","&apos;",$name), 
          'parent' => $parent];
    }
  }

  public function getProjects()
  {
    $toDay = date('Y-m-d');
//    $Sql = "SELECT id, name FROM task_element WHERE start_date >= '$toDay' AND parent IS NULL";
    $Sql = "SELECT id, name FROM task_element WHERE start_date >= ? OR end_date >= ? AND parent IS NULL";
        
    $stmt = $this->mysqli->prepare($Sql);
    $stmt->bind_param('ss',$toDay,$toDay);
    $stmt->execute();
    $stmt->bind_result($id, $name);
    while($stmt->fetch())
    {
      $this->Projects[$id] = ['id'=>$id, 
          'name' => str_replace("'","&apos;",$name)];
    }
    return $this->Projects;
  }
  
}

/*
 <base-calendar name="Calendrier Serge" code="SNOEL-001">
    <calendar-exception-list>
      <calendar-exception calendar-exception-type-code="CALENDAR_EXCEPTION_TYPE0004"
        hours="0" date="2017-01-01"
        code="001-001" />
      <calendar-exception calendar-exception-type-code="CALENDAR_EXCEPTION_TYPE0004"
        hours="0" date="2017-04-22"
        code="001-023" />
      <calendar-exception calendar-exception-type-code="NO_EXCEPTION"
        hours="7" date="2017-04-15"
        code="001-002" />
    </calendar-exception-list>
    <calendar-data-list>
      <calendar-data code="001-001">
        <hours-per-day-list>
          <hours-per-day hours="7" day="MONDAY" />
          <hours-per-day hours="7" day="TUESDAY" />
          <hours-per-day hours="7" day="WEDNESDAY" />
          <hours-per-day hours="7" day="THURSDAY" />
          <hours-per-day hours="7" day="FRIDAY" />
        </hours-per-day-list>
      </calendar-data>
    </calendar-data-list>
  </base-calendar>
</base-calendar-list>
 */
