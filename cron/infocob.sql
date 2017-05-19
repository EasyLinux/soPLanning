CREATE DATABASE '/var/lib/firbird/2.5/data/Infocob.GDB' page_size 8192 user 'SYSDBA' password 'masterkey';


CREATE TABLE interlocuteurfiche (
  i_code CHAR(10) NOT null PRIMARY KEY,
  i_nom  CHAR(32),
  i_codecontact CHAR(8),
  i_prenom CHAR(32),
  i_inactif CHAR(1),
  i_email CHAR(64),
  i_familleinterlocuteur CHAR(32)
);

CREATE TABLE actions (
  ac_code CHAR(10),
  ac_typeaction CHAR(10),
  ac_date_prevu CHAR(10),
  ac_interlocuteurcontact CHAR(10)
);

INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('200ATL','User0','492ATLC','Give1','F','guser0@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('201ATL','User1','492ATLC','Give1','F','guser1@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('202ATL','User2','492ATLC','Give1','F','guser2@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('203ATL','User3','492ATLC','Give1','F','guser3@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('204ATL','User4','492ATLC','Give1','F','guser4@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('205ATL','User5','492ATLC','Give1','F','guser5@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('206ATL','User6','492ATLC','Give1','F','guser6@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('207ATL','User7','492ATLC','Give1','F','guser7@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('208ATL','User8','492ATLC','Give1','F','guser8@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('209ATL','User9','492ATLC','Give1','F','guser9@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('210ATL','User10','492ATLC','Give1','F','guser10@test.com','Technicien');
INSERT INTO interlocuteurfiche (i_code,i_nom,i_codecontact,i_prenom,i_inactif,i_email,i_familleinterlocuteur) VALUES
  ('211ATL','User11','492ATLC','Give1','F','guser11@test.com','Technicien');


INSERT INTO actions (ac_code, ac_typeaction, ac_date_prevu, ac_interlocuteurcontact) VALUES
  ('500ATL','71ATL','2017-04-10','201ATL');




