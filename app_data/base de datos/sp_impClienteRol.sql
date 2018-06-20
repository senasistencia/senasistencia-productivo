# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:22:13
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impClienteRol"
#

DROP PROCEDURE IF EXISTS `sp_impClienteRol`;
CREATE PROCEDURE `sp_impClienteRol`()
SELECT `Documento_Cliente`,`Tipo_Rol` FROM cliente_rol 
inner join cliente inner join rol
on `FK_DocCliente`= Documento_Cliente and `FK_Rol` = `ID_Rol`;
