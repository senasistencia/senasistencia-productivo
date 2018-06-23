# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-23 18:24:47
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_asocCliente_Rol"
#

DROP PROCEDURE IF EXISTS `sp_asocCliente_Rol`;
CREATE PROCEDURE `sp_asocCliente_Rol`(IN _doc BIGINT(16),IN _idrol BIGINT(16))
BEGIN

INSERT INTO cliente_rol VALUES(_doc,_idrol); 

END;
