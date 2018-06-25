#
# Procedure "sp_guardarFicha"
#

DROP PROCEDURE IF EXISTS `sp_guardarFicha`;
CREATE PROCEDURE `sp_guardarFicha`(IN _id BIGINT(16),IN _fkprog BIGINT(16),IN _nficha VARCHAR(30),IN _gru INT(11),IN _jorn VARCHAR(15),IN _tri INT(11),IN _est TINYINT(1),IN _fchC DATE,IN _fchI DATE)
BEGIN

INSERT INTO ficha VALUES(_id,_fkprog,_nficha,_gru,_jorn,_tri,_est,_fchC,_fchI); 

SELECT LAST_INSERT_ID() as ultimo;

END;
