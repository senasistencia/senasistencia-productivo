# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-25 03:32:38
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_buscarUsuario"
#

DROP PROCEDURE IF EXISTS `sp_buscarUsuario`;
CREATE PROCEDURE `sp_buscarUsuario`()
BEGIN
SELECT Documento_Cliente,PrimerNombre_Cliente,SegundoNombre_Cliente,PrimerApellido_Cliente,Password_Hash FROM cliente inner join usuario
on `Documento_Cliente`= `FK_DocCliente`;
END;
