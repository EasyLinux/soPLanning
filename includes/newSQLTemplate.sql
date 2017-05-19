/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  snoel
 * Created: 22 déc. 2016
 */

SELECT user_id, date_debut, date_fin, statut_tache FROM planning_periode 
  WHERE user_id='ply' 
    AND ( (date_debut BETWEEN '2017-01-01' AND '2017-01-31') 
          OR (date_fin BETWEEN '2017-01-01' AND '2017-01-31') ) 
    OR  ( date_debut < '2017-01-01' AND date_fin > '2017-01-31')


SELECT DISTINCT projet_id, planning_periode.user_id, planning_user.user_id, nom, couleur
    FROM planning_periode, planning_user WHERE projet_id='AI' 
     AND planning_periode.user_id = planning_user.user_id;


SELECT projet_id, date_debut, date_fin, planning_periode.user_id, planning_user.user_id, nom, couleur ";
    $SQL .= "FROM planning_periode, planning_user WHERE projet_id='$ProjectId' ";
    $SQL .= "AND planning_periode.user_id = planning_user.user_id;