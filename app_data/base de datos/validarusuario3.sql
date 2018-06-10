# Host: 127.0.0.1  (Version 5.5.5-10.1.32-MariaDB)
# Date: 2018-06-07 22:54:25
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "validarUsuario"
#

DROP PROCEDURE IF EXISTS `validarUsuario`;
CREATE PROCEDURE `validarUsuario`(IN _usuario BIGINT(16),IN _pass VARCHAR(100))
BEGIN

SELECT PrimerNombre_Cliente,Tipo_Rol FROM cliente inner join cliente_rol inner join rol
      on cliente.Documento_Cliente = cliente_rol.FK_DocCliente and rol.ID_Rol =  cliente_rol.FK_Rol 
      WHERE Documento_Cliente = (select FK_DocCliente from usuario where usuario.FK_DocCliente = _usuario AND usuario.Password_Hash = SHA1(_pass));
END;