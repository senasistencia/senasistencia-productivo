# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-23 18:24:58
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_guardarCliente"
#

DROP PROCEDURE IF EXISTS `sp_guardarCliente`;
CREATE PROCEDURE `sp_guardarCliente`(IN _tpdoc BIGINT(16),IN _doc BIGINT(16),IN _pnom VARCHAR(60),IN _snom VARCHAR(60),IN _papll VARCHAR(60),IN _sapll VARCHAR(60),
IN _corr VARCHAR(60),IN _tel VARCHAR(10),IN _pef BIGINT(16),in _est TINYINT(1),IN _fchC DATE,IN _fchI DATE)
BEGIN

INSERT INTO cliente  VALUES(_tpdoc,_doc,_pnom,_snom,_papll,_sapll, _corr,_tel,_pef,_est,_fchC,_fchI); 

SELECT LAST_INSERT_ID(_doc) as documento;

END;
