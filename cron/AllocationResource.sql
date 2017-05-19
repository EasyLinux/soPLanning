-- N° Worker 2223 <WORKERID>
-- Tache 1   7578 <oeID1>
-- Tache 2   7579 <TASK2>
-- Tache 3   7580 <TASK3>
-- Tache 4   7581 <TASK4>

-- Resource Allocation <RES_ALLOC>

/*
Liste des taches pour un worker
SELECT DISTINCT W.worker_id, W.nif, Da.day, Te.name, Te.parent
   FROM worker AS W
   LEFT JOIN day_assignment AS Da
          ON Da.resource_id=W.worker_id
   LEFT JOIN task_element AS Te
          ON Te.start_date <= Da.day AND Te.end_date >= Da.Day
   WHERE W.worker_id=2223 AND Te.parent IS NOT NULL

SELECT W.name, W.surname, W.nif, Ts.id, Ts.schedulingdata, Sdfv.order_element_id, Oe.name, Oe.description
    FROM worker AS W
    LEFT JOIN specific_resource_allocation AS Sra
           ON Sra.resource = W.worker_id
    LEFT JOIN resource_allocation AS Ra
           ON Ra.id = Sra.resource_allocation_id
    LEFT JOIN task_source AS Ts
           ON Ts.id = Ra.task
    LEFT JOIN scheduling_data_for_version AS Sdfv
          ON Sdfv.id = Ts.schedulingdata
    LEFT JOIN order_element AS Oe
           ON Oe.id = Sdfv.order_element_id
*/

-INSERT INTO `advance_assignment` VALUES 
  (<aaD1>,5,1,1415),
  (7980,5,1,1415),
  (7981,5,1,1415),
  (7982,5,1,1415),
  (7983,5,1,1414),
  (7984,5,0,1415);
+INSERT INTO `advance_assignment` VALUES 
  (<aaD1>,6,1,1415),
  (7980,6,1,1415),
  (7981,6,1,1415),
  (7982,6,1,1415),
  (7983,6,1,1414),
  (7984,6,0,1415);


INSERT INTO `day_assignment` VALUES 
    (8488,'specific_day',3,0,0,'2017-04-17',<WORKERID>,8384,NULL,NULL),
    (8489,'specific_day',3,0,0,'2017-04-18',<WORKERID>,8384,NULL,NULL),
    (8490,'specific_day',3,0,0,'2017-04-19',<WORKERID>,8384,NULL,NULL),
    (8491,'specific_day',3,3600,0,'2017-04-20',<WORKERID>,8384,NULL,NULL),
    (8492,'specific_day',3,3600,0,'2017-04-20',<WORKERID>,8385,NULL,NULL),
    (8493,'specific_day',3,7200,0,'2017-04-20',<WORKERID>,8386,NULL,NULL),
    (8494,'specific_day',3,14400,0,'2017-04-21',<WORKERID>,<sdacD1>,NULL,NULL),
    (8495,'specific_day',3,10800,0,'2017-04-20',<WORKERID>,<sdacD1>,NULL,NULL);

-INSERT INTO `dependency` VALUES 
    (2654208,5,7878,<teID1-1>,NULL,0),
    (2654209,5,<teID1-1>,7880,NULL,0),
    (2654210,5,7880,<teID1>,NULL,0);
+INSERT INTO `dependency` VALUES 
    (2654208,6,7878,<teID1-1>,NULL,0),
    (2654209,6,<teID1-1>,7880,NULL,0),
    (2654210,6,7880,<teID1>,NULL,0);

-INSERT INTO `hibernate_unique_key` VALUES (82);
+INSERT INTO `hibernate_unique_key` VALUES (85);

-INSERT INTO `hours_group` VALUES 
    (8080,5,'ORDER0007-0001-0001','WORKER',1,1.00,0,<oeID1>,NULL),
    (8081,5,'ORDER0007-0002-0001','WORKER',1,1.00,0,<TASK2>,NULL),
    (8082,5,'ORDER0007-0003-0001','WORKER',2,1.00,0,<TASK3>,NULL),
    (8083,5,'ORDER0007-0004-0001','WORKER',7,1.00,0,<TASK4>,NULL);
+INSERT INTO `hours_group` VALUES 
    (8080,6,'ORDER0007-0001-0001','WORKER',1,1.00,0,<oeID1>,NULL),
    (8081,6,'ORDER0007-0002-0001','WORKER',1,1.00,0,<TASK2>,NULL),
    (8082,6,'ORDER0007-0003-0001','WORKER',2,1.00,0,<TASK3>,NULL),
    (8083,6,'ORDER0007-0004-0001','WORKER',7,1.00,0,<TASK4>,NULL);

-- Changement version dans les tâches impactées (order-element)
-INSERT INTO `order_element` VALUES 
    (7577,5,'Galette',NULL,'ORDER0007','2017-04-17 09:49:31',NULL,0.00,0,NULL,NULL,NULL,NULL),
    (<oeID1>,5,'Installation',NULL,'ORDER0007-0001',NULL,NULL,0.00,0,7577,NULL,NULL,0),
    (<TASK2>,5,'Mise en place dev',NULL,'ORDER0007-0002',NULL,NULL,0.00,0,7577,NULL,NULL,1),
    (<TASK3>,5,'Ajout plugin',NULL,'ORDER0007-0003',NULL,NULL,0.00,0,7577,NULL,NULL,2),
    (<TASK4>,5,'Connection AD',NULL,'ORDER0007-0004',NULL,NULL,0.00,0,7577,NULL,NULL,3);
+INSERT INTO `order_element` VALUES 
    (7577,6,'Galette',NULL,'ORDER0007','2017-04-17 09:49:31',NULL,0.00,0,NULL,NULL,NULL,NULL),
    (<oeID1>,6,'Installation',NULL,'ORDER0007-0001',NULL,NULL,0.00,0,7577,NULL,NULL,0),
    (<TASK2>,6,'Mise en place dev',NULL,'ORDER0007-0002',NULL,NULL,0.00,0,7577,NULL,NULL,1),
    (<TASK3>,6,'Ajout plugin',NULL,'ORDER0007-0003',NULL,NULL,0.00,0,7577,NULL,NULL,2),
    (<TASK4>,6,'Connection AD',NULL,'ORDER0007-0004',NULL,NULL,0.00,0,7577,NULL,NULL,3);
 
-INSERT INTO `order_version` VALUES (7779,5,'2017-03-24 09:52:15',1515);
+INSERT INTO `order_version` VALUES (7779,6,'2017-03-24 09:54:31',1515);


INSERT INTO `resource_allocation` VALUES (8283,3,1.00,NULL,7878,NULL,1.00,3600,3600),(8284,3,1.00,NULL,<teID1-1>,NULL,1.00,3600,3600),(8285,3,1.00,NULL,7880,NULL,1.00,7200,7200),
   (<raID1>,3,1.00,NULL,<teID1>,NULL,1.00,25200,25200);

-INSERT INTO `scheduling_data_for_version` VALUES (<sdfvID2>,5,3,7577),(<sdfvD1>,5,0,<oeID1>),(7680,5,0,<TASK2>),(7681,5,0,<TASK3>),(7682,5,0,<TASK4>);
+INSERT INTO `scheduling_data_for_version` VALUES (<sdfvID2>,6,3,7577),(<sdfvD1>,6,0,<oeID1>),(7680,6,0,<TASK2>),(7681,6,0,<TASK3>),(7682,6,0,<TASK4>);

INSERT INTO `specific_day_assignments_container` VALUES 
       (8384,3,8283,1515,'2017-04-17',0,'2017-04-20',3600),
       (8385,3,8284,1515,'2017-04-20',3600,'2017-04-20',7200),
       (8386,3,8285,1515,'2017-04-20',7200,'2017-04-20',14400),
       (<sdacD1>,3,<raID1>,1515,'2017-04-20',14400,'2017-04-21',14400);
 
INSERT INTO `specific_resource_allocation` VALUES 
    (8283,<WORKERID>),(8284,<WORKERID>),(8285,<WORKERID>),(<raID1>,<WORKERID>);


-INSERT INTO `task_element` VALUES (<teID1-1>,5,'Mise en place dev',NULL,'2017-03-24',3600,'2017-03-24',7200,NULL,0.0000,0,<teID1>,NULL,1,0),(7880,5,'Ajout plugin',NULL,'2017-03-24',7200,'2017-03-24',14400,NULL,0.0000,0,<teID1>,NULL,2,0),(<teID1>,5,'Connection AD',NULL,'2017-03-24',14400,'2017-03-27',14400,NULL,0.0000,0,<teID1>,NULL,3,0),(<teID1>,6,'Galette',NULL,'2017-03-24',0,'2017-03-27',14400,NULL,0.0000,0,NULL,NULL,NULL,0);
+INSERT INTO `task_element` VALUES (<teID1-1>,6,'Mise en place dev',NULL,'2017-04-20',3600,'2017-04-20',7200,NULL,0.0000,0,<teID1>,NULL,1,0),(7880,6,'Ajout plugin',NULL,'2017-04-20',7200,'2017-04-20',14400,NULL,0.0000,0,<teID1>,NULL,2,0),(<teID1>,6,'Connection AD',NULL,'2017-04-20',14400,'2017-04-21',14400,NULL,0.0000,0,<teID1>,NULL,3,0),
  (<teID1>,8,'Galette',NULL,'2017-04-17',0,'2017-04-21',14400,NULL,0.0000,39600,NULL,NULL,NULL,0);
 /*!40000 ALTER TABLE `task_element` ENABLE KEYS */;
 UNLOCK TABLES;
 
@@ -3294,7 +3294,7 @@
 
 LOCK TABLES `task_source` WRITE;
 /*!40000 ALTER TABLE `task_source` DISABLE KEYS */;
-- version++ scheduling_data pointe sur scheduling_data_for_version
-INSERT INTO `task_source` VALUES (7878,5,<sdfvD1>),(<teID1-1>,5,7680),(7880,5,7681),(<teID1>,5,7682),(<teID1>,5,<sdfvID2>);
+INSERT INTO `task_source` VALUES (7878,6,<sdfvD1>),(<teID1-1>,6,7680),(7880,6,7681),(<teID1>,6,7682),(<teID1>,6,<sdfvID2>);
