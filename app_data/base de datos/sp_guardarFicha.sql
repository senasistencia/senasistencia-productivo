# Host: 127.0.0.1:3308  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-06-21 20:57:58
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_guardarFicha"
#

DROP PROCEDURE IF EXISTS `sp_guardarFicha`;
CREATE PROCEDURE `sp_guardarFicha`(IN _id BIGINT(16),IN _fkprog BIGINT(16),IN _nficha VARCHAR(30),IN _gru INT(11),IN _jorn VARCHAR(15),IN _tri INT(11),IN _est TINYINT(1),IN _fchC DATE,IN _fchI DATE)

BEGIN

INSERT INTO ficha VALUES(_id,_fkprog,_nficha,_gru,_jorn,_tri,_est,_fchC,_fchI); 

SELECT LAST_INSERT_ID() as ultimo;

END;
