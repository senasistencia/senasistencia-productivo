# Host: 127.0.0.1:3308  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-06-21 20:58:10
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_asocCliente_Ficha"
#

DROP PROCEDURE IF EXISTS `sp_asocCliente_Ficha`;
CREATE PROCEDURE `sp_asocCliente_Ficha`(IN _doc BIGINT(16),IN _idficha BIGINT(16))
BEGIN

INSERT INTO cliente_ficha VALUES(_doc,_idficha); 

END;
