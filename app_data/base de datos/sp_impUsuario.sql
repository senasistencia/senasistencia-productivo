# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:22:44
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impUsuario"
#

DROP PROCEDURE IF EXISTS `sp_impUsuario`;
CREATE PROCEDURE `sp_impUsuario`()
BEGIN
SELECT ID_Usuario,`Documento_Cliente`,`Password_Hash`,`Estado_Usuario`, `FechaDeCreacion_Usuario`
FROM 

usuario inner join cliente 

on FK_DocCliente = Documento_Cliente;
END;
