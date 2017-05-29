Recherche des taches en doublons

SELECT user_id, task_id, date_debut, date_fin, 
       CONCAT(user_id,task_id,date_debut,date_fin) AS ident, 
       COUNT(task_id) AS Dbls FROM `planning_periode` GROUP BY ident HAVING Dbls > 1
       
Lignes à conserver

SELECT MIN(periode_id) as id, user_id, task_id, date_debut, date_fin
        FROM planning_periode
        GROUP BY user_id, task_id, date_debut, date_fin
        
        
Supprimer doublons

DELETE t1 
	FROM planning_periode AS t1, planning_periode AS t2
	WHERE t1.periode_id > t2.periode_id
		AND t1.user_id = t2.user_id
		AND t1.task_id = t2.task_id
		AND t1.date_debut = t2.date_debut
		AND t1.date_fin = t2.date_fin		